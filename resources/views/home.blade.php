@extends('layouts.app')

@section('content')
<div class="row d-flex d-md-none my-3">
    <form class='form-inline col-12' action="{{ route('home') }}" method="GET">

        <input type="search" class="form-control col-8" name="texto" id="texto" placeholder="Buscar..."
            value="{{$texto ?? ''}}">
        <button class="btn btn-primary col-4" type="submit"><i class="fas fa-search"></i></button>

        <div class="card card-primary collapsed-card mt-2">
            <div class="card-header bg-navy">
                <h3 class="card-title">Servicios</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                            class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" style="display: none;">
                <div class="form-group d-block">
                    <div class="form-check text-dark my-1">
                        @if (in_array('internet', $services ?? []))
                        <input class="form-check-input" type="checkbox" value="internet" id="internet"
                            name="services[]" checked>
                        <label class="form-check-label" for="internet">
                            Internet
                        </label>
                        @else
                        <input class="form-check-input" type="checkbox" value="internet" id="internet"
                            name="services[]">
                        <label class="form-check-label" for="internet">
                            Internet
                        </label>
                        @endif
                    </div>
                    <div class="form-check text-dark my-1">
                        @if (in_array('escáner', $services ?? []))
                        <input class="form-check-input" type="checkbox" value="escáner" id="escaner"
                            name="services[]" checked>
                        <label class="form-check-label" for="escaner">
                            Escáner
                        </label>
                        @else
                        <input class="form-check-input" type="checkbox" value="escáner" id="escaner"
                            name="services[]">
                        <label class="form-check-label" for="escaner">
                            Escáner
                        </label>
                        @endif
                    </div>
                    <div class="form-check text-dark my-1">
                        @if (in_array('fotocopiadora', $services ?? []))
                        <input class="form-check-input" type="checkbox" value="fotocopiadora"
                            id="fotocopiadora" name="services[]" checked>
                        <label class="form-check-label" for="fotocopiadora">
                            Fotocopiadora
                        </label>
                        @else
                        <input class="form-check-input" type="checkbox" value="fotocopiadora"
                            id="fotocopiadora" name="services[]">
                        <label class="form-check-label" for="fotocopiadora">
                            Fotocopiadora
                        </label>
                        @endif
                    </div>
                    <div class="form-check text-dark my-1">
                        @if (in_array('impresora', $services ?? []))
                        <input class="form-check-input" type="checkbox" value="impresora" id="impresora"
                            name="services[]" checked>
                        <label class="form-check-label" for="impresora">
                            Impresora
                        </label>
                        @else
                        <input class="form-check-input" type="checkbox" value="impresora" id="impresora"
                            name="services[]">
                        <label class="form-check-label" for="impresora">
                            Impresora
                        </label>
                        @endif
                    </div>
                    <button class="btn btn-primary float-right my-1" type="submit">Filtrar</button>
                </div>
            </div>
        </div>
    </form>
</div>
@guest 
<form class='form-inline d-none d-md-flex my-3' action="{{ route('home') }}" method="GET">

    <div class="">
        <input type="search" class="form-control " name="texto" id="texto" placeholder="Buscar..."
            value="{{$texto ?? ''}}">
        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
        <div class="card card-primary collapsed-card mt-2">
            <div class="card-header bg-navy">
                <h3 class="card-title">Servicios</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                            class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" style="display: none;">
                <div class="form-group d-block">
                    <div class="form-check text-dark my-1">
                        @if (in_array('internet', $services ?? []))
                        <input class="form-check-input" type="checkbox" value="internet" id="internet"
                            name="services[]" checked>
                        <label class="form-check-label" for="internet">
                            Internet
                        </label>
                        @else
                        <input class="form-check-input" type="checkbox" value="internet" id="internet"
                            name="services[]">
                        <label class="form-check-label" for="internet">
                            Internet
                        </label>
                        @endif
                    </div>
                    <div class="form-check text-dark my-1">
                        @if (in_array('escáner', $services ?? []))
                        <input class="form-check-input" type="checkbox" value="escáner" id="escaner"
                            name="services[]" checked>
                        <label class="form-check-label" for="escaner">
                            Escáner
                        </label>
                        @else
                        <input class="form-check-input" type="checkbox" value="escáner" id="escaner"
                            name="services[]">
                        <label class="form-check-label" for="escaner">
                            Escáner
                        </label>
                        @endif
                    </div>
                    <div class="form-check text-dark my-1">
                        @if (in_array('fotocopiadora', $services ?? []))
                        <input class="form-check-input" type="checkbox" value="fotocopiadora"
                            id="fotocopiadora" name="services[]" checked>
                        <label class="form-check-label" for="fotocopiadora">
                            Fotocopiadora
                        </label>
                        @else
                        <input class="form-check-input" type="checkbox" value="fotocopiadora"
                            id="fotocopiadora" name="services[]">
                        <label class="form-check-label" for="fotocopiadora">
                            Fotocopiadora
                        </label>
                        @endif
                    </div>
                    <div class="form-check text-dark my-1">
                        @if (in_array('impresora', $services ?? []))
                        <input class="form-check-input" type="checkbox" value="impresora" id="impresora"
                            name="services[]" checked>
                        <label class="form-check-label" for="impresora">
                            Impresora
                        </label>
                        @else
                        <input class="form-check-input" type="checkbox" value="impresora" id="impresora"
                            name="services[]">
                        <label class="form-check-label" for="impresora">
                            Impresora
                        </label>
                        @endif
                    </div>
                    <button class="btn btn-primary float-right my-1" type="submit">Filtrar</button>
                </div>
            </div>
        </div>
    </div>

</form>
@endguest 
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