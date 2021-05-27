@extends('adminlte::page')

@section('title', 'Workspaces - Canary Workspaces')

@section('content_header')
<h1>Mostrar Espacio de trabajo</h1>
@stop

@section('content')
<div class="row">
    <div class="pull-right mb-3">
        <a class="btn btn-primary" href="{{ route('workspaces') }}"> Volver</a>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nombre:</strong>
            {{ $workspace->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Dirección:</strong>
            {{ $workspace->address }}
        </div>
    </div>
    @role('root')
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Propietario:</strong>
            {{ $workspace->owner->email }}
        </div>
    </div>
    @else
    @endrole
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Horario:</strong>
            {{ $workspace->open }} - {{$workspace->close}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Aforo:</strong>
            {{ $workspace->seats }}
        </div>
    </div>

    {{-- <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">                        TO-DO
            <strong>Foto:</strong>
            {{ $workspace->photo }}
</div>
</div> --}}
</div>
@endsection