@extends('adminlte::page')

@section('title', 'Users - Canary Workspaces')

@section('content_header')
<h1>Editar Tipo de espacio</h1>
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


<div class="row">
    <div class="pull-right mb-3">
        <a class="btn btn-primary" href="{{ route('types') }}"> Volver</a>
    </div>
    <div class="col-12">
        <form action="" class="form" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" id="name" placeholder="Nombre" name="name" value="{{$type->name}}">
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary m-2">Enviar</button>
            </div>
        </form>
    </div>
</div>
@endsection
