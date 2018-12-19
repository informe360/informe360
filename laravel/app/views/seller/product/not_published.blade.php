@extends ('template')

@section ('content')
<!-- myads-page -->
	<section id="main" class="clearfix myads-page">
		<div class="container">

			<div class="breadcrumb-section">
				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li><a href="index.html">Portada</a></li>
					<li>Ad Post</li>
				</ol><!-- breadcrumb -->
				<h2 class="title">Anuncios No Publicados</h2>
			</div><!-- banner -->

			<div class="ad-profile section">
					<div class="user-profile">
						<div class="user-images">
							{{ HTML::image('assets/images/user.jpg','Logo',array('class'=>'img-responsive')) }}
						</div>
						<div class="user">
							<h2>Hola, <a href="#">{{Auth::user()->name;}}.</a></h2>
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
						<li><a href="{{ URL::action('HomeController@home_seller') }}">Todos Mis Anuncios</a></li>
						<!--<li><a href="my-ads.html">Todos Mis Anuncios</a></li>-->
						<li class="active"><a href="{{ URL::action('ProductController@productsNotPublished') }}">Anuncios No Publicados</a></li>
						<li><a href="{{ URL::action('ProductController@pending_products') }}">Pendiente de Aprobación</a></li>
						<li><a href="{{ URL::action('ProductController@select_product') }}">Nuevo Anuncio</a></li>
						<li><a href="{{ URL::action('UsersController@profile_seller') }}">Perfil</a></li>
						<li><a href="delete-account.html">Cerrar tu Cuenta</a></li>
					</ul>


			</div><!-- ad-profile -->

			<div class="ads-info">
				<div class="row">
					<div class="col-sm-8">
						<div class="my-ads section">
							<h2>No Publicados</h2>
							<!-- ad-item -->
							<div class="ad-item row">
								<!-- item-image -->
								<div class="item-image-box col-sm-4">
									<div class="item-image">
										<a href="details.html">{{ HTML::image('assets/images/listing/1.jpg','Logo',array('class'=>'img-responsive')) }}</a>
									</div><!-- item-image -->
								</div>


								<div class="item-info col-sm-8">
									<!-- ad-info -->
									<div class="ad-info">
										<h3 class="item-price">Bs.</h3>
										<h4 class="item-title"><a href="#">!</a></h4>
										<div class="item-cat">
											<span><a href="#">Electronica & Equipos</a></span> /
											<span><a href="#">Tv & Video</a></span>
										</div>
									</div><!-- ad-info -->

									<!-- ad-meta -->
									<div class="ad-meta">
										<div class="meta-content">
											<span class="dated">Uploaded On: <a href="#">7 Ene, 16  10:10 pm </a></span>
											<span class="pending"></span>
										</div>
										<!-- item-info-right -->
										<div class="user-option pull-right">
											<a class="edit-item" href="ad-post-details.html" data-toggle="tooltip" data-placement="top" title="Edit this ad"><i class="fa fa-pencil"></i></a>
											<a class="delete-item" href="#" data-toggle="tooltip" data-placement="top" title="Delete this ad"><i class="fa fa-times"></i></a>
										</div><!-- item-info-right -->
									</div><!-- ad-meta -->
								</div><!-- item-info -->
							</div><!-- ad-item -->

							<!-- ad-item -->
							<div class="ad-item row">
								<div class="item-image-box col-sm-4">
									<!-- item-image -->
									<div class="item-image">
										<a href="details.html">{{ HTML::image('assets/images/listing/2.jpg','Logo',array('class'=>'img-responsive')) }}</a>
									</div><!-- item-image -->
								</div><!-- item-image-box -->


								<div class="item-info col-sm-8">
									<!-- ad-info -->
									<div class="ad-info">
										<h3 class="item-price"> Bs. 250.00 <span>(Negociable)</span></h3>
										<h4 class="item-title"><a href="#">Bark Furniture, Handmade Bespoke Furniture</a></h4>
										<div class="item-cat">
											<span><a href="#">Home Appliances</a></span> /
											<span><a href="#">Sofa</a></span>
										</div>
									</div><!-- ad-info -->

									<!-- ad-meta -->
									<div class="ad-meta">
										<div class="meta-content">
											<span class="dated">Uploaded On: <a href="#">7 Ene, 16  10:10 pm </a></span>
											<span class="pending"></span>
										</div>
										<!-- item-info-right -->
										<div class="user-option pull-right">
											<a class="edit-item" href="ad-post-details.html" data-toggle="tooltip" data-placement="top" title="Edit this ad"><i class="fa fa-pencil"></i></a>
											<a class="delete-item" href="#" data-toggle="tooltip" data-placement="top" title="Delete this ad"><i class="fa fa-times"></i></a>
										</div><!-- item-info-right -->
									</div><!-- ad-meta -->
								</div><!-- item-info -->
							</div><!-- ad-item -->

							<!-- ad-item -->
							<div class="ad-item row">
								<div class="item-image-box col-sm-4">
									<!-- item-image -->
									<div class="item-image">
										<a href="details.html"><img src="images/listing/3.jpg" alt="Image" class="img-responsive"></a>
									</div><!-- item-image -->
								</div><!-- item-image-box -->


								<div class="item-info col-sm-8">
									<!-- ad-info -->
									<div class="ad-info">
										<h3 class="item-price">Bs. 890.00 <span>(Negociable)</span></h3>
										<h4 class="item-title"><a href="#">Samsung Galaxy S6 Edge</a></h4>
										<div class="item-cat">
											<span><a href="#">Electronics & Gedgets</a></span> /
											<span><a href="#">Mobile Phone</a></span>
										</div>
									</div><!-- ad-info -->

									<!-- ad-meta -->
									<div class="ad-meta">
										<div class="meta-content">
											<span class="dated">Uploaded On: <a href="#">7 Jan, 16  10:10 pm </a></span>
											<span class="pending"></span>
										</div>
										<!-- item-info-right -->
										<div class="user-option pull-right">
											<a class="edit-item" href="ad-post-details.html" data-toggle="tooltip" data-placement="top" title="Edit this ad"><i class="fa fa-pencil"></i></a>
											<a class="delete-item" href="#" data-toggle="tooltip" data-placement="top" title="Delete this ad"><i class="fa fa-times"></i></a>
										</div><!-- item-info-right -->
									</div><!-- ad-meta -->
								</div><!-- item-info -->
							</div><!-- ad-item -->

							<!-- ad-item -->
							<div class="ad-item row">
								<div class="item-image-box col-sm-4">
									<!-- item-image -->
									<div class="item-image">
										<a href="details.html"><img src="images/listing/4.jpg" alt="Image" class="img-responsive"></a>
									</div><!-- item-image -->
								</div><!-- item-image-box -->


								<div class="item-info col-sm-8">
									<!-- ad-info -->
									<div class="ad-info">
										<h3 class="item-price">$800.00</h3>
										<h4 class="item-title"><a href="#">Rick Morton- Magicius Chase</a></h4>
										<div class="item-cat">
											<span><a href="#">Books & Magazines</a></span> /
											<span><a href="#">Story book</a></span>
										</div>
									</div><!-- ad-info -->

									<!-- ad-meta -->
									<div class="ad-meta">
										<div class="meta-content">
											<span class="dated">Uploaded On: <a href="#">7 Jan, 16  10:10 pm </a></span>
											<span class="pending"></span>
										</div>
										<!-- item-info-right -->
										<div class="user-option pull-right">
											<a class="edit-item" href="ad-post-details.html" data-toggle="tooltip" data-placement="top" title="Edit this ad"><i class="fa fa-pencil"></i></a>
											<a class="delete-item" href="#" data-toggle="tooltip" data-placement="top" title="Delete this ad"><i class="fa fa-times"></i></a>
										</div><!-- item-info-right -->
									</div><!-- ad-meta -->
								</div><!-- item-info -->
							</div><!-- ad-item -->
						</div>
					</div><!-- my-ads -->

					<!-- recommended-cta-->
					<div class="col-sm-4 text-center">
						<!-- recommended-cta -->
						<div class="recommended-cta">
							<div class="cta">
								<!-- single-cta -->
								<div class="single-cta">
									<!-- cta-icon -->
									<div class="cta-icon icon-secure">
										{{ HTML::image('assets/images/icon/13.png','Logo',array('class'=>'img-responsive')) }}
									</div><!-- cta-icon -->

									<h4>Venta Segura</h4>
									<p>Contacta por teléfono al vendedor.</p>
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

									<h4>Conecta con tus clientes.</h4>
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
			</div><!-- row -->
		</div><!-- container -->
	</section><!-- myads-page -->
@stop	