<?php
use App\Common;
?>
    @extends('layouts.app')
    @section('content')
    <!-- Table -->
        <!-- Body-->
        <div class="panel-body">
        <!-- Create New form -->
        {!! Form::model($tenant, [ 'route' => ['tenant.update', $tenant->id], 'method'=>'put', 'class' => 'form-horizontal' ]) !!}

        <!-- Name -->
        <div class="form-group row">
            {!! Form::label('tenant-name', 'Name', [ 'class' => 'control-label col-sm-3', ]) !!}
            <div class="col-sm-9">
                {!! Form::text('name', null, [ 'id' => 'tenant-name', 'class' => 'form-control', 'maxlength' => 100, ]) !!}
            </div>
        </div>

        <!-- Lot Number -->
        <div class="form-group row">
            {!! Form::label('tenant-lot-number', 'Lot Number', [ 'class' => 'control-label col-sm-3', ]) !!}
            <div class="col-sm-9">
                {!! Form::text('lot_number', null, [ 'id' => 'tenant-lot-number', 'class' => 'form-control', 'maxlength' => 5, ]) !!}
            </div>
        </div>

        <!-- Zone -->
        <div class="form-group row">
            {!! Form::label('tenant-zone', 'Zone', ['class' => 'contorl-label col-sm-3',]) !!}
            <div class="col-sm-9">
                {!! Form::select('zone', Common::$zone, null, [ 'class' => 'form-control', 'placeholder' => '- Select Zone -', ]) !!}
            </div>
        </div>

        <!-- Floor Level -->
        <div class="form-group row">
            {!! Form::label('tenant-level', 'Floor Level', ['class' => 'contorl-label col-sm-3',]) !!}
            <div class="col-sm-9">
                {!! Form::select('level', Common::$level, null, [ 'class' => 'form-control', 'placeholder' => '- Select Floor -', ]) !!}
            </div>
        </div>

        <!-- Category -->
        <div class="form-group row">
            {!! Form::label('tenant-category', 'Category', [ 'class' => 'control-label col-sm-3', ]) !!}
            <div class="col-sm-9">
                {!! Form::text('category', null, [ 'id' => 'tenant-category', 'class' => 'form-control', 'maxlength' => 20, ]) !!}
            </div>
        </div>

        <!-- Submit Button -->
        <div class="form-group row">
            <div class="col-sm-offset-3 col-sm-6">
                {!! Form::button('Save', [ 'type' => 'submit', 'class' => 'btn btn-primary', ]) !!}
            </div>
        </div>
        {!! Form::close() !!}
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    </div>
    @endsection