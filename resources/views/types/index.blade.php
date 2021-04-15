@extends('adminlte::page')

@section('title', 'Tipos - Cowork')

@section('content_header')
<h1>Tipos de espacio</h1>
@stop

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div class="pull-right">
    @can('spacetype-create')
    <a class="btn btn-success m-3" href="{{ route('types.create') }}">Nuevo Tipo de espacio</a>
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


        @foreach ($types as $key => $type)
        <tr>
            <td>{{ $type->id }}</td>
            <td>{{ $type->name }}</td>
            <td>
                {{-- <a class="btn btn-info" href="{{ route('roles.show',$type->id) }}">Mostrar</a> --}}
                @can('spacetype-edit')
                <a class="btn btn-primary" href="{{ route('types.edit',$type->id) }}">Editar</a>
                @endcan
                @can('spacetype-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['types.destroy', $type->id],'style'=>'display:inline'])
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
