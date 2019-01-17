@extends ('template')
@section('content')
	<!-- world-gmap -->
	<section id="main" class="clearfix home-two">
		<!-- gmap -->	
		<div id="road_map">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<!-- <ol class="carousel-indicators">
					<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-example-generic" data-slide-to="1"></li>
					<li data-target="#carousel-example-generic" data-slide-to="2"></li>
				</ol> -->

				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<div class="item active">
					<img src="assets/images/poster6.jpg" alt="...">
					<div class="carousel-caption">
						<h3>Encuentra la pc de tus sueños</h3>
						<p>Contacta al vendedor y listo</p>
					</div>
					</div>
					<div class="item">
					<img src="assets/images/poster5.jpg" alt="...">
					<div class="carousel-caption">
						<h3>Los mejores equipos del mercado</h3>
						<p>Busca las publicaciones referentes a equipos de tecnologia en un click</p>
					</div>
					</div>
				</div>

				<!-- Controls -->
				<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>		
		
		<div class="container">
			<div class="row">
				<!-- banner -->
				<div class="col-sm-12">
					<div class="banner-section text-center">						
						<!-- banner-form -->
						<div class="banner-form banner-form-full" id="div-search">
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
                                        <li><a href="#">Mascotas</a></li>
                                        <li><a href="#">Artículos /Hogar</a></li>
                                        <li><a href="#">Otros productos</a></li>

                                    </ul>
                                </div><!-- category-change -->
								
								<input type="text" class="form-control" placeholder="Escribe la palabra clave" id="search-input">
								<button type="submit" class="form-control" value="Search">Buscar</button>
							</form>
						</div><!-- banner-form -->
						<div class="col-md-12">
							<div class="list-group text-left" style="display:none; position: absolute; z-index: 1; top: 38%; width: 100%; box-shadow: 0px 0px 0px 5px #efeeee !important; font-weight: bold;" id="item-search">

							</div>
						</div>
                        	
					</div>
				</div><!-- banner -->
			</div><!-- row -->

			<!-- category-ad -->
			<div class="col-md-12 category-ad text-center" style="margin-bottom: 3% !important;">
				<ul class="category-list">	
					<li class="category-item">
						<a href="<?=URL::to('categorias/Vehículos')?>">
							<div class="category-icon"><img src="assets/images/icon/1.png" alt="images" class="img-responsive"></div>
							<span class="category-title">Vehículos</span>
							<!-- <span class="category-quantity">(1298)</span> -->
						</a>
					</li><!-- category-item -->
					
					<li class="category-item">
						<a href="<?=URL::to('categorias/Electrónica & Equipos')?>">
							<div class="category-icon"><img src="assets/images/icon/2.png" alt="images" class="img-responsive"></div>
							<span class="category-title">Electrónica & Equipos</span>
							<!-- <span class="category-quantity">(76212)</span> -->
						</a>
					</li><!-- category-item -->
					
					<li class="category-item">
						<a href="<?=URL::to('categorias/Inmuebles')?>">
							<div class="category-icon"><img src="assets/images/icon/3.png" alt="images" class="img-responsive"></div>
							<span class="category-title">Inmuebles</span>
							<!-- <span class="category-quantity">(212)</span> -->
						</a>
					</li><!-- category-item -->
					
					<li class="category-item">
						<a href="<?=URL::to('categorias/Moda & Ropa')?>">
							<div class="category-icon"><img src="assets/images/icon/5.png" alt="images" class="img-responsive"></div>
							<span class="category-title">Moda & Ropa</span>
							<!-- <span class="category-quantity">(1298)</span> -->
						</a>
					</li><!-- category-item -->
					
					<li class="category-item">
						<a href="<?=URL::to('categorias/Repuesto')?>">
							<div class="category-icon"><img src="assets/images/icon/6.png" alt="images" class="img-responsive"></div>
							<span class="category-title">Repuestos</span>
							<!-- <span class="category-quantity">(76212)</span> -->
						</a>
					</li><!-- category-item -->
					
					<li class="category-item">
						<a href="<?=URL::to('categorias/Artículos Hogar')?>">
							<div class="category-icon"><img src="assets/images/icon/9.png" alt="images" class="img-responsive"></div>
							<span class="category-title">Artículos Hogar</span>
							<!-- <span class="category-quantity">(1298)</span> -->
						</a>
					</li><!-- category-item -->
					
					<li class="category-item">
						<a href="<?=URL::to('categorias/Servicios')?>">
							<div class="category-icon"><img src="assets/images/icon/7.png" alt="images" class="img-responsive"></div>
							<span class="category-title">Servicios</span>
							<!-- <span class="category-quantity">(76212)</span> -->
						</a>
					</li><!-- category-item -->
					
					<li class="category-item">
						<a href="<?=URL::to('categorias/Otros productos')?>">
							<div class="category-icon"><img src="assets/images/icon/12.png" alt="images" class="img-responsive"></div>
							<span class="category-title">Otros productos </span>
							<!-- <span class="category-quantity">(1298)</span> -->
						</a>
					</li><!-- category-item -->			
                </ul>	
                			
			</div><!-- category-ad -->			

            <!-- ad-section -->
            <div class="ad-section text-center">
                <a href="#">
                    {{ HTML::image('assets/images/bg/panel-one.jpg','images',array('class'=>'img-responsive')) }}
                </a>
            </div><!-- ad-section -->
			
			<!-- featureds -->
			<div class="section featureds">
				<div class="row">
					<!-- featured-top -->
					<div class="col-sm-12">
						<div class="featured-top">
							<h4>Anuncios destacados</h4>
						</div>
					</div><!-- featured-top -->
				</div>
					
				<div class="row">
                    <!-- featured -->
                    @foreach($products as $product)
					    <div class="col-md-4 col-lg-3">
                            <!-- featured -->
                            <div class="featured">
                                <div class="featured-image">
                                    <?php $image = Image::where('product_id','=',$product->id)->get()->first(); ?>
                                    <a href="<?=URL::to('/anuncio/detalles/'.$product->id)?>">
                                        {{ HTML::image($image->route,'images',array('class'=>'img-responsive')) }}
                                    </a>
                                    <!-- <a href="#" class="verified" data-toggle="tooltip" data-placement="top" title="Verified"><i class="fa fa-check-square-o"></i></a> -->
                                </div>
                                
                                <!-- ad-info -->
                                <div class="ad-info">
                                    <h3 class="item-price">Bs.S {{$product->cost}}</h3>
                                    <h4 class="item-title"><a href="<?=URL::to('/anuncio/detalles/'.$product->id)?>">{{$product->title}}</a></h4>
                                    <div class="item-cat">
                                        <?php $relation = ProdCateSubc::where('product_id','=',$product->id)->get()->first(); ?>
                                        <span><a href="#">{{Category::find($relation->category_id)->name;}}</a></span> 
                                    </div>
                                </div><!-- ad-info -->
                                
                                <!-- ad-meta -->
                                <div class="ad-meta">
                                    <div class="meta-content">
                                        <?php 
										    $fecha = strftime("%d %b, %y %H:%M", strtotime($product->created_at));
										?>
                                        <span class="dated"><a href="#">{{$fecha}} </a></span>
                                    </div>									
                                    <!-- item-info-right -->
                                    <div class="user-option pull-right">
                                        <?php $city = City::where('id_city','=',$product->user_id)->get()->first(); ?>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="{{$city->name}}"><i class="fa fa-map-marker"></i> </a>
                                        <!-- <a href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-suitcase"></i> </a>											 -->
                                    </div><!-- item-info-right -->
                                </div><!-- ad-meta -->
                            </div><!-- featured -->
                        </div><!-- featured -->
                    @endforeach
				</div><!-- row -->				

				<!-- pagination  -->
				<div class="text-center">
					<ul class="pagination ">
						<li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
						<li><a href="#">1</a></li>
						<li class="active"><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li><a>...</a></li>
						<li><a href="#">10</a></li>
						<li><a href="#">20</a></li>
						<li><a href="#">30</a></li>
						<li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
					</ul>
				</div><!-- pagination  -->	
			</div><!-- featureds -->
							

			<!-- cta -->
			<div class="section cta text-center">
				<div class="row">
					<!-- single-cta -->
					<div class="col-sm-4">
						<div class="single-cta">
							<!-- cta-icon -->
							<div class="cta-icon icon-secure">
								<img src="assets/images/icon/13.png" alt="Icon" class="img-responsive">
							</div><!-- cta-icon -->

							<h4>Secure Trading</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
						</div>
					</div><!-- single-cta -->

					<!-- single-cta -->
					<div class="col-sm-4">
						<div class="single-cta">
							<!-- cta-icon -->
							<div class="cta-icon icon-support">
								<img src="assets/images/icon/14.png" alt="Icon" class="img-responsive">
							</div><!-- cta-icon -->

							<h4>24/7 Support</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
						</div>
					</div><!-- single-cta -->

					<!-- single-cta -->
					<div class="col-sm-4">
						<div class="single-cta">
							<!-- cta-icon -->
							<div class="cta-icon icon-trading">
								<img src="assets/images/icon/15.png" alt="Icon" class="img-responsive">
							</div><!-- cta-icon -->

							<h4>Easy Trading</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
						</div>
					</div><!-- single-cta -->
				</div>
			</div><!-- cta -->			
			
		</div><!-- container -->
	</section><!-- world-gmap -->
	
	<!-- download -->
	<section id="download" class="clearfix parallax-section">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
					<h2>Download on App Store</h2>
				</div>
			</div><!-- row -->

			<!-- row -->
			<div class="row">
				<!-- download-app -->
				<div class="col-sm-4">
					<a href="#" class="download-app">
						<img src="assets/images/icon/16.png" alt="Image" class="img-responsive">
						<span class="pull-left">
							<span>available on</span>
							<strong>Google Play</strong>
						</span>
					</a>
				</div><!-- download-app -->

				<!-- download-app -->
				<div class="col-sm-4">
					<a href="#" class="download-app">
						<img src="assets/images/icon/17.png" alt="Image" class="img-responsive">
						<span class="pull-left">
							<span>available on</span>
							<strong>App Store</strong>
						</span>
					</a>
				</div><!-- download-app -->

				<!-- download-app -->
				<div class="col-sm-4">
					<a href="#" class="download-app">
						<img src="assets/images/icon/18.png" alt="Image" class="img-responsive">
						<span class="pull-left">
							<span>available on</span>
							<strong>Windows Store</strong>
						</span>
					</a>
				</div><!-- download-app -->
			</div><!-- row -->
		</div><!-- contaioner -->
	</section><!-- download -->
	
	<!-- footer -->
	<footer id="footer" class="clearfix">
		<!-- footer-top -->
		<section class="footer-top clearfix">
			<div class="container">
				<div class="row">
					<!-- footer-widget -->
					<div class="col-sm-3">
						<div class="footer-widget">
							<h3>Quik Links</h3>
							<ul>
								<li><a href="#">About Us</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">All Cities</a></li>
								<li><a href="#">Help & Support</a></li>
								<li><a href="#">Advertise With Us</a></li>
								<li><a href="#">Blog</a></li>
							</ul>
						</div>
					</div><!-- footer-widget -->

					<!-- footer-widget -->
					<div class="col-sm-3">
						<div class="footer-widget">
							<h3>How to sell fast</h3>
							<ul>
								<li><a href="#">How to sell fast</a></li>
								<li><a href="#">Membership</a></li>
								<li><a href="#">Banner Advertising</a></li>
								<li><a href="#">Promote your ad</a></li>
								<li><a href="#">Trade Delivers</a></li>
								<li><a href="#">FAQ</a></li>
							</ul>
						</div>
					</div><!-- footer-widget -->

					<!-- footer-widget -->
					<div class="col-sm-3">
						<div class="footer-widget social-widget">
							<h3>Follow us on</h3>
							<ul>
								<li><a href="#"><i class="fa fa-facebook-official"></i>Facebook</a></li>
								<li><a href="#"><i class="fa fa-twitter-square"></i>Twitter</a></li>
								<li><a href="#"><i class="fa fa-google-plus-square"></i>Google+</a></li>
								<li><a href="#"><i class="fa fa-youtube-play"></i>youtube</a></li>
							</ul>
						</div>
					</div><!-- footer-widget -->

					<!-- footer-widget -->
					<div class="col-sm-3">
						<div class="footer-widget news-letter">
							<h3>Newsletter</h3>
							<p>Trade is Worldest leading classifieds platform that brings!</p>
							<!-- form -->
							<form action="#">
								<input type="email" class="form-control" placeholder="Your email id">
								<button type="submit" class="btn btn-primary">Sign Up</button>
							</form><!-- form -->			
						</div>
					</div><!-- footer-widget -->
				</div><!-- row -->
			</div><!-- container -->
		</section><!-- footer-top -->

		
		<div class="footer-bottom clearfix text-center">
			<div class="container">
				<p>Copyright &copy; 2016. Developed by <a href="http://themeregion.com/">ThemeRegion</a></p>
			</div>
		</div><!-- footer-bottom -->
	</footer><!-- footer -->
	
	<!--/Preset Style Chooser--> 
	<!-- <div class="style-chooser">
		<div class="style-chooser-inner">
			<a href="#" class="toggler"><i class="fa fa-life-ring fa-spin"></i></a>
			<h4>Presets</h4>
			<ul class="preset-list clearfix">
				<li class="preset1 active" data-preset="1"><a href="#" data-color="preset1"></a></li>
				<li class="preset2" data-preset="2"><a href="#" data-color="preset2"></a></li>
				<li class="preset3" data-preset="3"><a href="#" data-color="preset3"></a></li>        
				<li class="preset4" data-preset="4"><a href="#" data-color="preset4"></a></li>
			</ul>
		</div>
	</div> -->
    <!--/End:Preset Style Chooser-->
@stop