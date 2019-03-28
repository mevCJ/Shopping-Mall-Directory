<?php
use App\Common;
?>

@extends('layouts.app')

<head>
  <title>MoonWay Velocity Megamall</title>
<link rel="stylesheet" href="{{asset('css/userStyle.css')}}" type="text/css">
</head>

@section('content')
<div class=container>
<div class=tinted-image style="height: 100%"></div>
<div class=Center>
    <h1 align=center>Welcome to MoonWay Velocity Megamall Directory</h1><br><br>
<section class="filters">

{!! Form::open([
    'route' => ['tenant.search'],
    'method' => 'get',
    'class' => 'form-inline'
]) !!}


{!! Form::label('tenant-name', 'Name: ', [
    'class' => 'control-label col-sm-3',
]) !!}

{!! Form::text('name', null, [
    'id' => 'tenant-name',
    'class' => 'form-control',
    'maxlength' => 100,
    'placeholder' => 'Enter tenants name or keywords (Empty inputs to list all tenants)',
    'size' => '100x5',
]) !!} <br><br>

{!! Form::label('tenant-category', 'Category: ', [
    'class' => 'control-label col-sm-3',
]) !!}

{!! Form::text('category', null, [
    'id' => 'tenant-category',
    'class' => 'form-control',
    'maxlength' => 100,
    'placeholder' => 'Enter tenants category (e.g. Sports, Food, Fasion)',
    'size' => '100x5',
]) !!} <br><br>

{!! Form::label('tenant-zone', 'Zone', [
    'class' => 'control-label col-sm-3',
]) !!}

{!! Form::select('zone', Common::$zone, null, [
    'class' => 'form-control',
    'placeholder' => '- All -',
]) !!} <br><br>

{!! Form::label('tenant-level', 'Level', [
    'class' => 'control-label col-sm-3',
]) !!}

{!! Form::select('level', Common::$level, null, [
    'class' => 'form-control',
    'placeholder' => '- All -',
]) !!} <br><br>

{!! Form::button('Search', [
    'type' => 'submit',
    'class' => 'btn button1',
]) !!}

{!! Form::close() !!}

</section>
</div>
</div>
@endsection
