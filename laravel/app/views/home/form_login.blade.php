@extends ('template')

@section ('content')

<!-- signin-page -->
	<section id="main" class="clearfix user-page">
		<div class="container">
			<div class="row text-center">
				<!-- user-login -->
				<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
					<div class="user-account">
						<h2>Entrar</h2>
						<!-- Mensaje de error -->
						<p>
							@if(Session::get('danger'))
						        <div id="danger" class="alert alert-danger">
						          <strong>¡Error! </strong>{{Session::get('danger')}}
						        </div>
						    @endif
						</p> 
			            <!-- form -->
						{{ Form::open(array('url' => 'validate-login', 'method' => 'post')) }}
							<div class="form-group">
								<input type="text" name="email" class="form-control" placeholder="Correo" >
							</div>
							<div class="form-group">
								<input type="password" name="password" class="form-control" placeholder="Tu Clave" >
							</div>
							<button type="submit" href="#" class="btn">Iniciar Sesión</button>
						{{ Form::close() }}

						<!-- forgot-password -->
						<div class="user-option">
							<div class="checkbox pull-left">
								<label for="logged"><input type="checkbox" name="logged" id="logged"> Recordar </label>
							</div>
							<div class="pull-right forgot-password">
								<a href="#">Perdió su clave</a>
							</div>
						</div><!-- forgot-password -->
					</div>
					<!-- <a href="#" class="btn-primary">Crear una nueva cuenta</a> -->
				</div><!-- user-login -->
			</div><!-- row -->
		</div><!-- container -->
	</section><!-- signin-page -->

@stop