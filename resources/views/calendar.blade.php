@extends('adminlte::page')

@section('title', 'Canary Workspaces')

@section('content_header')
<h1>Reserva un espacio de trabajo</h1>
@stop

@section('content')
{{--
    DESCOMENTAR SI SE ROMPE EL RELOJ
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
--}}



{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        dateClick: function() {
          alert('a day has been clicked!');
        }
      });
      calendar.render();
    });

</script> --}}
<div class="container-fluid">
    <div class="row">
        <!-- /.col -->
        <div class="col-12">
            <div id="calendar"></div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="reservation" tabindex="-1" role="dialog" aria-labelledby="Modal Reserva"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content bg-navy">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Reservar Espacio de Trabajo</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body bg-white">
                        <form id="datos" action="{{-- {{route('calendar.reserve')}} --}}" method="post">
                            @csrf
                            <span>Reservar el día :</span>
                            <input type="date" name="date" id="fecha">
                            <br>
                            <span>Desde las:</span>
                            <div id="start">
                                <input class="timepicker-ui-input" value="12:00 AM" name="start" />
                            </div>
                            <br>
                            <span>Hasta las:</span>
                            <div id="end">
                                <input class="timepicker-ui-input" value="12:00 AM" name="end" />
                            </div>
                            <input type="hidden" name="user" value="{{ Auth::user()->id}}">
                            <input type="hidden" name="workspace" value="1">
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
<script src="{{ asset('js/app.js') }}"></script>
@stop
