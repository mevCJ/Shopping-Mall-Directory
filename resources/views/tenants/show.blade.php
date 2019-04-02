<?php
use App\Common;
?>
    @extends('layouts.app')
    @section('content')

    <!-- Table -->
    <div class="panel-body">
        <table class="table table-striped task-table show" style="max-width: 50%;">
            <!-- Table Headings -->
            <thead>
                <tr>
                    <th>Attribute</th>
                    <th>Value</th>
                </tr>
            </thead>
            <!-- Table Body -->
            <tbody>
              <tr>
                  <td>Name</td>
                  <td>{{ $tenant->name }}</td>
              </tr>
                <tr>
                    <td>Lot Number</td>
                    <td>{{ $tenant->lot_number }}</td>
                </tr>
                <tr>
                    <td>Zone</td>
                    <td>{{ Common::$zone[$tenant->zone]}}</td>
                </tr>
                <tr>
                    <td>Level</td>
                    <td>{{ Common::$level[$tenant->level] }}</td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td>{{ $tenant->category }}</td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>{{ $tenant->description }}</td>
                </tr>
                <tr>
                    <td>Created</td>
                    <td>{{ $tenant->created_at }}</td>
                </tr>
                @if(Storage::disk('public')->exists('tenants/'.$tenant->id.'.jpg'))

                <img src="/storage/tenants/{{$tenant->id}}.jpg" class="brand-pic"
                  alt="{{ $tenant->lot_no }}">

                @endif
            </tbody>
        </table>
        <a href="{{route('tenant.index')}}" class="btn-primary" id="btnBack">Back</a>
    </div>
    @endsection
