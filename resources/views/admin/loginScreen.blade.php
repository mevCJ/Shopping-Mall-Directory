<html>
    <head>
        <title>Management Login</title>
        <link rel="stylesheet" href="{{asset('css/loginStyle.css')}}" type="text/css"> 
    </head>

    @if(isset(Auth::user()->username))
        <script>window.location="/admin/tenant";</script>
    @endif

    
    <body>
        <div class="login-box">
            <form method ="post" action="{{url('admin/login/checkLogin')}} ">
                {{csrf_field()}}
                <div class="logo">
                    <h1 class="threed">Moonway Velocity Login</h1>
                </div>
                @if(count($errors) > 0)
                    <div class="alert-box">
                        <div class="alert-info">
                            <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}} </li>
                            @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                <input type="text" name="username" placeholder="Username" class="userInfo"/>
                <input type ="password" name="password" placeholder="Password" class="userInfo"/>
                <input type ="submit" name="login" value="Login" class="loginBtn"/>
            </form>
        </div>
    </body>
</html>