@extends('fontend.layouts.master')
@section('title')
<title>NH Store - Products</title>
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
					<h1>Products 2 Columns</h1>
					<div class="breadcrumbs">
						<ul>
							<li><a href="#">home</a>
							</li>
							<li><a href="#">shop</a>
							</li>
							<li><a href="#" class="active">mens</a>
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
	<div class="product-filter">
		<div class="container">
			<div class="col-md-12">
				<div class="filter-content padding-horizontal-25">
					<span>Showing 1–12 of 28 results</span>
					<ol>
						<li>
							<div class="form-group">
								<select name="p_show" id="p_show" class="form-control">
									<option value="">Show</option>
									<option value=""></option>
								</select>
								<!-- /form-control -->
							</div>
							<!-- /form-group -->
						</li>
						<li>
							<div class="form-group">
								<select name="p_defaultsorting" id="p_defaultsorting" class="form-control">
									<option value="">Default Sorting</option>
									<option value="">XL-Red-$20</option>
									<option value="">L-BLue-$40</option>
									<option value="">M-Yellow-$60</option>
									<option value="">S-Green-$80</option>
								</select>
								<!-- /form-control -->
							</div>
							<!-- /form-group -->
						</li>
					</ol>
				</div>
				<!-- /filter-content -->
			</div>
			<!-- /column -->
		</div>
		<!-- /container -->
	</div>
	<!-- /product-filter -->
</div>
<!-- Page Header End -->
<div class="container padding-vertical-100">
	<div class="row">
		<!-- Siderbar -->
		<div class="col-md-3 col-sm-4 sidebar">
			<div class="sidebar-search padding-bottom-10">
				<h4>Product Search</h4>
				<form class="product-search padding-top-40 padding-bottom-5">
					<button class="btn-search" type="submit" title="Search">
						<i class="fa fa-search"></i>
					</button>
					<!-- /button -->
					<input type="text" class="form-control" placeholder="Search products...">
				</form>
				<!-- /product-search -->
			</div>
			<!-- /sidebar-search -->
			<div class="product-categories padding-vertical-5">
				<h4>Product Categories</h4>
				<div class="product-categories-list">
					<ul class="padding-top-20">
						<li><a href="#">Accessories</a><span>10</span>
						</li>
						<li><a href="#">Footwear</a><span>25</span>
						</li>
						<li><a href="#">Outerwear</a><span>56</span>
						</li>
						<li><a href="#">Shirting</a><span>45</span>
						</li>
						<li><a href="#">Sweaters</a><span>21</span>
						</li>
						<li><a href="#">Trousers</a><span>32</span>
						</li>
					</ul>
				</div>
				<!-- /product-categories-list-->
			</div>
			<!-- /product-categories-->
			<div class="filter-price padding-vertical-5">
				<h4>Filter By Price</h4>
				<div class="slider-range padding-top-50 padding-bottom-20">
					<fieldset data-min="70" data-max="300" data-step="10" class="price-range">
						<div class="price-slider"></div>
						<p>
							<input type="text" value="£ 70" />
							<input type="text" value="£ 170" />
						</p>
						<div class="filter-button">
							<a href="#">Filter</a>
						</div>
						<!-- /filter-button-->
					</fieldset>
					<!-- /product-categories-->
				</div>
				<!-- /slider-range -->
			</div>
			<!-- /filter-price -->
			<div class="color-options padding-vertical-5">
				<h4>Color Options</h4>
				<div class="color-list">
					<ul class="padding-top-20">
						<li><a href="#">Black</a><span>09</span>
						</li>
						<li><a href="#">White</a><span>12</span>
						</li>
						<li><a href="#">Blue</a><span>56</span>
						</li>
						<li><a href="#">Red</a><span>34</span>
						</li>
						<li><a href="#">Green</a><span>22</span>
						</li>
					</ul>
				</div>
				<!-- /color-list-->
			</div>
			<!-- /color-options-->
			<div class="size-options padding-vertical-5">
				<h4>Color Options</h4>
				<div class="size-list">
					<ul class="padding-top-20">
						<li><a href="#">L</a><span>12</span>
						</li>
						<li><a href="#">M</a>
						</li>
						<li><a href="#">S</a><span>24</span>
						</li>
						<li><a href="#">XS</a>
						</li>
						<li><a href="#">XL</a><span>15</span>
						</li>
						<li><a href="#">XXL</a>
						</li>
						<li><a href="#">2XXL</a><span>36</span>
						</li>
					</ul>
				</div>
				<!-- /size-list -->
			</div>
			<!-- /size-options -->
			<div class="best-product padding-vertical-5">
				<h4>Best Products</h4>
				<ul class="padding-top-10">
					<li>
						<a href="#"><img src="http://placehold.it/65x84" alt="">
						</a>
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
						<div class="product-price">
							<p><i class="fa fa-gbp"></i>160.00</p>
						</div>
						<!-- /product-price -->
					</li>
					<li>
						<a href="#"><img src="http://placehold.it/65x84" alt="">
						</a>
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
						<div class="product-price">
							<p><i class="fa fa-gbp"></i>160.00</p>
						</div>
						<!-- /product-price -->
					</li>
					<li>
						<a href="#"><img src="http://placehold.it/65x84" alt="">
						</a>
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
						<div class="product-price">
							<p><i class="fa fa-gbp"></i>160.00</p>
						</div>
						<!-- /product-price -->
					</li>
					<li>
						<a href="#"><img src="http://placehold.it/65x84" alt="">
						</a>
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
						<div class="product-price">
							<p><i class="fa fa-gbp"></i>160.00</p>
						</div>
						<!-- /product-price -->
					</li>
				</ul>
			</div>
			<!-- /best-product -->
		</div>
		<!-- /sidebar -->
		<!-- Product Item List Begin -->
		<div class="product-item-list col-md-9 col-sm-8 padding-top-20 text-center">
			<div class="col-md-6 col-sm-6">
				<div class="product-item padding-bottom-60">
					<div class="product-image">
						<img src="http://placehold.it/394x511" alt="">
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
				<!-- /product-item -->
			</div>
			<!-- /column -->
			<div class="col-md-6 col-sm-6">
				<div class="product-item padding-bottom-60">
					<div class="product-image">
						<img src="http://placehold.it/394x511" alt="">
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
				<!-- /product-item -->
			</div>
			<!-- /column -->
			<div class="col-md-6 col-sm-6">
				<div class="product-item padding-bottom-60">
					<div class="product-image">
						<img src="http://placehold.it/394x511" alt="">
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
				<!-- /product-item -->
			</div>
			<!-- /column -->
			<div class="col-md-6 col-sm-6">
				<div class="product-item padding-bottom-60">
					<div class="product-image">
						<img src="http://placehold.it/394x511" alt="">
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
				<!-- /product-item -->
			</div>
			<!-- /column -->
			<div class="col-md-6 col-sm-6">
				<div class="product-item padding-bottom-60">
					<div class="product-image">
						<img src="http://placehold.it/394x511" alt="">
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
				<!-- /product-item -->
			</div>
			<!-- /column -->
			<div class="col-md-6 col-sm-6">
				<div class="product-item padding-bottom-60">
					<div class="product-image">
						<img src="http://placehold.it/394x511" alt="">
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
				<!-- /product-item -->
			</div>
			<!-- /column -->
			<div class="pagination padding-top-50">
				<ul>
					<li><a href="">01</a>
					</li>
					<li class="active"><a href="">02</a>
					</li>
					<li class="no-active">...</li>
					<li><a href="">03</a>
					</li>
					<li><a href=""><i class="fa fa-angle-double-right"></i></a>
					</li>
				</ul>
			</div>
			<!-- /pagination -->
		</div>
		<!-- /product-item-list -->
	</div>
	<!-- /row -->
</div>
<!-- /container -->
@endsection
@section('script')
<script src="{{asset('assets/fontend/js/vendors/jquery-ui.js')}}"></script>
<script>
	$('.price-range').filterSlider();
</script>
@endsection