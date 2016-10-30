<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Boxsteps">
        <meta name="author" content="Boxsteps">
        <link rel="shortcut icon" type="image/x-icon" href="assets/images/boxsteps/favicon.ico">

        <title>@lang('messages.boxsteps') @lang('messages.separator') @lang('messages.title-login')</title>

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

        <!-- jQuery -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <!-- jQuery -->

        <!-- Xenon & Bootstrap core scripts -->
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/tweenmax.min.js"></script>
        <script src="assets/js/resizeable.js"></script>
        <script src="assets/js/joinable.js"></script>
        <script src="assets/js/xenon-api.js"></script>
        <script src="assets/js/xenon-toggles.js"></script>
        <script src="assets/js/jquery-validate/jquery.validate.min.js"></script>
    	<script src="assets/js/toastr/toastr.min.js"></script>
        <!-- Xenon & Bootstrap core scripts -->

        <!-- Xenon custom scripts -->
        <script src="assets/js/xenon-custom.js"></script>
        <!-- Xenon custom scripts -->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body class="page-body login-page">

    	<div class="login-container">

    		<div class="row">

    			<div class="col-sm-6">

    				<script type="text/javascript">
    					jQuery(document).ready(function($)
    					{
    						/* Login form display */
    						setTimeout(function(){ $(".fade-in-effect").addClass('in'); }, 1);

    						/* Validation */
    						$("form#login").validate({
    							rules: {
    								email: {
    									required: true
    								},

    								password: {
    									required: true
    								}
    							},

    							messages: {
    								email: {
    									required: '@lang('validation.email-async')'
    								},

    								password: {
    									required: '@lang('validation.password-async')'
    								}
    							}
    						});

    						/* Set form focus */
    						$("form#login .form-group:has(.form-control):first .form-control").focus();
    					});
    				</script>

    				<!-- Errors container -->
    				<div class="errors-container">
    				</div>
                    <!-- Errors container -->

    				<form method="post" role="form" id="login" class="login-form fade-in-effect" action="{{ url('/login') }}">
                        {{ csrf_field() }}

    					<div class="login-header">
    						<a href="{{ url('/') }}" class="logo">
    							<img src="assets/images/boxsteps/boxsteps-logo-dark.png" width="250" alt="@lang('messages.boxsteps')" /><br>
    							<span>@lang('messages.title-login')</span>
    						</a>

    						<p>@lang('messages.welcome-login')</p>
    					</div>

    					<div class="form-group">
    						<label class="control-label" for="email">@lang('messages.email')</label>
    						<input type="text" class="form-control input-dark {{ $errors->has('email') ? ' error' : '' }}" name="email" id="email" autocomplete="off" value="{{ old('email') }}" />
                            @if ($errors->has('email'))
                                <label id="email-error" class="error" for="email">{{ $errors->first('email') }}</label>
                            @endif
    					</div>

    					<div class="form-group">
    						<label class="control-label" for="password">@lang('messages.password')</label>
    						<input type="password" class="form-control input-dark {{ $errors->has('password') ? ' error' : '' }}" name="password" id="password" autocomplete="off" />
                            @if ($errors->has('password'))
                                <label id="password-error" class="error" for="password">{{ $errors->first('password') }}</label>
                            @endif
    					</div>

                        <div class="form-group">
                            <div class="form-block">
                                <label for="remember">
                                    <input type="checkbox" class="cbr form-control" name="remember" id="remember">
                                    @lang('messages.remember')
                                </label>
                            </div>
						</div>

    					<div class="form-group">
    						<button type="submit" class="btn btn-dark  btn-block text-left">
    							<i class="fa-lock"></i>
    							@lang('messages.login')
    						</button>
    					</div>

    					<div class="login-footer">
    						<a href="{{ url('/password/reset') }}">@lang('messages.forgot')</a>

    						<div class="info-links">
    							<a href="#">@lang('messages.policy')</a>
    						</div>

    					</div>

    				</form>

    				<!-- External login -->
    				<div class="external-login">
    					<a href="#" class="gplus">
    						<i class="fa-google-plus"></i>
    						@lang('messages.google-plus')
    					</a>
    				</div>
                    <!-- External login -->

    			</div>

    		</div>

    	</div>



    </body>
</html>
