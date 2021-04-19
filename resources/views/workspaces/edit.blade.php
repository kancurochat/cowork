@extends('adminlte::page')

@section('title', 'Workspaces - Cowork')

@section('content_header')
<h1>Editar Espacio de trabajo</h1>
@stop

@section('content')



@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

{!! Form::model($workspace, ['method' => 'PUT','route' => ['workspaces.edit', $workspace->id]]) !!}
<div class="row">
    <div class="pull-right mb-3">
        <a class="btn btn-primary" href="{{ route('workspaces') }}"> Volver</a>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nombre:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Propietario:</strong>
            <select name="owner" id="owner" class="form-control">
                @foreach ($data as $owner)
                <option value="{{$owner->id}}" @if ($owner->id == $workspace->owner->id)
                    selected
                    @endif>{{$owner->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Dirección:</strong>
            {!! Form::text('address',null, array('placeholder' => 'Dirección','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Apertura:</strong>
            {!! Form::time('open', null, array('class' => 'form-control'))
            !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Cierre:</strong>
            {!! Form::time('close', null, array('class' => 'form-control'))
            !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Aforo:</strong>
            {!! Form::number('seats', null, array('class' => 'form-control', 'min' => 1))
            !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary m-2">Enviar</button>
    </div>
</div>
{!! Form::close() !!}
@endsection
