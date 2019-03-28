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
<div class=title><br>Welcome to MoonWay Velocity Megamall Directory</div>
<a href="{{route('tenant.main')}}">
  <button class="button button1">Get Direction</button>
</a>

</div>
@endsection
