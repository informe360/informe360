@extends ('template')

@section ('content')
<!-- main -->
<section id="main" class="clearfix Portada-default">
	<div class="container">
		<!-- banner -->
		<div class="banner-section text-center">
			<h1 class="title">Todos los anuncios, Productos, Inmuebles & Servicios </h1>
			<h3>¡A un clic! Encuentra variedad de ofertas & disponibilidad de artículos.</h3>
			<!-- banner-form -->
			<div class="banner-form">
				<form action="#">
					<!-- category-change -->
					<div class="dropdown category-dropdown">
						<a data-toggle="dropdown" href="#"><span class="change-text">Selecciona Categor&iacute;a</span> <i class="fa fa-angle-down"></i></a>
						<ul class="dropdown-menu category-change">
			                <li><a href="#">Inmuebles</a></li>
			                <li><a href="#">Vehículos & Camiones</a></li>
			                <li><a href="#">Servicios & Empresas</a></li>
			                <li><a href="#">Moda & Ropa</a></li>
							<li><a href="#">Electronica & Equipos</a></li>
			                <li><a href="#">Mascotas</a</li>
			                <li><a href="#">Artículos /Hogar</a></li>
			                <li><a href="#">Otros productos</a></li>

						</ul>
					</div><!-- category-change -->

					<input type="text" class="form-control" placeholder="">
					<button type="submit" class="form-control" value="Search">Buscar</button>
				</form>
			</div><!-- banner-form -->

			<!-- banner-socail -->
			<ul class="banner-socail list-inline">
				<li><a href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
				<li><a href="https://www.twitter.com/@360clasificados" title="Twitter"><i class="fa fa-twitter"></i></a></li>
				<li><a href="#" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>

			</ul><!-- banner-socail -->
		</div><!-- banner -->

		<!-- main-content -->
		<div class="main-content">
			<!-- row -->
			<div class="row">
				<div class="hidden-xs hidden-sm col-md-2 text-center">
					<div class="advertisement">
          				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					</div>
				</div>

				<!-- product-list -->
				<div class="col-md-8">
					<!-- categorys -->
					<div class="section category-ad text-center">
						<ul class="category-list">
							<li class="category-item">
								<a href="categories.html">
									<div class="category-icon">
										{{ HTML::image('assets/images/icon/1.png','images',array('class'=>'img-responsive')) }}
									</div>
									<span class="category-title">Vehículos</span>
									<span class="category-quantity">(152)</span>
								</a>
							</li><!-- category-item -->

							<li class="category-item">
								<a href="categories.html">
									<div class="category-icon">
										{{ HTML::image('assets/images/icon/2.png','images',array('class'=>'img-responsive')) }}
									</div>
									<span class="category-title">Electronica & Equipos</span>
									<span class="category-quantity">(621)</span>
								</a>
							</li><!-- category-item -->

							<li class="category-item">
								<a href="categories.html">
									<div class="category-icon">
										{{ HTML::image('assets/images/icon/3.png','images',array('class'=>'img-responsive')) }}
									</div>
									<span class="category-title">Inmuebles</span>
									<span class="category-quantity">(612)</span>
								</a>
							</li><!-- category-item -->


							</li><!-- category-item -->

							<li class="category-item">
								<a href="categories.html">
									<div class="category-icon">
										{{ HTML::image('assets/images/icon/5.png','images',array('class'=>'img-responsive')) }}
									</div>
									<span class="category-title">Moda & Ropa</span>
									<span class="category-quantity">(1298)</span>
								</a>
							</li><!-- category-item -->

							<li class="category-item">
								<a href="categories.html">
									<div class="category-icon">
										{{ HTML::image('assets/images/icon/6.png','images',array('class'=>'img-responsive')) }}
									</div>
									<span class="category-title">Mascotas</span>
									<span class="category-quantity">(145)</span>
								</a>
							</li><!-- category-item -->

							<li class="category-item">
								<a href="categories.html">
									<div class="category-icon">
										{{ HTML::image('assets/images/icon/9.png','images',array('class'=>'img-responsive')) }}
									</div>
									<span class="category-title">Artículos Hogar</span>
									<span class="category-quantity">(129)</span>
								</a>
							</li><!-- category-item -->


							</li><!-- category-item -->

				            <li class="category-item">
				            	<a href="categories.html">
				            	<div class="category-icon">
				            		{{ HTML::image('assets/images/icon/7.png','images',array('class'=>'img-responsive')) }}
				            	</div>
				            	<span class="category-title">Servicios </span>
				            	<span class="category-quantity">(124)</span>
				            	</a>
							</li><!-- category-item -->

							<li class="category-item">
								<a href="categories.html">
									<div class="category-icon">
										{{ HTML::image('assets/images/icon/12.png','images',array('class'=>'img-responsive')) }}
									</div>
									<span class="category-title">Otros Productos </span>
									<span class="category-quantity">(298)</span>
								</a>
							</li><!-- category-item -->

							</li><!-- category-item -->


							</li><!-- category-item -->
						</ul>
					</div><!-- category-ad -->

					<!-- featureds -->
					<div class="section featureds">
						<div class="row">
							<div class="col-sm-12">
								<div class="section-title featured-top">
									<h4>Anuncios destacados</h4>
								</div>
							</div>
						</div>

						<!-- featured-slider -->
						<div class="featured-slider">
							<div id="featured-slider" >
								<!-- featured -->
								<div class="featured">
									<div class="featured-image">
										<a href="details.html">
											{{ HTML::image('assets/images/featured/1.jpg','images',array('class'=>'img-responsive')) }}
										</a>
										<a href="#" class="verified" data-toggle="tooltip" data-placement="left" title="Verificado"><i class="fa fa-check-square-o"></i></a>
									</div>

									<!-- ad-info -->
									<div class="ad-info">
										<h3 class="item-price">$800.00</h3>
										<h4 class="item-title">
											<a href="details.html"Apple MacBook Pro with Retina Display</a>
										</h4>
										<div class="item-cat">
											<span><a href="#">Electronics & Gedgets</a></span>
										</div>
									</div><!-- ad-info -->

									<!-- ad-meta -->
									<div class="ad-meta">
										<div class="meta-content">
											<span class="dated"><a href="#">7 Jan 10:10 pm </a></span>
										</div>
										<!-- item-info-right -->
										<div class="user-option pull-right">
											<a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
											<a href="#" data-toggle="tooltip" data-placement="top" title="Dealer"><i class="fa fa-suitcase"></i> </a>
										</div><!-- item-info-right -->
									</div><!-- ad-meta -->
								</div><!-- featured -->

								<div class="featured">
									<div class="featured-image">
										<a href="details.html">
											{{ HTML::image('assets/images/featured/2.jpg','images',array('class'=>'img-responsive')) }}
										</a>
									</div>

									<!-- ad-info -->
									<div class="ad-info">
										<h3 class="item-price">$25000.00</h3>
										<h4 class="item-title">
											<a href="details.html"2016 Bugatti Veyron Sport Middlecar</a>
										</h4>
										<div class="item-cat">
											<span><a href="#">Cars & Vehicles</a></span>
										</div>
									</div><!-- ad-info -->

									<!-- ad-meta -->
									<div class="ad-meta">
										<div class="meta-content">
											<span class="dated"><a href="#">7 Jan 10:10 pm </a></span>
										</div>
										<!-- item-info-right -->
										<div class="user-option pull-right">
											<a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
											<a href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user"></i> </a>
										</div><!-- item-info-right -->
									</div><!-- ad-meta -->
								</div><!-- featured -->

								<div class="featured">
									<div class="featured-image">
										<a href="details.html">
											{{ HTML::image('assets/images/featured/3.jpg','images',array('class'=>'img-responsive')) }}
										</a>
										<a href="#" class="verified" data-toggle="tooltip" data-placement="left" title="Verified"><i class="fa fa-check-square-o"></i></a>
									</div>

									<!-- ad-info -->
									<!-- ad-info -->
									<div class="ad-info">
										<h3 class="item-price">$250.00 <span class="negotiable">(Negotiable)</span></h3>
										<h4 class="item-title">
											<a href="details.html"Vivster Acoustic Guitar</a>
										</h4>
										<div class="item-cat">
											<span><a href="#">Music & Art</a></span>
										</div>
									</div><!-- ad-info -->

									<!-- ad-meta -->
									<div class="ad-meta">
										<div class="meta-content">
											<span class="dated"><a href="#">7 Jan 10:10 pm </a></span>
										</div>
										<!-- item-info-right -->
										<div class="user-option pull-right">
											<a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
											<a href="#" data-toggle="tooltip" data-placement="top" title="Dealer"><i class="fa fa-suitcase"></i> </a>
										</div><!-- item-info-right -->
									</div><!-- ad-meta -->
								</div><!-- featured -->
								<div class="featured">
									<div class="featured-image">
										<a href="details.html">
											{{ HTML::image('assets/images/featured/3.jpg','images',array('class'=>'img-responsive')) }}
										</a>
									</div>

									<!-- ad-info -->
									<div class="ad-info">
										<h3 class="item-price">$50.00</h3>
										<h4 class="item-title">
											<a href="details.html">Rick Morton- Magicius Chase</a>
										</h4>
										<div class="item-cat">
											<span><a href="#">Books & Magazines</a></span>
										</div>
									</div><!-- ad-info -->

									<!-- ad-meta -->
									<div class="ad-meta">
										<div class="meta-content">
											<span class="dated"><a href="#">7 Jan 10:10 pm </a></span>
										</div>
										<!-- item-info-right -->
										<div class="user-option pull-right">
											<a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
											<a href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user"></i> </a>
										</div><!-- item-info-right -->
									</div><!-- ad-meta -->
								</div><!-- featured -->

								<div class="featured">
									<div class="featured-image">
										<a href="details.html">
											{{ HTML::image('assets/images/featured/3.jpg','images',array('class'=>'img-responsive')) }}
										</a>
									</div>

									<!-- ad-info -->
									<div class="ad-info">
										<h3 class="item-price">$380.00</h3>
										<h4 class="item-title"><a href="#">Samsung Galaxy S6 Edge</a></h4>
										<div class="item-cat">
											<span><a href="#">Electronics & Gedgets</a></span>
										</div>
									</div><!-- ad-info -->

									<!-- ad-meta -->
									<div class="ad-meta">
										<div class="meta-content">
											<span class="dated"><a href="#">7 Jan 10:10 pm </a></span>
										</div>
										<!-- item-info-right -->
										<div class="user-option pull-right">
											<a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
											<a href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user"></i> </a>
										</div><!-- item-info-right -->
									</div><!-- ad-meta -->
								</div><!-- featured -->
							</div><!-- featured-slider -->
						</div><!-- #featured-slider -->
					</div><!-- featureds -->

					<!-- ad-section -->
					<div class="ad-section text-center">
						<a href="#">
							{{ HTML::image('assets/images/ads/3.jpg','images',array('class'=>'img-responsive')) }}
						</a>
					</div><!-- ad-section -->

					<!-- trending-ads -->
					<div class="section trending-ads">
						<div class="section-title tab-manu">
							<h4>Anuncios Destacados</h4>
							 <!-- Nav tabs -->
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active"><a href="#recent-ads"  data-toggle="tab">Recent Ads</a></li>
								<li role="presentation"><a href="#popular" data-toggle="tab">Popular Ads</a></li>
								
							</ul>
						</div>

			  			<!-- Tab panes -->
						<div class="tab-content">
							<!-- tab-pane -->
							<div role="tabpanel" class="tab-pane fade in active" id="recent-ads">
								<!-- ad-item -->
								<div class="ad-item row">
									<!-- item-image -->
									<div class="item-image-box col-sm-4">
										<div class="item-image">
											<a href="details.html">
												{{ HTML::image('assets/images/trending/1.jpg','images',array('class'=>'img-responsive')) }}
											</a>
											<a href="#" class="verified" data-toggle="tooltip" data-placement="left" title="Verified"><i class="fa fa-check-square-o"></i></a>
										</div><!-- item-image -->
									</div>

									<!-- rending-text -->
									<div class="item-info col-sm-8">
										<!-- ad-info -->
										<div class="ad-info">
											<h3 class="item-price">$50.00</h3>
											<h4 class="item-title">
												<a href="details.html">Apple TV - Everything you need to know!</a>
											</h4>
											<div class="item-cat">
												<span><a href="#">Electronics & Gedgets</a></span> /
												<span><a href="#">Tv & Video</a></span>
											</div>
										</div><!-- ad-info -->

										<!-- ad-meta -->
										<div class="ad-meta">
											<div class="meta-content">
												<span class="dated"><a href="#">7 Jan, 16  10:10 pm </a></span>
												<a href="#" class="tag"><i class="fa fa-tags"></i> Used</a>
											</div>
											<!-- item-info-right -->
											<div class="user-option pull-right">
												<a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
												<a class="online" href="#" data-toggle="tooltip" data-placement="top" title="Dealer"><i class="fa fa-suitcase"></i> </a>
											</div><!-- item-info-right -->
										</div><!-- ad-meta -->
									</div><!-- item-info -->
								</div><!-- ad-item -->

								<!-- ad-item -->
								<div class="ad-item row">
									<div class="item-image-box col-sm-4">
										<!-- item-image -->
										<div class="item-image">
											<a href="details.html">
												{{ HTML::image('assets/images/trending/2.jpg','images',array('class'=>'img-responsive')) }}
											</a>
										</div><!-- item-image -->
									</div><!-- item-image-box -->

									<!-- rending-text -->
									<div class="item-info col-sm-8">
										<!-- ad-info -->
										<div class="ad-info">
											<h3 class="item-price">$250.00 <span>(Negotiable)</span></h3>
											<h4 class="item-title">
												<a href="details.html"Bark Furniture, Handmade Bespoke Furniture</a>
											</h4>
											<div class="item-cat">
												<span><a href="#">Home Appliances</a></span> /
												<span><a href="#">Sofa</a></span>
											</div>
										</div><!-- ad-info -->

										<!-- ad-meta -->
										<div class="ad-meta">
											<div class="meta-content">
												<span class="dated"><a href="#">7 Jan, 16  10:10 pm </a></span>
												<a href="#" class="tag"><i class="fa fa-tags"></i> Used</a>
											</div>
											<!-- item-info-right -->
											<div class="user-option pull-right">
												<a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
												<a class="online" href="#" data-toggle="tooltip" data-placement="top" title="Dealer"><i class="fa fa-suitcase"></i> </a>
											</div><!-- item-info-right -->
										</div><!-- ad-meta -->
									</div><!-- item-info -->
								</div><!-- ad-item -->

								<!-- ad-item -->
								<div class="ad-item row">
									<div class="item-image-box col-sm-4">
										<!-- item-image -->
										<div class="item-image">
											<a href="details.html">
												{{ HTML::image('assets/images/trending/4.jpg','images',array('class'=>'img-responsive')) }}
											<a href="#" class="verified" data-toggle="tooltip" data-placement="left" title="Verified"><i class="fa fa-check-square-o"></i></a>
										</div><!-- item-image -->
									</div><!-- item-image-box -->

									<!-- rending-text -->
									<div class="item-info col-sm-8">
										<!-- ad-info -->
										<div class="ad-info">
											<h3 class="item-price">$800.00</h3>
											<h4 class="item-title">
												<a href="details.html">Rick Morton- Magicius Chase</a>
											</h4>
											<div class="item-cat">
												<span><a href="#">Books & Magazines</a></span> /
												<span><a href="#">Story book</a></span>
											</div>
										</div><!-- ad-info -->

										<!-- ad-meta -->
										<div class="ad-meta">
											<div class="meta-content">
												<span class="dated"><a href="#">7 Jan, 16  10:10 pm </a></span>
												<a href="#" class="tag"><i class="fa fa-tags"></i> Used</a>
											</div>
											<!-- item-info-right -->
											<div class="user-option pull-right">
												<a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
												<a href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user"></i> </a>
											</div><!-- item-info-right -->
										</div><!-- ad-meta -->
									</div><!-- item-info -->
								</div><!-- ad-item -->

								<!-- ad-item -->
								<div class="ad-item row">
									<div class="item-image-box col-sm-4">
										<!-- item-image -->
										<div class="item-image">
											<a href="details.html">
												{{ HTML::image('assets/images/trending/3.jpg','images',array('class'=>'img-responsive')) }}
											</a>
										</div><!-- item-image -->
									</div><!-- item-image-box -->

									<!-- rending-text -->
									<div class="item-info col-sm-8">
										<!-- ad-info -->
										<div class="ad-info">
											<h3 class="item-price">$890.00 <span>(Negotiable)</span></h3>
											<h4 class="item-title">
												<a href="details.html"Samsung Galaxy S6 Edge</a>
											</h4>
											<div class="item-cat">
												<span><a href="#">Electronics & Gedgets</a></span> /
												<span><a href="#">Mobile Phone</a></span>
											</div>
										</div><!-- ad-info -->

										<!-- ad-meta -->
										<div class="ad-meta">
											<div class="meta-content">
												<span class="dated"><a href="#">7 Jan, 16  10:10 pm </a></span>
												<a href="#" class="tag"><i class="fa fa-tags"></i> Used</a>
											</div>
											<!-- item-info-right -->
											<div class="user-option pull-right">
												<a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
												<a href="#" data-toggle="tooltip" data-placement="top" title="Dealer"><i class="fa fa-suitcase"></i> </a>
											</div><!-- item-info-right -->
										</div><!-- ad-meta -->
									</div><!-- item-info -->
								</div><!-- ad-item -->

							</div><!-- tab-pane -->

							<!-- tab-pane -->
							<div role="tabpanel" class="tab-pane fade" id="popular">

								<div class="ad-item row">
									<!-- item-image -->
									<div class="item-image-box col-sm-4">
										<div class="item-image">
											<a href="details.html">
												{{ HTML::image('assets/images/trending/1.jpg','images',array('class'=>'img-responsive')) }}
											</a>
											<a href="#" class="verified" data-toggle="tooltip" data-placement="left" title="Verified"><i class="fa fa-check-square-o"></i></a>
										</div><!-- item-image -->
									</div>

									<!-- rending-text -->
									<div class="item-info col-sm-8">
										<!-- ad-info -->
										<div class="ad-info">
											<h3 class="item-price">$50.00</h3>
											<h4 class="item-title"><a href="#">Apple TV - Everything you need to know!</a></h4>
											<div class="item-cat">
												<span><a href="#">Electronics & Gedgets</a></span> /
												<span><a href="#">Tv & Video</a></span>
											</div>
										</div><!-- ad-info -->

										<!-- ad-meta -->
										<div class="ad-meta">
											<div class="meta-content">
												<span class="dated"><a href="#">7 Jan, 16  10:10 pm </a></span>
												<a href="#" class="tag"><i class="fa fa-tags"></i> Used</a>
											</div>
											<!-- item-info-right -->
											<div class="user-option pull-right">
												<a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
												<a class="online" href="#" data-toggle="tooltip" data-placement="top" title="Dealer"><i class="fa fa-suitcase"></i> </a>
											</div><!-- item-info-right -->
										</div><!-- ad-meta -->
									</div><!-- item-info -->
								</div><!-- ad-item -->

								<div class="ad-item row">
									<div class="item-image-box col-sm-4">
										<!-- item-image -->
										<div class="item-image">
											<a href="details.html">
												{{ HTML::image('assets/images/trending/3.jpg','images',array('class'=>'img-responsive')) }}
											</a>
										</div><!-- item-image -->
									</div><!-- item-image-box -->


									<div class="item-info col-sm-8">
										<!-- ad-info -->
										<div class="ad-info">
											<h3 class="item-price">$890.00 <span>(Negotiable)</span></h3>
											<h4 class="item-title"><a href="#">Samsung Galaxy S6 Edge</a></h4>
											<div class="item-cat">
												<span><a href="#">Electronics & Gedgets</a></span> /
												<span><a href="#">Mobile Phone</a></span>
											</div>
										</div><!-- ad-info -->

										<!-- ad-meta -->
										<div class="ad-meta">
											<div class="meta-content">
												<span class="dated"><a href="#">7 Jan, 16  10:10 pm </a></span>
												<a href="#" class="tag"><i class="fa fa-tags"></i> Used</a>
											</div>
											<!-- item-info-right -->
											<div class="user-option pull-right">
												<a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
												<a href="#" data-toggle="tooltip" data-placement="top" title="Dealer"><i class="fa fa-suitcase"></i> </a>
											</div><!-- item-info-right -->
										</div><!-- ad-meta -->
									</div><!-- item-info -->
								</div><!-- ad-item -->

								<!-- ad-item -->
								<div class="ad-item row">
									<div class="item-image-box col-sm-4">
										<!-- item-image -->
										<div class="item-image">
											<a href="details.html">
												{{ HTML::image('assets/images/trending/2.jpg','images',array('class'=>'img-responsive')) }}
											</a>
										</div><!-- item-image -->
									</div><!-- item-image-box -->

									<!-- rending-text -->
									<div class="item-info col-sm-8">
										<!-- ad-info -->
										<div class="ad-info">
											<h3 class="item-price">$250.00 <span>(Negotiable)</span></h3>
											<h4 class="item-title"><a href="#">Bark Furniture, Handmade Bespoke Furniture</a></h4>
											<div class="item-cat">
												<span><a href="#">Home Appliances</a></span> /
												<span><a href="#">Sofa</a></span>
											</div>
										</div><!-- ad-info -->

										<!-- ad-meta -->
										<div class="ad-meta">
											<div class="meta-content">
												<span class="dated"><a href="#">7 Jan, 16  10:10 pm </a></span>
												<a href="#" class="tag"><i class="fa fa-tags"></i> Used</a>
											</div>
											<!-- item-info-right -->
											<div class="user-option pull-right">
												<a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
												<a class="online" href="#" data-toggle="tooltip" data-placement="top" title="Dealer"><i class="fa fa-suitcase"></i> </a>
											</div><!-- item-info-right -->
										</div><!-- ad-meta -->
									</div><!-- item-info -->
								</div><!-- ad-item -->

								<!-- ad-item -->
								<div class="ad-item row">
									<div class="item-image-box col-sm-4">
										<!-- item-image -->
										<div class="item-image">
											<a href="details.html">
												{{ HTML::image('assets/images/trending/4.jpg','images',array('class'=>'img-responsive')) }}
											</a>
											<a href="#" class="verified" data-toggle="tooltip" data-placement="left" title="Verified"><i class="fa fa-check-square-o"></i></a>
										</div><!-- item-image -->
									</div><!-- item-image-box -->

									<!-- rending-text -->
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
												<span class="dated"><a href="#">7 Jan, 16  10:10 pm </a></span>
												<a href="#" class="tag"><i class="fa fa-tags"></i> Used</a>
											</div>
											<!-- item-info-right -->
											<div class="user-option pull-right">
												<a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
												<a href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user"></i> </a>
											</div><!-- item-info-right -->
										</div><!-- ad-meta -->
									</div><!-- item-info -->
								</div><!-- ad-item -->
							</div><!-- tab-pane -->

						
						</div>
					</div><!-- trending-ads -->

					<!-- cta -->
					<div class="section cta text-center">
						<div class="row">
							<!-- single-cta -->
							<div class="col-sm-4">
								<div class="single-cta">
									<!-- cta-icon -->
									<div class="cta-icon icon-secure">
										{{ HTML::image('assets/images/icon/13.png','images',array('class'=>'img-responsive')) }}
									</div><!-- cta-icon -->

									<h4>Transacción Segura</h4>
									<p>Navegación segura. Nuestro sitio web, contiene el certificado de seguridad SSL, tus datos están protegidos.</p>
								</div>
							</div><!-- single-cta -->

							<!-- single-cta -->
							<div class="col-sm-4">
								<div class="single-cta">
									<!-- cta-icon -->
									<div class="cta-icon icon-support">
										{{ HTML::image('assets/images/icon/14.png','images',array('class'=>'img-responsive')) }}
									</div><!-- cta-icon -->

									<h4>Llama al vendedor</h4>
									<p>Si estás interesado en un producto, comunícate con el vendedor y define la venta. No transfieras o deposites, si no recibiste tu producto.</p>
								</div>
							</div><!-- single-cta -->

							<!-- single-cta -->
							<div class="col-sm-4">
								<div class="single-cta">
									<!-- cta-icon -->
									<div class="cta-icon icon-trading">
										{{ HTML::image('assets/images/icon/15.png','images',array('class'=>'img-responsive')) }}
									</div><!-- cta-icon -->

									<h4>Comercio Fácil</h4>
									<p>Anuncia con nosotros tus productos bienes y servicios y obten un comercio fácil y rápido.</p>
								</div>
							</div><!-- single-cta -->
						</div><!-- row -->
					</div><!-- cta -->
				</div><!-- product-list -->

				<!-- advertisement -->
				<div class="hidden-xs hidden-sm col-md-2">
					<div class="advertisement text-center">
						<a href="#">
							{{ HTML::image('assets/images/anuncio_home.gif','images',array('class'=>'img-responsive')) }}
						</a>
					</div>
				</div><!-- advertisement -->
			</div><!-- row -->
		</div><!-- main-content -->
	</div><!-- container -->
</section><!-- main -->

<!-- download -->
<section id="download" class="clearfix parallax-section">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<h2>Próximamente descarga nuestras aplicaciones oficiales</h2>
			</div>
		</div><!-- row -->

		<!-- row -->
		<div class="row">
			<!-- download-app -->
			<div class="col-sm-4">
				<a href="#" class="download-app">
					{{ HTML::image('assets/images/icon/16.png','images',array('class'=>'img-responsive')) }}
					<span class="pull-left">
						<span>Ahora disponible</span>
						<strong>Google Play</strong>
					</span>
				</a>
			</div><!-- download-app -->

			<!-- download-app -->
			<div class="col-sm-4">
				<a href="#" class="download-app">
					{{ HTML::image('assets/images/icon/17.png','images',array('class'=>'img-responsive')) }}
					<span class="pull-left">
						<span>Ahora disponible</span>
						<strong>App Store</strong>
					</span>
				</a>
			</div><!-- download-app -->

			<!-- download-app -->
			<div class="col-sm-4">
				<a href="#" class="download-app">
					{{ HTML::image('assets/images/icon/18.png','images',array('class'=>'img-responsive')) }}
					<span class="pull-left">
						<span>Ahora disponible</span>
						<strong>Windows Store</strong>
					</span>
				</a>
			</div><!-- download-app -->
		</div><!-- row -->
	</div><!-- contaioner -->
</section><!-- download -->
@stop