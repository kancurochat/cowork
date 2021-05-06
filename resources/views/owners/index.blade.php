@extends('adminlte::page')

@section('title', 'Owners - Canary Workspaces')

@section('content_header')
<h1>Propietarios</h1>
@stop

@section('content')
<a href="users/create" class="btn btn-success m-2">Nuevo Propietario</a>
<div class="row">
    <div class="col-12">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th width="280px">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $user)
                <tr>
                    <td>{{ $user->id}}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a class="btn btn-info" href="owners/{{ $user->id }}">Mostrar</a>
                        <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Editar</a>
                        <form action="users/{{$user->id}}" style="display:inline;" method="POST">
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
