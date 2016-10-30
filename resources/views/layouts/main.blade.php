<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Boxsteps">
        <meta name="author" content="Boxsteps">
        <link rel="shortcut icon" type="image/x-icon" href="assets/images/boxsteps/favicon.ico">

        <title>@lang('messages.boxsteps') @lang('messages.separator') @yield('title')</title>

        <!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/fonts.css">
        <link rel="stylesheet" href="assets/css/fonts/linecons/css/linecons.css">
        <link rel="stylesheet" href="assets/css/fonts/fontawesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/xenon-core.css">
        <link rel="stylesheet" href="assets/css/xenon-forms.css">
        <link rel="stylesheet" href="assets/css/xenon-components.css">
        <link rel="stylesheet" href="assets/css/xenon-skins.css">
        <link rel="stylesheet" href="assets/css/custom.css">
        <!-- Main CSS -->

        <!-- Custom CSS -->
        @yield('custom-css')
        <!-- Custom CSS -->

        <!-- jQuery -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
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
    					<img src="assets/images/boxsteps/boxsteps-logo.png" width="120" alt="" class="hidden-xs" />
    					<img src="assets/images/boxsteps/boxsteps-logo-dark.png" width="120" alt="" class="visible-xs" />
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

                @yield('breadcrumbs')

                @yield('content')

                <!-- Footer section -->
                <footer class="main-footer footer-type-1">
    				<div class="footer-inner">
    					<div class="footer-text">
    						&copy; 2016
    						<strong><a href="{{ url('/dashboard') }}">Boxsteps</a></strong>
                            <br>Todos los derechos reservados.
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
    	<script src="assets/js/bootstrap.min.js"></script>
    	<script src="assets/js/tweenmax.min.js"></script>
    	<script src="assets/js/resizeable.js"></script>
    	<script src="assets/js/joinable.js"></script>
    	<script src="assets/js/xenon-api.js"></script>
    	<script src="assets/js/xenon-toggles.js"></script>
        <script src="assets/js/moment.min.js"></script>
        <!-- Xenon & Bootstrap core scripts -->

        <!-- Custom JS -->
        @yield('custom-js-footer')
        <!-- Custom JS -->

    	<!-- Xenon custom scripts -->
    	<script src="assets/js/xenon-custom.js"></script>
        <!-- Xenon custom scripts -->

    </body>
    <!-- Page body -->
</html>
