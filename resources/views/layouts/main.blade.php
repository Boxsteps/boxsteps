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
        <link rel="stylesheet" href="{{ asset('boxsteps/css/bootstrap/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('boxsteps/css/xenon/xenon-core.css') }}">
        <link rel="stylesheet" href="{{ asset('boxsteps/css/xenon/xenon-forms.css') }}">
        <link rel="stylesheet" href="{{ asset('boxsteps/css/xenon/xenon-components.css') }}">
        <link rel="stylesheet" href="{{ asset('boxsteps/css/xenon/xenon-skins.css') }}">
        <link rel="stylesheet" href="{{ asset('boxsteps/css/xenon/xenon-custom.css') }}">
        <!-- Main CSS -->

        <!-- Custom CSS -->
        @yield('custom-css')
        <!-- Custom CSS -->

        <!-- jQuery -->
        <script src="{{ asset('boxsteps/js/jquery/jquery-1.11.1.min.js') }}"></script>
        <!-- jQuery -->

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
    <body class="page-body">

        <nav class="navbar horizontal-menu navbar-fixed-top">

    		<div class="navbar-inner">

    			<!-- Navbar brand -->
    			<div class="navbar-brand">
    				<a href="{{ url('/dashboard') }}" class="logo">
    					<img src="{{ asset('boxsteps/images/brand/boxsteps-logo.png') }}" width="120" alt="@lang('globals.boxsteps')" class="hidden-xs" />
    					<img src="{{ asset('boxsteps/images/brand/boxsteps-logo-dark.png') }}" width="120" alt="@lang('globals.boxsteps')" class="visible-xs" />
    				</a>
    			</div>
                <!-- Navbar brand -->

    			<!-- Mobile toggles links -->
    			<div class="nav navbar-mobile">
    				<div class="mobile-menu-toggle">
    					<a href="#" data-toggle="user-info-menu-horizontal">
    						<i class="fa-bell-o"></i>
    					</a>
    					<a href="#" data-toggle="mobile-menu-horizontal">
    						<i class="fa-bars"></i>
    					</a>
    				</div>
    			</div>
    			<div class="navbar-mobile-clear"></div>
                <!-- Mobile toggles links -->

    			<!-- Main menu -->
                @include('partials.menu')
                <!-- Main menu -->

    			<!-- Notifications - Messages - Profile -->
    			<ul class="nav nav-userinfo navbar-right">

    				@include('partials.messages')

    				@include('partials.notifications')

    				@include('partials.options')

    			</ul>
                <!-- Notifications - Messages - Profile -->

    		</div>

    	</nav>

        <!-- Page container -->
        <div class="page-container">

            <!-- Main container -->
            <div class="main-content">

                @yield('messages')

                @yield('content')

                <!-- Footer section -->
                <footer class="main-footer sticky footer-type-1">
    				<div class="footer-inner">
    					<div class="footer-text">
    						&copy; @lang('globals.year')
    						<strong><a href="{{ url('/dashboard') }}">@lang('globals.boxsteps')</a></strong>
                            <br>@lang('globals.rights')
    					</div>
    					<div class="go-up">
    						<a href="#" rel="go-top">
    							<i class="fa-angle-up"></i>
    						</a>
    					</div>
    				</div>
    			</footer>
                <!-- Footer section -->

            </div>
            <!-- Main container -->

        </div>
        <!-- Page container -->

        <!-- Xenon & Bootstrap core scripts -->
    	<script src="{{ asset('boxsteps/js/bootstrap/bootstrap.min.js') }}"></script>
    	<script src="{{ asset('boxsteps/js/xenon/tweenmax.min.js') }}"></script>
    	<script src="{{ asset('boxsteps/js/xenon/resizeable.js') }}"></script>
    	<script src="{{ asset('boxsteps/js/xenon/joinable.js') }}"></script>
    	<script src="{{ asset('boxsteps/js/xenon/xenon-api.js') }}"></script>
    	<script src="{{ asset('boxsteps/js/xenon/xenon-toggles.js') }}"></script>
        <script src="{{ asset('boxsteps/js/xenon/moment.min.js') }}"></script>
        <!-- Xenon & Bootstrap core scripts -->

        <!-- Custom JS -->
        @yield('custom-js-footer')
        <!-- Custom JS -->

    	<!-- Xenon custom scripts -->
    	<script src="{{ asset('boxsteps/js/xenon/xenon-custom.js') }}"></script>
        <!-- Xenon custom scripts -->

    </body>
    <!-- Page body -->
</html>
