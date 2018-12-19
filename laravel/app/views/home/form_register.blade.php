@extends ('template')

@section ('content')

<!-- signup-page -->
	<section id="main" class="clearfix user-page">
		<div class="container">
			<div class="row text-center">
				<!-- user-login -->
				<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
					<div class="user-account">
						<h2>Vender o Comprar crea tu cuenta.</h2>
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
						<p><span class="pull-right" style="color:#ed1c24;padding-bottom:3px">* Todos los Campos son Obligatorios</span></p>
						
						{{ Form::open(array('url' => 'register-new-user', 'method' => 'post')) }}
							
							<div class="form-group">
								<input type="text" name="name" class="form-control" placeholder="Nombre" >
								@if($errors->has('name'))
					                @foreach($errors->get('name') as $error)
					                  <span class="messageerror2">× {{ $error }}</span>
					                @endforeach
					             @endif
							</div>
							<div class="form-group">
								<input type="text" name="identification" class="form-control" placeholder="CI o RIF" >
								@if($errors->has('identification'))
					                @foreach($errors->get('identification') as $error)
					                  <span class="messageerror2">× {{ $error }}</span>
					                @endforeach
					             @endif
							</div>
							<div class="form-group">
								<input type="email" name="email" class="form-control" placeholder="Tú correo">
								@if($errors->has('email'))
					                @foreach($errors->get('email') as $error)
					                  <span class="messageerror2">× {{ $error }}</span>
					                @endforeach
					             @endif
							</div>
							<div class="form-group">
								<input type="password" name="password" class="form-control" placeholder="Clave">
								@if($errors->has('password'))
					                @foreach($errors->get('password') as $error)
					                  <span class="messageerror2">× {{ $error }}</span>
					                @endforeach
					            @endif
							</div>
							<div class="form-group">
								<input type="password" name="password_repeat" class="form-control" placeholder="Confirmar Clave">
								@if($errors->has('password_repeat'))
					                @foreach($errors->get('password_repeat') as $error)
					                  <span class="messageerror2">× {{ $error }}</span>
					                @endforeach
					             @endif
							</div>
							<div class="form-group">
								<input type="text" name="celphone" class="form-control" placeholder="Número de Celular">
								@if($errors->has('celphone'))
					                @foreach($errors->get('celphone') as $error)
					                  <span class="messageerror2">× {{ $error }}</span>
					                @endforeach
					             @endif
							</div>
							<!-- select -->
							<select name="type" class="form-control">
								<option value="0">Tipo de Cuenta</option>
								<option value="2">Comprador</option>
								<option value="3">Vendedor</option>
							</select>
							@if($errors->has('type'))
				                @foreach($errors->get('type') as $error)
				                  <span class="messageerror2">× {{ $error }}</span>
				                @endforeach
				            @endif
							<!-- select -->
							<!-- select -->
							<select class="form-control" name="city">
								<option value="0" selected>Selecciona tu ciudad</option>
								@if(isset($list_cities))
									@foreach($list_cities as $city)
										<option value="{{ $city->id_city }}">{{ $city->name }}</option>
									@endforeach
								@endif
								
							</select><!-- select -->
							@if($errors->has('city'))
				                @foreach($errors->get('city') as $error)
				                  <span class="messageerror2">× {{ $error }}</span>
				                @endforeach
				            @endif

							<div class="checkbox">
								<label class="pull-left checked" for="signing">
									<input type="checkbox" name="terms" id="signing"> 
									Acepta y Lee nuestros términos y condiciones. 
								</label>
							</div><!-- checkbox -->
							<button type="submit" href="#" class="btn">Registro</button>
						{{ Form::close() }}
						<!-- checkbox -->

					</div>
				</div><!-- user-login -->
			</div><!-- row -->
		</div><!-- container -->
	</section><!-- signup-page -->

@stop