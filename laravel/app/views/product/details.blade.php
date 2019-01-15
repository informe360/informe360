@extends ('template')
@section ('content')
	<section id="main" class="clearfix details-page">
		<div class="container">
			<div class="breadcrumb-section">
				<!-- breadcrumb -->
				<?php $relation = ProdCateSubc::where('product_id','=',$productDetail->id)->get()->first(); ?>
				<ol class="breadcrumb">
					<li><a href="/">Inicio</a></li>
					<li><a href="/categorias">{{Category::find($relation->category_id)->name;}}</a></li>
					<li>{{SubCategory::find($relation->subcategory_id)->name;}}</li>
				</ol><!-- breadcrumb -->
				<h2 class="title">{{Category::find($relation->category_id)->name;}}</h2>
			</div>
						
			<div class="section banner">				
				<!-- banner-form -->
				<div class="banner-form banner-form-full">
					<form action="#">
						<!-- category-change -->
						<div class="dropdown category-dropdown">						
							<a data-toggle="dropdown" href="#"><span class="change-text">Selecciona Categor&iacute;a</span> <i class="fa fa-angle-down"></i></a>
							<ul class="dropdown-menu category-change">
								@foreach($listCategory as $category)
									<li><a href="#">{{$category->name}}</a></li>
								@endforeach
							</ul>								
						</div><!-- category-change -->

						
					
						<input type="text" class="form-control" placeholder="Escriba su palabra clave">
						<button type="submit" class="form-control" value="Search">Buscar</button>
					</form>
				</div><!-- banner-form -->
			</div><!-- banner -->
	

			<div class="section slider">					
				<div class="row">
					<!-- carousel -->
					<div class="col-md-7">
						<div id="product-carousel" class="carousel slide" data-ride="carousel">
							<!-- Indicators -->
							<ol class="carousel-indicators">
								<?php $countImg = 0 ?>
								@foreach($imagesProduct as $image)
									@if ($countImg == 0)
										<li data-target="#product-carousel" data-slide-to="<?php $countImg ?>" class="active">
											{{ HTML::image($image->route,'Logo',array('class'=>'img-responsive')) }}
										</li>
									@else
										<li data-target="#product-carousel" data-slide-to="<?php $countImg ?>">
											{{ HTML::image($image->route,'Logo',array('class'=>'img-responsive')) }}
										</li>
									@endif
									<?php $countImg = $countImg + 1 ?>
								@endforeach
							</ol>

							<!-- Wrapper for slides -->
							<div class="carousel-inner" role="listbox">
								<?php $countImg = 0 ?>
								@foreach($imagesProduct as $image)
									@if ($countImg == 0)
										<div class="item active">
											<div class="carousel-image">
												<!-- image-wrapper -->
												{{ HTML::image($image->route,'Logo',array('class'=>'img-responsive')) }}
											</div>
										</div>
									@else
										<!-- item -->
										<div class="item">
											<div class="carousel-image">
												<!-- image-wrapper -->
												{{ HTML::image($image->route,'Logo',array('class'=>'img-responsive')) }}
											</div>
										</div><!-- item -->
									@endif
									<?php $countImg = $countImg + 1 ?>
								@endforeach
							</div><!-- carousel-inner -->

							<!-- Controls -->
							<a class="left carousel-control" href="#product-carousel" role="button" data-slide="prev">
								<i class="fa fa-chevron-left"></i>
							</a>
							<a class="right carousel-control" href="#product-carousel" role="button" data-slide="next">
								<i class="fa fa-chevron-right"></i>
							</a><!-- Controls -->
						</div>
					</div><!-- Controls -->	

					<!-- slider-text -->
					<div class="col-md-5">
						<div class="slider-text">
							<h2>Bs.S {{$productDetail->cost}}</h2>
							<h3 class="title">{{$productDetail->title}}</h3>
							<p><span> Publicado por </span>: <a href="#">{{$user->name}}</a></span>
							<span> ID publicación:<a href="#" class="time"> {{$productDetail->id}}</a></span></p>
							<?php 
								$fecha = strftime("%d %b, %y %H:%M", strtotime($productDetail->created_at));
							?>
							<span class="icon"><i class="fa fa-clock-o"></i><a href="#">{{$fecha}}</a></span>
							<?php $city = City::where('id_city','=',$user->city_id)->get()->first(); ?>
							<span class="icon"><i class="fa fa-map-marker"></i><a href="#">{{$city->name}}</a></span>
							<!-- <span class="icon"><i class="fa fa-suitcase online"></i><a href="#">Dealer </strong></a></span> -->
							
							<!-- short-info -->
							<div class="short-info">
								<h4>Informaci&oacute;n Breve</h4>
								@if ($productDetail->conditions == 0)
									<p><strong>Condicion: </strong><a href="#">Nuevo</a> </p>
								@else
									<p><strong>Condicion: </strong><a href="#">Usado</a> </p>
								@endif
								<p><strong>Marca: </strong><a href="#">{{$productDetail->brand}}</a> </p>
								<p><strong>Model: </strong><a href="#">{{$productDetail->model}}</a></p>
							</div><!-- short-info -->
							
							<!-- contact-with -->
							<div class="contact-with text-center">
								<!-- <h4>Contacta al publicador </h4>
								<span class="btn btn-red show-number">
									<i class="fa fa-phone-square"></i>
									<span class="hide-text">Numero Tel&eacute;fono </span> 
									<span class="hide-number">012-1234567890</span>
								</span> -->
								<button class="btn btn-red"><strong>Contactar al anunciante</strong></button>
								<!--<a href="#" class="btn" data-toggle="modal" data-target="#myModal">
									<i class="fa fa-envelope-square"></i>
									Contactar por E-mail
								</a>-->
							</div><!-- contact-with -->
							
							<!-- social-links -->
							<div class="social-links">
								<h4>Compartir este anuncio</h4>
								<ul class="list-inline">
									<li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
									<li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
									<li><a href="#"><i class="fa fa-tumblr-square"></i></a></li>
								</ul>
							</div>					
						</div>
					</div><!-- slider-text -->				
				</div>				
			</div><!-- slider -->

			<div class="description-info">
				<div class="row">
					<!-- description -->
					<div class="col-md-12">
						<div class="description">
							<h4>Descripci&oacute;n</h4>
							<p>{{$productDetail->description}}</p><br>
						</div>
					</div><!-- description -->

				</div><!-- row -->
			</div><!-- description-info -->	
			
		</div><!-- container -->
	</section><!-- main -->
	
@stop