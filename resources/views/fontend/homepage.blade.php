@extends('fontend.layouts.master')
@section('title')
<title>NH Store - Men fashion</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('assets/fontend/css/jquery-ui.css')}}">
<link rel="stylesheet" href="{{asset('assets/fontend/css/flexslider-set.css')}}">
@endsection
@section('content')
<!-- Hero begin -->
<div id="hero">
	<div class="flexslider">
		<ul class="slides">
			<li class="slide" data-background="{{asset('assets/fontend/images/nyfw-men-street-style-tyler-joe-9.jpg')}}" data-thumbnail="http://placehold.it/1920x1056">
				<div class="slider-caption-2 fx-caption-3 sl-line">
					<div class="text-middle">
						<span class="sl-small-heading">New T-shirt</span>
						<h2 class="sl-big-heading">Clothing for Men's</h2>
						<p>Claritas est etiam processus dynamicus, qui sequitur mutatio-nem consuetudium lectorum.</p>
						<a href="#" class="sl-button margin-top-30">View Collection</a>
					</div>
					<!-- /text-middle -->
				</div>
				<!-- /slider-caption-2 -->
			</li>
			<!-- /slide -->
			<li class="slide" data-background="{{asset('assets/fontend/images/javier-reyes-599328-unsplash.jpg')}}" data-thumbnail="http://placehold.it/1920x1056">
				<div class="slider-caption-3 fx-caption-4 text-center">
					<div class="sl-caption">
						<span class="sl-small-heading">New arrivals</span>
						<h2 class="sl-big-heading-2">Design 2017</h2>
						<p>Claritas est etiam processus dynamicus, qui sequitur mutatio-nem consuetudium lectorum.</p>
						<a href="#" class="sl-button margin-top-30">View Collection</a>
					</div>
					<!-- /sl-caption -->
				</div>
				<!-- /slider-caption-3 -->
			</li>
			<!-- /slide -->
			<li class="slide" data-background="{{asset('assets/fontend/images/spongebob-vans-1.jpg')}}" data-thumbnail="http://placehold.it/1920x1056">
				<div class="slider-caption fx-caption-2 text-center" style="color: #222;">
					<h1 class="sl-big-heading-3">Life style that you need, Yo.</h1>
					<p>Claritas est etiam processus dynamicus, qui sequitur mutatio-nem consuetudium lectorum.</p>
					<a href="#" class="sl-button margin-top-30">View Collection</a>
				</div>
				<!-- /slider-caption -->
			</li>
			<!-- /slide -->
		</ul>
		<!-- /slides -->
	</div>
	<!-- /flexslider -->
</div>
<!-- Hero End -->
<!-- New Products Begin -->
<div class="new-products">
	<div class="container text-center padding-vertical-100">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-4 col-sm-4 new-product-1">
					<div class="product">
						<img src="http://placehold.it/372x476" class="img-responsive" alt="" />
						<div class="hover_overlay">
							<div class="hover-search">
								<a href="#"><i class="icon_link_alt"></i></a>
							</div>
						</div>
						<!-- /hover overlay -->
					</div>
					<!-- /product -->
					<div class="product-info margin-vertical-20">
						<span class="product-tags">Shop  /  Hand bag for men</span>
						<h4>Vintage Canvas Mens Fanny</h4>
					</div>
					<!-- /product-info -->
				</div>
				<!-- /column -->
				<div class="col-md-4 col-sm-4 new-product-2">
					<div class="product-info margin-bottom-20">
						<span class="product-tags">Clothing  /  T-shirt</span>
						<h4>Aime Leon Dore Pre Fall Lookbook</h4>
					</div>
					<!-- /product-info -->
					<div class="product">
						<img src="http://placehold.it/372x476" class="img-responsive" alt="" />
						<div class="hover_overlay">
							<div class="hover-search">
								<a href="#"><i class="icon_link_alt"></i></a>
							</div>
						</div>
						<!-- /hover overlay -->
					</div>
					<!-- /product -->
				</div>
				<!-- /column -->
				<div class="col-md-4 col-sm-4 new-product-3">
					<div class="product">
						<img src="http://placehold.it/372x476" class="img-responsive" alt="" />
						<div class="hover_overlay">
							<div class="hover-search">
								<a href="#"><i class="icon_link_alt"></i></a>
							</div>
						</div>
						<!-- /hover overlay -->
					</div>
					<!-- /product -->
					<div class="product-info margin-vertical-20">
						<span class="product-tags">Shop  /  Clothing for men</span>
						<h4>Comprar Love Moschino Primavera</h4>
					</div>
					<!-- /product-info -->
				</div>
				<!-- /column -->
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- New Products End -->
<!-- Featured Products Begin-->
<div class="featured-products">
	<div class="container padding-bottom-100 text-center">
		<h2 class="double-line"><span>Featured Products</span></h2>
		<p class="sub-tittle">Eodem modo typi, qui nunc nobis videntur parum clari</p>
		<div class="row">
			<div class="col-md-12">
				<div class="product-carousel pr-carousel padding-top-50">
					<div class="item">
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
					<!-- /item -->
					<div class="item">
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
					<!-- /item -->
					<div class="item">
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
					<!-- /item -->
					<div class="item">
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
					<!-- /item -->
					<div class="item">
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
					<!-- /item -->
					<div class="item">
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
					<!-- /item -->
				</div>
				<!-- /product-carousel -->
			</div>
			<!-- /column -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- Featured Products End -->
<!-- Video LightBox Begin -->
<div class="vl-box">
	<div class="white-overlay"></div>
	<div class="container text-center">
		<div class="video-box">
			<a href="https://vimeo.com/21294655" class="play-button"><img src="{{asset('assets/fontend/img/video-play-icon.png')}}" alt="" />
			</a>
			<h1>Awesome Video LightBox</h1>
			<p>Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.</p>
		</div>
		<!-- /video box -->
	</div>
	<!-- /container -->
</div>
<!-- Video LightBox End -->
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
@endsection
@section('script')
<script type="text/javascript">
	$(window).on('load', function() {
		$('#newsletterModal').modal('show');
	});
</script>
@endsection