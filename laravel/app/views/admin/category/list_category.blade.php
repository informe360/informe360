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
				<h2 class="title">Listado Categor&iacute;as</h2>
			</div><!-- banner -->

			<div class="ads-info">
				<div class="row">
					<div class="col-sm-12">
						<div class="my-ads section">
							<h2>Listado Categor&iacute;as</h2>
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
								@foreach($list as $category)
									<tr>
										<td>{{ $category->name }}</td>
										<td><a href="<?=URL::to('admin/categorias/editar')?>/{{$category->id}}">Editar</a></td>
										<td><a href="<?=URL::to('admin/subcategorias/listar')?>/{{$category->id}}">Ver Subcategorias</a></td>
										@if($category->status == 1)
											<td><a href="<?=URL::to('admin/categorias/desactivar')?>/{{$category->id}}">Eliminar</a></td>
										@elseif($category->status == 0)
											<td><a href="<?=URL::to('admin/categorias/desactivar')?>/{{$category->id}}">Activar</a></td>
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
						          <span>No hay categorias registradas!</span>
						        </div>
							</p> 
						@endif
						</div>
					</div><!-- my-ads -->

			</div><!-- row -->
		</div><!-- container -->
	</section><!-- myads-page -->
@stop