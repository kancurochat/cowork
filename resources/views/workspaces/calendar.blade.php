@extends('layouts.app')

@section('content')
<div class="container-fluid py-2">
    <div class="row">
        <!-- /.col -->
        <div class="col-12">
            <div id="calendar"></div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="reservation" tabindex="-1" role="dialog" aria-labelledby="Modal Reserva"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content bg-primary">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Reservar Espacio de Trabajo</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body bg-white text-center">
                        <form id="datos" action="{{route('calendar.reserve')}}" method="post">
                            @csrf
                            <div class="input-group">
                                <span class="input-group-text">Reservar el día</span>
                                <input name="date" id="fecha" type="date" class="form-control text-center" readonly>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text">Desde las</span>
                                <input name="start" id="start_time" type="time" class="form-control text-center" readonly>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text">Hasta las</span>
                                <input name="end" id="end_time" type="time" class="form-control text-center" readonly>
                            </div>

                            <input type="hidden" name="user" value="{{ Auth::user()->id}}">
                            <input type="hidden" name="workspace" value="{{$workspace->id}}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Reservar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
{{-- <script src="{{ asset('js/app.js') }}"></script> --}}
@stop