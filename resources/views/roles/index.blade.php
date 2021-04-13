@extends('adminlte::page')

@section('title', 'Roles - Cowork')

@section('content_header')
<h1>Roles</h1>
@stop

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div class="pull-right">
    @can('role-create')
    <a class="btn btn-success m-3" href="{{ route('roles.create') }}">Nuevo Rol</a>
    @endcan
</div>
<table class="table table-hover text-nowrap">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th width="280px">Acciones</th>
        </tr>
    </thead>
    <tbody>


        @foreach ($roles as $key => $role)
        <tr>
            <td>{{ $role->id }}</td>
            <td>{{ $role->name }}</td>
            <td>
                <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Mostrar</a>
                @can('role-edit')
                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Editar</a>
                @endcan
                @can('role-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline'])
                !!}
                {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
                @endcan
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop
