<?php
use App\Common;
?>

@extends('layouts.app')
@include('tenants._banner')
@include('tenants._filters')
@section('content')
<!-- Body -->

<div class="panel-body">
    <h2 style="text-align:center">Records</h2>
    
    @if(count($tenants) > 0)
    <table class="table table-striped task-table">
        <!-- Table Headings -->
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Lot Number</th>
                <th>Zone</th>
                <th>Level</th>
                <th>Category</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
        </thead>
        <!-- Table Body -->
        <tbody>
            @foreach ($tenants as $i => $tenant)
            {!! Form::model($tenant, [ 'route' => ['tenant.destroy', $tenant->id], 'method'=>'delete', 'class' => 'form-horizontal' ]) !!}
            <tr>
                <td class="table-text">
                    <div>{{ $tenant->id }}</div>
                </td>
                <td class="table-text">
                    <div>
                        {!! link_to_route(
                        'tenant.show',
                        $title = $tenant->name,
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
                <td class="table-text">
                    <div>{{ $tenant->created_at }}</div>
                </td>
                <td class="table-text">
                    <div>
                        {!! link_to_route(
                            'tenant.edit',
                            $title = 'Edit',
                            $parameters = [
                                'id' => $tenant->id,
                        ]
                        ) !!}
                        |
                        {!! link_to_route(
                            'tenant.upload',
                            $title = 'Upload',
                            $parameters = [
                                'id' => $tenant->id,
                            ]

                        ) !!}
                        |
                        {!! Form::button('Delete', [
                            'type' => 'Submit',
                            'class' => 'btn btn-secondary warning'
                        ]) !!}
                        {!! Form::close() !!}
                    </div>
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
    <a href="{{route('tenant.create')}}" class="btn-primary" id="btnAdd">Add New</a>
     </div>
</div>

    {{ $tenants->links() }}

@endsection