@extends ('template')

@section ('content')

<!-- main -->
	<section id="main" class="clearfix ad-details-page">
		<div class="container">

			<div class="breadcrumb-section">
				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li><a href="index.html">Inicio</a></li>
					<li>Datos Anuncio</li>
				</ol><!-- breadcrumb -->
				<h2 class="title">Teléfonos Móvil</h2>
			</div><!-- banner -->
			<div class="ad-profile section">
					<div class="user-profile">
						<!-- <div class="user-images">
							{{ HTML::image('assets/images/user.jpg','Logo',array('class'=>'img-responsive')) }}
						</div> -->
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
						<li class="active"><a href="{{ URL::action('ProductController@select_product') }}">Nuevo Anuncio</a></li>
						<li><a href="{{ URL::action('HomeController@home_seller') }}">Todos Mis Anuncios</a></li>
						<!--<li><a href="my-ads.html">Todos Mis Anuncios</a></li>-->
						<li><a href="{{ URL::action('ProductController@pending_products') }}">Pendiente de Aprobación</a></li>
						<li><a href="{{ URL::action('ProductController@productsNotPublished') }}">Anuncios No Publicados</a></li>
						
						<!-- <li><a href="ventas-realizadas.html">Ventas Realizadas</a></li> -->
						<!-- <li><a href="ventas-noconcretada.html">Ventas por Concretar</a></li> -->
					</ul>
			</div><!-- ad-profile -->
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
			<div class="adpost-details">
				<div class="row">
					<div class="col-md-8">
						{{ Form::open(array('url' => 'vendedor/agregar_producto/'.$id_category.'/'.$id_subcategory,'files' => true, 'method' => 'post')) }}
							<fieldset>
								<div class="section postdetails">
									<h4>Vender un artículo o servicio <span class="pull-right">* Campos Obligatorios</span></h4>
									<div class="form-group selected-product">
										<ul class="select-category list-inline">
											<li>
												<a href="{{ URL::action('ProductController@select_product') }}">
													<span class="select">
														{{ HTML::image('assets/images/icon/2.png','Logo',array('class'=>'img-responsive')) }}
													</span>
													<?php echo Category::show_category($id_category)->name; ?>
												</a>
											</li>

											<li class="active">
												<a href="#"><?php echo SubCategory::getSubCategory($id_subcategory)->name; ?></a>
											</li>
										</ul>
										<!--<a class="edit" href="#"><i class="fa fa-pencil"></i>Editar</a> -->
									</div>
									<div class="row form-group">
										<label class="col-sm-3">Tipo de Anuncio<span class="required">*</span></label>
										<div class="col-sm-9 user-type">
											<input type="radio" name="sellType" value="newsell" id="newsell"> <label for="newsell">¿Quieres vender? </label>
											<!--<input type="radio" name="sellType" value="newbuy" id="newbuy"> <label for="newbuy">¿Quieres comprar?</label>-->
											@if($errors->has('sellType'))
								                @foreach($errors->get('sellType') as $error)
								                  <span class="messageerror2">× {{ $error }}</span>
								                @endforeach
								             @endif
										</div>
									</div>
									<div class="row form-group add-title">
										<label class="col-sm-3 label-title">Título de tu Anuncio<span class="required">*</span></label>
										<div class="col-sm-9">
											<input type="text" name="title-ad" class="form-control" id="text" placeholder="ex, Sony Xperia dual sim 100% brand new ">
											@if($errors->has('title-ad'))
								                @foreach($errors->get('title-ad') as $error)
								                  <span class="messageerror2">× {{ $error }}</span>
								                @endforeach
								             @endif
										</div>
									</div>
									<div class="row form-group add-image">
										<label class="col-sm-3 label-title">Fotos de tu Anuncio <span>(Aquí carga tus fotografías del producto )</span> </label>
										<div class="col-sm-9">
											<h5><i class="fa fa-upload" aria-hidden="true"></i>Selecciona los archivos a cargar / Subir los archivos <span> Puedes subir múltiples imágenes.</span></h5>
											<div class="upload-section">
												<label class="upload-image" for="upload-image-one">
													<input type="file" name="file1" id="upload-image-one">
												</label>

												<label class="upload-image" for="upload-image-two">
													<input type="file" name="file2" id="upload-image-two">
												</label>
												<label class="upload-image" for="upload-image-three">
													<input type="file" name="file3" id="upload-image-three">
												</label>

												<label class="upload-image" for="upload-imagefour">
													<input type="file" name="file4" id="upload-imagefour">
												</label>
											</div>
											@if($errors->has('file1'))
								                @foreach($errors->get('file1') as $error)
								                  <span class="messageerror2">× {{ $error }}</span>
								                @endforeach
								             @endif
										</div>
									</div>
									<div class="row form-group select-condition">
										<label class="col-sm-3">Condición<span class="required">*</span></label>
										<div class="col-sm-9">
											<input type="radio" name="itemCon" value="New" id="new">
											<label for="new">Nuevo</label>
											<input type="radio" name="itemCon" value="Used" id="used">
											<label for="used">Usado</label>
										</div>
										@if($errors->has('itemCon'))
							                @foreach($errors->get('sellType') as $error)
							                  <span class="messageerror2">× {{ $error }}</span>
							                @endforeach
							             @endif
									</div>
									<div class="row form-group select-price">
										<label class="col-sm-3 label-title">Precio<span class="required">*</span></label>
										<div class="col-sm-9">
											<label>Bs.</label>
											<input type="text" name="price" class="form-control" id="text1">
											<input class="negotiable" type="radio" value="1" name="negotiable" id="negotiable">
											<label class="negotiable" for="negotiable">Negociable </label>
											@if($errors->has('price'))
								                @foreach($errors->get('price') as $error)
								                  <span class="messageerror2">× {{ $error }}</span>
								                @endforeach
								            @endif
										</div>
									</div>
									<div class="row form-group brand-name">
										<label class="col-sm-3 label-title">Nombre de Marca<span class="required">*</span></label>
										<div class="col-sm-9">
											<input type="text" name="brand" class="form-control" placeholder="ex, Sony Xperia">
											@if($errors->has('brand'))
								                @foreach($errors->get('brand') as $error)
								                  <span class="messageerror2">× {{ $error }}</span>
								                @endforeach
								             @endif
										</div>
									</div>
									<div class="row form-group item-description">
										<label class="col-sm-3 label-title">Especificaciones<span class="required">*</span></label>
										<div class="col-sm-9">
											<textarea class="form-control" name="specifications" id="textarea" placeholder="Write few lines about your products" rows="8"></textarea>
											@if($errors->has('specifications'))
								                @foreach($errors->get('specifications') as $error)
								                  <span class="messageerror2">× {{ $error }}</span>
								                @endforeach
								             @endif
										</div>
									</div>
									<div class="row">
										<div class="col-sm-9 col-sm-offset-3">
											<p>160 caracteres</p>
										</div>
									</div>

									<div class="row form-group model-name">
										<label class="col-sm-3 label-title">Modelo</label>
										<div class="col-sm-9">
											<input type="text" name="model" class="form-control" id="model" placeholder="ejem., Sony Xperia dual sim 100% brand new ">
										</div>
									</div>

									<div class="row form-group item-description">
										<label class="col-sm-3 label-title">Descripción<span class="required">*</span></label>
										<div class="col-sm-9">
											<textarea class="form-control" name="description" id="textarea" placeholder="Write few lines about your products" rows="8"></textarea>
											@if($errors->has('description'))
								                @foreach($errors->get('description') as $error)
								                  <span class="messageerror2">× {{ $error }}</span>
								                @endforeach
								             @endif
										</div>
									</div>
									<div class="row">
										<div class="col-sm-9 col-sm-offset-3">
											<p>5000 caracteres</p>
										</div>
									</div>
								</div><!-- section -->

								
								<div class="section">
									<h4>Costo del Anuncio</h4>
									<p>More replies means more interested buyers. With lots of interested buyers, you have a better chance of selling for the price that you want. <a href="#">Learn more</a></p>
									<ul class="premium-options">
										<!--<li class="premium">
											<input type="radio" name="premiumOption" value="day-one" id="day-one">
											<label for="day-one">Regular Ad Per Day</label>
											<span>$20.00</span>
										</li>-->
										<?php $ads = Ads::get_list_ads(); 
										      $cont = 0; ?>
									@foreach($ads as $ad)	
										<?php $cont++; ?>
										<li class="premium">
											<input type="radio" name="premiumOption" value="{{$ad->id}}" id="day-{{$cont}}">
											<label for="day-{{$cont}}">{{$ad->valid_time}} d&iacute;as</label>
											<span>Bs. {{$ad->cost}}</span>
										</li>
									@endforeach	
									</ul>
									@if($errors->has('premiumOption'))
						                @foreach($errors->get('premiumOption') as $error)
						                  <span class="messageerror2">× {{ $error }}</span>
						                @endforeach
						             @endif
								</div><!-- section -->

								<div class="checkbox section agreement">
									<label class="send-message" for="send">
										<input class="send-message" type="checkbox" name="send" value="1" id="send">
										Send me Trade Email/SMS Alerts for people looking to buy mobile handsets in www By clicking "Post", you agree to our <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a> and acknowledge that you are the rightful owner of this item and using Trade to find a genuine buyer.
									</label>
									<button type="submit" class="btn btn-primary">Publica tu Anuncio</button>
								</div><!-- section -->

							</fieldset>
						{{ Form::close() }}<!-- form -->
					</div>


					<!-- quick-rules -->
					<div class="col-md-4">
						<div class="section quick-rules">
							<h4>Quick rules</h4>
							<p class="lead">Posting an ad on <a href="#">Trade.com</a> is free! However, all ads must follow our rules:</p>

							<ul>
								<li>Make sure you post in the correct category.</li>
								<li>Do not post the same ad more than once or repost an ad within 48 hours.</li>
								<li>Do not upload pictures with watermarks.</li>
								<li>Do not post ads containing multiple items unless it's a package deal.</li>
								<li>Do not put your email or phone numbers in the title or description.</li>
								<li>Make sure you post in the correct category.</li>
								<li>Do not post the same ad more than once or repost an ad within 48 hours.</li>
								<li>Do not upload pictures with watermarks.</li>
								<li>Do not post ads containing multiple items unless it's a package deal.</li>
							</ul>
						</div>
					</div><!-- quick-rules -->
				</div><!-- photos-ad -->
			</div>
		</div><!-- container -->
	</section><!-- main -->


@stop