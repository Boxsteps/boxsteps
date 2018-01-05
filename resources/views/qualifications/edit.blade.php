@extends('layouts.main')

@section('title')
    @lang('qualification.edit.title')
@endsection

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('boxsteps/css/xenon/xenon-print.css') }}">
@endsection

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
                <form class="form-horizontal" role="form" method="POST" action="{{ url( '/evaluations/' . $evaluation->id . '/qualifications/' . $student->id ) }}">
					{{ csrf_field() }}

                    <input type="hidden" name="_method" value="PUT">

					<div class="panel-heading">
						<h3 class="panel-title">@lang('qualification.edit.details')</h3>
					</div>

					<div class="panel-body">

						<div class="panel-body col-sm-6">

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="course">@lang('qualification.edit.name')</label>

                                <div class="col-sm-8">
                                    <input type="text" disabled="disabled" class="form-control" id="name" value="{{ $student->name }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="course">@lang('qualification.edit.dni')</label>

                                <div class="col-sm-8">
                                    <input type="text" disabled="disabled" class="form-control" id="dni" value="{{ $student->dni }}">
                                </div>
                            </div>

						</div>

						<div class="panel-body col-sm-6">

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="course">@lang('qualification.edit.second-name')</label>

                                <div class="col-sm-8">
                                    <input type="text" disabled="disabled" class="form-control" id="second_name" value="{{ $student->second_name }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="course">@lang('qualification.edit.email')</label>

                                <div class="col-sm-8">
                                    <input type="text" disabled="disabled" class="form-control" id="email" value="{{ $student->email }}">
                                </div>
                            </div>

						</div>
					</div>

                    <br><br><br>

                    <div class="panel-heading">
						<h3 class="panel-title">@lang('qualification.edit.title')</h3>
					</div>

					<div class="panel-body">

						<div class="panel-body col-sm-6">

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="course">@lang('qualification.edit.evaluation-type')</label>

                                <div class="col-sm-8">
                                    <blockquote class="blockquote blockquote-default">
                                        <p>
                                            {{ $evaluation_type->name }}<br>
                                            {{ $evaluation_type->evaluation_type }}<br>
                                            @lang('qualification.edit.maximum-qualification') {{ $evaluation_type->maximum_qualification }} @lang('qualification.edit.points')<br>
                                            @lang('qualification.edit.minimum-qualification') {{ $evaluation_type->minimum_qualification }} @lang('qualification.edit.points')<br>
                                            @lang('qualification.edit.approved-qualification') {{ $evaluation_type->approved_qualification }} @lang('qualification.edit.points')
                                        </p>
                                    </blockquote>
                                </div>
                            </div>

                            @if ( $evaluation_scales_count > 0 )
                                <div class="form-group">
                                    <label class="col-sm-4 control-label" for="course">@lang('qualification.edit.evaluation-scale')</label>

                                    <div class="col-sm-8">
                                        <blockquote class="blockquote blockquote-default">
                                            <p>
                                                @foreach ($evaluation_scales as $notation)
                                                    {{ $notation->notation }} ( {{ $notation->maximum_equivalent }} .. {{ $notation->minimum_equivalent }} @lang('qualification.edit.points') )<br>
                                                @endforeach
                                            </p>
                                        </blockquote>
                                    </div>
                                </div>
                            @endif

						</div>

						<div class="panel-body col-sm-6">

                            <input type="hidden" name="maximum_qualification" value="{{ $evaluation_type->maximum_qualification }}">

                            <input type="hidden" name="minimum_qualification" value="{{ $evaluation_type->minimum_qualification }}">

                            <div class="form-group {{ $errors->has('qualification') ? ' has-error' : '' }}">
								<label class="col-sm-4 control-label">@lang('qualification.edit.qualification')</label>
								<div class="col-sm-8">
                                    <div class="input-group">
										<input name="qualification" id="qualification" type="text" class="form-control" value="{{ $student->pivot->qualification }}">
										<div class="input-group-addon">
											<i class="linecons-pencil"></i>
										</div>
									</div>
									@if ($errors->has('qualification'))
										<span class="help-block">
											<strong>{{ $errors->first('qualification') }}</strong>
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
								<span>@lang('qualification.edit.register')</span>
							</button>
						</div>
					</div>

				</form>
            </div>
        </div>
    </div>

@endsection
