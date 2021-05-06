@extends('adminlte::page')

@section('title', 'Canary Workspaces')

@section('content_header')
<h1>Reserva un espacio de trabajo</h1>
@stop

@section('content')
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
                        <p>El día seleccionado es:</p><span id="fecha"></span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-success">Reservar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
<script src="{{ asset('js/app.js') }}"></script>
@stop
