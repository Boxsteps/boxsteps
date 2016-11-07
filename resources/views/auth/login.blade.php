@extends('layouts.bit')

@section('title')
    @lang('login.title')
@endsection

@section('custom-css')
@endsection

@section('custom-js-header')
    <script type="text/javascript">
        jQuery(document).ready(function($)
        {
            /* Login form display */
            setTimeout(function(){ $(".fade-in-effect").addClass('in'); }, 1);

            /* Set form focus */
            $("form#login .form-group:has(.form-control):first .form-control").focus();
        });
    </script>
@endsection

@section('content')

    <!-- Errors container -->
    <div class="errors-container">
    </div>
    <!-- Errors container -->

    <form method="post" role="form" id="login" class="login-form fade-in-effect" action="{{ url('/login') }}">
        {{ csrf_field() }}

        <div class="login-header">
            <a href="{{ url('/') }}" class="logo">
                <img src="{{ asset('boxsteps/images/brand/boxsteps-logo-dark.png') }}" width="250" alt="@lang('globals.boxsteps')" /><br>
                <span>@lang('login.title')</span>
            </a>

            <p>@lang('login.welcome')</p>
        </div>

        <div class="form-group">
            <label class="control-label" for="email">@lang('login.email')</label>
            <input type="text" class="form-control input-dark {{ $errors->has('email') ? ' error' : '' }}" name="email" id="email" autocomplete="off" value="{{ old('email') }}" />
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
            <div class="form-block">
                <label for="remember" style="cursor: pointer;">
                    <input type="checkbox" class="cbr form-control" name="remember" id="remember">
                    @lang('login.remember')
                </label>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-dark  btn-block text-left">
                <i class="fa-lock"></i>
                @lang('login.login')
            </button>
        </div>

        <div class="login-footer">
            <a href="{{ url('/password/reset') }}">@lang('login.forgot')</a>

            <div class="info-links">
                <a href="#">@lang('login.policy')</a>
            </div>

        </div>

    </form>

    <!-- External login -->
    <div class="external-login">
        <a href="" class="gplus">
            <i class="fa-google-plus"></i>
            @lang('login.google-plus')
        </a>
    </div>
    <!-- External login -->

@endsection
