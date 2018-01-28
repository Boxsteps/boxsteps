@extends('layouts.main')

@section('title')
    @lang('statistic.index.title')
@endsection

@section('custom-css')
	<link rel="stylesheet" href="{{ asset('boxsteps/js/select2/select2.css') }}">
	<link rel="stylesheet" href="{{ asset('boxsteps/js/select2/select2-bootstrap.css') }}">
@stop

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <br>

            <div class="panel panel-default">

                <div class="page-title">
                    <div class="title-env">
                		<h1 class="title">@lang('statistic.index.title.avg.box')</h1>
                		<p class="description">@lang('statistic.index.title.description.avg.box')</p>
                	</div>
                </div>

                <div class="panel-body">
                    <div class="col-sm-6">
                        <div class="panel panel-default vdivide">
                            <div class="panel-heading">@lang('statistic.index.title.for-course')</div>
                            <div class="panel-body">
                                <form id="statistic-course" class="form-horizontal" role="form" method="POST" action="{{ url('/statistics/courses/') }}">
                					{{ csrf_field() }}
                                    <div class="form-group {{ $errors->has('course') ? ' has-error' : '' }}">
                                        <label class="col-sm-4 control-label">@lang('statistic.index.course')</label>
                                        <div class="col-sm-8">
                                            <div class="input-group col-xs-12 col-sm-12">
                                                <select class="form-control" name="course" id="course">
                                                    <option value="">@lang('globals.value.null')</option>
                                                    @foreach ($courses as $course)
                                                        <option value="{{ $course->id }}">{{ trans('statistic.course.course-format', ['grade' => $course->grade, 'section' => $course->section]) }}</option>
                                                    @endforeach
                                                    </optgroup>
                                                </select>
                                            </div>
                                            @if ($errors->has('course'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('course') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="pull-right">
            							<button type="submit" class="btn btn-primary btn-icon btn-icon-standalone">
            								<i class="fa fa-search"></i>
            								<span>@lang('statistic.index.search')</span>
            							</button>
            						</div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">@lang('statistic.index.title.for-students')</div>
                            <div class="panel-body">
                                <form id="statistic-student" class="form-horizontal" role="form" method="POST" action="{{ url('/statistics/students/') }}">
                					{{ csrf_field() }}
                                    <div class="form-group {{ $errors->has('student') ? ' has-error' : '' }}">
                                        <label class="col-sm-4 control-label">@lang('statistic.index.student')</label>
                                        <div class="col-sm-8">
                                            <div class="input-group col-xs-12 col-sm-12">
                                                <select class="form-control" name="student" id="student">
                                                    <option value="">@lang('globals.value.null')</option>
                                                    @foreach ($courses as $course)
                                                        @foreach ($course->students as $student)
                                                            <option value="{{ $student->id }}"
                                                                    data-course="{{ trans('statistic.course.course-format', ['grade' => $course->grade, 'section' => $course->section]) }}"
                                                                    data-name="{{ $student->name }} {{ $student->second_name }}"
                                                                    data-dni="{{ $student->dni }}"
                                                                    data-email="{{ $student->email }}">
                                                                @lang('statistic.index.student-number') {{ $student->id }}
                                                            </option>
                                                        @endforeach
                                                    @endforeach
                                                    </optgroup>
                                                </select>
                                            </div>
                                            @if ($errors->has('student'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('student') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="pull-right">
            							<button type="submit" class="btn btn-primary btn-icon btn-icon-standalone">
            								<i class="fa fa-search"></i>
            								<span>@lang('statistic.index.search')</span>
            							</button>
            						</div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <br>

            <div class="panel panel-default">

                <div class="page-title">
                    <div class="title-env">
                		<h1 class="title">@lang('statistic.index.title.area.avg.box')</h1>
                		<p class="description">@lang('statistic.index.title.area.description.avg.box')</p>
                	</div>
                </div>

                <div class="panel-body">
                    <div class="col-sm-6">
                        <div class="panel panel-default vdivide">
                            <div class="panel-heading">@lang('statistic.index.title.for-course')</div>
                            <div class="panel-body">
                                <form id="statistic-area-course" class="form-horizontal" role="form" method="POST" action="{{ url('/statistics/areas/courses/') }}">
                					{{ csrf_field() }}
                                    <div class="form-group {{ $errors->has('area_course') ? ' has-error' : '' }}">
                                        <label class="col-sm-4 control-label">@lang('statistic.index.course')</label>
                                        <div class="col-sm-8">
                                            <div class="input-group col-xs-12 col-sm-12">
                                                <select class="form-control" name="area_course" id="area-course">
                                                    <option value="">@lang('globals.value.null')</option>
                                                    @foreach ($courses as $course)
                                                        <option value="{{ $course->id }}">{{ trans('statistic.course.course-format', ['grade' => $course->grade, 'section' => $course->section]) }}</option>
                                                    @endforeach
                                                    </optgroup>
                                                </select>
                                            </div>
                                            @if ($errors->has('area_course'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('area_course') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="pull-right">
            							<button type="submit" class="btn btn-primary btn-icon btn-icon-standalone">
            								<i class="fa fa-search"></i>
            								<span>@lang('statistic.index.search')</span>
            							</button>
            						</div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">@lang('statistic.index.title.for-students')</div>
                            <div class="panel-body">
                                <form id="statistic-area-student" class="form-horizontal" role="form" method="POST" action="{{ url('/statistics/areas/students/') }}">
                					{{ csrf_field() }}
                                    <div class="form-group {{ $errors->has('area_student') ? ' has-error' : '' }}">
                                        <label class="col-sm-4 control-label">@lang('statistic.index.student')</label>
                                        <div class="col-sm-8">
                                            <div class="input-group col-xs-12 col-sm-12">
                                                <select class="form-control" name="area_student" id="area-student">
                                                    <option value="">@lang('globals.value.null')</option>
                                                    @foreach ($courses as $course)
                                                        @foreach ($course->students as $student)
                                                            <option value="{{ $student->id }}"
                                                                    data-course="{{ trans('statistic.course.course-format', ['grade' => $course->grade, 'section' => $course->section]) }}"
                                                                    data-name="{{ $student->name }} {{ $student->second_name }}"
                                                                    data-dni="{{ $student->dni }}"
                                                                    data-email="{{ $student->email }}">
                                                                @lang('statistic.index.student-number') {{ $student->id }}
                                                            </option>
                                                        @endforeach
                                                    @endforeach
                                                    </optgroup>
                                                </select>
                                            </div>
                                            @if ($errors->has('area_student'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('area_student') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="pull-right">
            							<button type="submit" class="btn btn-primary btn-icon btn-icon-standalone">
            								<i class="fa fa-search"></i>
            								<span>@lang('statistic.index.search')</span>
            							</button>
            						</div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <br>

            <div class="panel panel-default">

                <div class="page-title">
                    <div class="title-env">
                		<h1 class="title">@lang('statistic.index.title.progress.box')</h1>
                		<p class="description">@lang('statistic.index.title.description.progress.box')</p>
                	</div>
                </div>

                <div class="panel-body">
                    <div class="col-sm-6">
                        <div class="panel panel-default vdivide">
                            <div class="panel-heading">@lang('statistic.index.title.for-course')</div>
                            <div class="panel-body">
                                <form id="statistic-progress-course" class="form-horizontal" role="form" method="POST" action="{{ url('/statistics/progress/courses/') }}">
                					{{ csrf_field() }}
                                    <div class="form-group {{ $errors->has('progress_course') ? ' has-error' : '' }}">
                                        <label class="col-sm-4 control-label">@lang('statistic.index.course')</label>
                                        <div class="col-sm-8">
                                            <div class="input-group col-xs-12 col-sm-12">
                                                <select class="form-control" name="progress_course" id="progress-course">
                                                    <option value="">@lang('globals.value.null')</option>
                                                    @foreach ($courses as $course)
                                                        <option value="{{ $course->id }}">{{ trans('statistic.course.course-format', ['grade' => $course->grade, 'section' => $course->section]) }}</option>
                                                    @endforeach
                                                    </optgroup>
                                                </select>
                                            </div>
                                            @if ($errors->has('progress_course'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('progress_course') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="pull-right">
            							<button type="submit" class="btn btn-primary btn-icon btn-icon-standalone">
            								<i class="fa fa-search"></i>
            								<span>@lang('statistic.index.search')</span>
            							</button>
            						</div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">@lang('statistic.index.title.for-students')</div>
                            <div class="panel-body">
                                <form id="statistic-progress-student" class="form-horizontal" role="form" method="POST" action="{{ url('/statistics/progress/students/') }}">
                					{{ csrf_field() }}
                                    <div class="form-group {{ $errors->has('progress_student') ? ' has-error' : '' }}">
                                        <label class="col-sm-4 control-label">@lang('statistic.index.student')</label>
                                        <div class="col-sm-8">
                                            <div class="input-group col-xs-12 col-sm-12">
                                                <select class="form-control" name="progress_student" id="progress-student">
                                                    <option value="">@lang('globals.value.null')</option>
                                                    @foreach ($courses as $course)
                                                        @foreach ($course->students as $student)
                                                            <option value="{{ $student->id }}"
                                                                    data-course="{{ trans('statistic.course.course-format', ['grade' => $course->grade, 'section' => $course->section]) }}"
                                                                    data-name="{{ $student->name }} {{ $student->second_name }}"
                                                                    data-dni="{{ $student->dni }}"
                                                                    data-email="{{ $student->email }}">
                                                                @lang('statistic.index.student-number') {{ $student->id }}
                                                            </option>
                                                        @endforeach
                                                    @endforeach
                                                    </optgroup>
                                                </select>
                                            </div>
                                            @if ($errors->has('progress_student'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('progress_student') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="pull-right">
            							<button type="submit" class="btn btn-primary btn-icon btn-icon-standalone">
            								<i class="fa fa-search"></i>
            								<span>@lang('statistic.index.search')</span>
            							</button>
            						</div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection

@section('custom-js-footer')
    <script type="text/javascript">
        jQuery(document).ready(function($) {

            function matchStudentResultContent(term, text, option) {
                if ( $(option).data('course') && $(option).data('name') && $(option).data('dni') && $(option).data('email') ) {
                    return  $(option).data('course').toUpperCase().indexOf(term.toUpperCase()) >= 0 ||
                            $(option).data('name').toUpperCase().indexOf(term.toUpperCase()) >= 0 ||
                            $(option).data('dni').toString().indexOf(term.toString()) >= 0 ||
                            $(option).data('email').toUpperCase().indexOf(term.toUpperCase()) >= 0;
                }

                return text.toUpperCase().indexOf(term.toUpperCase()) >= 0;
            }

            function formatStudentResultContent(state) {
                var option = state.element;
                if ( state.text == '@lang('globals.value.null')' ) {
                    return '@lang('globals.value.null')';
                }
                return  '<span>' + $(option).data('course') + '</span><br>' +
                        '<span>' + $(option).data('name') + '</span><br>' +
                        '<span>' + $(option).data('dni') + '</span><br>' +
                        '<span>' + $(option).data('email') + '</span><br>';
            }

            function formatStudentSelectionContent(state) {
                return state.text;
            }

            $('#course').select2({
				placeholder: '@lang('statistic.index.course')',
				language: "es",
				allowClear: true
			}).on('select2-open', function()
			{
				$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
			});

            $('#student').select2({
				placeholder: '@lang('statistic.index.student')',
				language: "es",
				allowClear: true,
                matcher: matchStudentResultContent,
                formatResult: formatStudentResultContent,
                formatSelection: formatStudentSelectionContent,
                escapeMarkup: function(m) { return m; }
			}).on('select2-open', function()
			{
				$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
			});

            $('#statistic-course').submit(function(event) {
                event.preventDefault();
                var formAction = $(this).attr('action');
                window.location.href = formAction + '/' + $('#statistic-course #course').val();
            });

            $('#statistic-student').submit(function(event) {
                event.preventDefault();
                var formAction = $(this).attr('action');
                window.location.href = formAction + '/' + $('#statistic-student #student').val();
            });

            $('#area-course').select2({
				placeholder: '@lang('statistic.index.course')',
				language: "es",
				allowClear: true
			}).on('select2-open', function()
			{
				$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
			});

            $('#area-student').select2({
				placeholder: '@lang('statistic.index.student')',
				language: "es",
				allowClear: true,
                matcher: matchStudentResultContent,
                formatResult: formatStudentResultContent,
                formatSelection: formatStudentSelectionContent,
                escapeMarkup: function(m) { return m; }
			}).on('select2-open', function()
			{
				$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
			});

            $('#statistic-area-course').submit(function(event) {
                event.preventDefault();
                var formAction = $(this).attr('action');
                window.location.href = formAction + '/' + $('#statistic-area-course #area-course').val();
            });

            $('#statistic-area-student').submit(function(event) {
                event.preventDefault();
                var formAction = $(this).attr('action');
                window.location.href = formAction + '/' + $('#statistic-area-student #area-student').val();
            });

            $('#progress-course').select2({
				placeholder: '@lang('statistic.index.course')',
				language: "es",
				allowClear: true
			}).on('select2-open', function()
			{
				$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
			});

            $('#progress-student').select2({
				placeholder: '@lang('statistic.index.student')',
				language: "es",
				allowClear: true,
                matcher: matchStudentResultContent,
                formatResult: formatStudentResultContent,
                formatSelection: formatStudentSelectionContent,
                escapeMarkup: function(m) { return m; }
			}).on('select2-open', function()
			{
				$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
			});

            $('#statistic-progress-course').submit(function(event) {
                event.preventDefault();
                var formAction = $(this).attr('action');
                window.location.href = formAction + '/' + $('#statistic-progress-course #progress-course').val();
            });

            $('#statistic-progress-student').submit(function(event) {
                event.preventDefault();
                var formAction = $(this).attr('action');
                window.location.href = formAction + '/' + $('#statistic-progress-student #progress-student').val();
            });

        });
    </script>

    <script src="{{ asset('boxsteps/js/select2/select2.min.js') }}"></script>
	<script src="{{ asset('boxsteps/js/select2/select2-locale-es.js') }}"></script>
@endsection
