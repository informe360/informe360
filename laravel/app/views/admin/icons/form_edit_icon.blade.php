@extends ('template')

@section ('content')

<section id="main" class="clearfix user-page">
		<div class="container">
			<div class="row text-center">
				<!-- user-login -->
				<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
					<div class="user-account">
						<h2>Editar Icono</h2>
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
						{{ Form::open(array('url' => 'admin/icono/edit-icon', 'method' => 'post', 'enctype' => 'multipart/form-data')) }}
							<input type="text" name="id" value="{{$icon_edit->id}}">
							<div class="form-group">
								<input type="text" name="iconname" class="form-control" placeholder="Nombre de la categoria a asociar" value="{{$icon_edit->name}}">
								@if($errors->has('iconname'))
					                @foreach($errors->get('iconname') as $error)
					                    <label class="control-label texterror">
					                    	<i class="fa fa-times-circle-o"></i>
					                    	{{ $error }}
					                    </label>
					                @endforeach
					            @endif
							</div>
							<div class="row form-group add-image">
								<div class="col-sm-9 col-md-offset-1">
									<h5><i class="fa fa-upload" aria-hidden="true"></i>Selecciona la im&aacute;gen del nuevo &iacute;cono</h5>
									<div class="upload-section">
										<label class="upload-image" for="upload-image-one">
											<input type="file" name="photo_1" id="upload-image-one">
											
										</label>
									</div>
									@if($errors->has('photo_1'))
						                @foreach($errors->get('photo_1') as $error)
						                    <label class="control-label texterror"><i class="fa fa-times-circle-o"></i>{{ $error }}</label>
						                @endforeach
						            @endif
								</div>
							</div>
							
							<button type="submit" name="saveicon" class="btn">Agregar Icono</button>
						{{ Form::close() }}
						<!-- checkbox -->

					</div>
				</div><!-- user-login -->
			</div><!-- row -->
		</div><!-- container -->
	</section><!-- signup-page -->
@stop