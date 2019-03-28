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
<div class=cover style="height: 200%"></div>
<div class=title>Overview of MoonWay Mall Map</div>
<div class=Center>
  @if(Storage::disk('public')->exists('tenants/'.$tenant->id.'.gif'))
  {{$tenant->id}}
  <img src="/storage/tenants/{{$tenant->id}}.gif" width="240">
  @endif
  {{$tenant->id}}
</div>
</div>




@endsection
