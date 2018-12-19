@extends ('template')

@section ('content')
<!-- signup-page -->
	<section id="main" class="clearfix user-page">
		<div class="container">
			<div class="row text-center">
				<!-- user-login -->
				<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
					<div class="user-account">
						<h2>Crear Categor&iacute;a</h2>
						<p>
							@if(Session::get('danger'))
						        <div id="danger" class="alert alert-danger">
						          <strong>¡Error! </strong>{{Session::get('danger')}}
						        </div>
						    @endif
						</p> 
						<p> 
							@if(Session::get('success'))
						        <div class="alert alert-success" role="alert">
						          <strong>¡Exito! </strong>{{Session::get('success')}}
						        </div>
						    @endif
						</p> 
						{{ Form::open(array('url' => 'admin/categorias/nueva', 'method' => 'post')) }}
							<div class="form-group">
								<input type="text" class="form-control" name="name" placeholder="Nombre Categor&iacute;a" >
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
								<option value="0">Selecciona icono</option>
								@if(isset($icons_list))
									@foreach($icons_list as $icono)
										<option value="{{$icono->id}}">
											{{$icono->name}}
										</option>
									@endforeach
								@endif
								
							</select><!-- select -->

							<h4>Agregar SubCategor&iacute;a</h4>
							<div id="subcategories">
								<div class="form-group">
									<input type="text" class="form-control last-sub" name="subcategory-1" placeholder="Nombre Subcategor&iacute;a">
									@if($errors->has('subcategory-1'))
						                @foreach($errors->get('subcategory-1') as $error)
						                  <span class="messageerror2">× {{ $error }}</span>
						                @endforeach
						            @endif
								</div>
							</div>
							<div class="form-group new-sub" style="text-align: right">
								<a href="#">Agregar otra Subcategor&iacute;a</a>
							</div>
							<button type="submit" href="#" class="btn">Crear Categor&iacute;a</button>
						{{ Form::close() }}

					</div>
				</div><!-- user-login -->
			</div><!-- row -->
		</div><!-- container -->
	</section><!-- signup-page -->
@stop