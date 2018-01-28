@extends('layouts.main')

@section('title')
    @lang('statistic.course.title')
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

            group_qualifications = {!! $group_qualifications !!};

            Highcharts.chart('progress-chart', {
                chart: {
                    type: 'spline'
                },
                title: {
                    text: group_qualifications['title']
                },
                subtitle: {
                    text: group_qualifications['subtitle']
                },
                xAxis: {
                    type: 'datetime',
                    title: {
                        text: group_qualifications['xAxis']
                    }
                },
                yAxis: {
                    tickInterval: 2,
                    title: {
                        text: group_qualifications['yAxis']
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size: 14px; font-weight: bold">{point.key}</span><br/>',
                    valueDecimals: 2,
                    valueSuffix: ' @lang('statistic.course.chart.points')',
                    useHTML: true
                },
                plotOptions: {
                    spline: {
                        marker: {
                            enabled: true
                        }
                    }
                },
                series: group_qualifications['data']
            });

        });
    </script>
@endsection
