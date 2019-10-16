@extends('fontend.layouts.master')
@section('title')
<title>NH Store - product detail</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('assets/fontend/css/jquery-ui.css')}}">
@endsection
@section('content')
<!-- Page Header Begins -->

<div id="page-header">
	<div class="header-bg-parallax">
		<div class="overlay">
			<div class="container text-center">
				<div class="header-description">
					<h1>Products Detail 01</h1>
					<div class="breadcrumbs">
						<ul>
							<li><a href="#">home</a>
							</li>
							<li><a href="#">shop</a>
							</li>
							<li><a href="#">mens</a>
							</li>
							<li><a href="#" class="active">Black Cotton Leggings</a>
							</li>
						</ul>
					</div>
					<!-- /header-small-nav -->
				</div>
				<!-- /header-description -->
			</div>
			<!-- /container -->
		</div>
		<!-- /overlay -->
	</div>
	<!-- /header-bg-parallax -->
</div>

<!-- Page Header End -->

<!-- Product Detail Begin -->

<div class="p-details">
	<div class="container padding-top-100 padding-bottom-20">
		<div class="row">
			<div class="col-md-12">
				<div class="product">
					<div class="col-md-6">
						<div class="product-image">
							<div class="product-quickview-slider">
								<ul class="slides">
									<li data-thumb="http://placehold.it/470x610">
										<img src="http://placehold.it/470x610" alt="" />
									</li>
									<li data-thumb="http://placehold.it/470x610">
										<img src="http://placehold.it/470x610" alt="" />
									</li>
									<li data-thumb="http://placehold.it/470x610">
										<img src="http://placehold.it/470x610" alt="" />
									</li>
								</ul>
								<!-- /slides -->
							</div>
							<!-- /product-quickview-slider -->
						</div>
						<!-- /product-image -->
					</div>
					<!-- /column-->

					<div class="col-md-6">
						<div class="product-details">
							<div class="product-title">
								<p><a href="#">Black Cotton Leggings</a>
								</p>
							</div>
							<!-- /product-title -->

							<div class="product-reviews">
								<ul class="product-rate padding-top-15">
									<li><i class="icon_star_alt"></i>
										<i class="icon_star_alt"></i>
										<i class="icon_star_alt"></i>
										<i class="icon_star_alt"></i>
										<i class="icon_star_alt not-rated"></i>
									</li>
									<li><span>10 review(s)</span>
									</li>
									<li><a href="#">Add your review</a>
									</li>
								</ul>
								<!-- /product-rate -->
							</div>
							<!-- /product-reviews -->

							<div class="product-small-detail padding-vertical-35">
								<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui luptatum zzril delenit augue duis dolore te feugait nulla facilisi. </p>
							</div>
							<!-- /product-small-detail-->

							<div class="product-price padding-bottom-50">
								<p><i class="fa fa-gbp"></i>160.00</p>
								<del><i class="fa fa-gbp"></i>130.00</del>
							</div>
							<!-- /product-price -->

							<div class="product-list-actions padding-top-40 padding-bottom-25">
								<form class="padding-bottom-25">
									<div class="form-group">
										<label for="p_size">Size *</label>
										<select name="p_size" id="p_size" class="form-control">
											<option value="">- Please Select -</option>
											<option value="">XL</option>
											<option value="">L</option>
											<option value="">M</option>
											<option value="">S</option>
										</select>
										<!-- /form-control -->
									</div>
									<!-- /form-group -->

									<div class="form-group">
										<label for="p_color">Color *</label>
										<select name="p_color" id="p_color" class="form-control">
											<option value="">- Please Select -</option>
											<option value="">Blue</option>
											<option value="">Red</option>
											<option value="">Green</option>
											<option value="">Yellow</option>
										</select>
										<!-- /form-control -->
									</div>
									<!-- /form-group -->
								</form>
								<!-- /form -->

								<div class="product-quantity">
									<div class="quantity">
										<input type="button" value="-" class="minus">
										<input type="text" value="02" class="quantity-number">
										<input type="button" value="+" class="plus">
									</div>
									<!-- /quantity -->
								</div>
								<!-- /product-quantity -->

								<div class="product-cart margin-left-30">
									<a href="#">
										<p>+ Add to card</p>
									</a>
									<div class="product-icons">
										<ul>
											<li><a href="#" title="favourite"><i class="icon_heart_alt"></i></a>
											</li>
											<li class="icon-bg-color"><a href="#" title="compare"><i class="fa fa-sliders"></i></a>
											</li>
										</ul>
									</div>
									<!-- /product-icons -->
								</div>
								<!-- /product-cart -->

								<div class="social-share padding-vertical-30">
									<p>Share:</p>
									<div class="share">
										<a href="#"><i class="fa fa-facebook"></i>
										</a>
										<a href="#"><i class="fa fa-twitter"></i>
										</a>
										<a href="#"><i class="fa fa-dribbble"></i>
										</a>
										<a href="#"><i class="fa fa-linkedin"></i>
										</a>
									</div>
									<!-- /share -->
								</div>
								<!-- /social-share -->

								<div class="product-category-tag">
									<div class="p-categories">
										<p>Categories:</p>
										<ul>
											<li><a href="#">Bags</a>
											</li>
											<li><a href="#">Blazers</a>
											</li>
											<li><a href="#">Boots</a>
											</li>
											<li><a href="#">Jackets</a>
											</li>
											<li><a href="#">Pants</a>
											</li>
											<li><a href="#">Shirts</a>
											</li>
										</ul>
									</div>
									<!-- /p-categories -->

									<div class="p-tags padding-top-15">
										<p>Tag:</p>
										<a href="#">outerwear.</a>
									</div>
									<!-- /p-tags -->
								</div>
								<!-- /product-category-tag -->
							</div>
							<!-- /product-list-actions -->
						</div>
						<!-- /product-details -->
					</div>
					<!-- /column -->
				</div>
				<!-- /product -->
			</div>
			<!-- /column -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>

<!-- Product Detail End -->

<!-- Tabs Begin -->

<div class="container padding-bottom-100">
	<div class="row">
		<div class="col-md-12">
			<div class="tabs">
				<ul class="tab-links text-center">
					<li class="active">
						<a href="#tab1">
							<span>Description</span>
						</a>
					</li>
					<li class="">
						<a href="#tab2">
							<span>Additional Information</span>
						</a>
					</li>
					<li class="">
						<a href="#tab3">
							<span>Reviews (4)</span>
						</a>
					</li>
				</ul>
				<!-- /tab-links -->

				<div class="tab-content">
					<div id="tab1" class="tab active">
						<div class="tab-description">
							<p class="padding-vertical-40">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when anunknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.</p>

							<img src="http://placehold.it/272x407" alt="" />
							<ul>
								<li>Claritas est etiam processus dynamicus.</li>
								<li>Qui sequitur mutationem consuetudium lectorum.</li>
								<li>Claritas est etiam processus dynamicus.</li>
								<li>Qui sequitur mutationem consuetudium lectorum.</li>
								<li>Claritas est etiam processus dynamicus.</li>
								<li>Qui sequitur mutationem consuetudium lectorum.</li>
							</ul>
							<p class="padding-top-10">It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release.</p>
						</div>
						<!-- /tab-description -->
					</div>
					<!-- /tab -->

					<div id="tab2" class="tab">
						<div class="tab-description">
							<p class="padding-vertical-40">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when anunknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.</p>

							<img src="http://placehold.it/272x407" alt="" />
							<ul>
								<li>Claritas est etiam processus dynamicus.</li>
								<li>Qui sequitur mutationem consuetudium lectorum.</li>
								<li>Claritas est etiam processus dynamicus.</li>
								<li>Qui sequitur mutationem consuetudium lectorum.</li>
								<li>Claritas est etiam processus dynamicus.</li>
								<li>Qui sequitur mutationem consuetudium lectorum.</li>
							</ul>
							<p class="padding-top-10">It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release.</p>
						</div>
						<!-- /tab-description -->
					</div>
					<!-- /tab -->

					<div id="tab3" class="tab">
						<div class="tab-description">
							<p class="padding-vertical-40">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when anunknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.</p>

							<img src="http://placehold.it/272x407" alt="" />
							<ul>
								<li>Claritas est etiam processus dynamicus.</li>
								<li>Qui sequitur mutationem consuetudium lectorum.</li>
								<li>Claritas est etiam processus dynamicus.</li>
								<li>Qui sequitur mutationem consuetudium lectorum.</li>
								<li>Claritas est etiam processus dynamicus.</li>
								<li>Qui sequitur mutationem consuetudium lectorum.</li>
							</ul>
							<p class="padding-top-10">It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release.</p>
						</div>
						<!-- /tab-description -->
					</div>
					<!-- /tab -->
				</div>
				<!-- /tab-content -->
			</div>
			<!-- /tabs -->
		</div>
		<!-- /column -->
	</div>
	<!-- /row -->
</div>
<!-- /container -->

<!-- Tabs End -->

<!-- Related Products Begin -->

<div class="related-products">
	<div class="container text-center padding-top-20 padding-bottom-100">
		<h2 class="double-line"><span>Related Products</span></h2>
		<p class="sub-tittle">Eodem modo typi, qui nunc nobis videntur parum clari</p>
		<div class="row padding-top-60">
			<div class="col-md-3 col-sm-6">
				<div class="featured-item">
					<div class="product-image">
						<img src="http://placehold.it/263x341" alt="">
						<div class="product_overlay">
							<div class="product-cart">
								<a href="#">
									<p>+ Add to card</p>
								</a>
								<div class="product-icons">
									<ul>
										<li><a href="#" title="favourite"><i class="icon_heart_alt"></i></a>
										</li>
										<li class="icon-bg-color"><a href="#" title="compare"><i class="fa fa-sliders"></i></a>
										</li>
										<li><a href="product-quick-view.html" class="product-quick-view" title="quickview"><i class="arrow_condense"></i></a>
										</li>
									</ul>
								</div>
								<!-- /product-icons -->
							</div>
							<!-- /product-cart -->
						</div>
						<!-- /product_overlay -->
					</div>
					<!-- /product-image -->
					<div class="product-short-detail padding-top-20">
						<div class="product-rate">
							<i class="icon_star_alt"></i>
							<i class="icon_star_alt"></i>
							<i class="icon_star_alt"></i>
							<i class="icon_star_alt"></i>
							<i class="icon_star_alt not-rated"></i>
						</div>
						<!-- /product-rate -->
						<div class="product-title">
							<p><a href="#">Black Cotton Leggings</a>
							</p>
						</div>
						<!-- /product-title -->
						<div class="product-price">
							<p><i class="fa fa-gbp"></i>160.00</p>
						</div>
						<!-- /product-price -->
					</div>
					<!-- /product-short-detail -->
				</div>
				<!-- /featured-item -->
			</div>
			<!-- /column -->

			<div class="col-md-3 col-sm-6">
				<div class="featured-item">
					<div class="product-image">
						<img src="http://placehold.it/263x341" alt="">
						<div class="product_overlay">
							<div class="product-cart">
								<a href="#">
									<p>+ Add to card</p>
								</a>
								<div class="product-icons">
									<ul>
										<li><a href="#" title="favourite"><i class="icon_heart_alt"></i></a>
										</li>
										<li class="icon-bg-color"><a href="#" title="compare"><i class="fa fa-sliders"></i></a>
										</li>
										<li><a href="product-quick-view.html" class="product-quick-view" title="quickview"><i class="arrow_condense"></i></a>
										</li>
									</ul>
								</div>
								<!-- /product-icons -->
							</div>
							<!-- /product-cart -->
						</div>
						<!-- /product_overlay -->
					</div>
					<!-- /product-image -->
					<div class="product-short-detail padding-top-20">
						<div class="product-rate">
							<i class="icon_star_alt"></i>
							<i class="icon_star_alt"></i>
							<i class="icon_star_alt"></i>
							<i class="icon_star_alt"></i>
							<i class="icon_star_alt not-rated"></i>
						</div>
						<!-- /product-rate -->
						<div class="product-title">
							<p><a href="#">Black Cotton Leggings</a>
							</p>
						</div>
						<!-- /product-title -->
						<div class="product-price">
							<p><i class="fa fa-gbp"></i>160.00</p>
						</div>
						<!-- /product-price -->
					</div>
					<!-- /product-short-detail -->
				</div>
				<!-- /featured-item -->
			</div>
			<!-- /column -->

			<div class="col-md-3 col-sm-6">
				<div class="featured-item">
					<div class="product-image">
						<img src="http://placehold.it/263x341" alt="">
						<div class="product_overlay">
							<div class="product-cart">
								<a href="#">
									<p>+ Add to card</p>
								</a>
								<div class="product-icons">
									<ul>
										<li><a href="#" title="favourite"><i class="icon_heart_alt"></i></a>
										</li>
										<li class="icon-bg-color"><a href="#" title="compare"><i class="fa fa-sliders"></i></a>
										</li>
										<li><a href="product-quick-view.html" class="product-quick-view" title="quickview"><i class="arrow_condense"></i></a>
										</li>
									</ul>
								</div>
								<!-- /product-icons -->
							</div>
							<!-- /product-cart -->
						</div>
						<!-- /product_overlay -->
					</div>
					<!-- /product-image -->
					<div class="product-short-detail padding-top-20">
						<div class="product-rate">
							<i class="icon_star_alt"></i>
							<i class="icon_star_alt"></i>
							<i class="icon_star_alt"></i>
							<i class="icon_star_alt"></i>
							<i class="icon_star_alt not-rated"></i>
						</div>
						<!-- /product-rate -->
						<div class="product-title">
							<p><a href="#">Black Cotton Leggings</a>
							</p>
						</div>
						<!-- /product-title -->
						<div class="product-price">
							<p><i class="fa fa-gbp"></i>160.00</p>
						</div>
						<!-- /product-price -->
					</div>
					<!-- /product-short-detail -->
				</div>
				<!-- /featured-item -->
			</div>
			<!-- /column -->

			<div class="col-md-3 col-sm-6">
				<div class="featured-item">
					<div class="product-image">
						<img src="http://placehold.it/263x341" alt="">
						<div class="product_overlay">
							<div class="product-cart">
								<a href="#">
									<p>+ Add to card</p>
								</a>
								<div class="product-icons">
									<ul>
										<li><a href="#" title="favourite"><i class="icon_heart_alt"></i></a>
										</li>
										<li class="icon-bg-color"><a href="#" title="compare"><i class="fa fa-sliders"></i></a>
										</li>
										<li><a href="product-quick-view.html" class="product-quick-view" title="quickview"><i class="arrow_condense"></i></a>
										</li>
									</ul>
								</div>
								<!-- /product-icons -->
							</div>
							<!-- /product-cart -->
						</div>
						<!-- /product_overlay -->
					</div>
					<!-- /product-image -->
					<div class="product-short-detail padding-top-20">
						<div class="product-rate">
							<i class="icon_star_alt"></i>
							<i class="icon_star_alt"></i>
							<i class="icon_star_alt"></i>
							<i class="icon_star_alt"></i>
							<i class="icon_star_alt not-rated"></i>
						</div>
						<!-- /product-rate -->
						<div class="product-title">
							<p><a href="#">Black Cotton Leggings</a>
							</p>
						</div>
						<!-- /product-title -->
						<div class="product-price">
							<p><i class="fa fa-gbp"></i>160.00</p>
						</div>
						<!-- /product-price -->
					</div>
					<!-- /product-short-detail -->
				</div>
				<!-- /featured-item -->
			</div>
			<!-- /column -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>

<!-- Related Products End -->
@endsection
@section('script')
<script>
	$('.product-quickview-slider').flexslider({
		animation: 'slide',
		controlNav: 'thumbnails',
		directionNav: false
	});
</script>
@endsection