@extends('adminlte::page')

@section('title', 'Workspaces - Canary Workspaces')

@section('content_header')
<h1>Nuevo Espacio de trabajo</h1>
@stop

@section('content')



@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Ups!</strong> Hubieron problemas para añadir el espacio de trabajo.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif



{!! Form::open(array('route' => 'workspaces.create','method'=>'POST')) !!}
@csrf
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
    @role('root')
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Propietario:</strong>
            <select name="owner" id="owner" class="form-control">
                @foreach ($data as $owner)
                <option value="{{$owner->id}}">{{$owner->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    @else
    <input type="hidden" name="owner" value="{{Auth::user()->id}}">
    @endrole
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
            <strong>Servicios:</strong>
            <div class="form-group d-block">
                <div class="form-check text-dark my-1">
                    <input class="form-check-input" type="checkbox" value="internet" id="internet" name="services[]">
                    <label class="form-check-label" for="internet">
                        Internet
                    </label>
                </div>
                <div class="form-check text-dark my-1">
                    <input class="form-check-input" type="checkbox" value="escáner" id="escaner" name="services[]">
                    <label class="form-check-label" for="escaner">
                        Escáner
                    </label>
                </div>
                <div class="form-check text-dark my-1">
                    <input class="form-check-input" type="checkbox" value="fotocopiadora" id="fotocopiadora"
                        name="services[]">
                    <label class="form-check-label" for="fotocopiadora">
                        Fotocopiadora
                    </label>
                </div>
                <div class="form-check text-dark my-1">
                    <input class="form-check-input" type="checkbox" value="impresora" id="impresora" name="services[]">
                    <label class="form-check-label" for="impresora">
                        Impresora
                    </label>
                </div>
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
            <button type="submit" class="btn btn-primary m-2">Crear</button>
        </div>
    </div>
    {!! Form::close() !!}
    @endsection