@extends('adminlte::page')

@section('title', 'Cowork')

@section('content_header')
<h1>Panel principal</h1>
@stop

@section('content')
<div class="row">
    <div class="col-auto">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="m-0">Usuarios</h5>
            </div>
            <div class="card-body">
                <p class="card-text">Gestiona todos los usuarios de la aplicación.</p>
                <a href="users" class="btn btn-primary">Acceder</a>
            </div>
        </div>
    </div>
    <div class="col-auto">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="m-0">Propietarios</h5>
            </div>
            <div class="card-body">
                <p class="card-text">Gestiona los usuarios que tienen el rol de "owner".</p>
                <a href="owners" class="btn btn-primary">Acceder</a>
            </div>
        </div>
    </div>
    <div class="col-auto">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="m-0">Tipos de salas</h5>
            </div>
            <div class="card-body">
                <p class="card-text">Gestiona los tipos de salas disponibles.</p>
                <a href="#" class="btn btn-primary">Acceder</a>
            </div>
        </div>
    </div>
    <div class="col-auto">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="m-0">Roles</h5>
            </div>
            <div class="card-body">
                <p class="card-text">Gestiona los roles.</p>
                <a href="roles" class="btn btn-primary">Acceder</a>
            </div>
        </div>
    </div>

    <div class="col-auto">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="m-0">Reservas</h5>
            </div>
            <div class="card-body">
                <p class="card-text">Gestiona las reservas.</p>
                <a href="#" class="btn btn-primary">Acceder</a>
            </div>
        </div>
    </div>
</div>
@stop