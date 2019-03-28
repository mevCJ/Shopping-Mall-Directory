@extends('layouts.app')
@section('content')
<!-- Bootstrap Boilerplate... -->
<h3>Upload Photo</h3>
<h4>Lot No.: <em>{{ $tenant->lot_number }}</em></h4>
<h4>Tenant Name: <em>{{ $tenant->name }}</em></h4>
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
    <!-- Upload Form -->
    {!! Form::open([
        'route' => ['tenant.saveUpload', $tenant->id],
        'class' => 'form-horizontal',
        'enctype' => 'multipart/form-data',
    ]) !!}
    <!-- Code -->
    <div class="form-group row">
        {!! Form::label('tenant-photo', 'Select File', [
        'class' => 'control-label col-sm-3',
        ]) !!}
        <div class="col-sm-9">
            {!! Form::file('image', [
            'id' => 'tenant-photo-file',
            'class' => 'form-control',
            ]) !!}
        </div>
    </div>
    <!-- Submit Button -->
    <div class="form-group row">
        <div class="col-sm-offset-3 col-sm-6">
            {!! Form::button('Upload', [
            'type' => 'Submit',
            'class' => 'btn btn-primary',
            ]) !!}
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection