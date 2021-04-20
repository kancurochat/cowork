@extends('adminlte::page')

@section('title', 'Reservations - Cowork')

@section('content_header')
<h1>Editar Reserva</h1>
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

{!! Form::model($reservation, ['method' => 'PUT','route' => ['reservations.edit', $reservation->id]]) !!}
<div class="row">
    <div class="pull-right mb-3">
        <a class="btn btn-primary" href="{{ route('reservations') }}"> Volver</a>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Usuario:</strong>
            <select name="user" id="user" class="form-control">
                @foreach ($data as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Espacio de trabajo:</strong>
            <select name="workspace" id="workspace" class="form-control">
                @foreach ($workspaces as $workspace)
                <option value="{{$workspace->id}}">{{$workspace->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Fecha:</strong>
            {!! Form::date('date',null, array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Entrada:</strong>
            {!! Form::time('start', null, array('class' => 'form-control'))
            !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Salida:</strong>
            {!! Form::time('end', null, array('class' => 'form-control'))
            !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary m-2">Enviar</button>
    </div>
</div>
{!! Form::close() !!}
@endsection