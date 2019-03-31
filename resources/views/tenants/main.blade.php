<?php
use App\Common;
?>

@extends('layouts.app1')
<head>
  <title>MoonWay Velocity Megamall</title>
<link rel="stylesheet" href="{{asset('css/mainStyle.css')}}" type="text/css">
</head>

@section('content')
<div class="panel-body">
<<<<<<< HEAD
  <div>
  <a href="{{route('tenant.sort',['zone'])}}"  class="btn-primary" >Zone</a> |
  <a href="{{route('tenant.sort',['category'])}}" class="btn-primary"  >Category</a>  |
  <a href="{{route('tenant.sort',['level'])}}" class="btn-primary"  >Level</a>
</div>
    @if(count($tenants) > 0)
            @foreach ($sorter as $j => $s)
            <div class="divider">
            @if ($compare === 'zone')
                {{ Common::$zone[$s->zone] }}
            @elseif ($compare === 'category')
                {{ $s->category }}
            @elseif ($compare === 'level')
                {{ Common::$level[$s->level]}}
            @endif
            </div>
            @foreach ($tenants as $i => $tenant)
            @if ($tenant->$compare === $s->$compare)
            <table class="table table-striped task-table">
            <tbody>
            <tr onClick="window.location='{{route('tenant.map', [$compare, $tenant->id])}}'" style=>
=======
    <div id="btn-panel">
        <div style="color:white; display:inline; padding-left: 12px; padding-right: 50px;">Sort by: </div>
        <a href="{{route('tenant.main',['sort' => 'zone'])}}"  class="btn-primary btn-nav @if($sort==='zone'){{'active'}}@endif">Zone</a>
        <a href="{{route('tenant.main',['sort' => 'category'])}}" class="btn-primary btn-nav @if($sort==='category'){{'active'}}@endif">Category</a>
        <a href="{{route('tenant.main',['sort' => 'level'])}}"  class="btn-primary btn-nav @if($sort==='level'){{'active'}}@endif">Level</a>
    </div>


    @if(count($tenants) > 0)
        @foreach ($sorter as $j => $s)
        <div class="divider">
        @if ($sort === 'zone')
            {{ Common::$zone[$s->zone] }}
        @elseif ($sort === 'category')
            {{ $s->category }}
        @elseif ($sort === 'level')
            {{ Common::$level[$s->level]}}
        @endif
        </div>
        @foreach ($tenants as $i => $tenant)
            @if ($tenant->$sort === $s->$sort)
            <table class="table table-striped task-table">
            <tbody>
            <tr onClick="window.location='{{route('tenant.main', ['sort' => $sort,'id' => $tenant->id])}}'">
>>>>>>> 94e6be18db3d696a6daabc9315b6c1bf9a70f0bf
                <td class="table-text dir-cell name" style="color: #e56a1d">
                    <div>{{$tenant->name}}</div>
                </td>
                <td class="table-text dir-cell zone">
                    <div>{{ Common::$zone[$tenant->zone] }}</div>
                </td>
                <td class="table-text dir-cell level">
                    <div>{{ Common::$level[$tenant->level] }}</div>
                </td>
                <td class="table-text dir-cell category">
                    <div>{{ $tenant->category }}</div>
                </td>
            </tr>
            </tbody>
            </table>
            @endif
        @endforeach
    @endforeach
    @else
    <div>
        No records found
    </div>
    @endif
  </div>

    <div class="content">
        @if($aTenant === null)
            <div class="banner cover"><h1 class="banner-txt">Moonway.. better than S*nway</h1></div>
            <div><h2>Overview map:<h2></div>
            <!--put all floor map here-->
            <img src="/storage/tenants/overview.jpg" width="240">
        @else
            
            <div class="banner cover">
                 <!--logo and info here-->
                <img src="/storage/tenants/{{$aTenant->id}}.jpg" width="240">
                <ul style="list-style:none">
                    <li>Name: {{$aTenant->name}}</li>
                    <li>Lot Number: {{$aTenant->lot_number}}</li>
                    <li>Zone: {{Common::$zone[$aTenant->zone]}}</li>
                    <li>Floor: {{Common::$level[$aTenant->level]}}</li>
                    <li>Category: {{$aTenant->category}}</li>
                </ul>
            </div>

            <!--put tenant map here-->
            <img src="/storage/tenants/overview.jpg" width="240">
        @endif
    </div>

@endsection
