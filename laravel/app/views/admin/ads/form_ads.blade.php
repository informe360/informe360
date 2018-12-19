@extends ('template')

@section ('content')

<section id="main" class="clearfix user-page">
		<div class="container">
			<div class="row text-center">
				<!-- user-login -->
				<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
					<div class="user-account">
						<h2>Crear Publicaci&oacute;n</h2>
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
						{{ Form::open(array('url' => 'admin/publicaciones/agregar_nueva', 'method' => 'post')) }}
							<div class="form-group">
								<input type="text" name="days" class="form-control" placeholder="D&iacute;as de validez de la publicaci&oacute;n (en n&uacute;mero)" >
								@if($errors->has('days'))
					                @foreach($errors->get('days') as $error)
					                    <label class="control-label texterror"><i class="fa fa-times-circle-o"></i>{{ $error }}</label>
					                @endforeach
					            @endif
							</div>
							<div class="form-group">
								<input type="text" name="cost" class="form-control" placeholder="Costo Bs de la Publicaci&oacute;n" >
								@if($errors->has('cost'))
					                @foreach($errors->get('cost') as $error)
					                    <label class="control-label texterror"><i class="fa fa-times-circle-o"></i>{{ $error }}</label>
					                @endforeach
					            @endif
							</div>
							
							<button type="submit" href="#" class="btn">Agregar Publicaci&oacute;n</button>
						{{ Form::close() }}
						<!-- checkbox -->

					</div>
				</div><!-- user-login -->
			</div><!-- row -->
		</div><!-- container -->
	</section><!-- signup-page -->
@stop