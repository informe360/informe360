@extends ('template')

@section ('content')
	<!-- signup-page -->
	<section id="main" class="clearfix user-page">
		<div class="container">
			<div class="row text-center">
				<!-- user-login -->
				<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
					<div class="user-account">
						<h2>Crear Administrador</h2>
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
						{{ Form::open(array('url' => 'admin/agregar', 'method' => 'post')) }}
							<div class="form-group">
								<input type="text" class="form-control" name="name" placeholder="Nombre y Apellido" >
								@if($errors->has('name'))
					                @foreach($errors->get('name') as $error)
					                  <span class="messageerror2">× {{ $error }}</span>
					                @endforeach
					             @endif
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="user" placeholder="Username" >
								@if($errors->has('user'))
					                @foreach($errors->get('user') as $error)
					                  <span class="messageerror2">× {{ $error }}</span>
					                @endforeach
					             @endif
							</div>
							<div class="form-group">
								<input type="email" class="form-control" name="email" placeholder="Correo">
								@if($errors->has('email'))
					                @foreach($errors->get('email') as $error)
					                  <span class="messageerror2">× {{ $error }}</span>
					                @endforeach
					             @endif
							</div>
						
							<div class="form-group">
								<input type="text" class="form-control" name="celphone" placeholder="Número de Celular">
								@if($errors->has('celphone'))
					                @foreach($errors->get('celphone') as $error)
					                  <span class="messageerror2">× {{ $error }}</span>
					                @endforeach
					             @endif
							</div>
							
							
							<button type="submit" href="#" class="btn">Registrar</button>
						{{ Form::close() }}
						<!-- checkbox -->

					</div>
				</div><!-- user-login -->
			</div><!-- row -->
		</div><!-- container -->
	</section><!-- signup-page -->
@stop