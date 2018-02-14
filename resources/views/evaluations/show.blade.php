@extends('layouts.main')

@section('title')
    @lang('evaluation.show.title')
@endsection

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('boxsteps/css/xenon/xenon-print.css') }}">
@endsection

@section('custom-js-header')
@endsection

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h3 class="panel-title">@lang('evaluation.show.title')</h3>
                </div>

                <div class="panel-body">

                    <div class="panel-body col-sm-6">
                        <form role="form" class="form-horizontal" role="form">

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="name">@lang('evaluation.show.name')</label>

                                <div class="col-sm-8">
                                    <input type="text" disabled="disabled" class="form-control" id="name" value="{{ $teacher->name }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="course">@lang('evaluation.show.course')</label>

                                <div class="col-sm-8">
                                    <input type="text" disabled="disabled" class="form-control" id="course" value="{{ trans('evaluation.show.course-format', ['grade' => $evaluation->course->grade, 'section' => $evaluation->course->section]) }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="course">@lang('evaluation.show.name')</label>

                                <div class="col-sm-8">
                                    <input type="text" disabled="disabled" class="form-control" id="name" value="{{ $evaluation->name }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="course">@lang('evaluation.show.percentage')</label>

                                <div class="col-sm-8">
                                    <input type="text" disabled="disabled" class="form-control" id="percentage" value="{{ $evaluation->representative_percentage }}%">
                                </div>
                            </div>

                        </form>
                    </div>

                    <div class="panel-body col-sm-6">
                        <form role="form" class="form-horizontal" role="form">

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="second-name">@lang('evaluation.show.second-name')</label>

                                <div class="col-sm-8">
                                    <input type="text" disabled="disabled" class="form-control" id="second-name" value="{{ $teacher->second_name }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="date">@lang('evaluation.show.date')</label>

                                <div class="col-sm-8">
                                    <input type="text" disabled="disabled" class="form-control" id="date" value="{{ $evaluation->start_date->format('d-m-Y') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="time">@lang('evaluation.show.time')</label>

                                <div class="col-sm-8">
                                    <input type="text" disabled="disabled" class="form-control" id="time" value="{{ $evaluation->start_date->format('h:i A') }} - {{ $evaluation->end_date->format('h:i A') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="condition">@lang('evaluation.show.evaluation-type')</label>

                                <div class="col-sm-8">
                                    <input type="text" disabled="disabled" class="form-control" id="evaluation-type" value="{{ $evaluation_type->name }}">
                                </div>
                            </div>

                        </form>
                    </div>

                </div>

                <br><br><br>

                <div class="panel-heading">
                    <h3 class="panel-title">@lang('evaluation.show.content')</h3>
                </div>

                <div class="panel-body">

                    <div class="panel-body col-sm-6">
                        <form role="form" class="form-horizontal" role="form">

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="knowledge">@lang('evaluation.show.knowledge')</label>

                                <div class="col-sm-8">
                                    <input type="text" disabled="disabled" class="form-control" id="knowledge" value="{{ $knowledge }}">
                                </div>
                            </div>

                        </form>
                    </div>

                    <div class="panel-body col-sm-6">
                        <form role="form" class="form-horizontal" role="form">

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="conceptual">@lang('evaluation.show.conceptual')</label>

                                <div class="col-sm-8">
                                    <input type="text" disabled="disabled" class="form-control" id="conceptual" value="{{ $conceptual }}">
                                </div>
                            </div>

                        </form>
                    </div>

                </div>

                <br><br><br>

                <div class="panel-body">
                    <div class="pull-right">
                        <button onclick="planPrint()" class="btn btn-primary btn-icon btn-icon-standalone">
                            <i class="fa-print"></i>
                            <span>@lang('evaluation.show.print')</span>
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
@endsection
