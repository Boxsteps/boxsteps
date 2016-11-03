<!DOCTYPE html>
<html lang="@lang('globals.language')">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="@lang('globals.boxsteps')">
        <meta name="author" content="@lang('globals.boxsteps')">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('boxsteps/images/brand/favicon.ico') }}">

        <title>
            @lang('globals.boxsteps')
            @lang('globals.separator')
            @yield('title')
        </title>

        <!-- Main CSS -->
        <link rel="stylesheet" href="{{ asset('boxsteps/css/fonts.css') }}">
        <link rel="stylesheet" href="{{ asset('boxsteps/css/fonts/linecons/css/linecons.css') }}">
        <link rel="stylesheet" href="{{ asset('boxsteps/css/fonts/fontawesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('boxsteps/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('boxsteps/css/xenon-core.css') }}">
        <link rel="stylesheet" href="{{ asset('boxsteps/css/xenon-forms.css') }}">
        <link rel="stylesheet" href="{{ asset('boxsteps/css/xenon-components.css') }}">
        <link rel="stylesheet" href="{{ asset('boxsteps/css/xenon-skins.css') }}">
        <link rel="stylesheet" href="{{ asset('boxsteps/css/xenon-custom.css') }}">
        <!-- Main CSS -->

        <!-- Custom CSS -->
        @yield('custom-css')
        <!-- Custom CSS -->

        <!-- jQuery -->
        <script src="{{ asset('boxsteps/js/jquery-1.11.1.min.js') }}"></script>
        <!-- jQuery -->

        <!-- Xenon & Bootstrap core scripts -->
    	<script src="{{ asset('boxsteps/js/bootstrap.min.js') }}"></script>
    	<script src="{{ asset('boxsteps/js/tweenmax.min.js') }}"></script>
    	<script src="{{ asset('boxsteps/js/resizeable.js') }}"></script>
    	<script src="{{ asset('boxsteps/js/joinable.js') }}"></script>
    	<script src="{{ asset('boxsteps/js/xenon-api.js') }}"></script>
    	<script src="{{ asset('boxsteps/js/xenon-toggles.js') }}"></script>
        <script src="{{ asset('boxsteps/js/moment.min.js') }}"></script>
        <!-- Xenon & Bootstrap core scripts -->

        <!-- Xenon custom scripts -->
    	<script src="{{ asset('boxsteps/js/xenon-custom.js') }}"></script>
        <!-- Xenon custom scripts -->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Custom JS -->
        @yield('custom-js-header')
        <!-- Custom JS -->
    </head>

    <!-- Page body -->
    <body class="page-body login-page">

    	<div class="login-container">

    		<div class="row">

    			<div class="col-sm-6">

    				@yield('content')

    			</div>

    		</div>

    	</div>

        <!-- Custom JS -->
        @yield('custom-js-footer')
        <!-- Custom JS -->

    </body>
    <!-- Page body -->
</html>
