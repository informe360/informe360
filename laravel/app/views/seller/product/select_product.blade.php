@extends ('template')

@section ('content')
<!-- post-page -->
	<section id="main" class="clearfix ad-post-page">
		<div class="container">

			<div class="breadcrumb-section">
				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li><a href="index.html">Inicio</a></li>
					<li>Nuevo Anuncio</li>
				</ol><!-- breadcrumb -->						
				<h2 class="title">Nuevo Anuncio</h2>
			</div><!-- banner -->

			<div class="ad-profile section">
					<div class="user-profile">
						<div class="user-images">
							{{ HTML::image('assets/images/user.jpg','Logo',array('class'=>'img-responsive')) }}
						</div>
						<div class="user">
							<h2>Hola, <a href="#">{{Auth::user()->name}}.</a></h2>
							<h5>Tú última sesión fue: {{Auth::user()->last_login}}</h5>
						</div>

						<div class="favorites-user">
							<div class="my-ads">
								<a href="my-ads.html">01<small>Mi Anuncio</small></a>
							</div>
							<!--<div class="favorites">
								<a href="#">18<small>Favoritos</small></a>
							</div>-->
						</div>
					</div><!-- user-profile -->

					<ul class="user-menu">
						<li><a href="{{ URL::action('HomeController@home_seller') }}">Todos Mis Anuncios</a></li>
						<!--<li><a href="my-ads.html">Todos Mis Anuncios</a></li>-->
						<li><a href="{{ URL::action('ProductController@productsNotPublished') }}">Anuncios No Publicados</a></li>
						<li><a href="{{ URL::action('ProductController@pending_products') }}">Pendiente de Aprobación</a></li>
						<li class="active"><a href="{{ URL::action('ProductController@select_product') }}">Nuevo Anuncio</a></li>
						<li><a href="ventas-realizadas.html">Ventas Realizadas</a></li>
						<li><a href="ventas-noconcretada.html">Ventas por Concretar</a></li>
					</ul>

			</div><!-- ad-profile -->
				
			<div id="ad-post">
				<div class="row category-tab">	
					<div class="col-md-4 col-sm-6">
						<div class="section cat-option select-category post-option">
							<h4>Selecciona una Categor&iacute;a</h4>
							<ul role="tablist">
							<?php $cont = 0; ?>
							@foreach($listCategory as $category)
								<?php $cont++; ?>
								@if($cont == 1)
									<li name='cat-{{$category->id}}' class='link-active active categories-selected' id_category="{{$category->id}}">
								@else
									<li name='cat-{{$category->id}}' class='categories-selected' id_category="{{$category->id}}">
								@endif
								<a href="#cat{{$cont}}" aria-controls="cat{{$cont}}" role="tab" data-toggle="tab">
									<span class="select">
										{{ HTML::image('assets/images/icon/2.png','Logo',array('class'=>'img-responsive')) }}
									</span>
									{{$category->name}}
								</a></li>
							@endforeach
							</ul>
						</div>
					</div>
					
					<!-- Tab panes -->
					<div class="col-md-4 col-sm-6">
						<div class="section tab-content subcategory post-option">
							<h4>Selecciona una subcategor&iacute;a</h4>
							<?php $cont = 0; ?>
							@foreach($listCategory as $category)
								<?php $cont++; ?>
									@if($cont == 1)
										<div role="tabpanel" class="tab-pane active" id="cat{{$cont}}" >
									@else
								<div role="tabpanel" class="tab-pane" id="cat{{$cont}}">
									@endif		
									<ul>
										<?php $listSubcategory = SubCategory::get_list_subcategory($category->id); ?>
										@foreach($listSubcategory as $subcategory)
											<li name="sub-{{$subcategory->id}}" class="sub-categories-selected" id_sub_category="{{$subcategory->id}}"><a href="javascript:void(0)">{{$subcategory->name}}</a></li>
										@endforeach	
									</ul>
								</div>
							@endforeach		
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="section next-stap post-option">
							<h2>Publica tu anuncio en sólo <span>30 segundos</span></h2>
							<p>Por favor no publicar múltiples anuncios para los mismos artículos o servicios. Todos duplicados, spam y anuncios erróneamente clasificados se eliminarán.</p>
							<div class="btn-section">
								<a class="btn next" id="btn_next_details" href="#">Siguiente</a>
								<a href="#" class="btn-info">Cancelar</a>
							</div>
						</div>
					</div><!-- next-stap -->
				</div>
				<div class="row">
					<div class="col-sm-8 col-sm-offset-2 text-center">
						<div class="ad-section">
							<a href="#">{{ HTML::image('assets/images/ads/3.jpg','Logo',array('class'=>'img-responsive')) }}</a>
						</div>
					</div>
				</div><!-- row -->
			</div>				
		</div><!-- container -->
	</section><!-- post-page -->
@stop	