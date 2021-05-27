@extends('adminlte::page')

@section('title', 'Reservations - Canary Workspaces')

@section('content_header')
<h1>Mostrar Reserva</h1>
@stop

@section('content')
<div class="row">
    <div class="pull-right mb-3">
        <a class="btn btn-primary" href="{{ route('reservations') }}"> Volver</a>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Usuario:</strong>
            {{ $reservation->user->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Espacio de trabajo:</strong>
            {{ $reservation->workspace->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Fecha:</strong>
            {{ $reservation->date }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Horas:</strong>
            {{ $reservation->start }} - {{$reservation->end}}
        </div>
    </div>
</div>
@endsection