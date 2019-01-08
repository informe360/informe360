@extends ('template')

@section ('content')
	<!-- myads-page -->
	<section id="main" class="clearfix myads-page">
		<div class="container">

			<div class="breadcrumb-section">
				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li><a href="index.html">Inicio</a></li>
					
				</ol><!-- breadcrumb -->
				<h2 class="title">Publicaciones x Aprobar</h2>
			</div><!-- banner -->



			<div class="ads-info">
				<div class="row">
					<div class="col-sm-12">
						<div class="my-ads section">
							<h2>Publicaciones por Aprobar</h2>
							
							@foreach($products as $product)
								<!-- ad-item -->
								<div class="ad-item row">
									<div class="item-image-box col-sm-4">
										<!-- item-image -->
										<div class="item-image">
											<a href="details.html">
												{{ HTML::image('assets/images/bg/2.jpg','Logo',array('class'=>'img-responsive')) }}
											</a>
										</div><!-- item-image -->
									</div><!-- item-image-box -->


									<div class="item-info col-sm-8">
										<!-- ad-info -->
										<div class="ad-info">
											<h3 class="item-price">{{$product->title}}</h3>
										</div><!-- ad-info -->

										<!-- ad-meta -->
										<div class="ad-meta">
											<div class="meta-content">
											<?php 
												$fecha = strftime("%d %b, %y", strtotime($product->created_at));
											?>
												<span class="dated">
													<b>Fecha Solicitud:</b> 
													<a href="#">{{$fecha}} </a>
												</span>
												<!-- <span class="dated">
													<b>Vendedor:</b>
													<a href="#" data-toggle="modal" data-target="#myModal">Juan Perez </a>
												</span> -->

											</div>	
											<!-- item-info-right -->
											<div class="user-option pull-right">
												<a class="delete-item" href="<?=URL::to('vendedor/desactivar/'.$product->id)?>" data-toggle="tooltip" data-placement="top" title="Negar Publicacion"><i class="fa fa-times"></i></a>
												<a class="delete-items" href="<?=URL::to('vendedor/activar/'.$product->id)?>" data-toggle="tooltip" data-placement="top" title="Delete this ad"><i class="fa fa-check"></i></a>
											</div>
										</div><!-- ad-meta -->
									</div><!-- item-info -->
								</div><!-- ad-item -->
							@endforeach
						</div>
					</div><!-- my-ads -->


			</div><!-- row -->
		</div><!-- container -->
	</section><!-- myads-page -->
@stop