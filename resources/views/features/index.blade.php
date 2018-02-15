@extends('layouts.main')

@section('title')
    @lang('feature.index.title')
@endsection

@section('custom-css')
	<link rel="stylesheet" href="{{ asset('boxsteps/js/select2/select2.css') }}">
	<link rel="stylesheet" href="{{ asset('boxsteps/js/select2/select2-bootstrap.css') }}">
@stop

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('feature.index.title')</div>
                <div class="panel-body">
                    <form id="features" class="form-horizontal" role="form" method="POST" action="{{ url('/features/') }}">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('feature') ? ' has-error' : '' }}">
                            <label class="col-sm-4 control-label">@lang('feature.index.name')</label>
                            <div class="col-sm-8">
                                <div class="input-group col-xs-12 col-sm-12">
                                    <select class="form-control" name="feature" id="feature">
                                        <option value="">@lang('globals.value.null')</option>
                                        @foreach ($features as $feature)
                                            <option value="{{ $feature->id }}">{{ $feature->feature }}</option>
                                        @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                                @if ($errors->has('feature'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('feature') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary btn-icon btn-icon-standalone">
                                <i class="fa fa-search"></i>
                                <span>@lang('feature.index.search')</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('custom-js-footer')
    <script type="text/javascript">
        jQuery(document).ready(function($) {

            $('#feature').select2({
				placeholder: '@lang('plan.create.course')',
				language: "es",
				allowClear: true
			}).on('select2-open', function()
			{
				$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
			});

            $('#features').submit(function(event) {
                event.preventDefault();
                var formAction = $(this).attr('action');
                window.location.href = formAction + '/' + $('#features #feature').val();
            });

        });
    </script>

    <script src="{{ asset('boxsteps/js/select2/select2.min.js') }}"></script>
	<script src="{{ asset('boxsteps/js/select2/select2-locale-es.js') }}"></script>
@endsection
