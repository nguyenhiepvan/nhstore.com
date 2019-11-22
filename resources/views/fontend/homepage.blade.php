@extends('fontend.layouts.master')
@section('title')
<title>NH Store - Men fashion</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('assets/fontend/css/jquery-ui.css')}}">
<link rel="stylesheet" href="{{asset('assets/fontend/css/flexslider-set.css')}}">
@endsection
@section('header')
@include('fontend.layouts.header-homepage')
@endsection
@section('content')
<!-- Main-slider begin -->
<div id="hero">
	<div class="flexslider">
		<ul class="slides">
			<li class="slide" data-background="{{ asset('assets/fontend/images/GQ-Selects-March-Hero.jpg') }}" data-thumbnail="{{ asset('assets/fontend/images/slider2.jpg') }}">
				<div class="slider-caption fx-caption-2 text-center">
					<h1 class="sl-big-heading-3">Life style that you need, Yo.</h1>
					<p>Claritas est etiam processus dynamicus, qui sequitur mutatio-nem consuetudium lectorum.</p>
					<a href="#" class="sl-button-white margin-top-30">View Collection</a>
				</div>
				<!-- /slider-caption -->
			</li>
			<!-- /slide -->
			<li class="slide" data-background="{{ asset('assets/fontend/images/slider2.jpg') }}" data-thumbnail="{{ asset('assets/fontend/images/javier-reyes-599328-unsplash.jpg') }}">
				<div class="slider-caption fx-caption-2 text-left">
					<h1 class="sl-big-heading-3">Creative theme Awesome.</h1>
					<p>Claritas est etiam processus dynamicus, qui sequitur mutatio-nem consuetudium lectorum.</p>
					<a href="#" class="sl-button-white margin-top-30">View Collection</a>
				</div>
				<!-- /slider-caption -->
			</li>
			<!-- /slide -->
			<li class="slide" data-background="{{ asset('assets/fontend/images/javier-reyes-599328-unsplash.jpg') }}" data-thumbnail="{{ asset('assets/fontend/images/GQ-Selects-March-Hero.jpg') }}">
				<div class="slider-caption fx-caption-2 text-center">
					<h1 class="sl-big-heading-3 padding-bottom-15">Amazing shop theme!</h1>
					<p>Claritas est etiam processus dynamicus, qui sequitur mutatio-nem consuetudium lectorum.</p>
					<a href="#" class="sl-button-white margin-top-30">View Collection</a>
				</div>
				<!-- /slider-caption -->
			</li>
			<!-- /slide -->
		</ul>
		<!-- /slides -->
	</div>
	<!-- /flexslider -->
</div>
<!-- End Main-slider -->
<!-- Banner-offers Begin -->
<div class="banner-offer">
	<div class="container-fluid text-center">
		<div class="col-md-4 col-sm-4 p-image">
			<img src="http://placehold.it/450x362" alt="" />
			<div class="hover_overlay">
				<div class="banner-content">
					<div class="content">
						<h5>Styles fashion for men’s</h5>
						<p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.</p>
						<a href="#" class="sl-button-white margin-top-30">View Collection</a>
					</div>
				</div>
				<!-- /banner-content -->
			</div>
			<!-- /hover-overlay -->
		</div>
		<!-- /column -->
		<div class="col-md-4 col-sm-4 banner-add-1">
			<div class="offer-add">
				<div class="banner-content">
					<img src="img/text.png" alt="" />
					<div>
						<h4 class="banner-heading text-center">orise-store exclusives up to 70% extra 10% ends july 31th</h4>
					</div>
					<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis.</p>
				</div>
				<!-- /banner-content -->
			</div>
			<!-- /offer-add -->
		</div>
		<!-- /column -->
		<div class="col-md-4 col-sm-4 p-image">
			<img src="http://placehold.it/450x362" alt="" />
			<div class="hover_overlay">
				<div class="banner-content">
					<div class="content">
						<h5>Styles backpack for men’s</h5>
						<p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.</p>
						<a href="#" class="sl-button-white margin-top-30">View Collection</a>
					</div>
				</div>
				<!-- /banner-content -->
			</div>
			<!-- /hover-overlay -->
		</div>
		<!-- /column -->
	</div>
	<!-- /container-fluid -->
</div>
<!-- Banner Offers End -->
<!-- Best Seller Begin -->
<div class="best-seller padding-vertical-100">
	<div class="container text-center">
		<h2 class="double-line"><span>BestSeller Products</span></h2>
		<p class="sub-tittle">Eodem modo typi, qui nunc nobis videntur parum clari</p>
		<div class="row padding-top-60">
			<div class="col-md-12">
				<div class="col-md-6">
					<div class="best-product padding-right-25">
						<div class="product-image">
							<img src="http://placehold.it/255x331" alt="">
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
					<!-- /best-product -->
					<div class="best-product">
						<div class="product-image">
							<img src="http://placehold.it/255x331" alt="">
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
								<del><i class="fa fa-gbp"></i>130.00</del>
							</div>
							<!-- /product-price -->
						</div>
						<!-- /product-short-detail -->
					</div>
					<!-- /best-product -->
				</div>
				<!-- /column -->
				<div class="col-md-6 poster">
					<img src="http://placehold.it/540x494" class="poster-img" alt="" />
					<div class="poster-content margin-horizontal-50">
						<img src="http://placehold.it/97x53" alt="" />
						<h1>wasted heroes do or die t-shirt</h1>
					</div>
					<!-- /poster-content -->
				</div>
				<!-- /poster -->
				<div class="col-md-6 poster-2">
					<img src="http://placehold.it/540x494" class="poster-img" alt="" />
					<div class="poster-content margin-horizontal-30">
						<img src="http://placehold.it/97x53" alt="" />
						<h1>anime tattoo girl model fashion</h1>
					</div>
					<!-- /poster-content -->
				</div>
				<!-- /poster -->
				<div class="col-md-6 padding-top-25">
					<div class="best-product padding-right-25">
						<div class="product-image">
							<img src="http://placehold.it/255x331" alt="">
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
					<!-- /best-product -->
					<div class="best-product">
						<div class="product-image">
							<img src="http://placehold.it/255x331" alt="">
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
								<del><i class="fa fa-gbp"></i>130.00</del>
							</div>
							<!-- /product-price -->
						</div>
						<!-- /product-short-detail -->
					</div>
					<!-- /best-product -->
				</div>
				<!-- /column -->
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- Best Seller End -->
<!-- Video LightBox Begin -->
<div class="vl-box">
	<div class="white-overlay"></div>
	<div class="container text-center">
		<div class="video-box">
			<a href="https://vimeo.com/21294655" class="play-button"><img src="img/video-play-icon.png" alt="" />
			</a>
			<h1>Awesome Video LightBox</h1>
			<p>Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.</p>
		</div>
		<!-- /video box -->
	</div>
	<!-- /container -->
</div>
<!-- Video LightBox End -->
<!-- Featured Products Begin -->
<div class="featured-products padding-vertical-100">
	<div class="container text-center">
		<h2 class="double-line"><span>Featured Products</span></h2>
		<p class="sub-tittle">Eodem modo typi, qui nunc nobis videntur parum clari</p>
		<div class="row padding-top-60">
			<div class="col-md-3 col-sm-6">
				<div class="featured-item">
					<div class="product-image">
						<img src="http://placehold.it/263x341" alt="">
						<span class="product-sale">sale!</span>
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
						<span class="product-sale">sale!</span>
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
<!-- Featured Products End -->
<!-- Blog Begin -->
<div class="blog-latest">
	<div class="container text-center">
		<h2 class="double-line"><span>Latest From Blog</span></h2>
		<p class="sub-tittle">Eodem modo typi, qui nunc nobis videntur parum clari</p>
		<div class="row padding-bottom-60">
			<div class="col-md-12">
				<div class="blog-carousel pr-carousel">
					<div class="item">
						<div class="product">
							<img src="http://placehold.it/540x340" class="img-responsive" alt="" />
							<div class="hover_overlay">
								<div class="hover-search">
									<a href="#"><i class="icon_link_alt"></i></a>
								</div>
							</div>
							<!-- /hover_overlay -->
						</div>
						<div class="blog-short-detail">
							<div class="post-title padding-vertical-10">
								<p><a href="#">Recent Tattoos By Luke Wessman</a>
								</p>
							</div>
							<!-- /post-title -->
							<div class="post-info">
								<p>By <a href="#">Erentheme</a> / July 11, 2016</p>
							</div>
							<!-- /post-info -->
						</div>
						<!-- /blog-short-detail -->
					</div>
					<!-- /item -->
					<div class="item">
						<div class="product">
							<img src="http://placehold.it/540x340" class="img-responsive" alt="" />
							<div class="hover_overlay">
								<div class="hover-search">
									<a href="#"><i class="icon_link_alt"></i></a>
								</div>
							</div>
							<!-- /hover_overlay -->
						</div>
						<div class="blog-short-detail">
							<div class="post-title padding-vertical-10">
								<p><a href="#">American Style PF Flyers Luke</a>
								</p>
							</div>
							<!-- /post-title -->
							<div class="post-info">
								<p>By <a href="#">Erentheme</a> / July 11, 2016</p>
							</div>
							<!-- /post-info -->
						</div>
						<!-- /blog-short-detail -->
					</div>
					<!-- /item -->
					<div class="item">
						<div class="product">
							<img src="http://placehold.it/540x340" class="img-responsive" alt="" />
							<div class="hover_overlay">
								<div class="hover-search">
									<a href="#"><i class="icon_link_alt"></i></a>
								</div>
							</div>
							<!-- /hover_overlay -->
						</div>
						<div class="blog-short-detail">
							<div class="post-title padding-vertical-10">
								<p><a href="#">American Style PF Flyers Luke</a>
								</p>
							</div>
							<!-- /post-title -->
							<div class="post-info">
								<p>By <a href="#">Erentheme</a> / July 11, 2016</p>
							</div>
							<!-- /post-info -->
						</div>
						<!-- /blog-short-detail -->
					</div>
					<!-- /item -->
					<div class="item">
						<div class="product">
							<img src="http://placehold.it/540x340" class="img-responsive" alt="" />
							<div class="hover_overlay">
								<div class="hover-search">
									<a href="#"><i class="icon_link_alt"></i></a>
								</div>
							</div>
							<!-- /hover_overlay -->
						</div>
						<div class="blog-short-detail">
							<div class="post-title padding-vertical-10">
								<p><a href="#">American Style PF Flyers Luke</a>
								</p>
							</div>
							<!-- /post-title -->
							<div class="post-info">
								<p>By <a href="#">Erentheme</a> / July 11, 2016</p>
							</div>
							<!-- /post-info -->
						</div>
						<!-- /blog-short-detail -->
					</div>
					<!-- /item -->
				</div>
				<!-- /blog-carousel -->
			</div>
			<!-- /column -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- Blog End -->
<!-- Testimonials Begin -->
<div class="testimonials">
	<div class="overlay-2">
		<div class="container text-center">
			<div class="row">
				<div class="col-md-12">
					<i class="icon_quotations_alt2"></i>
					<ul class="testimonial-slider">
						<li>
							<p>Typi non habent claritatem insitam, est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica.</p>
							<div class="client-info">
								<h6>Michel Smith</h6>
								<small>Web Developer</small>
							</div>
						</li>
						<li>
							<p>Typi non habent claritatem insitam, est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica.</p>
							<div class="client-info">
								<h6>Michel Smith</h6>
								<small>Web Developer</small>
							</div>
						</li>
						<li>
							<p>Typi non habent claritatem insitam, est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica.</p>
							<div class="client-info">
								<h6>Michel Smith</h6>
								<small>Web Developer</small>
							</div>
						</li>
					</ul>
					<!-- /bxslider -->
				</div>
				<!-- /column -->
				<div class="clients col-md-12">
					<div class="item"><img src="http://placehold.it/115x115" alt="" />
					</div>
					<!-- /item -->
					<div class="item"><img src="http://placehold.it/115x115" alt="" />
					</div>
					<!-- /item -->
					<div class="item"><img src="http://placehold.it/115x115" alt="" />
					</div>
					<!-- /item -->
					<div class="item"><img src="http://placehold.it/115x115" alt="" />
					</div>
					<!-- /item -->
					<div class="item"><img src="http://placehold.it/115x115" alt="" />
					</div>
					<!-- /item -->
					<div class="item"><img src="http://placehold.it/115x115" alt="" />
					</div>
					<!-- /item -->
					<div class="item"><img src="http://placehold.it/115x115" alt="" />
					</div>
					<!-- /item -->
				</div>
				<!-- /clients -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /overlay -->
</div>
<!-- Testimonial End -->
<!-- Popup Newsletter Begin -->
<div class="modal popup-newsletter fade" id="newsletterModal">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="icon_close"></i>close</button>
	<div id="newsletter-popup" class="block">
		<div class="block_content">
			<form method="post" target="_blank" class="subscription-form">
				<div class="popup-title">
					<h2>Get Our Email Letter</h2>
				</div>
				<!-- /popup-title -->
				<div class="popup-text">Subscribe to the Orise mailing list to receive updates on new arrivals, special offers and other discount information.</div>
				<!-- /popup-text -->
				<input class="inputletter" id="newsletter-input-popup" type="text" name="email" value="" placeholder="Enter your mail..." required>
				<button type="submit" class="btn-form">Subscribe!</button>
				<!-- /btn-form -->
			</form>
			<!-- /form -->
		</div>
		<!-- /block_content -->
		<div class="newsletter-popup-bottom">
			<input id="checker" type="checkbox">
			<label for="checker">Don't show this popup again</label>
		</div>
		<!-- /newsletter-popup-bottom -->
	</div>
	<!-- /newsletter-popup -->
</div>
<!-- Popup Newsletter End -->
@endsection
@section('script')
<script type="text/javascript">
	$(window).on('load', function() {
		$('#newsletterModal').modal('show');
	});
</script>
@endsection