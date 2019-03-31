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
            <table collapse='0'>
              <tr>
                <td>GROUND FLOOR</td>
                <td>1ST FLOOR</td>
                <td>2ND FLOOR</td>
                <td>3RD FLOOR</td>
              </tr>
              <tr>
                <td><img src="/storage/tenants/groundfloor.jpg" width="240"></td>
                <td><img src="/storage/tenants/1stfloor.jpg" width="240"></td>
                <td><img src="/storage/tenants/2ndfloor.jpg" width="240"></td>
                <td><img src="/storage/tenants/3rdfloor.jpg" width="240"> </td>
              </tr>
            </table>

        @else

            <div class="banner cover">
                 <!--logo and info here-->
                 <div class="square">
                <img class="logoimage" src="/storage/tenants/{{$aTenant->id}}.jpg" >
                </div>
                <img class = "storeimage"src="/storage/tenants/{{$aTenant->id}}store.jpg" width="500" height="300">
                <ul style="list-style:none">
                    <li>Name: {{$aTenant->name}}</li>
                    <li>Lot Number: {{$aTenant->lot_number}}</li>
                    <li>Zone: {{Common::$zone[$aTenant->zone]}}</li>
                    <li>Floor: {{Common::$level[$aTenant->level]}}</li>
                    <li>Category: {{$aTenant->category}}</li>
                </ul>
                <div class="description">
                  <div style="font-size:15;">{{$aTenant -> description}}</div>
                </div>

            </div>
            @if($aTenant->level=='1')
           <p style="font-size:30">Ground Floor</p>
           @elseif($aTenant->level=='2')
          <p style="font-size:30">1ST FLOOR</p>
          @elseif($aTenant->level=='3')
         <p style="font-size:30">2ND FLOOR</p>
         @else($aTenant->level=='4')
        <p style="font-size:30">3RD FLOOR</p>
       @endif
            <!--put tenant map here-->
            <img class = "map" src="/storage/tenants/{{$aTenant->id}}map.gif" width="700" height="500">
            @if(Storage::disk('public')->exists('tenants/overview.jpg'))
            <img src="/storage/tenants/overview.jpg" width="240">
            @endif
        @endif
    </div>

@endsection
