@extends('layouts.main')

@section('title')
    @lang('statistic.index.title')
@endsection

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('boxsteps/js/highcharts/css/highcharts.css') }}">
@endsection

@section('custom-js-header')
    <script src="{{ asset('boxsteps/js/highcharts/js/highcharts.js') }}"></script>
    <script src="{{ asset('boxsteps/js/highcharts/js/series-label.js') }}"></script>
    <script src="{{ asset('boxsteps/js/highcharts/js/exporting.js') }}"></script>
    <script src="{{ asset('boxsteps/js/highcharts/js/lang/es.js') }}"></script>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('statistic.index.title')</div>

                <div class="panel-body">
                    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('custom-js-footer')
    <script type="text/javascript">
        jQuery(document).ready(function() {
            data = {!! $qualifications_list_chart_data !!};
            Highcharts.chart('container', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: data['title']
                },
                subtitle: {
                    text: data['subtitle']
                },
                xAxis: {
                    categories: [
                        data['xAxis'],
                    ],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    tickInterval: 2,
                    title: {
                        text: data['yAxis']
                    }
                },
                tooltip: {
                    headerFormat: '<b>{point.key}</b><table>',
                    pointFormat:  '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                  '<td style="padding:0"><b>{point.y:.2f} @lang('statistic.index.group-qualifications.points')</b></td></tr>',
                    footerFormat: '</table>',
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: data['data']
            });
        });
    </script>
@endsection
