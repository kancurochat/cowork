@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center my-3">
        @foreach ($workspaces as $workspace)
        <div class="col-md-4 col-12">
            <div class="card text-center">
                <div class="card-header"><h3>{{$workspace->name}}</h3></div>
                <div class="card-body">
                    <p>{{$workspace->address}}</p>
                    <a class="btn bg-navy text-white" href="workspace/{{$workspace->id}}">Reservar</a>
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
