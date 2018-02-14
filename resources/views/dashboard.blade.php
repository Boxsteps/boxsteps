@extends('layouts.main')

@section('title')
    @lang('dashboard.title')
@endsection

@section('custom-css')
	<link rel="stylesheet" href="{{ asset('boxsteps/js/fullcalendar/fullcalendar.min.css') }}">
    @if ( $tiny )
        <style type="text/css">
            .xe-widget.xe-counter,
            .xe-widget.xe-counter-block .xe-upper,
            .xe-widget.xe-progress-counter .xe-upper {
                margin-bottom: 3.185em;
            }
        </style>
    @endif
@stop

@section('custom-js-header')
    <script type="text/javascript">
        jQuery(document).ready(function() {
            events = {!! $events !!};
            bsCalendar('#calendar', events);
        });
    </script>
@endsection

@section('content')

    <section class="calendar-env">

        <div class="col-sm-12 {{ $tiny ? 'col-md-9' : 'col-md-6' }} calendar-left">
            <div class="calendar-main">
                <div id="calendar"></div>
            </div>
        </div>

        <div class="shortcuts col-sm-12 {{ $tiny ? 'col-md-3' : 'col-md-6' }} calendar-right">

            <div class="col-sm-12 {{ $tiny ? 'col-md-12' : 'col-md-6' }}">
                <a href="{{ url('messages') }}">
                    <div class="xe-widget xe-counter xe-counter-green">
                        <div class="xe-icon">
                            <i class="fa fa-envelope-o"></i>
                        </div>
                        <div class="xe-label">
                            <strong class="num">{{ $messages_count }}</strong>
                            <span>@lang('dashboard.new-messages')</span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-sm-12 {{ $tiny ? 'col-md-12' : 'col-md-6' }}">
                <a href="{{ $tiny ? '#' : url('courses') }}">
                    <div class="xe-widget xe-counter xe-counter-blue">
                        <div class="xe-icon">
                            <i class="fa fa-group"></i>
                        </div>
                        <div class="xe-label">
                            <strong class="num">{{ $courses_count }}</strong>
                            <span>@lang('dashboard.courses')</span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-sm-12 {{ $tiny ? 'col-md-12' : 'col-md-6' }}">
                <a href="{{ $tiny ? '#' : url('plans') }}">
                    <div class="xe-widget xe-counter xe-counter-info">
                        <div class="xe-icon">
                            <i class="fa fa-pencil-square-o fa-fix-cirle-pencil-square-o"></i>
                        </div>
                        <div class="xe-label">
                            <strong class="num">{{ $plans_count }}</strong>
                            <span>@lang('dashboard.plans')</span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-sm-12 {{ $tiny ? 'col-md-12' : 'col-md-6' }}">
                <a href="{{ $tiny ? '#' : url('evaluations') }}">
                    <div class="xe-widget xe-counter xe-counter-purple">
                        <div class="xe-icon">
                            <i class="fa fa-check-square-o fa-fix-cirle-check-square-o"></i>
                        </div>
                        <div class="xe-label">
                            <strong class="num">{{ $evaluations_count }}</strong>
                            <span>@lang('dashboard.evaluations')</span>
                        </div>
                    </div>
                </a>
            </div>

            @if ( !$tiny )
                <div class="col-sm-12 {{ $tiny ? 'col-md-12' : 'col-md-6' }}">
                    <div class="panel panel-default" style="height: 256px;">
                        <div class="panel-heading">@lang('dashboard.title.todo')</div>
                        <div class="panel-body">
                            <div class="vertical-top">
                                <a href="{{ url('plans/create') }}" class="btn btn-info btn-icon btn-block btn-icon-standalone btn-icon-standalone-left">
                                    <i class="fa fa-pencil-square-o fa-fix-button-standalone"></i>
                                    <span>@lang('dashboard.create-plan')</span>
                                </a>
                                <a href="{{ url('evaluations/create') }}" class="btn btn-purple btn-icon btn-block btn-icon-standalone btn-icon-standalone-left">
                                    <i class="fa fa-check-square-o fa-fix-button-standalone"></i>
                                    <span>@lang('dashboard.create-evaluation')</span>
                                </a>
                                <a href="{{ url('statistics') }}" class="btn btn-warning btn-icon btn-block btn-icon-standalone btn-icon-standalone-left">
                                    <i class="fa fa-bar-chart-o fa-fix-button-standalone"></i>
                                    <span>@lang('dashboard.statistics')</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 {{ $tiny ? 'col-md-12' : 'col-md-6' }}">
                    <div class="panel panel-default">
        				<div class="panel-heading">@lang('dashboard.title.qualifications')</div>
                        <div class="panel-body">
                            <div id="califications" style="height: 155px;"></div>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </section>

@endsection

@section('custom-js-footer')
	<script src="{{ asset('boxsteps/js/fullcalendar/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('boxsteps/js/fullcalendar/lang/es.js') }}"></script>
    <script src="{{ asset('boxsteps/js/fullcalendar/boxsteps.fullcalendar.js') }}"></script>
@stop
