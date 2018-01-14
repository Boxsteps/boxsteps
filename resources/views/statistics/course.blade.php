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
                    <div id="avg-chart" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-body">
                    <div id="box-chart" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('custom-js-footer')
    <script type="text/javascript">
        jQuery(document).ready(function() {

            group_qualifications = {!! $group_qualifications !!};

            Highcharts.chart('avg-chart', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: group_qualifications['titleAvg']
                },
                subtitle: {
                    text: group_qualifications['subtitle']
                },
                xAxis: {
                    categories: [
                        group_qualifications['xAxis'],
                    ]
                },
                yAxis: {
                    min: 0,
                    max: 20,
                    tickInterval: 2,
                    title: {
                        text: group_qualifications['yAxis']
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size: 14px; font-weight: bold">{point.key}</span><br/>',
                    valueDecimals: 2,
                    valueSuffix: ' @lang('statistic.course.chart.points')',
                    useHTML: true,
                    shared: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: group_qualifications['data']
            });

            Highcharts.chart('box-chart', {
                chart: {
                    type: 'boxplot'
                },
                title: {
                    text: group_qualifications['titleBox']
                },
                subtitle: {
                    text: group_qualifications['subtitle']
                },
                xAxis: {
                    categories: [
                        group_qualifications['xAxis'],
                    ]
                },
                yAxis: {
                    min: 0,
                    max: 20,
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
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: group_qualifications['percentile']
            });
            
        });
    </script>
@endsection
