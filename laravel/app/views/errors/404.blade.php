@extends ('template')

@section ('content')
<section id="main" class="clearfix text-center">
		<div class="container">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<div class="found-section section">
						<h1>404</h1>
						<h2>Página no encontrada</h2>
						<p>No se puede encontrar.</p>
						<a href="<?=URL::to('/') ?>" class="btn btn-primary">Ir al inicio</a>
					</div>
				</div>
			</div>
		</div><!-- container -->
	</section><!-- main -->
@stop
