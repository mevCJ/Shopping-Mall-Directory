
<div class="banner">
MoonWay Velocity Mall Map
@if(isset(Auth::user()->username))
    <button onclick="location.href='{{url('admin/logout')}}'"class="btn-primary" id="signOut">Sign out</button>
    <p style="float: right; margin-top: 5; margin-bottom: 0; padding-right: 20px">Welcome, <strong>{{ Auth::user()->username }}</strong></p>

@endif
</div>
