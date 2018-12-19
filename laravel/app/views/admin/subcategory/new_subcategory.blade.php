@extends ('template')

@section ('content')
<!-- signup-page -->
	<section id="main" class="clearfix user-page">
		<div class="container">
			<div class="row text-center">
				<!-- user-login -->
				<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
					<div class="user-account">
						<h2>Crear SubCategor&iacute;a</h2>
						{{ Form::open(array('url' => 'admin/categorias/nueva', 'method' => 'post')) }}
							<div class="form-group">
								<input type="text" class="form-control last-sub" name="subcategory-1" placeholder="Nombre Subcategor&iacute;a">
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