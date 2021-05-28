@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center my-3">
        @foreach ($workspaces as $workspace)
        <div class="col-md-4 col-12">
            <div class="card text-center">
                <img class="card-img-top"
                    src="https://cdn.pixabay.com/photo/2016/06/25/12/52/laptop-1478822_960_720.jpg"
                    alt="Sala de trabajo por defecto">
                <div class="card-body">
                    <h3 class="card-title col-12">{{$workspace->name}}</h3>
                    <a class="btn bg-navy text-white col-12" href="workspace/{{$workspace->id}}">Reservar</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row text-center">
        <div class="col-12 text-center">
            {{$workspaces->links()}}
        </div>
    </div>
</div>
@endsection