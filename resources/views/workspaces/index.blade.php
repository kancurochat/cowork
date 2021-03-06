@extends('adminlte::page')

@section('title', 'Workspaces - Canary Workspaces')

@section('content_header')
<h1>Espacios de trabajo</h1>
@stop

@section('content')
<a href="{{route('workspaces.create')}}" class="btn btn-success m-2">Nuevo Espacio de trabajo</a>
<div class="row">
    <div class="col-12">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    @role('root')
                    <th>Propietario</th>
                    @endrole
                    <th>Dirección</th>
                    <th>Apertura</th>
                    <th>Cierre</th>
                    <th>Aforo</th>
                    <th {{-- width="280px" --}}>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($workspaces as $key => $workspace)
                <tr>
                    <td>{{ $workspace->id}}</td>
                    <td>{{ $workspace->name }}</td>
                    @role('root')
                    <td>{{ $workspace->owner->email }}</td>
                    @endrole
                    <td>{{ $workspace->address }}</td>
                    <td>{{ $workspace->open }}</td>
                    <td>{{ $workspace->close }}</td>
                    <td>{{ $workspace->seats }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('workspaces.show',$workspace->id) }}">Mostrar</a>
                        <a class="btn btn-primary" href="{{ route('workspaces.edit',$workspace->id) }}">Editar</a>
                        <form action="{{url('workspaces/' . $workspace->id)}}" style="display:inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger" type="submit" value="Eliminar">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
