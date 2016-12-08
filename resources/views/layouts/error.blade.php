<!DOCTYPE html>
<html lang="@lang('globals.language')">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="@lang('globals.boxsteps')">
        <meta name="author" content="@lang('globals.boxsteps')">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('boxsteps/images/brand/favicon-gray.ico') }}">

        <title>
            @lang('globals.boxsteps')
            @lang('globals.separator')
            @yield('title')
        </title>

        <!-- Main CSS -->
        <link rel="stylesheet" href="{{ asset('boxsteps/css/fonts.css') }}">
        <link rel="stylesheet" href="{{ asset('boxsteps/css/xenon/xenon-errors.css') }}">
        <!-- Main CSS -->
    </head>

    <body>
        <div class="container">
            <div class="content">
                <img class="image" src="{{ asset('boxsteps/images/brand/logo-redux-transparent.png') }}" alt="@lang('globals.boxsteps')" />
                @yield('content')
            </div>
        </div>
    </body>

</html>
