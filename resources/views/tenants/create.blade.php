<?php
use App\Common;
?>
@extends('layouts.app')
@section('content')
<!-- Body-->
<div class="panel-body-create">
    <!-- Create Data form -->
    <h3 id="edit-title">Information</h3>
    {!! Form::model($tenant, [ 'route' => ['tenant.store'], 'class' => 'form-horizontal']) !!}

    <!-- Name -->
    <div class="form-group row">
        {!! Form::label('tenant-name', 'Name', [ 'class' => 'control-label col-sm-3', ]) !!}
        <div class="col-sm-9">
            {!! Form::text('name', null, [ 'id' => 'tenant-name', 'class' => 'form-control-create', 'maxlength' => 100, ]) !!}
        </div>
    </div>

    <!-- Lot Number -->
    <div class="form-group row">
        {!! Form::label('tenant-lot-number', 'Lot Number', [ 'class' => 'control-label col-sm-3', ]) !!}
        <div class="col-sm-9">
            {!! Form::text('lot_number', null, [ 'id' => 'tenant-lot-number', 'class' => 'form-control-create', 'maxlength' =>
            5, ]) !!}
        </div>
    </div>

    <!-- Zone -->
    <div class="form-group row">
        {!! Form::label('tenant-zone', 'Zone', ['class' => 'contorl-label col-sm-3',]) !!}
        <div class="col-sm-9">
            {!! Form::select('zone', Common::$zone, null, [ 'class' => 'form-control-create', 'placeholder' => '- Select Zone
            -', ]) !!}
        </div>
    </div>

    <!-- Floor Level -->
    <div class="form-group row">
        {!! Form::label('tenant-level', 'Floor Level', ['class' => 'contorl-label col-sm-3',]) !!}
        <div class="col-sm-9">
            {!! Form::select('level', Common::$level, null, [ 'class' => 'form-control-create', 'placeholder' => '- Select
            Floor -', ]) !!}
        </div>
    </div>

    <!-- Category -->
    <div class="form-group row">
        {!! Form::label('tenant-category', 'Category', [ 'class' => 'control-label col-sm-3', ]) !!}
        <div class="col-sm-9">
            {!! Form::text('category', null, [ 'id' => 'tenant-category', 'class' => 'form-control-create', 'maxlength' => 20,
            ]) !!}
        </div>
    </div>

    <div class="panel-body">
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

    <!-- Submit Button -->
    <div class="form-group row btn">
        <div class="col-sm-offset-3 col-sm-6">
            {!! Form::button('Save', [
            'type' => 'submit',
            'class' => 'btn btn-primary',
            'value' => 'save',
            'name' => 'btnSubmit'
             ]) !!}
        </div>
    </div>
    {!! Form::close() !!}
    {!! Form::close() !!}
</div>
@endsection
