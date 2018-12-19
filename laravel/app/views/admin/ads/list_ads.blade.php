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
				<h2 class="title">Listado Publicaciones</h2>
			</div><!-- banner -->

			@if(Session::get('msj'))
			    <div class="alert alert-success alert-dismissable">
			        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
			        <h4><i class="icon fa fa-check"></i>Éxito: {{Session::get('msj')}}</h4>
			    </div>
			@endif

			<div class="ads-info">
				<div class="row">
					<div class="col-sm-12">
						<div class="my-ads section">
							<h2>Listado Publicaciones</h2>
							
							<table class="table table-striped">
								<tr>
									<th>D&iacute;as de la Publicaci&oacute;n</th style="text-align:center"></th>
							 		<th style="text-align:center"><a href="#">Costo Bs. </a></th style="text-align:center"></th>
							 		<th style="text-align:center"><a href="#">Estatus</a></th style="text-align:center"></th>
							 		<th style="text-align:center"><a href="#">Acci&oacute;n</a></th style="text-align:center"></th>
								</tr>
							 	
							 @foreach($ad_list as $ad)
							 		<tr>
								 		<td>{{$ad->valid_time}} dias</td>
								 		<td style="text-align:center">{{$ad->cost}}</td>
								 		
								 		<td style="text-align:center">
								 			@if($ad->status == 1)
								 				<span style="color:green"><b>Activo</b></span>
								 			@else
								 				<span style="color:red"><b>Inactivo</b></span>
								 			@endif
								 		</td>
								 		
								 		<td style="text-align:center">
								 			<a href="vista-modificar-publicacion/{{$ad->id}}">
								 				<span style="margin-right:5px">Editar</span>
								 			</a>
								 			@if($ad->status == 1)
								 				<a href="desactivar-publicacion/{{$ad->id}}">
								 					<span style="color:red">
								 						<b>Desactivar</b>
								 					</span>
								 				</a>
								 			@else
								 				<a href="activar-publicacion/{{$ad->id}}">
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

						</div>
					</div><!-- my-ads -->


			</div><!-- row -->
		</div><!-- container -->
	</section><!-- myads-page -->
@stop