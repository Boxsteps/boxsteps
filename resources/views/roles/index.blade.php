@extends('layouts.main')

@section('title')
    @lang('role.index.title')
@endsection

@section('custom-css')
	<link rel="stylesheet" href="{{ asset('boxsteps/js/select2/select2.css') }}">
	<link rel="stylesheet" href="{{ asset('boxsteps/js/select2/select2-bootstrap.css') }}">
@stop

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('role.index.title')</div>
                <div class="panel-body">
                    <form id="roles" class="form-horizontal" role="form" method="POST" action="{{ url('/roles/') }}">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('role') ? ' has-error' : '' }}">
                            <label class="col-sm-4 control-label">@lang('role.index.name')</label>
                            <div class="col-sm-8">
                                <div class="input-group col-xs-12 col-sm-12">
                                    <select class="form-control" name="role" id="role">
                                        <option value="">@lang('globals.value.null')</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->role }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->has('role'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary btn-icon btn-icon-standalone">
                                <i class="fa fa-search"></i>
                                <span>@lang('role.index.search')</span>
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

            $('#role').select2({
				placeholder: '@lang('plan.create.course')',
				language: "es",
				allowClear: true
			}).on('select2-open', function()
			{
				$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
			});

            $('#roles').submit(function(event) {
                event.preventDefault();
                var formAction = $(this).attr('action');
                window.location.href = formAction + '/' + $('#roles #role').val();
            });

        });
    </script>

    <script src="{{ asset('boxsteps/js/select2/select2.min.js') }}"></script>
	<script src="{{ asset('boxsteps/js/select2/select2-locale-es.js') }}"></script>
@endsection
