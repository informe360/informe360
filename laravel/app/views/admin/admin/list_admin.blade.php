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
				<h2 class="title">Listado Administradores</h2>
			</div><!-- banner -->

			<div class="ads-info">
				<div class="row">
					<div class="col-sm-12">
						<div class="my-ads section">
							<h2>Listado Administradores</h2>
						<p>
							@if(Session::get('success'))
						        <div class="alert alert-success" role="alert">
						          <strong>¡Exito! </strong>{{Session::get('success')}}
						        </div>
						    @endif
						</p>
						<p>
							@if(Session::get('successActivate'))
						        <div class="alert alert-success" role="alert">
						          <strong>¡Exito! </strong>{{Session::get('successActivate')}}
						        </div>
						    @endif
						</p>
						<p>
							@if(Session::get('successInactive'))
						        <div class="alert alert-success" role="alert">
						          <strong>¡Exito! </strong>{{Session::get('successInactive')}}
						        </div>
						    @endif
						</p> 
					@if(Session::get('list'))
					<?php $list = Session::get('list');?>
						@foreach($list as $admin)
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
										<h3 class="item-price">{{$admin->name}}</h3>
										@if($admin->status == 1)
											<h5 class="item-title"><b>Estatus: </b><a href="#">Activo</a></h5>
										@else
											<h5 class="item-title"><b>Estatus: </b><a href="#">Inactivo</a></h5>
										@endif
										
									</div><!-- ad-info -->

									<!-- ad-meta -->
									<div class="ad-meta">
										<div class="meta-content">
											<span class="dated">
												<b>Usuario Desde:</b> 
												<?php 
													$fecha = strftime("%d %b %Y", strtotime($admin->created_at));
												?>
												<a href="#">{{$fecha}}</a>
											</span>
											<span class="dated">
												<a class="admin-details" id="{{$admin->id}}" href="#" data-toggle="modal" data-target="#myModal">
													Detalle Administrador
												</a>
											</span>
											

										</div>	
										<!-- item-info-right -->
										<div class="user-option pull-right">
											<a class="edit-item" href="<?=URL::to('admin/editar-administrador/') ?>/{{$admin->id}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Editar usuario">
											<i class="fa fa-pencil"></i>
											</a>
										@if($admin->status == 1)
											<a class="delete-item" href="<?=URL::to('admin/desactivar/') ?>/{{$admin->id}}" data-toggle="tooltip" data-placement="top" title="Desactivar Usuario"><i class="fa fa-times"></i></a>
										@else		
											<a class="check-item" href="<?=URL::to('admin/activar/') ?>/{{$admin->id}}" data-toggle="tooltip" data-placement="top" title="Activar Usuario"><i class="fa fa-check"></i></a>
										@endif
										</div>	
									</div><!-- ad-meta -->
								</div><!-- item-info -->
							</div><!-- ad-item -->
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

						</div>
					</div><!-- my-ads -->
				@else
					<p>
				        <div id="danger" class="alert alert-info">
				          <span>No hay administadores registrados!</span>
				        </div>
					</p> 
				@endif

			</div><!-- row -->
		</div><!-- container -->
	</section><!-- myads-page -->

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Datos del Usuario</h4>
	      </div>
	      <div class="modal-body">
	       <div class="ad-profile section">
					<div class="user-profile">
						<div class="user-images">
							{{ HTML::image('assets/images/user.jpg','Image',array('class'=>'img-responsive')) }}
						</div>
						<div class="user">
							<h2>Administrador: <a id="name" href="#"></a></h2>
							<h5 id="email"> </h5>
							<h5 id="celphone"> </h5>
						</div>

					</div><!-- user-profile -->


			</div><!-- ad-profile -->
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	       
	      </div>
	    </div>
	  </div>
	</div>
	<input id="val" type="hidden" name="user" class="input-block-level" value="" >
@stop