@extends('layouts.main')

@section('title')
    @lang('user.edit.title')
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
                <div class="panel-heading">@lang('user.edit.title')</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/users/' . $user->id) }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="_method" value="PUT">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">@lang('user.edit.name')</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('second_name') ? ' has-error' : '' }}">
                            <label for="second_name" class="col-md-4 control-label">@lang('user.edit.second.name')</label>

                            <div class="col-md-6">
                                <input id="second-name" type="text" class="form-control" name="second_name" value="{{ $user->second_name }}">

                                @if ($errors->has('second_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('second_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">@lang('user.edit.email')</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" disabled="disabled">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">@lang('user.edit.password')</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" value="{{ $user->password }}">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">@lang('user.edit.confirm')</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{ $user->password }}">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                            <label for="role" class="col-md-4 control-label">@lang('user.edit.role')</label>

                            <div class="col-md-6">
                                <select id="role" type="role" class="form-control" name="role">
                                    <option value="">Ninguno</option>
                                    @foreach ($roles as $role)
                                        <option {{ ( $user->role_id == $role->id ? 'selected="selected"' : '' ) }} value="{{$role->id}}">{{$role->role}}</option>
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
                            <label for="coordinator" class="col-md-4 control-label">@lang('user.edit.coordinator')</label>

                            <div class="col-md-6">
                                <select id="coordinator" type="coordinator" class="form-control" name="coordinator" {{ ( $user->role_id == '3' ? '' : 'disabled="disabled"' ) }}>
                                    <option value="">Ninguno</option>
                                    @foreach ($coordinators as $coordinator)
                                        <option {{ ( $user->user_id == $coordinator->id ? 'selected="selected"' : '' ) }} value="{{$coordinator->id}}">{{$coordinator->name}} {{$coordinator->second_name}}</option>
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
                                    <i class="fa fa-btn fa-user"></i>
                                    <span>@lang('user.edit.register')</span>
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
