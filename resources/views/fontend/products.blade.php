@extends('fontend.layouts.master')
@section('title')
<title>NH Store - Products</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('assets/fontend/css/jquery-ui.css')}}">
<link rel="stylesheet" href="{{mix('/css/products.css')}}">
<style type="text/css">
	.header-bg-parallax {
		@if (Request::is('*/category=*'))
		background: url({{$category->cover}}) no-repeat center center fixed;
		@else
		background: url({{asset('assets/fontend/images/collections-men.webp')}}) no-repeat center center fixed;
		@endif
		background-size: cover;
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
							<li><a href="{{ route('products') }}">Sản phẩm</a>
							</li>
							@if (Request::is('*/category=*'))
							<li><a href="{{route('get-products-by-category',$category->slug) }}">{{$category->name}}</a>
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
									<option @if(request()->sort == 'newest') selected @endif value="newest">Mới nhất trước</option>
									<option @if(request()->sort == 'oldest') selected @endif value="oldest">Cũ nhất trước</option>
									<option @if(request()->sort == 'popularity') selected @endif value="popularity">Độ phổ biến</option>
									<option @if(request()->sort == 'pricedesc') selected @endif value="pricedesc">Giá từ cao tới thấp</option>
									<option @if(request()->sort == 'priceasc') selected @endif value="priceasc">Giá từ thấp tới cao</option>
								</select>
								<!-- /form-control -->
							</div>
							<!-- /form-group -->
						</li>
						<li>Xem:
							<a><i class="fa fa-th-large" id="2col"></i></a>
							<a><i class="fa fa-th" id="fw"></i></a>
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
			<div class="filter-price padding-vertical-5">
				<h4>Lọc theo mức giá (X1000)</h4>
				<div class="slider-range padding-top-50 padding-bottom-20">
					<fieldset data-min="1" data-max="5000" data-step="50" class="price-range">
						<div class="price-slider"></div>
						<p>
							@php
							$prices = request()->price;
							if (isset($prices)) {
								$prices = explode("-", $prices);
							}
							@endphp
							<input type="text" id="min" value="{{isset($prices)?number_format($prices[0]/1000):number_format(100)}}đ" readonly />
							<input type="text" id="max" value="{{isset($prices)?number_format($prices[1]/1000):number_format(1000)}}đ" readonly />
						</p>

						<div class="filter-button">
							<a href="javascript:;" id="price">Lọc</a>
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
				<div class="country-list list">
					@foreach ($countries as $key => $country)
					@if ($key < 5)
					<span class="item">
						<p style="height: 20px;" class="title">
							<input type="checkbox" class="option" name="country_id[]" value="{{$country->id}}">{{$country->name}}
						</p>
					</span>
					@else
					<span class="item more-country">
						<p style="height: 20px;" class="title">
							<input type="checkbox" class="option" name="country_id[]" value="{{$country->id}}">{{$country->name}}
						</p>
					</span>
					@endif
					@endforeach
					@if ($countries->count()>=5)
					<span><a href="javascript:;" id="view-more-country">Xem thêm</a></span>
					@endif
				</div>
				<!-- /country-list-->
			</div>
			<!-- /country-options-->
			<div class="brand-options padding-vertical-5">
				<h4>thương hiệu</h4>
				<div class="brand-list list">
					@foreach ($brands as $key => $brand)
					@if ($key < 5)
					<span class="item">
						<p style="height: 20px;" class="title">
							<input type="checkbox" name="brand_id[]" value="{{$brand->id}}">{{$brand->name}}
						</p>
					</span>
					@else
					<span class="item more-brand">
						<p style="height: 20px;" class="title">
							<input type="checkbox" name="brand_id[]" value="{{$brand->id}}">{{$brand->name}}
						</p>
					</span>
					@endif
					@endforeach
					@if ($brands->count()>=5)
					<span><a href="javascript:;" id="view-more-brand">Xem thêm</a></span>
					@endif
				</div>
				<!-- /brand-list -->
			</div>
			<!-- /brand-options -->
			<div class="color-options padding-vertical-5">
				<h4>màu sắc</h4>
				<div class="colors-list list">
					@foreach ($colors as $key => $color)
					@if ($key < 5)
					<span class="item">
						<p style="height: 20px;" class="title">
							<input type="checkbox" name="color_id[]" value="{{$color->id}}">{{$color->name}}
						</p>
					</span>
					@else
					<span class="item more-color">
						<p style="height: 20px;" class="title">
							<input type="checkbox" name="color_id[]" value="{{$color->id}}">{{$color->name}}
						</p>
					</span>
					@endif
					@endforeach
					@if ($colors->count()>=5)
					<span><a href="javascript:;" id="view-more-color">Xem thêm</a></span>
					@endif
				</div>
				<!-- /color-list -->
			</div>
			<!-- /color-options -->
			<div class="material-options padding-vertical-5">
				<h4>chất liệu</h4>
				<div class="material-list list">
					@foreach ($materials as $key => $material)
					@if ($key < 5)
					<span class="item">
						<p style="height: 20px;" class="title">
							<input type="checkbox" name="material_id[]" value="{{$material->id}}">{{$material->name}}
						</p>
					</span>
					@else
					<span class="item more-material">
						<p style="height: 20px;" class="title">
							<input type="checkbox" name="material_id[]" value="{{$material->id}}">{{$material->name}}
						</p>
					</span>
					@endif
					@endforeach
					@if ($materials->count()>=5)
					<span><a href="javascript:;" id="view-more-material">Xem thêm</a></span>
					@endif
				</div>
				<!-- /material-list -->
			</div>
			<!-- /material-options -->
			<div class="sizes-options padding-vertical-5">
				<h4>kích thước</h4>
				<div class="sizes-list">
					@foreach ($sizes as $key => $size)
					@if ($key < 5)
					<span class="item">
						<p style="height: 20px;" class="title">
							<input type="checkbox" name="size_id[]" value="{{$size->id}}">{{$size->name}}
						</p>
					</span>
					@else
					<span class="item more-size">
						<p style="height: 20px;" class="title">
							<input type="checkbox" name="size_id[]" value="{{$size->id}}">{{$size->name}}
						</p>
					</span>
					@endif
					@endforeach
					@if ($sizes->count()>=5)
					<span><a href="javascript:;" id="view-more-size">Xem thêm</a></span>
					@endif
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
		@php
		$request = request()->all();
		unset($request['page']);
		unset($request['style']);
		unset($request['sort']);
		@endphp
		@if (!empty($request))
		<div class="col-md-9 col-sm-8 padding-top-20">
			<div class="cM5DKB"><span class="c2Lu3x">Lọc theo: </span>
				@foreach ($request as $key => $value)
				<div data-show="true" class="ant-tag">
					<span class="ant-tag-text">{{ __('message.'.$key) }}: {{$value}}
					</span>
					<a href="javascript:;" class="remove-filter" data-filter="{{$key}}={{$value}}"><i class="fa fa-close anticon anticon-cross"></i></a>
				</div>
				@endforeach
				<span class="cOT0eH">Xóa tất cả</span>
			</div>
		</div>
		@endif
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
						<p style="height: 40px;" class="title"><a href="#">{{$product->name}}</a>
						</p>
					</div>
					<!-- /product-title -->
					<div class="product-price">
						<p>{{number_format($product->out_price)}} đ</p>
						<p style="color: #b3b3b3;">-{{round( (1-($product->out_price)/($product->general_price))*100, 1, PHP_ROUND_HALF_UP)}}%</p><br>
						<del>{{number_format($product->general_price)}} đ</del>
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
<script src="{{mix('/js/products.js')}}"></script>
{{-- xem sản phẩm theo bộ lọc --}}
<script type="text/javascript">
	$(document).on('click','.remove-filter',function () {
		let url = window.location.href;
		let filter = $(this).data('filter');
		if(url.indexOf('&'+filter)!=-1){
			url = url.replace('&'+filter, '');
		}else if(url.indexOf('/?'+filter)!=-1){
			url = url.replace('/?'+filter, '');
		}
		window.location.replace(url);
	})
</script>
@endsection