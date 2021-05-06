@extends('adminlte::page')

@section('title', 'Roles - Canary Workspaces')

@section('content_header')
<h1>Mostrar Rol</h1>
@stop

@section('content')
<div class="row">
    <div class="pull-right mb-3">
        <a class="btn btn-primary" href="{{ route('roles.index') }}"> Volver</a>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nombre:</strong>
            {{ $role->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permisos:</strong>
            @if(!empty($rolePermissions))
            @foreach($rolePermissions as $v)
            <label class="label label-success text-navy">{{ $v->name }},</label>
            @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
