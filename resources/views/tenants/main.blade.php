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
        <div>Welcome to MoonWay Velocity Megamall Directory</div>
    </div>

@endsection
