@extends('layouts.main')

@section('title')
    @lang('statistic.student.title')
@endsection

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('boxsteps/js/highcharts/css/highcharts.css') }}">
@endsection

@section('custom-js-header')
    <script src="{{ asset('boxsteps/js/highcharts/js/highcharts.js') }}"></script>
    <script src="{{ asset('boxsteps/js/highcharts/js/series-label.js') }}"></script>
    <script src="{{ asset('boxsteps/js/highcharts/js/exporting.js') }}"></script>
    <script src="{{ asset('boxsteps/js/highcharts/js/highcharts-more.js') }}"></script>
    <script src="{{ asset('boxsteps/js/highcharts/js/lang/es.js') }}"></script>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div id="progress-chart" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('custom-js-footer')
    <script type="text/javascript">
        jQuery(document).ready(function() {

            student_qualifications = {!! $student_qualifications !!};

            Highcharts.chart('progress-chart', {
                chart: {
                    type: 'spline'
                },
                title: {
                    text: student_qualifications['title']
                },
                subtitle: {
                    text: student_qualifications['subtitle']
                },
                xAxis: {
                    type: 'datetime',
                    title: {
                        text: student_qualifications['xAxis']
                    }
                },
                yAxis: {
                    min: 0,
                    max: 20,
                    tickInterval: 2,
                    title: {
                        text: student_qualifications['yAxis']
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size: 14px; font-weight: bold">{point.key}</span><br/>',
                    valueDecimals: 2,
                    valueSuffix: ' @lang('statistic.student.chart.points')',
                    useHTML: true
                },
                plotOptions: {
                    spline: {
                        marker: {
                            enabled: true
                        }
                    }
                },
                series: student_qualifications['data']
            });

        });
    </script>
@endsection
