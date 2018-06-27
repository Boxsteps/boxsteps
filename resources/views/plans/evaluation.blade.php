@extends('layouts.main')

@section('title')
    @lang('plan.evaluation.title')
@endsection

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('boxsteps/js/summernote/summernote.css') }}">
	<link rel="stylesheet" href="{{ asset('boxsteps/js/select2/select2.css') }}">
	<link rel="stylesheet" href="{{ asset('boxsteps/js/select2/select2-bootstrap.css') }}">
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

                <form class="form-horizontal" role="form" method="POST" action="{{ url('/plans/' . $plan->id . '/evaluation') }}">
					{{ csrf_field() }}

                    <input type="hidden" name="_method" value="PUT">

                    <div class="panel-heading">
						<h3 class="panel-title">@lang('plan.evaluation.title')</h3>
					</div>

                    <div class="panel-body">
                        <div class="panel-body col-sm-6">
                            <div class="form-group {{ $errors->has('completion') ? ' has-error' : '' }}">
                                <label class="col-sm-4 control-label">@lang('plan.evaluation.completion')</label>
                                <div class="col-sm-8">
                                    <div class="input-group col-xs-12 col-sm-12">
                                        <select class="form-control" name="completion" id="completion">
                                            <option value="">@lang('globals.value.null')</option>
                                            <option value="@lang('globals.evaluation.early.completion')">@lang('plan.evaluation.early.completion')</option>
                                            <option value="@lang('globals.evaluation.expected.completion')">@lang('plan.evaluation.expected.completion')</option>
                                            <option value="@lang('globals.evaluation.delayed.completion')">@lang('plan.evaluation.delayed.completion')</option>
                                        </select>
                                    </div>
                                    @if ($errors->has('completion'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('completion') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="panel-body col-sm-6">
                            <div class="form-group {{ $errors->has('score') ? ' has-error' : '' }}">
                                <label class="col-sm-4 control-label">@lang('plan.evaluation.score')</label>
                                <div class="col-sm-8">
                                    <input type="text" class="rating-loading form-control" name="score" id="score" value="{{ old('score') }}" data-size="xs" title="@lang('plan.evaluation.score')">
                                    @if ($errors->has('score'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('score') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <br><br><br>

                    <div class="panel-heading">
                        <h3 class="panel-title">@lang('plan.evaluation.observations')</h3>
                    </div>

                    <div class="panel-body">
                        <textarea class="editor" name="observations" id="observations">
                            {{ old('observations') }}
                        </textarea>
                        @if ($errors->has('observations'))
                            <span class="help-block error">
                                <strong>{{ $errors->first('observations') }}</strong><br><br>
                            </span>
                        @endif
                    </div>

                    <div class="panel-body">
						<div class="pull-right">
							<button type="submit" class="btn btn-primary btn-icon btn-icon-standalone">
								<i class="fa-check-square-o"></i>
								<span>@lang('plan.evaluation.title.review')</span>
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

			$('#completion').select2({
				placeholder: '@lang('plan.evaluation.completion')',
				language: "es",
				allowClear: true
			}).on('select2-open', function()
			{
				$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
			});

            $('#score').rating({
                language: 'es',
                theme: 'krajee-fa',
                step: 1,
                starCaptions: { 1: 'Muy mala', 2: 'Mala', 3: 'Regular', 4: 'Buena', 5: 'Muy buena' },
                starCaptionClasses: { 1: 'label label-danger', 2: 'label label-warning', 3: 'label label-primary', 4: 'label label-info', 5: 'label label-success' },
                filledStar: '<i class="fa fa-star"></i>',
                emptyStar: '<i class="fa fa-star-o"></i>'
            });

		});
	</script>

    <script src="{{ asset('boxsteps/js/summernote/summernote.min.js') }}"></script>
	<script src="{{ asset('boxsteps/js/summernote/lang/summernote-es-es.js') }}"></script>
	<script src="{{ asset('boxsteps/js/select2/select2.min.js') }}"></script>
	<script src="{{ asset('boxsteps/js/select2/select2-locale-es.js') }}"></script>
@endsection
