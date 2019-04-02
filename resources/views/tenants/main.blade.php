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
            <div class="banner cover"><h1 class="banner-txt">Indulge All Day<br>In The Heart Of City</h1></div>
            <!--put all floor map here-->

                <div style="padding-left: 20px"><h2>Overview map:<h2></div>
                <ul class="horizontal">
                <li>Ground Floor<br><img src="/storage/tenants/groundfloor.jpg" width="200"></li>
                <li>1st Floor<br><img src="/storage/tenants/1stfloor.jpg" width="200"></li>
                <li>2nd Floor<br><img src="/storage/tenants/2ndfloor.jpg" width="200"></li>
                <li>3rd Floor<br><img src="/storage/tenants/3rdfloor.jpg" width="200"> </li>
                </ul>


        @else

            <div class="banner cover">
                 <!--logo and info here-->

                <div class="logo-info">
                    <div class="square">
                        <img class="logoimage" src="/storage/tenants/{{$aTenant->id}}.jpg" >
                    </div>
                    <ul style="list-style:none; text-align:left">
                        <li>Name: {{$aTenant->name}}</li>
                        <li>Lot Number: {{$aTenant->lot_number}}</li>
                        <li>Zone: {{Common::$zone[$aTenant->zone]}}</li>
                        <li>Floor: {{Common::$level[$aTenant->level]}}</li>
                        <li>Category: {{$aTenant->category}}</li>
                    </ul>
                </div>

                <div class="store-desc">
                    <img class = "storeimage"src="/storage/tenants/{{$aTenant->id}}store.jpg" width="500" height="300">
                    <div class="description">
                        <div style="font-size:15;">{{$aTenant -> description}}</div>
                    </div>
                </div>

              </div>

            <div class="map-panel">
            @if($aTenant->level=='1')
           <p style="font-size:30">Ground Floor</p>
           @elseif($aTenant->level=='2')
          <p style="font-size:30">1st Floor</p>
          @elseif($aTenant->level=='3')
         <p style="font-size:30">2nd Floor</p>
         @else($aTenant->level=='4')
        <p style="font-size:30">3rd Floor</p>
       @endif

            <!--put tenant map here-->
          <div class="rectangle">
          @if(Storage::disk('public')->exists('tenants/'.$aTenant->id.'map.gif'))
          <img class ="map" src="/storage/tenants/{{$aTenant->id}}map.gif">
          @endif
          </div>
          @endif
      </div>
    </div>
</div>
@endsection
