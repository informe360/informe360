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
				<h2 class="title">Listado SubCategor&iacute;as</h2>
			</div><!-- banner -->

			<div class="ads-info">
				<div class="row">
					<div class="col-sm-12">
						<div class="my-ads section">
							<h2>Listado SubCategor&iacute;as</h2>
							<p>
								@if(Session::get('success'))
							        <div class="alert alert-success" role="alert">
							          <strong>¡Exito! </strong>{{Session::get('success')}}
							        </div>
							    @endif
							</p>
						@if(Session::get('list'))
							<?php $list = Session::get('list');?>
							<table class="table table-striped">
							@foreach($list as $subcategory)
							 	<tr>
							 		<td>{{ $subcategory->name }}</td>
							 		<td><a href="<?=URL::to('admin/subcategorias/editar')?>/{{$subcategory->id}}">Editar</a></td>
							 	@if($subcategory->status)	
							 		<td><a href="<?=URL::to('admin/subcategorias/desactivar')?>/{{$subcategory->id}}">Eliminar</a></td>
							 	@else
							 		<td><a href="<?=URL::to('admin/subcategorias/desactivar')?>/{{$subcategory->id}}">Activar</a></td>
							 	@endif	
							 	</tr>
							 @endforeach	
							</table>
							<div class="form-group" style="text-align: right">
								<a href="<?=URL::to('admin/subcategorias/agregar-nueva/'.$subcategory->category_id)?>">Agregar Nueva Subcategor&iacute;a</a>
							</div>
							
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
						          <span>No hay subcategorias registradas!</span>
						        </div>
							</p> 
						@endif
						</div>
					</div><!-- my-ads -->

			</div><!-- row -->
		</div><!-- container -->
	</section><!-- myads-page -->
@stop