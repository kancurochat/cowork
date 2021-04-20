@extends('adminlte::page')

@section('title', 'Reservations - Cowork')

@section('content_header')
<h1>Reservas</h1>
@stop

@section('content')
<a href="reservations/create" class="btn btn-success m-2">Nueva Reserva</a>
<div class="row">
    <div class="col-12">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Fecha</th>
                    <th>Entrada</th>
                    <th>Salida</th>
                    <th {{-- width="280px" --}}>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $key => $reservation)
                <tr>
                    <td>{{ $reservation->id}}</td>
                    <td>{{ $reservation->user->name }}</td>
                    <td>{{ $reservation->date }}</td>
                    <td>{{ $reservation->start }}</td>
                    <td>{{ $reservation->end }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('reservations.show',$reservation->id) }}">Mostrar</a>
                        <a class="btn btn-primary" href="{{ route('reservations.edit',$reservation->id) }}">Editar</a>
                        <form action="reservations/{{$reservation->id}}" style="display:inline" method="POST">
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
