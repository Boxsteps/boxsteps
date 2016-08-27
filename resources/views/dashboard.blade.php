@extends('layouts.main')

@section('title')
    Boxsteps
@stop

@section('custom-css')
    <link rel="stylesheet" href="assets/js/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="assets/css/fonts/meteocons/css/meteocons.css">
@stop

@section('content')
    <script type="text/javascript">
        jQuery(document).ready(function() {
            bsCalendar('#calendar');

            var degrees = [
                { time: new Date('August 05, 2016 07:00:00'), degree: 15 },
                { time: new Date('August 10, 2016 07:00:00'), degree: 10 },
                { time: new Date('August 11, 2016 07:00:00'), degree: 11 },
                { time: new Date('August 12, 2016 07:00:00'), degree: 20 },
                { time: new Date('August 17, 2016 07:00:00'), degree: 18 },
                { time: new Date('August 18, 2016 07:00:00'), degree: 14 },
                { time: new Date('August 20, 2016 07:00:00'), degree: 13 },
                { time: new Date('August 21, 2016 07:00:00'), degree: 10 },
                { time: new Date('August 22, 2016 07:00:00'), degree: 8 },
            ];

            $("#califications").dxChart({
                dataSource: degrees,
                commonPaneSettings: {
                    border: {
                        visible: true,
                        color: '#f5f5f5'
                    }
                },
                commonSeriesSettings: {
                    type: "area",
                    argumentField: "time",
                    border: {
                        color: '#40bbea',
                        width: 1,
                        visible: true
                    }
                },
                series: [
                    { valueField: "degree", name: "Calificaciones", color: '#40bbea', opacity: .5 },
                ],
                commonAxisSettings: {
                    label: {
                        visible: true
                    },
                    grid: {
                        visible: true,
                        color: '#f5f5f5'
                    }
                },
                argumentAxis: {
                    valueMarginsEnabled: false,
                    label: {
                        customizeText: function (arg) {
                            return date('d/m', arg.value);
                        }
                    }
                },
                legend: {
                    visible: false
                }
            });
        });
    </script>

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
    </section>

@stop

@section('custom-js-footer')
    <script src="assets/js/fullcalendar/fullcalendar.min.js"></script>
    <script src="assets/js/fullcalendar/lang/es.js"></script>
    <script src="assets/js/jquery-ui/jquery-ui.min.js"></script>
    <script src="js/bs-calendar.js"></script>

    <script src="assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="assets/js/jvectormap/regions/jquery-jvectormap-world-mill-en.js"></script>
	<script src="assets/js/xenon-widgets.js"></script>

    <script src="assets/js/devexpress-web-14.1/js/knockout-3.1.0.js"></script>
	<script src="assets/js/devexpress-web-14.1/js/globalize.min.js"></script>
	<script src="assets/js/devexpress-web-14.1/js/dx.chartjs.js"></script>
@stop
