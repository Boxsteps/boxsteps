@extends('layouts.main')

@section('title')
    @lang('user.create.title')
@endsection

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('user.create.title')</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/users/store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">@lang('user.create.name')</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('second_name') ? ' has-error' : '' }}">
                            <label for="second_name" class="col-md-4 control-label">@lang('user.create.second.name')</label>

                            <div class="col-md-6">
                                <input id="second_name" type="text" class="form-control" name="second_name" value="{{ old('second_name') }}">

                                @if ($errors->has('second_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('second_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">@lang('user.create.email')</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">@lang('user.create.password')</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">@lang('user.create.confirm')</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                            <label for="role" class="col-md-4 control-label">@lang('user.create.role')</label>

                            <div class="col-md-6">
                                <select id="role" type="role" class="form-control" name="role">
                                    <option value="">@lang('globals.value.null')</option>
                                    @foreach ($roles as $role)
                                        <option value="{{$role->id}}">{{$role->role}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('role'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('coordinator') ? ' has-error' : '' }}">
                            <label for="coordinator" class="col-md-4 control-label">@lang('user.create.coordinator')</label>

                            <div class="col-md-6">
                                <select id="coordinator" type="coordinator" class="form-control" name="coordinator" disabled="disabled">
                                    <option value="">@lang('globals.value.null')</option>
                                    @foreach ($coordinators as $coordinator)
                                        <option value="{{$coordinator->id}}">{{$coordinator->name}} {{$coordinator->second_name}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('coordinator'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('coordinator') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-icon btn-icon-standalone">
                                    <i class="fa-user"></i>
                                    <span>@lang('user.create.register')</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('custom-js-footer')
    <script type="text/javascript">
        $(document).ready(function() {

            $('#role').change(function() {
                if ( $(this).val() == '3' ) {
                    $('#coordinator').removeAttr('disabled');
                }
                else {
                    $('#coordinator').attr('disabled', 'disabled');
                    $('#coordinator').prop("selectedIndex", 0);
                }
            });

        });
    </script>
@endsection
