@extends ('template')

@section ('content')
<!-- signup-page -->
	<section id="main" class="clearfix user-page">
		<div class="container">
			<div class="row text-center">
				<!-- user-login -->
				<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
					<div class="user-account">
						<h2>Editar Categor&iacute;a</h2>
						<p>
							@if(Session::get('danger'))
						        <div id="danger" class="alert alert-danger">
						          <strong>¡Error! </strong>{{Session::get('danger')}}
						        </div>
						    @endif
						</p> 
						{{ Form::open(array('url' => 'admin/categorias/actualizar/'.$category->id, 'method' => 'post')) }}
							<div class="form-group">
								<input type="text" class="form-control" name="name" value="{{$category->name}}" placeholder="Nombre Categor&iacute;a" >
								@if($errors->has('name'))
					                @foreach($errors->get('name') as $error)
					                  <span class="messageerror2">× {{ $error }}</span>
					                @endforeach
					             @endif
							</div>
							<!--*****************************************
							           Peniente para modificar 
							******************************************-->
							<select class="form-control" name="icon">
								<option value="#">Selecciona icono</option>
								<option value="valor1">incono 1</option>
							</select><!-- select -->

							<button type="submit" href="#" class="btn">Actualizar</button>
							<a class="btn cancle" href="{{ URL::action('CategoryController@list_category') }}" style="background:red">Cancelar</a>
						{{ Form::close() }}

					</div>
				</div><!-- user-login -->
			</div><!-- row -->
		</div><!-- container -->
	</section><!-- signup-page -->
@stop