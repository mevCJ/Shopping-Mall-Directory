<?php
use App\Common;
?>

@extends('layouts.app')

<head>
  <title>MoonWay Velocity Megamall</title>
<link rel="stylesheet" href="{{asset('css/mainStyle.css')}}" type="text/css">
</head>

@section('content')
<div class=container>

<div class=cover style="height: 100%"></div>
<div class=title><span style="font-family:arial">Welcome to</span><br><span style="font-size:50px;">MoonWay Velocity Megamall</span></div>
<a href="{{route('tenant.main')}}">
  <button class="button button1">Get Direction</button>
</a>

</div>
@endsection
