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
<div class=title>Welcome to MoonWay Velocity Megamall Directory</div>
<div class=Center>
  <div>
  <a href="{{route('tenant.sortbyname')}}"  style="color:white" >Alphabetical</a>  |
  <a href="{{route('tenant.sortbyzone')}}"  style="color:white" >Zone</a> |
  <a href="{{route('tenant.sortbycategory')}}"  style="color:white" >Category</a>  |
  <a href="{{route('tenant.sortbylevel')}}"  style="color:white" >Level</a>
</div>
{!! Form::open([
    'route' => ['tenant.main'],
    'method' => 'get',
    'class' => 'form-inline'
]) !!}
{!! Form::label('tenant-name', ' ', [
    'class' => 'control-label col-sm-3',
]) !!}
{!! Form::text('name', null, [
    'id' => 'tenant-name',
    'class' => 'form-control search-bar',
    'maxlength' => 100,
    'placeholder' => 'Enter tenants name or keywords',
    'size' => '50',
]) !!}
{!! Form::button('Search', [
    'type' => 'submit',
    'class' => 'btn btn-primary',
]) !!}

{!! Form::close() !!}


<div class="panel-body">
    @if(count($tenants) > 0)
    <table class="table table-striped task-table">
        <!-- Table Headings -->
        <thead>
            <tr>
                <th>Name</th>
                <th>Lot Number</th>
                <th>Zone</th>
                <th>Level</th>
                <th>Category</th>
            </tr>
        </thead>
        <!-- Table Body -->
        <tbody>
            @foreach ($tenants as $i => $tenant)
            {!! Form::model($tenant, [ 'route' => ['tenant.destroy', $tenant->id], 'method'=>'delete', 'class' => 'form-horizontal' ]) !!}
            <tr>
                <td class="table-text">
                    <div>{!!  link_to_route('tenant.map',
                      $title= $tenant->name,
                      $parameters = [
                      'id' => $tenant->id,
                      ]
                    ) !!}
                  </div>
                  
                </td>
                <td class="table-text">
                    <div>{{ $tenant->lot_number }}</div>
                </td>
                <td class="table-text">
                    <div>{{ Common::$zone[$tenant->zone] }}</div>
                </td>
                <td class="table-text">
                    <div>{{ Common::$level[$tenant->level] }}</div>
                </td>
                <td class="table-text">
                    <div>{{ $tenant->category }}</div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div>
        No records found
    </div>
    @endif
  </div>

@endsection
