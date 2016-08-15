<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Boxsteps" />
        <meta name="author" content="Boxsteps" />
        <link rel="shortcut icon" type="image/x-icon" href="assets/images/boxsteps/favicon.ico"  />

        <title>Boxsteps</title>

        <link rel="stylesheet" href="assets/css/fonts.css">
        <link rel="stylesheet" href="assets/css/fonts/linecons/css/linecons.css">
        <link rel="stylesheet" href="assets/css/fonts/fontawesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/xenon-core.css">
        <link rel="stylesheet" href="assets/css/xenon-forms.css">
        <link rel="stylesheet" href="assets/css/xenon-components.css">
        <link rel="stylesheet" href="assets/css/xenon-skins.css">
        <link rel="stylesheet" href="assets/css/custom.css">

        <script src="assets/js/jquery-1.11.1.min.js"></script>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="page-body">

        <nav class="navbar horizontal-menu navbar-fixed-top">

    		<div class="navbar-inner">

    			<!-- Navbar Brand -->
    			<div class="navbar-brand">
    				<a href="#" class="logo">
    					<img src="assets/images/boxsteps/boxsteps-logo.png" width="120" alt="" class="hidden-xs" />
    					<img src="assets/images/boxsteps/boxsteps-logo-dark.png" width="120" alt="" class="visible-xs" />
    				</a>
    			</div>
                <!-- Navbar Brand -->

    			<!-- Mobile Toggles Links -->
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
                <!-- Mobile Toggles Links -->

    			<!-- Main menu -->
    			<ul class="navbar-nav">
    				<li>
    					<a href="#">
    						<i class="linecons-pencil"></i>
    						<span class="title">Planificación</span>
    					</a>
    				</li>
                    <li>
    					<a href="#">
    						<i class="fa fa-check-square-o"></i>
    						<span class="title">Evaluación</span>
    					</a>
    				</li>
                    <li>
    					<a href="#">
    						<i class="fa-bar-chart-o"></i>
    						<span class="title">Estadísticas</span>
    					</a>
    				</li>
    			</ul>
                <!-- Main menu -->

    			<!-- Notifications - Messages - Profile -->
    			<ul class="nav nav-userinfo navbar-right">

    				<li class="dropdown xs-left">

    					<a href="#" data-toggle="dropdown" class="notification-icon">
    						<i class="fa-envelope-o"></i>
    					</a>

    					<ul class="dropdown-menu messages">
                            <li>
        						<ul class="dropdown-menu-list list-unstyled ps-scrollbar">
        							<li class="active">
        								<a href="#">
        									<span class="line">
        										<strong>Luc Chartier</strong>
        										<span class="light small">- yesterday</span>
        									</span>

        									<span class="line desc small">
        										This ain’t our first item, it is the best of the rest.
        									</span>
        								</a>
        							</li>
        							<li>
        								<a href="#">
        									<span class="line">
        										Hayden Cartwright
        										<span class="light small">- a week ago</span>
        									</span>

        									<span class="line desc small">
        										Whose her enjoy chief new young. Felicity if ye required likewise so doubtful.
        									</span>
        								</a>
        							</li>
        						</ul>
    					    </li>
        					<li class="external">
        						<a href="mailbox-main.html">
        							<span>Todos los mensajes</span>
        							<i class="fa-link-ext"></i>
        						</a>
        					</li>
    					</ul>

    				</li>

    				<li class="dropdown xs-left">

    					<a href="#" data-toggle="dropdown" class="notification-icon notification-icon-messages">
    						<i class="fa-bell-o"></i>
    					</a>

    					<ul class="dropdown-menu notifications">

        					<li class="top">
        						<p class="small">
        							<a href="#" class="pull-right">Marcar como leídas</a>
        							Tienes <strong>6</strong> nuevas notificaciones.
        						</p>
        					</li>

        					<li>
        						<ul class="dropdown-menu-list list-unstyled ps-scrollbar">
        							<li class="active notification-success">
        								<a href="#">
        									<i class="fa-user"></i>

        									<span class="line">
        										<strong>Nuevo usuario registrados</strong>
        									</span>

        									<span class="line small time">
        										Hace 30 segundos
        									</span>
        								</a>
        							</li>
        							<li class="active notification-secondary">
        								<a href="#">
        									<i class="fa-lock"></i>

        									<span class="line">
        										<strong>Las opciones de privacidad han cambiado</strong>
        									</span>

        									<span class="line small time">
        										Hace 3 horas
        									</span>
        								</a>
        							</li>
        							<li class="notification-primary">
        								<a href="#">
        									<i class="fa-thumbs-up"></i>

        									<span class="line">
        										<strong>Aprobación de planificación</strong>
        									</span>

        									<span class="line small time">
        										Hace 2 minutos
        									</span>
        								</a>
        							</li>
        							<li class="notification-danger">
        								<a href="#">
        									<i class="fa-calendar"></i>

        									<span class="line">
        										El evento previsto fue cancelado
        									</span>

        									<span class="line small time">
        										Hace 9 horas
        									</span>
        								</a>
        							</li>
        							<li class="notification-info">
        								<a href="#">
        									<i class="fa-database"></i>

        									<span class="line">
        										Servidor estable
        									</span>

        									<span class="line small time">
        										Ayer a las 10:30 PM
        									</span>
        								</a>
        							</li>
        							<li class="notification-warning">
        								<a href="#">
        									<i class="fa-envelope-o"></i>

        									<span class="line">
        										Planificación esperando aprobación
        									</span>

        									<span class="line small time">
        										Hace 1 semana
        									</span>
        								</a>
        							</li>
        						</ul>
        					</li>

        					<li class="external">
        						<a href="#">
        							<span>Todas las notificaciones</span>
        							<i class="fa-link-ext"></i>
        						</a>
        					</li>

    					</ul>

    				</li>

    				<li class="dropdown user-profile">

    					<a href="#" data-toggle="dropdown">
    						<img src="assets/images/user-1.png" alt="user-image" class="img-circle img-inline userpic-32" width="28" />
    						<span>
    							Wolfgang Dielingen
    							<i class="fa-angle-down"></i>
    						</span>
    					</a>

    					<ul class="dropdown-menu user-profile-menu list-unstyled">
    						<li>
    							<a href="#">
    								<i class="fa-user"></i>
    								Perfil
    							</a>
    						</li>
                            <li>
    							<a href="#">
    								<i class="fa-wrench"></i>
    								Configuración
    							</a>
    						</li>
    						<li class="last">
    							<a href="#">
    								<i class="fa-lock"></i>
    								Salir
    							</a>
    						</li>
    					</ul>

    				</li>

    			</ul>
                <!-- Notifications - Messages - Profile -->

    		</div>

    	</nav>

        <!-- Xenon & Bootstrap core scripts -->
    	<script src="assets/js/bootstrap.min.js"></script>
    	<script src="assets/js/tweenmax.min.js"></script>
    	<script src="assets/js/resizeable.js"></script>
    	<script src="assets/js/joinable.js"></script>
    	<script src="assets/js/xenon-api.js"></script>
    	<script src="assets/js/xenon-toggles.js"></script>

    	<!-- Xenon custom scripts -->
    	<script src="assets/js/xenon-custom.js"></script>

    </body>
</html>
