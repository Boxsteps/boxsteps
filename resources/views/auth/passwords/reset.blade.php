@extends('layouts.bit')

@section('title')
    @lang('passwords.title')
@endsection

@section('custom-css')
@endsection

@section('custom-js-header')
@endsection

@section('content')

    <script type="text/javascript">
        jQuery(document).ready(function($)
        {
            /* Login form display */
            setTimeout(function(){ $(".fade-in-effect").addClass('in'); }, 1);

            /* Set form focus */
            $("form#login .form-group:has(.form-control):first .form-control").focus();
        });
    </script>

    <!-- Errors container -->
    <div class="errors-container">
    </div>
    <!-- Errors container -->

    <form method="post" role="form" id="login" class="login-form fade-in-effect" action="{{ url('/password/reset') }}">
        {{ csrf_field() }}

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="login-header">
            <a href="{{ url('/') }}" class="logo">
                <img src="{{ asset('boxsteps/images/brand/boxsteps-logo-dark.png') }}" width="250" alt="@lang('globals.boxsteps')" /><br>
                <span>@lang('passwords.title')</span>
            </a>

            <p>@lang('passwords.welcome')</p>
        </div>

        <div class="form-group">
            <label class="control-label" for="email">@lang('login.email')</label>
            <input type="text" class="form-control input-dark {{ $errors->has('email') ? ' error' : '' }}" name="email" id="email" autocomplete="off" value="{{ $email or old('email') }}" />
            @if ($errors->has('email'))
                <label id="email-error" class="error" for="email">{{ $errors->first('email') }}</label>
            @endif
        </div>

        <div class="form-group">
            <label class="control-label" for="password">@lang('login.password')</label>
            <input type="password" class="form-control input-dark {{ $errors->has('password') ? ' error' : '' }}" name="password" id="password" autocomplete="off" />
            @if ($errors->has('password'))
                <label id="password-error" class="error" for="password">{{ $errors->first('password') }}</label>
            @endif
        </div>

        <div class="form-group">
            <label class="control-label" for="password-confirm">@lang('login.password-confirm')</label>
            <input type="password" class="form-control input-dark {{ $errors->has('password_confirmation') ? ' error' : '' }}" name="password_confirmation" id="password-confirm" autocomplete="off" />
            @if ($errors->has('password_confirmation'))
                <label id="password-confirm-error" class="error" for="password-confirm">{{ $errors->first('password_confirmation') }}</label>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-dark  btn-block text-left">
                <i class="fa fa-btn fa-refresh"></i>
                @lang('passwords.send')
            </button>
        </div>

    </form>

@endsection

@section('custom-js-footer')
@endsection
