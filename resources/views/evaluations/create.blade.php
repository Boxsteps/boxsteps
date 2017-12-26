@extends('layouts.main')

@section('title')
    @lang('evaluation.create.title')
@endsection

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('boxsteps/js/select2/select2.css') }}">
	<link rel="stylesheet" href="{{ asset('boxsteps/js/select2/select2-bootstrap.css') }}">
@endsection

@section('custom-js-header')
@endsection

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/evaluations') }}">
					{{ csrf_field() }}

					<div class="panel-heading">
						<h3 class="panel-title">@lang('evaluation.create.title')</h3>
					</div>

					<div class="panel-body">

						<div class="panel-body col-sm-6">

							<div class="form-group {{ $errors->has('evaluation_content') ? ' has-error' : '' }}">
								<label class="col-sm-4 control-label">@lang('evaluation.create.evaluation-content')</label>
								<div class="col-sm-8">
									<div class="input-group col-xs-12 col-sm-12">
										<select class="form-control" name="evaluation_content" id="evaluation-content">
											<option value="">@lang('globals.value.null')</option>
											@foreach ($plans as $plan)
												<option value="{{ $plan->id }}"
                                                        data-course="{{ trans('evaluation.create.course-format', ['grade' => $plan->course->grade, 'section' => $plan->course->section]) }}"
                                                        data-conceptual="{{ $plan->conceptual_section->conceptual_section }}"
                                                        data-knowledge="{{ $plan->conceptual_section->knowledge_area->knowledge_area }}"
                                                        data-date="{{ $plan->start_date->format('d-m-Y') }}"
                                                        data-time="{{ $plan->start_date->format('h:i A') }} - {{ $plan->end_date->format('h:i A') }}">
                                                    @lang('evaluation.create.plan'){{ $plan->id }}
                                                </option>
											@endforeach
											</optgroup>
										</select>
									</div>
									@if ($errors->has('evaluation_content'))
										<span class="help-block">
											<strong>{{ $errors->first('evaluation_content') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="form-group {{ $errors->has('evaluation_type') ? ' has-error' : '' }}">
								<label class="col-sm-4 control-label">@lang('evaluation.create.evaluation-type')</label>
								<div class="col-sm-8">
									<div class="input-group col-xs-12 col-sm-12">
										<select class="form-control" name="evaluation_type" id="evaluation-type">
											<option value="">@lang('globals.value.null')</option>
											@foreach ($evaluation_type as $type)
												<option value="{{ $type->id }}"
                                                        data-name="{{ $type->name }}"
                                                        data-evaluation-type="{{ $type->evaluation_type }}">
                                                    {{ $type->name }}
                                                </option>
											@endforeach
											</optgroup>
										</select>
									</div>
									@if ($errors->has('evaluation_type'))
										<span class="help-block">
											<strong>{{ $errors->first('evaluation_type') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="form-group {{ $errors->has('percentage') ? ' has-error' : '' }}">
								<label class="col-sm-4 control-label">@lang('evaluation.create.percentage')</label>
								<div class="col-sm-8">
                                    <div class="input-group">
										<input name="percentage" id="percentage" type="text" class="form-control">
										<div class="input-group-addon">
											<i class="fa fa-percent"></i>
										</div>
									</div>
									@if ($errors->has('percentage'))
										<span class="help-block">
											<strong>{{ $errors->first('percentage') }}</strong>
										</span>
									@endif
								</div>
							</div>
						</div>

						<div class="panel-body col-sm-6">

							<div class="form-group {{ $errors->has('evaluation_date') ? ' has-error' : '' }}">
								<label class="col-sm-4 control-label">@lang('evaluation.create.evaluation-date')</label>
								<div class="col-sm-8">
									<div class="input-group">
										<input name="evaluation_date" id="evaluation-date" type="text" class="form-control datepicker">
										<div class="input-group-addon">
											<i class="linecons-calendar"></i>
										</div>
									</div>
									@if ($errors->has('evaluation_date'))
										<span class="help-block">
											<strong>{{ $errors->first('evaluation_date') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="form-group {{ $errors->has('time_start') ? ' has-error' : '' }}">
								<label class="col-sm-4 control-label">@lang('evaluation.create.begin-time')</label>
								<div class="col-sm-8">
									<div class="input-group">
										<input name="time_start" id="begin-time" type="text" class="form-control timepicker" data-template="dropdown" data-default-time="7:00 AM" data-show-meridian="true" data-minute-step="5">
										<div class="input-group-addon">
											<i class="linecons-clock"></i>
										</div>
									</div>
									@if ($errors->has('time_start'))
										<span class="help-block">
											<strong>{{ $errors->first('time_start') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="form-group {{ $errors->has('time_end') ? ' has-error' : '' }}">
								<label class="col-sm-4 control-label">@lang('evaluation.create.end-time')</label>
								<div class="col-sm-8">
									<div class="input-group">
										<input name="time_end" id="end-time" type="text" class="form-control timepicker" data-template="dropdown" data-default-time="8:45 AM" data-show-meridian="true" data-minute-step="5">
										<div class="input-group-addon">
											<i class="linecons-clock"></i>
										</div>
									</div>
									@if ($errors->has('time_end'))
										<span class="help-block">
											<strong>{{ $errors->first('time_end') }}</strong>
										</span>
									@endif
								</div>
							</div>

						</div>
					</div>

					<div class="panel-body">
						<div class="pull-right">
							<button type="submit" class="btn btn-primary btn-icon btn-icon-standalone">
								<i class="fa-check-square-o"></i>
								<span>@lang('evaluation.create.register')</span>
							</button>
						</div>
					</div>

				</form>
            </div>
        </div>
    </div>

@endsection

@section('custom-js-footer')
    <script type="text/javascript">
		$(document).ready(function(){

			$('.datepicker').datepicker({
				format: 'dd-mm-yyyy',
				startDate: '0d',
				language: 'es',
				daysOfWeekDisabled: [0,6],
				weekStart: 1,
				autoclose: true
			});

            function matchResultContent(term, text, option) {
                if ( $(option).data('course') && $(option).data('conceptual') && $(option).data('knowledge') && $(option).data('date') && $(option).data('time') ) {
                    return  $(option).data('course').toUpperCase().indexOf(term.toUpperCase()) >= 0 ||
                            $(option).data('conceptual').toUpperCase().indexOf(term.toUpperCase()) >= 0 ||
                            $(option).data('knowledge').toUpperCase().indexOf(term.toUpperCase()) >= 0 ||
                            $(option).data('date').toUpperCase().indexOf(term.toUpperCase()) >= 0 ||
                            $(option).data('time').toUpperCase().indexOf(term.toUpperCase()) >= 0;
                }

                return text.toUpperCase().indexOf(term.toUpperCase()) >= 0;
            }

            function formatResultContent(state) {
                var option = state.element;
                if ( state.text == '@lang('globals.value.null')' ) {
                    return '@lang('globals.value.null')';
                }
                return  '<span>' + $(option).data('course') + '</span><br>' +
                        '<span>' + $(option).data('conceptual') + '</span><br>' +
                        '<span>' + $(option).data('knowledge') + '</span><br>' +
                        '<span>' + $(option).data('date') + '</span><br>' +
                        '<span>' + $(option).data('time') + '</span>';
            }

            function formatSelectionContent(state) {
                return state.text;
            }

			$('#evaluation-content').select2({
				placeholder: '@lang('evaluation.create.evaluation-content')',
				language: "es",
				allowClear: true,
                matcher: matchResultContent,
                formatResult: formatResultContent,
                formatSelection: formatSelectionContent,
                escapeMarkup: function(m) { return m; }
			}).on('select2-open', function()
			{
				$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
			});

            function matchResultEvaluationType(term, text, option) {
                if ( $(option).data('name') && $(option).data('evaluation-type') ) {
                    return  $(option).data('name').toUpperCase().indexOf(term.toUpperCase()) >= 0 ||
                            $(option).data('evaluation-type').toUpperCase().indexOf(term.toUpperCase()) >= 0;
                }

                return text.toUpperCase().indexOf(term.toUpperCase()) >= 0;
            }

            function formatResultEvaluationType(state) {
                var option = state.element;
                if ( state.text == '@lang('globals.value.null')' ) {
                    return '@lang('globals.value.null')';
                }
                return  '<span>' + $(option).data('name') + '</span><br>' +
                        '<span>' + $(option).data('evaluation-type') + '</span>';
            }

            function formatSelectionEvaluationType(state) {
                return state.text;
            }

            $('#evaluation-type').select2({
				placeholder: '@lang('evaluation.create.evaluation-type')',
				language: "es",
				allowClear: true,
                matcher: matchResultEvaluationType,
                formatResult: formatResultEvaluationType,
                formatSelection: formatSelectionEvaluationType,
                escapeMarkup: function(m) { return m; }
			}).on('select2-open', function()
			{
				$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
			});

		});
	</script>

    <script src="{{ asset('boxsteps/js/datepicker/bootstrap-datepicker.js') }}"></script>
	<script src="{{ asset('boxsteps/js/datepicker/bootstrap-datepicker.es.js') }}"></script>
	<script src="{{ asset('boxsteps/js/timepicker/bootstrap-timepicker.js') }}"></script>
	<script src="{{ asset('boxsteps/js/select2/select2.min.js') }}"></script>
	<script src="{{ asset('boxsteps/js/select2/select2-locale-es.js') }}"></script>
@endsection
