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
				<h2 class="title">Listado Compradores</h2>
			</div><!-- banner -->

			<div class="ads-info">
				<div class="row">
					<div class="col-sm-12">
						<div class="my-ads section">
							<h2>Listado Compradores</h2>
							<p>
								@if(Session::get('success'))
							        <div class="alert alert-success" role="alert">
							          <strong>¡Exito! </strong>{{Session::get('success')}}
							        </div>
							    @endif
							</p>
							
							@if(Session::get('list'))
								<?php $list = Session::get('list'); ?>
								<table class="table table-striped">
								<tr>
									<td></td>
									<td>Nombre</td>
									<td>Estatus</td>
									<td>Comprador Desde</td>
									<td>Info Comprador</td>
									<td>Acci&oacute;n</td>
								</tr>
								@foreach($list as $buyer)
								 	<tr>
								 		<td>{{ HTML::image('assets/images/user.jpg','Image',array('class'=>'img-responsive')) }}</td>
								 		<td><a href="#">{{ $buyer->name }}</a></td>
								 	@if($buyer->status == 0)	
								 		<td>Cuenta Cerrada</td>
								 	@else
								 		<td>Cuenta Activa</td>
								 	@endif	
								 		<?php 
											$fecha = strftime("%d %b %Y", strtotime($buyer->created_at));
										?>
								 		<td> {{ $fecha }} </td>
								 		<td><a href="#" data-toggle="modal" data-target="#myModal">Detalle</a></td>
								 	@if($buyer->status == 0)	
								 		<td><a href="<?=URL::to('admin/cambiar_comprador') ?>/{{ $buyer->id }}">Activar Cuenta</a></td>
								 	@else
								 		<td><a href="<?=URL::to('admin/cambiar_comprador') ?>/{{ $buyer->id }}">Desactivar Cuenta</a></td>
								 	@endif	
								 	</tr>
							 	@endforeach
							 	</table>
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
							          <span>No hay compradores registrados!</span>
							        </div>
								</p> 
							 @endif	
						</div>
					</div><!-- my-ads -->
			</div><!-- row -->
		</div><!-- container -->
	</section><!-- myads-page -->
@stop