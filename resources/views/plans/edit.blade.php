@extends('layouts.main')

@section('title')
	@lang('plan.edit.title')
@stop

@section('custom-css')
	<link rel="stylesheet" href="{{ asset('boxsteps/js/summernote/summernote.css') }}">
	<link rel="stylesheet" href="{{ asset('boxsteps/js/select2/select2.css') }}">
	<link rel="stylesheet" href="{{ asset('boxsteps/js/select2/select2-bootstrap.css') }}">
@stop

@section('messages')
    @if (session('message'))
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">@lang('globals.message.close')</span>
                    </button>
                    {{ session('message') }}<br>{{ session('return') }}
                    @if ( (session('url') != null) && (session('name') != null) )
                        <a href="{{ session('url') }}">{{ session('name') }}</a>
                    @endif
                </div>
            </div>
        </div>
    @endif
@endsection

@section('content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<form class="form-horizontal" role="form" method="POST" action="{{ url('/plans/' . $plan->id) }}">
					{{ csrf_field() }}

					<input type="hidden" name="_method" value="PUT">

					<div class="panel-heading">
						<h3 class="panel-title">@lang('plan.edit.title')</h3>
					</div>

					<div class="panel-body">

						<div class="panel-body col-sm-6">

							<div class="form-group {{ $errors->has('course') ? ' has-error' : '' }}">
								<label class="col-sm-4 control-label">@lang('plan.edit.course')</label>
								<div class="col-sm-8">
									<div class="input-group col-xs-12 col-sm-12">
										<select class="form-control" name="course" id="course">
											<option value="">Ninguno</option>
											@foreach ($courses as $course)
												<option {{ ( $plan->course_id == $course->id ? 'selected="selected"' : '' ) }} value="{{ $course->id }}">{{ trans('plan.edit.course-format', ['grade' => $course->grade, 'section' => $course->section]) }}</option>
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

							<div class="form-group {{ $errors->has('knowledge') ? ' has-error' : '' }}">
								<label class="col-sm-4 control-label">@lang('plan.edit.knowledge')</label>
								<div class="col-sm-8">
									<div class="input-group col-xs-12 col-sm-12">
										<select class="form-control" name="knowledge" id="knowledge">
											<option value="">Ninguno</option>
											@foreach ($knowledge_areas as $area)
												<option {{ ( $plan_knowledge->id == $area->id ? 'selected="selected"' : '' ) }} value="{{ $area->id }}">{{ $area->knowledge_area }}</option>
											@endforeach
											</optgroup>
										</select>
									</div>
									@if ($errors->has('knowledge'))
										<span class="help-block">
											<strong>{{ $errors->first('knowledge') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="form-group {{ $errors->has('conceptual') ? ' has-error' : '' }}">
								<label class="col-sm-4 control-label">@lang('plan.edit.conceptual')</label>
								<div class="col-sm-8">
									<div class="input-group col-xs-12 col-sm-12">
										<select class="form-control" name="conceptual" id="conceptual">
											<option value="">Ninguno</option>
										</select>
									</div>
									@if ($errors->has('conceptual'))
										<span class="help-block">
											<strong>{{ $errors->first('conceptual') }}</strong>
										</span>
									@endif
								</div>
							</div>
						</div>

						<div class="panel-body col-sm-6">

							<div class="form-group {{ $errors->has('planification_date') ? ' has-error' : '' }}">
								<label class="col-sm-4 control-label">@lang('plan.edit.planification-date')</label>
								<div class="col-sm-8">
									<div class="input-group">
										<input name="planification_date" id="planification-date" type="text" class="form-control datepicker" value="{{ $plan->start_date->format('d-m-Y') }}">
										<div class="input-group-addon">
											<i class="linecons-calendar"></i>
										</div>
									</div>
									@if ($errors->has('planification_date'))
										<span class="help-block">
											<strong>{{ $errors->first('planification_date') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="form-group {{ $errors->has('time_start') ? ' has-error' : '' }}">
								<label class="col-sm-4 control-label">@lang('plan.edit.begin-time')</label>
								<div class="col-sm-8">
									<div class="input-group">
										<input name="time_start" id="begin-time" type="text" class="form-control timepicker" data-template="dropdown" data-default-time="7:00 AM" data-show-meridian="true" data-minute-step="5" value="{{ $plan->start_date->format('h:i A') }}">
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
								<label class="col-sm-4 control-label">@lang('plan.edit.end-time')</label>
								<div class="col-sm-8">
									<div class="input-group">
										<input name="time_end" id="end-time" type="text" class="form-control timepicker" data-template="dropdown" data-default-time="8:45 AM" data-show-meridian="true" data-minute-step="5" value="{{ $plan->end_date->format('h:i A') }}">
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

					<br><br><br>

					<div class="panel-heading">
						<h3 class="panel-title">@lang('plan.edit.procedimental')</h3>
					</div>

					<div class="panel-body">
						<textarea class="editor" name="procedimental" id="procedimental">
							{{ $plan->procedimental_section }}
						</textarea>
						@if ($errors->has('procedimental'))
							<span class="help-block error">
								<strong>{{ $errors->first('procedimental') }}</strong><br><br>
							</span>
						@endif
					</div>

					<div class="panel-heading">
						<h3 class="panel-title">@lang('plan.edit.actitudinal')</h3>
					</div>

					<div class="panel-body">
						<textarea class="editor" name="actitudinal" id="actitudinal">
							{{ $plan->actitudinal_section }}
						</textarea>
						@if ($errors->has('actitudinal'))
							<span class="help-block error">
								<strong>{{ $errors->first('actitudinal') }}</strong><br><br>
							</span>
						@endif
					</div>

					<div class="panel-heading">
						<h3 class="panel-title">@lang('plan.edit.competences')</h3>
					</div>

					<div class="panel-body">
						<textarea class="editor" name="competences" id="competences">
							{{ $plan->competences }}
						</textarea>
						@if ($errors->has('competences'))
							<span class="help-block error">
								<strong>{{ $errors->first('competences') }}</strong><br><br>
							</span>
						@endif
					</div>

					<div class="panel-heading">
						<h3 class="panel-title">@lang('plan.edit.indicators')</h3>
					</div>

					<div class="panel-body">
						<textarea class="editor" name="indicators" id="indicators">
							{{ $plan->indicators }}
						</textarea>
						@if ($errors->has('indicators'))
							<span class="help-block error">
								<strong>{{ $errors->first('indicators') }}</strong><br><br>
							</span>
						@endif
					</div>

					<div class="panel-heading">
						<h3 class="panel-title">@lang('plan.edit.teaching-strategy')</h3>
					</div>

					<div class="panel-body">
						<textarea class="editor" name="teaching_strategy" id="teaching-strategy">
							{{ $plan->teaching_strategy }}
						</textarea>
						@if ($errors->has('teaching_strategy'))
							<span class="help-block error">
								<strong>{{ $errors->first('teaching_strategy') }}</strong><br><br>
							</span>
						@endif
					</div>

					<div class="panel-heading">
						<h3 class="panel-title">@lang('plan.edit.teaching-sequence')</h3>
					</div>

					<div class="panel-body">
						<textarea class="editor" name="teaching_sequence" id="teaching-sequence">
							{{ $plan->teaching_sequence }}
						</textarea>
						@if ($errors->has('teaching_sequence'))
							<span class="help-block error">
								<strong>{{ $errors->first('teaching_sequence') }}</strong><br><br>
							</span>
						@endif
					</div>

					<div class="panel-body">
						<div class="pull-right">
							<button type="submit" class="btn btn-primary btn-icon btn-icon-standalone">
								<i class="fa-pencil"></i>
								<span>@lang('plan.edit.register')</span>
							</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
@stop

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

			$('.editor').summernote({
				dialogsInBody: true,
				height: 200,
				lang: 'es-ES',
				toolbar: [
					['style', ['style']],
					['font', ['bold', 'underline', 'clear']],
					['fontname', ['fontname']],
					['color', ['color']],
					['para', ['ul', 'ol', 'paragraph']],
					['table', ['table']],
					['insert', ['link', 'picture', 'video']],
					['view', ['codeview']]
				]
			});

			$('#course').select2({
				placeholder: '@lang('plan.edit.course')',
				language: "es",
				allowClear: true
			}).on('select2-open', function()
			{
				$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
			});

			$('#knowledge').select2({
				placeholder: '@lang('plan.edit.knowledge')',
				language: "es",
				allowClear: true
			}).on('select2-open', function()
			{
				$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
			});

			$('#conceptual').select2({
				placeholder: '@lang('plan.edit.conceptual')',
				language: "es",
				allowClear: true
			}).on('select2-open', function()
			{
				$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
			});

			$.get("{{ url('/api/conceptual-sections-dropdown?knowledge+area+value=') }}" + $('#knowledge').val(), function(data) {
				$('#conceptual').empty();
				$('#conceptual').append('<option value="">Ninguno</option>');
				$.each(data, function(index, option) {
					if ( option.id == {{ $plan->conceptual_section_id }} ) {
						$('#conceptual').append('<option selected="selected" value ="' + option.id + '">' + option.conceptual_section + '</option>');
					}
					else {
						$('#conceptual').append('<option value ="' + option.id + '">' + option.conceptual_section + '</option>');
					}
				});
				$('#conceptual').trigger('change.select2');
			});

			$('#knowledge').on('change', function(knowledge) {

				var knowledge_area_value = knowledge.target.value;

				$.get("{{ url('/api/conceptual-sections-dropdown?knowledge+area+value=') }}" + knowledge_area_value, function(data) {
					$('#conceptual').empty();
					$('#conceptual').append('<option value="">Ninguno</option>');
					$.each(data, function(index, option) {
						$('#conceptual').append('<option value ="' + option.id + '">' + option.conceptual_section + '</option>');
					});
					$('#conceptual').trigger('change.select2');
				});
			});
		});
	</script>

	<script src="{{ asset('boxsteps/js/datepicker/bootstrap-datepicker.js') }}"></script>
	<script src="{{ asset('boxsteps/js/datepicker/bootstrap-datepicker.es.js') }}"></script>
	<script src="{{ asset('boxsteps/js/timepicker/bootstrap-timepicker.js') }}"></script>
	<script src="{{ asset('boxsteps/js/summernote/summernote.min.js') }}"></script>
	<script src="{{ asset('boxsteps/js/summernote/lang/summernote-es-es.js') }}"></script>
	<script src="{{ asset('boxsteps/js/select2/select2.min.js') }}"></script>
	<script src="{{ asset('boxsteps/js/select2/select2-locale-es.js') }}"></script>
@stop
