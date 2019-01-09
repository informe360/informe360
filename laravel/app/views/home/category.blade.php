@extends ('template')

@section ('content')
<!-- myads-page -->
<section id="main" class="clearfix category-page">
		<div class="container">
			<div class="breadcrumb-section">
				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li><a href="index.html">Home</a></li>
				</ol><!-- breadcrumb -->						
				<h2 class="title">Categorias</h2>
			</div>	
			<div class="category-info">	
				<div class="row">
					<!-- accordion-->
					<div class="col-md-3 col-sm-4">
						<div class="accordion">
							<!-- panel-group -->
							<div class="panel-group" id="accordion">
							 	
								<!-- panel -->
								<div class="panel-default panel-faq">
									<!-- panel-heading -->
									<div class="panel-heading">
										<a data-toggle="collapse" data-parent="#accordion" href="#accordion-one">
											<h4 class="panel-title">Categories<span class="pull-right"><i class="fa fa-minus"></i></span></h4>
										</a>
									</div><!-- panel-heading -->

									<div id="accordion-one" class="panel-collapse collapse in">
										<!-- panel-body -->
										<div class="panel-body">
											<h5><a href="categories-main.html"><i class="fa fa-caret-down"></i> Lista de categorias</a></h5>
											<ul>
                                                @foreach($list as $category)
                                                    <li><a href="<?=URL::to('categorias/'.$category->name)?>">{{ $category->name }} <span>(30)</span></a></li>
                                                @endforeach
                                            </ul>

										</div><!-- panel-body -->
									</div>
								</div><!-- panel -->

								<!-- panel -->
								<div class="panel-default panel-faq">
									<!-- panel-heading -->
									<div class="panel-heading">
										<a data-toggle="collapse" data-parent="#accordion" href="#accordion-two">
											<h4 class="panel-title">Condicion<span class="pull-right"><i class="fa fa-plus"></i></span></h4>
										</a>
									</div><!-- panel-heading -->

									<div id="accordion-two" class="panel-collapse collapse">
										<!-- panel-body -->
										<div class="panel-body">
											<label for="new"><input type="checkbox" name="new" id="new"> New</label>
											<label for="used"><input type="checkbox" name="used" id="used"> Used</label>
										</div><!-- panel-body -->
									</div>
								</div><!-- panel -->

								<!-- panel -->
								<div class="panel-default panel-faq">
									<!-- panel-heading -->
									<div class="panel-heading">
										<a data-toggle="collapse" data-parent="#accordion" href="#accordion-three">
											<h4 class="panel-title">
											Precio
											<span class="pull-right"><i class="fa fa-plus"></i></span>
											</h4>
										</a>
									</div><!-- panel-heading -->

									<div id="accordion-three" class="panel-collapse collapse">
										<!-- panel-body -->
										<div class="panel-body">
											<div class="price-range"><!--price-range-->
												<div class="price">
													<span>$100 - <strong>$700</strong></span>
													<div class="dropdown category-dropdown pull-right">	
														<a data-toggle="dropdown" href="#"><span class="change-text">USD</span><i class="fa fa-caret-square-o-down"></i></a>
														<ul class="dropdown-menu category-change">
															<li><a href="#">USD</a></li>
															<li><a href="#">AUD</a></li>
															<li><a href="#">EUR</a></li>
															<li><a href="#">GBP</a></li>
															<li><a href="#">JPY</a></li>
														</ul>								
													</div><!-- category-change -->													
													 <input type="text"value="" data-slider-min="0" data-slider-max="700" data-slider-step="5" data-slider-value="[250,450]" id="price" ><br />
												</div>
											</div><!--/price-range-->
										</div><!-- panel-body -->
									</div>
								</div><!-- panel -->

							 </div><!-- panel-group -->
						</div>
					</div><!-- accordion-->

					<!-- recommended-ads -->
					<div class="col-sm-8 col-md-7">				
						<div class="section recommended-ads">
							<!-- featured-top -->
							<div class="featured-top">
								<h4>Recomendadas para ti</h4>
								<div class="dropdown pull-right">
								
								<!-- category-change -->
								<div class="dropdown category-dropdown">
									<h5>Ordenar por:</h5>						
									<a data-toggle="dropdown" href="#"><span class="change-text">Populares</span><i class="fa fa-caret-square-o-down"></i></a>
									<ul class="dropdown-menu category-change">
										<li><a href="#">Featured</a></li>
										<li><a href="#">Newest</a></li>
										<li><a href="#">All</a></li>
										<li><a href="#">Bestselling</a></li>
									</ul>								
								</div><!-- category-change -->														
								</div>							
							</div><!-- featured-top -->	

							@foreach($products as $product)
								<!-- ad-item -->
								<div class="ad-item row">
									<!-- item-image -->
									<div class="item-image-box col-sm-4">
										<div class="item-image">
											<?php $image = Image::where('product_id','=',$product->id)->get()->first(); ?>
											<a href="details.html">{{ HTML::image($image->route,'Logo',array('class'=>'img-responsive')) }}</a>
										</div><!-- item-image -->
									</div>
									
									<!-- rending-text -->
									<div class="item-info col-sm-8">
										<!-- ad-info -->
										<div class="ad-info">
											@if($product->negotiable)
												<h3 class="item-price">Bs.S {{$product->cost}} <span>(Negociable)</span></h3>
											@else
												<h3 class="item-price">Bs.S {{$product->cost}} </h3>
											@endif
											<h4 class="item-title"><a href="#">{{$product->title}}</a></h4>
											<div class="item-cat">
												<?php $relation = ProdCateSubc::where('product_id','=',$product->id)->get()->first(); ?>
												<span><a href="#">{{Category::find($relation->category_id)->name;}}</a></span> /
												<span><a href="#">{{SubCategory::find($relation->subcategory_id)->name;}}</a></span>
											</div>										
										</div><!-- ad-info -->
										
										<!-- ad-meta -->
										<div class="ad-meta">
											<div class="meta-content">
												<span class="dated"><a href="#">7 Jan, 16  10:10 pm </a></span>
												<a href="#" class="tag"><i class="fa fa-tags"></i> New</a>
											</div>										
											<!-- item-info-right -->
											<div class="user-option pull-right">
												<a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
												<a class="online" href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user"></i> </a>											
											</div><!-- item-info-right -->
										</div><!-- ad-meta -->
									</div><!-- item-info -->
								</div><!-- ad-item -->
							@endforeach

							<!-- ad-section -->						
							<div class="ad-section text-center">
								<a href="#"><img src="images/ads/3.jpg" alt="Image" class="img-responsive"></a>
							</div><!-- ad-section -->	
							
							<!-- pagination  -->
							<div class="text-center">
								<ul class="pagination ">
									<li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
									<li><a href="#">1</a></li>
									<li class="active"><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#">5</a></li>
									<li><a>...</a></li>
									<li><a href="#">10</a></li>
									<li><a href="#">20</a></li>
									<li><a href="#">30</a></li>
									<li><a href="#"><i class="fa fa-chevron-right"></i></a></li>			
								</ul>
							</div><!-- pagination  -->					
						</div>
					</div><!-- recommended-ads -->

					<div class="col-md-2 hidden-xs hidden-sm">
						<div class="advertisement text-center">
							<a href="#"><img src="images/ads/2.jpg" alt="" class="img-responsive"></a>
						</div>
					</div>
				</div>	
			</div>
		</div><!-- container -->
	</section><!-- main -->
@stop