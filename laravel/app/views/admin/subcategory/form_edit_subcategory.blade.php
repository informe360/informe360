@extends ('template')

@section ('content')
<!-- signup-page -->
	<section id="main" class="clearfix user-page">
		<div class="container">
			<div class="row text-center">
				<!-- user-login -->
				<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
					<div class="user-account">
						<h2>Editar SubCategor&iacute;a</h2>
						<p>
							@if(Session::get('danger'))
						        <div id="danger" class="alert alert-danger">
						          <strong>¡Error! </strong>{{Session::get('danger')}}
						        </div>
						    @endif
						</p> 
						<?php $subcategory = Session::get('subcategory'); ?>

						{{ Form::open(array('url' => 'admin/subcategorias/Actualizar/'.$subcategory->id, 'method' => 'post')) }}
							<div class="form-group">
								<input type="text" class="form-control last-sub" name="subcategory-1" value="{{$subcategory->name}}" placeholder="Nombre Subcategor&iacute;a">
								@if($errors->has('subcategory-1'))
					                @foreach($errors->get('subcategory-1') as $error)
					                  <span class="messageerror2">× {{ $error }}</span>
					                @endforeach
					            @endif
							</div>
							
							<button type="submit" href="#" class="btn">Actualizar</button>
							<a class="btn cancle" href="{{ URL::to('admin/subcategorias/listar/'.SubCategory::getCategoryId($id)) }}" style="background:red">Cancelar</a>
						{{ Form::close() }}

					</div>
				</div><!-- user-login -->
			</div><!-- row -->
		</div><!-- container -->
	</section><!-- signup-page -->
@stop