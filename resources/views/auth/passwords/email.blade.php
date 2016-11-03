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
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <!-- Errors container -->

    <form method="post" role="form" id="login" class="login-form fade-in-effect" action="{{ url('/password/email') }}">
        {{ csrf_field() }}

        <div class="login-header">
            <a href="{{ url('/') }}" class="logo">
                <img src="{{ asset('boxsteps/images/brand/boxsteps-logo-dark.png') }}" width="250" alt="@lang('globals.boxsteps')" /><br>
                <span>@lang('passwords.title')</span>
            </a>

            <p>@lang('passwords.welcome')</p>
        </div>

        <div class="form-group">
            <label class="control-label" for="email">@lang('login.email')</label>
            <input type="text" class="form-control input-dark {{ $errors->has('email') ? ' error' : '' }}" name="email" id="email" autocomplete="off" value="{{ old('email') }}" />
            @if ($errors->has('email'))
                <label id="email-error" class="error" for="email">{{ $errors->first('email') }}</label>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-dark  btn-block text-left">
                <i class="fa fa-btn fa-envelope"></i>
                @lang('passwords.send')
            </button>
        </div>

    </form>

@endsection

@section('custom-js-footer')
@endsection
