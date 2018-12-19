@extends ('template')

@section ('content')

<!-- ad-profile-page -->
	<section id="main" class="clearfix  ad-profile-page">
		<div class="container">
		
			<div class="breadcrumb-section">
				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li><a href="index.html">Inicio</a></li>
					<li>Perfil</li>
				</ol><!-- breadcrumb -->						
				<h2 class="title">Mi Perfil</h2>
			</div><!-- banner -->
			
			<div class="ad-profile section">
					<div class="user-profile">
						<div class="user-images">
							{{ HTML::image('assets/images/user.jpg','Logo',array('class'=>'img-responsive')) }}
						</div>
						<div class="user">
							<h2>Hola, <a href="#">{{Auth::user()->name}}.</a></h2>
							<h5>Tú última sesión fue: {{Auth::user()->last_login}}</h5>
						</div>

						<div class="favorites-user">
							<div class="my-ads">
								<a href="my-ads.html">01<small>Mi Anuncio</small></a>
							</div>
							<!--<div class="favorites">
								<a href="#">18<small>Favoritos</small></a>
							</div>-->
						</div>
					</div><!-- user-profile -->

					<ul class="user-menu">
						<li><a href="index.html">Todos Mis Anuncios</a></li>
						<!--<li><a href="my-ads.html">Todos Mis Anuncios</a></li>-->
						<li><a href="{{ URL::action('ProductController@productsNotPublished') }}">Anuncios No Publicados</a></li>
						<li><a href="{{ URL::action('ProductController@pending_products') }}">Pendiente de Aprobación</a></li>
						<li><a href="{{ URL::action('ProductController@select_product') }}">Nuevo Anuncio</a></li>
						<li class="active"><a href="{{ URL::action('UsersController@profile_seller') }}">Perfil</a></li>
						<li><a href="delete-account.html">Cerrar tu Cuenta</a></li>
					</ul>


			</div><!-- ad-profile -->

			<div class="profile">
				<div class="row">
					<div class="col-sm-8">
						<div class="user-pro-section">
							<!-- profile-details -->
							<div class="profile-details section">
								<h2>Datos de perfil</h2>
								<!-- form -->
								<div class="form-group">
									<label>Username</label>
									<input type="text" class="form-control" placeholder="Jhon Doe">
								</div>

								<div class="form-group">
									<label>Correo</label>
									<input type="email" class="form-control" placeholder="jhondoe@mail.com">
								</div>

								<div class="form-group">
									<label for="name-three">Nro Celular</label>
									<input type="text" class="form-control" placeholder="+213 1234 56789">
								</div>

								<div class="form-group">
									<label>Ciudad</label>
									<select class="form-control">
										<option value="#">Los Angeles, USA</option>
										<option value="#">Dhaka, BD</option>
										<option value="#">Shanghai</option>
										<option value="#">Karachi</option>
										<option value="#">Beijing</option>
										<option value="#">Lagos</option>
										<option value="#">Delhi</option>
										<option value="#">Tianjin</option>
										<option value="#">Rio de Janeiro</option>
									</select>
								</div>	

								<div class="form-group">
									<label>Tu eres</label>
									<select class="form-control">
										<option value="#">Distribuidor</option>
										<option value="#">Independiente</option>
									</select>
								</div>					
							</div><!-- profile-details -->

							<!-- change-password -->
							<div class="change-password section">
								<h2>Cambiar password</h2>
								<!-- form -->
								<div class="form-group">
									<label>Viejo Password</label>
									<input type="password" class="form-control" >
								</div>
								
								<div class="form-group">
									<label>Nuevo password</label>
									<input type="password" class="form-control">	
								</div>
								
								<div class="form-group">
									<label>Confirma password</label>
									<input type="password" class="form-control">
								</div>															
							</div><!-- change-password -->
							
							<!-- preferences-settings -->
							<!--<div class="preferences-settings section">
								<h2>Preferences Settings</h2>
								
								<div class="checkbox">
									<label><input type="checkbox" name="logged"> Comments are enabled on my ads </label>
									<label><input type="checkbox" name="receive"> I want to receive newsletter.</label>
									<label><input type="checkbox" name="want">I want to receive advice on buying and selling. </label>
								</div>						
							</div>-->
							
							<a href="#" class="btn">Actualiza Perfil</a>
							<a href="#" class="btn cancle">Cancelar</a>
						</div><!-- user-pro-edit -->
					</div><!-- profile -->

					<div class="col-sm-4 text-center">
						<div class="recommended-cta">					
							<div class="cta">
								<!-- single-cta -->						
								<div class="single-cta">
									<!-- cta-icon -->
									<div class="cta-icon icon-secure">
										{{ HTML::image('assets/images/icon/13.png','Logo',array('class'=>'img-responsive')) }}
									</div><!-- cta-icon -->

									<h4>Secure Trading</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
								</div><!-- single-cta -->

								<!-- single-cta -->
								<div class="single-cta">
									<!-- cta-icon -->
									<div class="cta-icon icon-support">
										{{ HTML::image('assets/images/icon/14.png','Logo',array('class'=>'img-responsive')) }}
									</div><!-- cta-icon -->

									<h4>24/7 Support</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
								</div><!-- single-cta -->
							

								<!-- single-cta -->
								<div class="single-cta">
									<!-- cta-icon -->
									<div class="cta-icon icon-trading">
									{{ HTML::image('assets/images/icon/15.png','Logo',array('class'=>'img-responsive')) }}
									</div><!-- cta-icon -->

									<h4>Easy Trading</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
								</div><!-- single-cta -->

								<!-- single-cta -->
								<div class="single-cta">
									<h5>Need Help?</h5>
									<p><span>Give a call on</span><a href="tellto:08048100000"> 08048100000</a></p>
								</div><!-- single-cta -->
							</div>
						</div><!-- cta -->
					</div><!-- recommended-cta-->
				</div><!-- row -->	
			</div>				
		</div><!-- container -->
	</section><!-- ad-profile-page -->

@stop