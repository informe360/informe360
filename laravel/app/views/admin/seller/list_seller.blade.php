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
				<h2 class="title">Listado Vendedores</h2>
			</div><!-- banner -->

			<div class="ads-info">
				<div class="row">
					<div class="col-sm-12">
						<div class="my-ads section">
							<h2>Listado Vendedores</h2>
							
							<p>
								@if(Session::get('success'))
							        <div class="alert alert-success" role="alert">
							          <strong>¡Exito! </strong>{{Session::get('success')}}
							        </div>
							    @endif
							</p>
					@if(Session::get('list'))
						<?php $list = Session::get('list'); ?>		
						@foreach($list as $seller)
							<!-- ad-item -->
							<div class="ad-item row">
								<div class="item-image-box col-sm-2">
									<!-- item-image -->
									<div class="item-image">
										<a href="details.html">{{ HTML::image('assets/images/user.jpg','Image',array('class'=>'img-responsive')) }}</a>
									</div><!-- item-image -->
								</div><!-- item-image-box -->


								<div class="item-info col-sm-10">
									<!-- ad-info -->
									<div class="ad-info">
										<h3 class="item-price">{{ $seller->name }}</h3>

										@if($seller->status == 1)
										<h5 class="item-title"><b>Estatus: </b><a href="#">Cuenta Activa</a></h5>
										<div class="item-cat">
											<span>
												<b>Accci&oacute;n: </b><a href="#">Desactivar Cuenta</a>
										@else
										<h5 class="item-title"><b>Estatus: </b><a href="#">Cuenta Cerrada</a></h5>
										<div class="item-cat">
											<span>
												<b>Accci&oacute;n: </b><a href="#">Activar Cuenta</a>
										@endif
											</span>
										</div>
									</div><!-- ad-info -->

									<!-- ad-meta -->
									<div class="ad-meta" style="height:35px">
										<div class="meta-content">
											<span class="dated">
												<b>Vendedor Desde:</b> 
												<?php 
													$fecha = strftime("%d %b %Y", strtotime($seller->created_at));
												?>
												<a href="#">{{ $fecha }}</a>
											</span>
											<span class="dated">
												<a href="#" data-toggle="modal" data-target="#myModal">
													Detalle Vendedor
												</a>
											</span>
											
											<div class="user-option pull-right">
												@if($seller->status == 1)
													<a class="delete-item" href="<?=URL::to('admin/cambiar_vendedor/') ?>/{{$seller->id}}" data-toggle="tooltip" data-placement="top" title="Desactivar Usuario"><i class="fa fa-times"></i></a>
												@else		
													<a class="check-item" href="<?=URL::to('admin/cambiar_vendedor/') ?>/{{$seller->id}}" data-toggle="tooltip" data-placement="top" title="Activar Usuario"><i class="fa fa-check"></i></a>
												@endif
											</div>

										</div>	
										
									</div><!-- ad-meta -->
								</div><!-- item-info -->
							</div>
							<!-- ad-item -->
						@endforeach	

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
					@else
						<p>
					        <div id="danger" class="alert alert-info">
					          <span>No hay vendedores registrados!</span>
					        </div>
						</p> 
					@endif	

						</div>
					</div><!-- my-ads -->

			</div><!-- row -->
		</div><!-- container -->
	</section><!-- myads-page -->
@stop