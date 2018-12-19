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
				<h2 class="title">Listado &iacute;conos</h2>
			</div><!-- banner -->

			<div class="ads-info">
				<div class="row">
					<div class="col-sm-12">
						<div class="my-ads section">
							<h2>Listado &iacute;conos</h2>
							<p>
								@if(Session::get('success'))
							        <div class="alert alert-success" role="alert">
							          <strong>¡Exito! </strong>{{Session::get('success')}}
							        </div>
							    @endif
							</p>
							<p>
								@if(Session::get('danger'))
							        <div id="danger" class="alert alert-danger">
						          <strong>¡Error! </strong>{{Session::get('danger')}}
						        </div>
							    @endif
							</p>
						@if(isset($icons_list))
							<?php $list = Session::get('list');?>
							<table class="table table-striped">
								<tr>
									<th>Icono</th>
									<th>Categor&iacute;a</th>
									<th style="text-align:center">Acci&oacute;n</th>
								</tr>
							@foreach($icons_list as $icon)
							 	<tr>
							 		<td>
							 		{{ HTML::image('iconfolder/'.$icon->iconroute,'Promo') }}
							 		</td>
							 		<td>{{ $icon->name }}</td>
							 		<td style="text-align:center">
							 			<a href="vista-modificar-icono/{{$icon->id}}">
							 				<span style="margin-right:5px">Editar</span>
							 			</a>
							 			@if($icon->active == 1)
							 				<a href="desactivar-icono/{{$icon->id}}">
							 					<span style="color:red">
							 						<b>Desactivar</b>
							 					</span>
							 				</a>
							 			@else
							 				<a href="activar-icono/{{$icon->id}}">
							 					<span style="color:green">
							 						<b>Activar</b>
							 					</span>
							 				</a>
							 			@endif
							 		
							 		</td>
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
						          <span>No hay &iacute;conos registrados!</span>
						        </div>
							</p> 
						@endif
						</div>
					</div><!-- my-ads -->

			</div><!-- row -->
		</div><!-- container -->
	</section><!-- myads-page -->
@stop