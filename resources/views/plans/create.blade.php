@extends('layouts.main')

@section('title')
	@lang('plan.create.title')
@stop

@section('custom-css')
	<link rel="stylesheet" href="{{ asset('boxsteps/js/summernote/summernote.css') }}">
	<link rel="stylesheet" href="{{ asset('boxsteps/js/select2/select2.css') }}">
	<link rel="stylesheet" href="{{ asset('boxsteps/js/select2/select2-bootstrap.css') }}">
@stop

@section('content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<form class="form-horizontal" role="form" method="POST" action="{{ url('/plans') }}">
					{{ csrf_field() }}

					<div class="panel-heading">
						<h3 class="panel-title">@lang('plan.create.title')</h3>
					</div>

					<div class="panel-body">

						<div class="panel-body col-sm-6">

							<div class="form-group {{ $errors->has('course') ? ' has-error' : '' }}">
								<label class="col-sm-4 control-label">@lang('plan.create.course')</label>
								<div class="col-sm-8">
									<div class="input-group col-xs-12 col-sm-12">
										<select class="form-control" name="course" id="course">
											<option value="">Ninguno</option>
											@foreach ($courses as $course)
												<option value="{{ $course->id }}">{{ trans('plan.create.course-format', ['grade' => $course->grade, 'section' => $course->section]) }}</option>
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
								<label class="col-sm-4 control-label">@lang('plan.create.knowledge')</label>
								<div class="col-sm-8">
									<div class="input-group col-xs-12 col-sm-12">
										<select class="form-control" name="knowledge" id="knowledge">
											<option value="">Ninguno</option>
											@foreach ($knowledge_areas as $area)
												<option value="{{ $area->id }}">{{ $area->knowledge_area }}</option>
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
								<label class="col-sm-4 control-label">@lang('plan.create.conceptual')</label>
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
								<label class="col-sm-4 control-label">@lang('plan.create.planification-date')</label>
								<div class="col-sm-8">
									<div class="input-group">
										<input name="planification_date" id="planification-date" type="text" class="form-control datepicker">
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
								<label class="col-sm-4 control-label">@lang('plan.create.begin-time')</label>
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
								<label class="col-sm-4 control-label">@lang('plan.create.end-time')</label>
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

					<br><br><br>

					<div class="panel-heading">
						<h3 class="panel-title">@lang('plan.create.procedimental')</h3>
					</div>

					<div class="panel-body">
						<textarea class="editor" name="procedimental" id="procedimental"></textarea>
						@if ($errors->has('procedimental'))
							<span class="help-block error">
								<strong>{{ $errors->first('procedimental') }}</strong><br><br>
							</span>
						@endif
					</div>

					<div class="panel-heading">
						<h3 class="panel-title">@lang('plan.create.actitudinal')</h3>
					</div>

					<div class="panel-body">
						<textarea class="editor" name="actitudinal" id="actitudinal"></textarea>
						@if ($errors->has('actitudinal'))
							<span class="help-block error">
								<strong>{{ $errors->first('actitudinal') }}</strong><br><br>
							</span>
						@endif
					</div>

					<div class="panel-heading">
						<h3 class="panel-title">@lang('plan.create.competences')</h3>
					</div>

					<div class="panel-body">
						<textarea class="editor" name="competences" id="competences"></textarea>
						@if ($errors->has('competences'))
							<span class="help-block error">
								<strong>{{ $errors->first('competences') }}</strong><br><br>
							</span>
						@endif
					</div>

					<div class="panel-heading">
						<h3 class="panel-title">@lang('plan.create.indicators')</h3>
					</div>

					<div class="panel-body">
						<textarea class="editor" name="indicators" id="indicators"></textarea>
						@if ($errors->has('indicators'))
							<span class="help-block error">
								<strong>{{ $errors->first('indicators') }}</strong><br><br>
							</span>
						@endif
					</div>

					<div class="panel-heading">
						<h3 class="panel-title">@lang('plan.create.teaching-strategy')</h3>
					</div>

					<div class="panel-body">
						<textarea class="editor" name="teaching_strategy" id="teaching-strategy"></textarea>
						@if ($errors->has('teaching_strategy'))
							<span class="help-block error">
								<strong>{{ $errors->first('teaching_strategy') }}</strong><br><br>
							</span>
						@endif
					</div>

					<div class="panel-heading">
						<h3 class="panel-title">@lang('plan.create.teaching-sequence')</h3>
					</div>

					<div class="panel-body">
						<textarea class="editor" name="teaching_sequence" id="teaching-sequence"></textarea>
						@if ($errors->has('teaching_sequence'))
							<span class="help-block error">
								<strong>{{ $errors->first('teaching_sequence') }}</strong><br><br>
							</span>
						@endif
					</div>

					<div class="panel-body">
						<div class="pull-right">
							<button type="submit" class="btn btn-primary">
								<i class="linecons-pencil"></i>
								@lang('plan.create.register')
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
				placeholder: '@lang('plan.create.course')',
				language: "es",
				allowClear: true
			}).on('select2-open', function()
			{
				$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
			});

			$('#knowledge').select2({
				placeholder: '@lang('plan.create.knowledge')',
				language: "es",
				allowClear: true
			}).on('select2-open', function()
			{
				$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
			});

			$('#conceptual').select2({
				placeholder: '@lang('plan.create.conceptual')',
				language: "es",
				allowClear: true
			}).on('select2-open', function()
			{
				$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
			});

			$('#knowledge').on('change', function(knowledge) {

				var knowledge_area_value = knowledge.target.value;

				$.get("{{ url('/api/conceptual-sections-dropdown?knowledge+area+value=') }}" + knowledge_area_value, function(data) {
					$('#conceptual').empty();
					$('#conceptual').append('<option value="">Ninguno</option>');
					$.each(data, function(index, option) {
						$('#conceptual').append('<option value ="' + option.id + '">' + option.conceptual_section + '</option>');
					});
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
