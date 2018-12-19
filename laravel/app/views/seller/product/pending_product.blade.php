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
				<h2 class="title">Anuncios Pendiente de Aprobaci&oacute;n</h2>
			</div><!-- banner -->

			<p>
				@if(Session::get('success'))
			        <div class="alert alert-success" role="alert">
			          <strong>¡Exito! </strong>{{Session::get('success')}}
			        </div>
			    @endif
			</p> 

			<div class="ad-profile section">
					<div class="user-profile">
						<div class="user-images">
							{{ HTML::image('assets/images/user.jpg','Logo',array('class'=>'img-responsive')) }}
						</div>
						<div class="user">
							<h2>Hola, <a href="#">{{Auth::user()->name;}}.</a></h2>
							<h5>Tú última sesión fue: {{Auth::user()->last_login;}}</h5>
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
						<li><a href="{{ URL::action('ProductController@productsNotPublished') }}">Anuncios No Publicados</a></li>
						<li class="active"><a href="{{ URL::action('ProductController@pending_products') }}">Pendiente de Aprobación</a></li>
						<li><a href="{{ URL::action('ProductController@select_product') }}">Nuevo Anuncio</a></li>
						<li><a href="ventas-realizadas.html">Ventas Realizadas</a></li>
						<li><a href="ventas-noconcretada.html">Ventas por Concretar</a></li>
					</ul>


			</div><!-- ad-profile -->

			<div class="ads-info">
				<div class="row">
					<div class="col-sm-8">
						<div class="my-ads section">
							<h2>Anuncios Pendientes</h2>
							
						@foreach($products as $product)
							<!-- ad-item -->
							<div class="ad-item row">
								<div class="item-image-box col-sm-4">
									<!-- item-image -->
									<div class="item-image">
										<?php $image = Image::where('product_id','=',$product->id)->get()->first(); ?>
										<a href="details.html">{{ HTML::image($image->route,'Logo',array('class'=>'img-responsive')) }}</a>
									</div><!-- item-image -->
								</div><!-- item-image-box -->

								<div class="item-info col-sm-8">
									<!-- ad-info -->
									<div class="ad-info">
									@if($product->negotiable)
										<h3 class="item-price">Bs. {{$product->cost}} <span>(Negociable)</span></h3>
									@else
										<h3 class="item-price">Bs. {{$product->cost}} </h3>
									@endif	
										<h4 class="item-title"><a href="#">{{$product->title}}</a></h4>
										<div class="item-cat">
											<?php $relation = ProdCateSubc::where('product_id','=',$product->id)->get()->first(); ?>
											<span><a href="#">{{Category::find($relation->category_id)->name;}}</a></span> /
											<span><a href="#">{{SubCategory::find($relation->subcategory_id)->name;}}</a></span>
										</div>
									</div><!-- ad-info -->

									<!-- ad-meta -->
									<div class="ad-meta">
										<?php 
											$fecha = strftime("%d %b, %y %H:%M", strtotime($product->created_at));
										?>
										<div class="meta-content">
											<span class="dated">Uploaded On: <a href="#">{{$fecha}} </a></span>
											<span class="pending">Pendiente</span>
										</div>
										<!-- item-info-right -->
										<div class="user-option pull-right">
											<a class="edit-item" href="ad-post-details.html" data-toggle="tooltip" data-placement="top" title="Edit this ad"><i class="fa fa-pencil"></i></a>
											<a class="delete-items" href="<?=URL::to('vendedor/desactivar/'.$product->id)?>" data-toggle="tooltip" data-placement="top" title="Delete this ad"><i class="fa fa-times"></i></a>
										</div><!-- item-info-right -->
									</div><!-- ad-meta -->
								</div><!-- item-info -->
							</div>
							<!-- ad-item -->
						@endforeach

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