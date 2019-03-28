<?php
use App\Common;
 ?>

@extends('layouts.app')

 <head>
 <link rel="stylesheet" href="{{asset('css/userStyle.css')}}" type="text/css">
 </head>

@section('content')
<div class=container>
<div class=tinted-image style="height: 200%"></div>
<div class=Center>
<div class="panel-body">
    <h2 style="text-align:center">Search Results</h2>
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
                    <div>{{ $tenant->name }}</div>
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
    <div>
    <a href="{{route('tenant.user')}}"  style="color:white" >Back</a>
    </div>
    {{ $tenants->links() }}
</div>
</div>
</div>
@endsection
