@extends('fontend.layouts.master')
@section('title')
<title>NH Store - Products</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('assets/fontend/css/jquery-ui.css')}}">
<style type="text/css">
	.header-bg-parallax {
		@if (Request::is('/category=*'))
		background: url({{$category->cover}}) no-repeat center center fixed;
		@else
		background: url({{asset('assets/fontend/images/collections-men.webp')}}) no-repeat center center fixed;
		@endif
		background-size: cover;
	}
	.categories li>ul{
		left: 20px;
		display:none;
	}
	.categories li:hover > ul{
		display:block;
	}
	.quantity{
		margin-top:5px;
		float: right;
	}
	.item{
		color: #868686;
		font-family: 'Droid Serif', serif;
		font-style: italic;
	}
</style>
@endsection
@section('header')
@include('fontend.layouts.header-landingpage')
@endsection
@section('content')
<!-- Page Header Begins -->
<div id="page-header">
	<div class="header-bg-parallax">
		<div class="overlay">
			<div class="container text-center">
				<div class="header-description">
					<h1>Trang phục nam</h1>
					<div class="breadcrumbs">
						<ul>
							<li><a href="{{ route('homepage') }}">Trang chủ</a>
							</li>
							@if (Request::is('/category=*'))
							<li><a href="{{route('get-products-by-category',$category) }}">{{$category->name}}</a>
							</li>
							@else
							<li><a href="#">shop</a>
							</li>
							@endif
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
					<span>Hiển thị {{$products->firstItem()}}–{{$products->lastItem()}} trong {{$products->total()}} kết quả</span>
					<ol>
						<li>
							<div class="form-group">
								<select name="p_show" id="p_show" class="form-control">
									<option value="">Độ phổ biến</option>
									<option value="">Giá từ cao tới thấp</option>
									<option value="">Giá từ thấp tới cao</option>
								</select>
								<!-- /form-control -->
							</div>
							<!-- /form-group -->
						</li>
						<li>
							<div class="form-group">
								<select name="p_defaultsorting" id="p_defaultsorting" class="form-control">
									<option value="">Mới nhất trước</option>
									<option value="">Cũ nhất trước</option>
								</select>
								<!-- /form-control -->
							</div>
							<!-- /form-group -->
						</li>
						<li>Xem:
							<a href="{{ route('products') }}"><i class="fa fa-th-large"></i></a>
							<a href="{{ route('products-full-width') }}"><i class="fa fa-th"></i></a></li>
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
	<!-- Product Item List Begin -->
	<div class="container padding-vertical-100">
		<div class="row">
			<!-- Siderbar -->
			<div class="col-md-3 col-sm-4 sidebar">
				<div class="sidebar-search padding-bottom-10">
					<h4>Tìm kiếm sản phẩm</h4>
					<form class="product-search padding-top-40 padding-bottom-5">
						<button class="btn-search" type="submit" title="Search">
							<i class="fa fa-search"></i>
						</button>
						<!-- /button -->
						<input type="text" class="form-control" placeholder="Nhập từ khóa...">
					</form>
					<!-- /product-search -->
				</div>
				<!-- /sidebar-search -->

				<div class="product-categories padding-vertical-5">
					<h4>Danh mục sản phẩm</h4>
					<div class="product-categories-list">
						{!!$categories!!}
					</div>
					<!-- /product-categories-list-->
				</div>
				<!-- /product-categories-->

				<div class="filter-price padding-vertical-5">
					<h4>Lọc theo mức giá (X1000)</h4>
					<div class="slider-range padding-top-50 padding-bottom-20">
						<fieldset data-min="1" data-max="5000" data-step="50" class="price-range">
							<div class="price-slider"></div>
							<p>
								<input type="text" value="100đ" />
								<input type="text" value="1000đ" />
							</p>

							<div class="filter-button">
								<a href="#">Lọc</a>
							</div>
							<!-- /filter-button-->
						</fieldset>
						<!-- /product-categories-->
					</div>
					<!-- /slider-range -->
				</div>
				<!-- /filter-price -->

				<div class="country-options padding-vertical-5">
					<h4>xuất xứ</h4>
					<div class="country-list">
						@foreach ($countries as $country)
						<span>
							<input type="checkbox" class="option" name="country_id[]" value="{{$country->id}}">
						</span>
						<span>
							<span class="item">{{$country->name}}</span><span class="quantity">09</span>
						</span>
						@endforeach
					</div>
					<!-- /country-list-->
				</div>
				<!-- /country-options-->
				<div class="brand-options padding-vertical-5">
					<h4>thương hiệu</h4>
					<div class="brand-list">
						@foreach ($brands as $brand)
						<span>
							<input type="checkbox" name="brand_id[]" value="{{$brand->id}}">
						</span>
						<span>
							<span class="item">{{$brand->name}}</span><span class="quantity">09</span>
						</span>
						@endforeach
					</div>
					<!-- /brand-list -->
				</div>
				<!-- /brand-options -->
				<div class="color-options padding-vertical-5">
					<h4>màu sắc</h4>
					<div class="colors-list">
						@foreach ($colors as $color)
						<span>
							<input type="checkbox" name="color_id[]" value="{{$color->id}}">
						</span>
						<span>
							<span class="item">{{$color->name}}</span><span class="quantity">09</span>
						</span> <br>
						@endforeach
					</div>
					<!-- /color-list -->
				</div>
				<!-- /color-options -->
				<div class="material-options padding-vertical-5">
					<h4>chất liệu</h4>
					<div class="material-list">
						@foreach ($materials as $material)
						<span>
							<input type="checkbox" name="material_id[]" value="{{$material->id}}">
						</span>
						<span>
							<span class="item">{{$material->name}}</span><span class="quantity">09</span>
						</span> <br>
						@endforeach
					</div>
					<!-- /material-list -->
				</div>
				<!-- /material-options -->
				<div class="sizes-options padding-vertical-5">
					<h4>kích thước</h4>
					<div class="sizes-list">
						@foreach ($sizes as $size)
						<span>
							<input type="checkbox" name="size_id[]" value="{{$size->id}}">
						</span>
						<span>
							<span class="item">{{$size->name}}</span><span class="quantity">09</span>
						</span> <br>
						@endforeach
					</div>
					<div><a href="javascript:;">Xem thêm</a></div>
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
				@if ($products->count()==0)
				<p>Không có kết quả phù hợp</p>
				@else
				@foreach ($products as $product)
				<div class="col-md-6 col-sm-6">
					<div class="product-item padding-bottom-60">
						<div class="product-image">
							<img class="product-thumbnail" src="{{$product->images->where('is_thumbnail',true)->first()['470X610']}}" alt="">
							<div class="product_overlay" data-href="{{ route('product',$product->slug) }}">
								<div class="product-cart">
									<a href="#">
										<p>+ Thêm vào giỏ hàng</p>
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
						{{-- </a>  --}}
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
							<p><a href="#">{{$product->name}}</a>
							</p>
						</div>
						<!-- /product-title -->
						<div class="product-price">
							<p>{{number_format($product->prices[0]->out_price)}} đ</p>
							<p style="color: #b3b3b3;">-{{round( (1-($product->prices[0]->out_price)/($product->prices[0]->general_price))*100, 1, PHP_ROUND_HALF_UP)}}%</p><br>
							<del>{{number_format($product->prices[0]->general_price)}} đ</del>
						</div>
						<!-- /product-price -->
					</div>
					<!-- /product-short-detail -->
				</div>
				<!-- /product-item -->
			</div>
			<!-- /column -->
			@endforeach
			@endif
			<div class="pagination padding-top-50">
				<ul>
					{{ $products->links('vendor.pagination.custom')}}
				</ul>
			</div>
			<!-- /pagination -->
		</div>
		<!-- /product-item-list -->
	</div>
	<!-- /row -->
</div>
<!-- Product Item List End -->
<!-- /container -->
@endsection
@section('script')
<script src="{{asset('assets/fontend/js/vendors/jquery-ui.js')}}"></script>
<script>
	$('.price-range').filterSlider();
	$(document).on('click','.product_overlay',function () {
		let href = $(this).data('href');
		window.location.href = href;
	});
</script>
@endsection