@extends('layouts.main')

@section('title')
    @lang('dashboard.title')
@endsection

@section('custom-css')
	<link rel="stylesheet" href="{{ asset('boxsteps/js/fullcalendar/fullcalendar.min.css') }}">
@stop

@section('custom-js-header')
    <script type="text/javascript">
        jQuery(document).ready(function() {
            bsCalendar('#calendar');
        });
    </script>
@endsection

@section('content')

    <section class="calendar-env">

        <div class="col-sm-12 col-md-6 calendar-left">
            <div class="calendar-main">
                <div id="calendar"></div>
            </div>
        </div>

        <div class="shortcuts col-sm-12 col-md-6 calendar-right">

            <div class="col-sm-12 col-md-6">
                <a href="#">
                    <div class="xe-widget xe-counter xe-counter-green" data-count=".num" data-from="0" data-to="2" data-duration="2">
                        <div class="xe-icon">
                            <i class="fa-envelope-o"></i>
                        </div>
                        <div class="xe-label">
                            <strong class="num">2</strong>
                            <span>Mensajes</span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-sm-12 col-md-6">
                <a href="#">
                    <div class="xe-widget xe-counter xe-counter-purple" data-count=".num" data-from="0" data-to="6" data-duration="2">
                        <div class="xe-icon">
                            <i class="fa-bell-o"></i>
                        </div>
                        <div class="xe-label">
                            <strong class="num">6</strong>
                            <span>Notificaciones</span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-sm-12 col-md-6">
                <a href="#">
                    <div class="xe-widget xe-counter xe-counter-yellow">
                        <div class="xe-icon">
                            <i class="fa-check-square-o"></i>
                        </div>
                        <div class="xe-label">
                            <strong class="num">1</strong>
                            <span>Evaluaciones</span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-sm-12 col-md-6">
                <a href="#">
                    <div class="xe-widget xe-counter xe-counter-blue">
                        <div class="xe-icon">
                            <i class="fa-group"></i>
                        </div>
                        <div class="xe-label">
                            <strong class="num">1</strong>
                            <span>Cursos</span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-sm-12 col-md-6">
                <div class="panel panel-default" style="height: 256px;">
                    <div class="panel-heading" style="text-align: center">TAREAS</div>
                    <div class="panel-body">
                        <div class="vertical-top">
                            <button class="btn btn-red btn-icon btn-block btn-icon-standalone btn-icon-standalone-right">
                                <i class="linecons-pencil"></i>
                                <span>Nueva planificación</span>
                            </button>
                            <button class="btn btn-warning btn-icon btn-block btn-icon-standalone btn-icon-standalone-right">
                                <i class="linecons-note"></i>
                                <span>Nueva evaluación</span>
                            </button>
                            <button class="btn btn-purple btn-icon btn-block btn-icon-standalone btn-icon-standalone-right">
                                <i class="linecons-lightbulb"></i>
                                <span>Estadísticas generales</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6">
                <div class="panel panel-default">
    				<div class="panel-heading" style="text-align: center">
    					CALIFICACIONES
    				</div>
                    <div class="panel-body">
                        <div id="califications" style="height: 155px;"></div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection

@section('custom-js-footer')
	<script src="{{ asset('boxsteps/js/fullcalendar/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('boxsteps/js/fullcalendar/lang/es.js') }}"></script>
    <script src="{{ asset('boxsteps/js/fullcalendar/boxsteps.fullcalendar.js') }}"></script>
@stop
