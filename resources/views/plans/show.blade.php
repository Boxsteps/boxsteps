@extends('layouts.main')

@section('title')
    @lang('plan.show.title')
@endsection

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('boxsteps/css/xenon/xenon-print.css') }}">
    <link rel="stylesheet" href="{{ asset('boxsteps/js/starrating/css/star-rating.css') }}">
    <link rel="stylesheet" href="{{ asset('boxsteps/js/starrating/themes/fa/theme.css') }}">
@endsection

@section('custom-js-header')
    <script src="{{ asset('boxsteps/js/starrating/js/star-rating.js') }}"></script>
    <script src="{{ asset('boxsteps/js/starrating/js/locales/es.js') }}"></script>
    <script src="{{ asset('boxsteps/js/starrating/themes/fa/theme.js') }}"></script>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h3 class="panel-title">@lang('plan.show.title')</h3>
                </div>

                <div class="panel-body">

                    <div class="panel-body col-sm-6">
                        <form role="form" class="form-horizontal" role="form">

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="name">@lang('plan.show.name')</label>

                                <div class="col-sm-8">
                                    <input type="text" disabled="disabled" class="form-control" id="name" value="{{ $teacher->name }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="course">@lang('plan.show.course')</label>

                                <div class="col-sm-8">
                                    <input type="text" disabled="disabled" class="form-control" id="course" value="{{ trans('plan.show.course-format', ['grade' => $plan->course->grade, 'section' => $plan->course->section]) }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="knowledge">@lang('plan.show.knowledge')</label>

                                <div class="col-sm-8">
                                    <input type="text" disabled="disabled" class="form-control" id="knowledge" value="{{ $knowledge }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="conceptual">@lang('plan.show.conceptual')</label>

                                <div class="col-sm-8">
                                    <input type="text" disabled="disabled" class="form-control" id="conceptual" value="{{ $conceptual }}">
                                </div>
                            </div>

                        </form>
                    </div>

                    <div class="panel-body col-sm-6">
                        <form role="form" class="form-horizontal" role="form">

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="second-name">@lang('plan.show.second-name')</label>

                                <div class="col-sm-8">
                                    <input type="text" disabled="disabled" class="form-control" id="second-name" value="{{ $teacher->second_name }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="date">@lang('plan.show.date')</label>

                                <div class="col-sm-8">
                                    <input type="text" disabled="disabled" class="form-control" id="date" value="{{ $plan->start_date->format('d-m-Y') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="time">@lang('plan.show.time')</label>

                                <div class="col-sm-8">
                                    <input type="text" disabled="disabled" class="form-control" id="time" value="{{ $plan->start_date->format('h:i A') }} - {{ $plan->end_date->format('h:i A') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="condition">@lang('plan.show.condition')</label>

                                <div class="col-sm-8">
                                    <input type="text" disabled="disabled" class="form-control" id="condition" value="{{ $plan->state->first()->state }}">
                                </div>
                            </div>

                        </form>
                    </div>

                </div>

                <br><br><br>

                <div class="panel-heading">
                    <h3 class="panel-title">@lang('plan.show.evaluation')</h3>
                </div>

                <div class="panel-body">

                    <div class="panel-body col-sm-6">
                        <form role="form" class="form-horizontal" role="form">

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="course">@lang('plan.show.completion')</label>

                                <div class="col-sm-8">
                                    <input type="text" disabled="disabled" class="form-control" id="course" value="{{ $completion }}">
                                </div>
                            </div>

                        </form>
                    </div>

                    <div class="panel-body col-sm-6">
                        <form role="form" class="form-horizontal" role="form">

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="date">@lang('plan.show.score')</label>

                                <div class="col-sm-8">
                                    <input type="text" class="rating-loading form-control" name="score" id="score" value="{{ $plan->score }}" data-size="xs" title="@lang('plan.evaluation.score')">
                                </div>
                            </div>

                        </form>
                    </div>

                </div>

                <br><br><br>

                <div class="panel-heading">
                    <h3 class="panel-title">@lang('plan.show.content')</h3>
                </div>

                <div class="panel-body">
                    <div class="tabs-vertical-env tabs-vertical-bordered">

                        <ul class="nav tabs-vertical">
                            <li class="active"><a href="#procedimental" data-toggle="tab">@lang('plan.show.procedimental')</a></li>
                            <li><a href="#actitudinal" data-toggle="tab">@lang('plan.show.actitudinal')</a></li>
                            <li><a href="#competences" data-toggle="tab">@lang('plan.show.competences')</a></li>
                            <li><a href="#indicators" data-toggle="tab">@lang('plan.show.indicators')</a></li>
                            <li><a href="#teaching-strategy" data-toggle="tab">@lang('plan.show.teaching-strategy')</a></li>
                            <li><a href="#teaching-sequence" data-toggle="tab">@lang('plan.show.teaching-sequence')</a></li>
                            <li><a href="#observations" data-toggle="tab">@lang('plan.show.observations')</a></li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane active scrollable" data-max-height="388" id="procedimental">
                                <h3 class="print-title">@lang('plan.show.procedimental')</h3>
                                {!! $plan->procedimental_section !!}
                            </div>
                            <div class="tab-pane scrollable" data-max-height="388" id="actitudinal">
                                <h3 class="print-title">@lang('plan.show.actitudinal')</h3>
                                {!! $plan->actitudinal_section !!}
                            </div>
                            <div class="tab-pane scrollable" data-max-height="388" id="competences">
                                <h3 class="print-title">@lang('plan.show.competences')</h3>
                                {!! $plan->competences !!}
                            </div>
                            <div class="tab-pane scrollable" data-max-height="388" id="indicators">
                                <h3 class="print-title">@lang('plan.show.indicators')</h3>
                                {!! $plan->indicators !!}
                            </div>
                            <div class="tab-pane scrollable" data-max-height="388" id="teaching-strategy">
                                <h3 class="print-title">@lang('plan.show.teaching-strategy')</h3>
                                {!! $plan->teaching_strategy !!}
                            </div>
                            <div class="tab-pane scrollable" data-max-height="388" id="teaching-sequence">
                                <h3 class="print-title">@lang('plan.show.teaching-sequence')</h3>
                                {!! $plan->teaching_sequence !!}
                            </div>
                            <div class="tab-pane scrollable" data-max-height="388" id="observations">
                                <h3 class="print-title">@lang('plan.show.observations')</h3>
                                {!! $plan->observations !!}
                            </div>
                        </div>

                    </div>
                </div>

                <div class="panel-body">
                    @if ( $plan->state->first()->id == trans('globals.condition.approved') )
                        <div class="pull-right">
                            <form role="form" action="{{ url( '/plans/' . $plan->id . '/evaluation' ) }}" method="POST">
                                {{ csrf_field() }}
                                &nbsp;
                                <input type="hidden" name="_method" value="GET">
                                <button class="btn btn-icon btn-icon-standalone btn-purple">
                                    <i class="fa-check-square-o"></i>
                                    <span>@lang('plan.show.title.review')</span>
                                </button>
                            </form>
                        </div>
                    @endif
                    <div class="pull-right">
                        <button onclick="planPrint()" class="btn btn-primary btn-icon btn-icon-standalone">
                            <i class="fa-print"></i>
                            <span>@lang('plan.show.print')</span>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('custom-js-footer')
    <script type="text/javascript">
        function planPrint() {
            window.print();
        }
    </script>

    <script type="text/javascript">
		$(document).ready(function(){

            $('#score').rating({
                language: 'es',
                theme: 'krajee-fa',
                step: 1,
                readonly: true,
                starCaptions: { 1: 'Muy mala', 2: 'Mala', 3: 'Regular', 4: 'Buena', 5: 'Muy buena' },
                starCaptionClasses: { 1: 'label label-danger', 2: 'label label-warning', 3: 'label label-primary', 4: 'label label-info', 5: 'label label-success' },
                filledStar: '<i class="fa fa-star"></i>',
                emptyStar: '<i class="fa fa-star-o"></i>'
            });

		});
	</script>
@endsection
