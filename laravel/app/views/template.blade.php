<!DOCTYPE html>
<html lang="es_VE">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Clasificados 360">
   	<meta name="description" content="Sitio web online para que puedas comprar o vender tus productos de manera sencilla y rápida...">

    <title>Clasificados 360 | Comprar y Vender en Venezuela</title>

   <!-- CSS -->
   	<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
   	<link href="{{asset('assets/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
   	<link href="{{asset('assets/css/icofont.css')}}" rel="stylesheet" type="text/css">
   	<link href="{{asset('assets/css/owl.carousel.css')}}" rel="stylesheet" type="text/css">
   	<link href="{{asset('assets/css/slidr.css')}}" rel="stylesheet" type="text/css">
   	<link href="{{asset('assets/css/main.css')}}" rel="stylesheet" type="text/css">
   	<link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet" type="text/css">
   	<link href="{{asset('assets/css/personalstyles.css')}}" rel="stylesheet" type="text/css">

	<!-- font -->
	<link href='https://fonts.googleapis.com/css?family=Ubuntu:400,500,700,300' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Signika+Negative:400,300,600,700' rel='stylesheet' type='text/css'>

	<!-- icons -->
	<link rel="icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="images/ico/apple-touch-icon-57-precomposed.png">
    <!-- icons -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Template Desarrollado por Aenfocus Marketing -->
  </head>
  <body>
	<!-- header -->
	@if(isset(Auth::user()->type) && Auth::user()->type==3 && Auth::user()->status==1)
		<header id="header" class="clearfix">
		<!-- navbar -->
		<nav class="navbar navbar-default">
			<div class="container">
				<!-- navbar-header -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="{{ URL::action('HomeController@home_seller') }}">
						{{ HTML::image('assets/images/nuevo-logo-2.png','Logo',array('class'=>'img-responsive')) }}
					</a>
				</div>
				<div class="navbar-left">
					<div class="collapse navbar-collapse" id="navbar-collapse">
						<ul class="nav navbar-nav">
							
							<li><a href="{{ URL::action('UsersController@profile_seller') }}">Perfil</a></li>
							<li><a href="delete-account.html">Cerrar Tu Cuenta</a></li>
							
						</ul>
					</div>
				</div>
				<!-- nav-right -->
				<div class="nav-right">
					<!-- language-dropdown -->

					</div><!-- language-dropdown -->

					<!-- sign-in -->
					<ul class="sign-in" style="text-align: right; margin: auto; display: block">
						<li><i class="fa fa-user"></i></li>
						<li class="dropdown">
								<li><a href="{{ URL::action('HomeController@logout') }}">Salir</a></li>
						</li>
					</ul><!-- sign-in -->
					
				</div>
				<!-- nav-right -->
			</div><!-- container -->
		</nav><!-- navbar -->
	</header><!-- header -->
	@elseif(isset(Auth::user()->type) && Auth::user()->type==2 && Auth::user()->status==1)
		<header id="header" class="clearfix">
		<!-- navbar -->
		<nav class="navbar navbar-default">
			<div class="container">
				<!-- navbar-header -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="{{ URL::action('HomeController@home_buyer') }}">
						{{ HTML::image('assets/images/nuevo-logo-2.png','Logo',array('class'=>'img-responsive')) }}
					</a>
				</div>
				<!-- /navbar-header -->

				<div class="navbar-left">
					<div class="collapse navbar-collapse" id="navbar-collapse">
						<ul class="nav navbar-nav">
							<li class="active">
								<a href="{{ URL::action('HomeController@home_buyer') }}" >
									Inicio
								</a>
								
							</li>
							<li><a href="/categorias">Categorías</a></li>
							<li><a href="categories-main.html">Todos los Anuncios</a></li>
							<li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Mis Compras <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="todos-compra.html">Todas Mis Compras</a></li>
									<li><a href="aprobar-compra.html">Compras x Aprobar</a></li>
									<li><a href="concretada-compra.html">Compras Concretadas</a></li>
									

								</ul>
							</li>
							<li><a href="faq.html">Ayuda/Soporte</a></li>
							
						</ul>
					</div>
				</div>

				<!-- nav-right -->
				<div class="nav-right">
					<!-- language-dropdown -->

					</div><!-- language-dropdown -->

					<!-- sign-in -->
					<ul class="sign-in">
						<li><i class="fa fa-user"></i></li>
						<li class="dropdown">
							<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
								Silma Natera <span class="caret"></span>
							</a>
								<ul class="dropdown-menu">
									<li><a href="my-profile.html">Perfil</a></li>
									<li><a href="delete-account.html">Cerrar Cuenta</a></li>
									<li><a href="{{ URL::action('HomeController@logout') }}">Salir</a></li>
								</ul>
						</li>
					</ul><!-- sign-in -->

				
				</div>
				<!-- nav-right -->
			</div><!-- container -->
		</nav><!-- navbar -->
	</header><!-- header -->
	@elseif(isset(Auth::user()->type) && Auth::user()->type==1 && Auth::user()->status==1)
		<header id="header" class="clearfix">
		<!-- navbar -->
		<nav class="navbar navbar-default">
			<div class="container">
				<!-- navbar-header -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="{{ URL::action('HomeController@home_admin') }}">
						{{ HTML::image('assets/images/nuevo-logo-2.png','Logo',array('class'=>'img-responsive')) }}
					</a>
				</div>
				<!-- /navbar-header -->

				<div class="navbar-left">
					<div class="collapse navbar-collapse" id="navbar-collapse">
						<ul class="nav navbar-nav">
							<li class="active">
								<a href="{{ URL::action('HomeController@home_admin') }}" >
									Inicio
								</a>
			
							</li>
							<li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Compras <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="compra-aprobar.html">Compras x Aprobar</a></li>
									<li><a href="compra-concretar.html">Compras Concretadas</a></li>
									
								</ul>
							</li>
							<li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Ventas <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="publicacion-aprobada.html">Publicaciones Aprobadas</a></li>
									<li><a href="publicacion-rechazada.html">Publicaciones Rechazadas</a></li>
									<li><a href="publicacion-expirada.html">Publicaciones Expiradas</a></li>

								</ul>
							</li>
							<li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Categorias <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="{{ URL::action('CategoryController@form_category') }}">Crear</a></li>
									<li><a href="{{ URL::action('CategoryController@list_category') }}">Listar</a></li>
									<li><a href="{{ URL::action('IconController@form_new_icon') }}">Crear Nuevo Icono</a></li>
									<li><a href="{{ URL::action('IconController@list_icons') }}">Listar Iconos</a></li>
								</ul>
							</li>
							<li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Usuarios <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="{{ URL::action('UsersController@form_admin') }}">Crear Administrador</a></li>
									<li><a href="{{ URL::action('UsersController@list_buyer') }}">Listado Compradores</a></li>
									<li><a href="{{ URL::action('UsersController@list_seller') }}">Listado Vendedores</a></li>
									<li><a href="{{ URL::action('UsersController@list_admin') }}">Listado Administradores</a></li>
									

								</ul>
							</li>
							<li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Publicaciones <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="{{ URL::action('AdsController@form_ads') }}">Crear</a></li>
									<li><a href="{{ URL::action('AdsController@list_ads') }}">Listar</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>

				<!-- nav-right -->
				<div class="nav-right">
					<!-- language-dropdown -->

					</div><!-- language-dropdown -->

					<!-- sign-in -->
					<ul class="sign-in">
						<li><i class="fa fa-user"></i></li>
						<li class="dropdown">
							<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
								{{ Auth::user()->name }} <span class="caret"></span>
							</a>
								<ul class="dropdown-menu">
									<li><a href="{{ URL::action('UsersController@profile_admin') }}">Perfil</a></li>
									<li><a href="{{ URL::action('HomeController@logout') }}">Salir</a></li>
								</ul>
						</li>
					</ul><!-- sign-in -->

				
				</div>
				<!-- nav-right -->
			</div><!-- container -->
		</nav><!-- navbar -->
	</header><!-- header -->
	@else
		<header id="header" class="clearfix">
		<!-- navbar -->
		<nav class="navbar navbar-default">
			<div class="container">
				<!-- navbar-header -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="{{ URL::action('HomeController@home') }}">
                  		{{ HTML::image('assets/images/nuevo-logo-2.png','Logo',array('class'=>'img-responsive')) }}
					</a>
				</div>
				<div class="navbar-right">
					<div class="collapse navbar-collapse" id="navbar-collapse">
						<ul class="nav navbar-nav">
							<li class="active">
								<a href="{{ URL::action('HomeController@home') }}" >
									Inicio
								</a>
							</li>
							<li><a href="/categorias">Categorías</a></li>
							<li><a href="/todos-los-anuncios">Todos los Anuncios</a></li>
							<!-- <li><a href="faq.html">Ayuda/Soporte</a></li> -->

						</ul>
					</div>
				</div>
				<div class="nav-right">
					<!-- sign-in -->
					<ul class="sign-in">
						<li><i class="fa fa-user"></i></li>
						<li><a href="{{ URL::action('HomeController@login_form') }}"> Entrar </a></li>
						<li><a href="{{ URL::action('HomeController@register_form') }}">Registrarse</a></li>
					</ul><!-- sign-in -->
					<a href="{{ URL::action('HomeController@register_form') }}" class="btn">Vender</a>
				</div>
			</div>
		</nav>
	</header>
	@endif

	@yield('content')

	<!-- footer -->
	<footer id="footer" class="clearfix">
		<!-- footer-top -->
		<section class="footer-top clearfix">
			<div class="container">
				<div class="row">
					<!-- footer-widget -->
					<div class="col-sm-4">
						<div class="footer-widget">
							<h3>De interés</h3>
							<ul>
								<li><a href="#">Sobre Nosotros</a></li>
								<li><a href="#">Contacto</a></li>
								<li><a href="#">Ayuda & Soporte</a></li>
								<li><a href="#">Anuncia con nosotros</a></li>
							  </ul>
						</div>
					</div><!-- footer-widget -->

					<!-- footer-widget -->
					<div class="col-sm-4">
						<div class="footer-widget">
							<h3>Cómo vender rápido</h3>
							<ul>
								<li><a href="#">Cómo Registrarse</a></li>
								<li><a href="#">Miembros</a></li>
								<li><a href="#">Banner Publicidad</a></li>
								<li><a href="#">Promociona tu anuncio</a></li>
								<li><a href="#">¿Preguntas?</a></li>
							</ul>
						</div>
					</div><!-- footer-widget -->

					<!-- footer-widget -->
					<div class="col-sm-4">
						<div class="footer-widget social-widget">
							<h3>Únete</h3>
							<ul>
								<li><a href="#"><i class="fa fa-facebook-official"></i>Facebook</a></li>
								<li><a href="#"><i class="fa fa-twitter-square"></i>Twitter</a></li>
								<li><a href="#"><i class="fa fa-google-plus-square"></i>Google+</a></li>

							</ul>
						</div>
					</div><!-- footer-widget -->

					<!-- footer-widget -->
					<!--<div class="col-sm-3">
						<div class="footer-widget news-letter">
							<h3>Suscribirse</h3>
							<p>Recibe información destacada.</p>
							
							<form action="#">
								<input type="email" class="form-control" placeholder="Tu correo.">
								<button type="submit" class="btn btn-primary">Registrarse</button>
							</form>
						</div>
					</div> -->
				</div><!-- row -->
			</div><!-- container -->
		</section><!-- footer-top -->


		<div class="footer-bottom clearfix text-center">
			<div class="container">
				<p>Copyright &copy; 2017. Desarrollado por AEnfocus Marketing. <a href="http://aetecnologias.com.ve/">Asesores Enfocus C.A. RIF: J-407358995</a></p>
			</div>
		</div><!-- footer-bottom -->
	</footer><!-- footer -->



	<!--/Preset Style Chooser-->

	<!--/End:Preset Style Chooser-->

    <!-- JS -->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/modernizr.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
	<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="{{asset('assets/js/gmaps.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/smoothscroll.min.js')}}"></script>
    <script src="{{asset('assets/js/scrollup.min.js')}}"></script>
    <script src="{{asset('assets/js/price-range.js')}}"></script>
    <script src="{{asset('assets/js/jquery.countdown.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
    <script src="{{asset('assets/js/switcher.js')}}"></script>
	<script src="{{asset('assets/js/utilsVendedor.js')}}"></script>
    <script src="{{asset('assets/js/newSubcategory.js')}}"></script>
    <script src="{{asset('assets/js/createLink.js')}}"></script>
    <script src="{{asset('assets/js/userDetails.js')}}"></script>
    @if(isset($category))
	    <script type="text/javascript">
	    	$(document).ready(function(){
				$("option[value={{$category->icon}}]").prop("selected",true);
			});
	    </script>
    @endif
  </body>
</html>
