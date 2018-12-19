@extends ('template')

@section ('content')
	<!-- signup-page -->
	<section id="main" class="clearfix user-page">
		<div class="container">
			<div class="row text-center">
				<!-- user-login -->
				<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
					<div class="user-account">
						<h2>Editar Administrador</h2>
						<p>
							@if(Session::get('danger'))
						        <div id="danger" class="alert alert-danger">
						          <strong>¡Error! </strong>{{Session::get('danger')}}
						        </div>
						    @endif
						</p> 
						{{ Form::open(array('url' => 'admin/actualizar/'.$admin->id, 'method' => 'post')) }}
							<div class="form-group">
								<input type="text" class="form-control" name="name" placeholder="Nombre y Apellido" value="{{ $admin->name }}">
								@if($errors->has('name'))
					                @foreach($errors->get('name') as $error)
					                  <span class="messageerror2">× {{ $error }}</span>
					                @endforeach
					             @endif
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="user" placeholder="Username" value="{{ $admin->username }}">
								@if($errors->has('user'))
					                @foreach($errors->get('user') as $error)
					                  <span class="messageerror2">× {{ $error }}</span>
					                @endforeach
					             @endif
							</div>
							<div class="form-group">
								<input type="email" class="form-control" name="email" placeholder="Correo" value="{{ $admin->email }}">
								@if($errors->has('email'))
					                @foreach($errors->get('email') as $error)
					                  <span class="messageerror2">× {{ $error }}</span>
					                @endforeach
					             @endif
							</div>
							
							<div class="form-group">
								<input type="text" class="form-control" name="celphone" placeholder="Número de Celular" value="{{ $admin->celphone }}">
								@if($errors->has('celphone'))
					                @foreach($errors->get('celphone') as $error)
					                  <span class="messageerror2">× {{ $error }}</span>
					                @endforeach
					             @endif
							</div>
							
							
							<button type="submit" href="#" class="btn">Actualizar</button>
							<a class="btn cancle" href="{{ URL::action('UsersController@list_admin') }}" style="background:red">Cancelar</a>
						{{ Form::close() }}
						<!-- checkbox -->

					</div>
				</div><!-- user-login -->
			</div><!-- row -->
		</div><!-- container -->
	</section><!-- signup-page -->
@stop