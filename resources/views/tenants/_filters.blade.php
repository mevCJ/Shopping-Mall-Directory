<?php
use App\Common;
?>
<section class="filters">
{!! Form::open([
    'route' => ['tenant.index'],
    'method' => 'get',
    'class' => 'form-inline'
]) !!}

{!! Form::label('tenant-lot-number', 'Lot Number: ', [
    'class' => 'control-label col-sm-3',
]) !!}

{!! Form::text('lot_number', null, [
    'id' => 'tenant-lot-number',
    'class' => 'form-control',
    'maxlength' => 10,
]) !!}

{!! Form::label('tenant-name', 'Name: ', [
    'class' => 'control-label col-sm-3',
]) !!}

{!! Form::text('name', null, [
    'id' => 'tenant-name',
    'class' => 'form-control',
    'maxlength' => 100,
]) !!}

{!! Form::label('tenant-category', 'Category: ', [
    'class' => 'control-label col-sm-3',
]) !!}

{!! Form::text('category', null, [
    'id' => 'tenant-category',
    'class' => 'form-control',
    'maxlength' => 100,
]) !!}

{!! Form::label('tenant-zone', 'Zone', [
    'class' => 'control-label col-sm-3',
]) !!}

{!! Form::select('zone', Common::$zone, null, [
    'class' => 'form-control',
    'placeholder' => '- All -',
]) !!}

{!! Form::label('tenant-level', 'Level', [
    'class' => 'control-label col-sm-3',
]) !!}

{!! Form::select('level', Common::$level, null, [
    'class' => 'form-control',
    'placeholder' => '- All -',
]) !!}

{!! Form::button('Filter', [
    'type' => 'submit',
    'class' => 'btn btn-secondary',
]) !!}

{!! Form::close() !!}
</div>
</section>