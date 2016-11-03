<!DOCTYPE html>

<!-- Cordova - A Multipurpose Landing Page Template, designed by David Rozando (http://bootultra.com) -->
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->

<html lang="@lang('globals.language')"><!--<![endif]-->

	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />

		<meta name="description" content="@lang('globals.description')" />
        <meta name="author" content="@lang('globals.boxsteps')">
		<meta name="keywords" content="@lang('globals.keywords')" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('boxsteps/images/brand/favicon.ico') }}">

        <title>@lang('globals.boxsteps')</title>

		<!-- Main CSS -->
		<link rel="stylesheet" type="text/css" href="{{ asset('boxsteps/start/bootstrap/css/bootstrap.min.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('boxsteps/start/css/style.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('boxsteps/start/css/font-awesome.min.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('boxsteps/start/css/ionicons.min.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('boxsteps/start/css/portfolio.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('boxsteps/start/css/animate.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('boxsteps/start/css/preloader.css') }}" />
        <!-- Main CSS -->

		<script src="{{ asset('boxsteps/start/js/modernizr.custom.min.js') }}"></script>

		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-80893712-1', 'auto');
			ga('send', 'pageview');
		</script>

	</head>

	<body data-spy="scroll" data-target=".sidebar">

		<div id="loader-wrapper">

			<div id="loader"></div>

			<div class="loader-section section-left"></div>
			<div class="loader-section section-right"></div>

		</div>

		<header id="home-section" class="home home-apps">

			<div class="intro">

				<div class="container">

					<div class="row">

						<div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12 text-center">

							<div class="text-center">

								<div class="intro-title wow fadeInDown" data-wow-delay="0ms" data-wow-duration="3000ms">
									<img src="{{ asset('boxsteps/start/images/logo/logo-dark.png') }}" width="65%" class="img-responsive" alt="Boxsteps"/>
								</div>

							</div>

							<div class="intro-heading text-center">

								<p class="intro-tagline wow fadeInDown" data-wow-delay="500ms" data-wow-duration="1000ms">@lang('globals.description')</p>

							</div>


							<a id="begin" href="{{ url('/login') }}" class="btn btn-success btn-lg col-md-2 col-md-offset-5">@lang('globals.start')</a>

						</div>

					</div>

				</div>

			</div>

		</header>

		<script type="text/javascript" src="{{ asset('boxsteps/start/js/jquery-1.11.1.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('boxsteps/start/bootstrap/js/bootstrap.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('boxsteps/start/js/jquery.stellar.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('boxsteps/start/js/jquery.waypoints.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('boxsteps/start/js/jquery.counterup.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('boxsteps/start/js/wow.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('boxsteps/start/js/jquery.backstretch.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('boxsteps/start/js/respond.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('boxsteps/start/js/jquery.fitvids.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('boxsteps/start/js/classie.js') }}"></script>
		<script type="text/javascript" src="{{ asset('boxsteps/start/js/custom-script.js') }}"></script>

        <script type="text/javascript">
        $(document).ready(function() {

            $.backstretch([
                    "{{ asset('boxsteps/start/images/background-slideshow/slide-1.jpg') }}",
                    "{{ asset('boxsteps/start/images/background-slideshow/slide-2.jpg') }}",
                    "{{ asset('boxsteps/start/images/background-slideshow/slide-3.jpg') }}"
                ], {
                    fade: 3000,
                    duration: 5000
                }
            );

            $( "#begin" ).click(function() {
				var location = '{{ url('/login') }}';
                window.location.replace(location);
            });

        });

        </script>

	</body>

</html>
