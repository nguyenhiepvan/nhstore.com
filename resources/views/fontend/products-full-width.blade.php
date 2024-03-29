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
						<li>
							<div class="form-group">
								<select name="p_color" id="p_color" class="form-control">
									<option value="">Any Color</option>
									<option value="">Red</option>
									<option value="">Blue</option>
									<option value="">Yellow</option>
									<option value="">Green</option>
								</select>
							</div>
							<!-- /form-group -->
						</li>
						<li>
							<div class="form-group">
								<select name="p_price" id="p_price" class="form-control">
									<option value="">Price</option>
									<option value="">$10-$20</option>
									<option value="">$20-$40</option>
									<option value="">$40-$60</option>
									<option value="">$60-$80</option>
								</select>
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
<div class="product-item-list">
	<div class="container-fluid padding-vertical-100 text-center">
		@foreach ($products as $product)
		<div class="products-full">
			<div class="product-item padding-bottom-50">
				<div class="product-image">
					<img src="{{$product->images->where('is_thumbnail',true)->first()['242X314']}}" alt="{{$product->name}}">
					<div class="product_overlay">
						<div class="product-cart">
							<a href="#">
								<p>+ Thêm vào giỏ</p>
							</a>
							<div class="product-icons">
								<ul>
									<li><a href="#" title="Yêu thích"><i class="icon_heart_alt"></i></a>
									</li>
									<li class="icon-bg-color"><a href="#" title="So sánh"><i class="fa fa-sliders"></i></a>
									</li>
									<li><a href="product-quick-view.html" class="product-quick-view" title="Xem trước"><i class="arrow_condense"></i></a>
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
						<p style="height: 40px;" class="title"><a href="{{ route('product',$product->slug) }}">{{$product->name}}</a>
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
		<!-- /products-full -->
		@endforeach
		<div class="pagination padding-top-50">
			<ul>
				{{ $products->links('vendor.pagination.custom')}}
			</ul>
		</div>
		<!-- /pagination -->
	</div>
	<!-- /container -->
</div>
<!-- Product Item List End -->
<!-- /container -->
@endsection
@section('script')
<script type="text/javascript">
	// Hàm này dùng để thêm bộ lọc --}}
	function add_filter(option,value) {
		//Lấy url hiện tại
		let url = window.location.href;
		//tách url thành mảng
		let arr = url.split('/');
		//Lọc phần tử null hoặc trống khỏi mảng
		arr = arr.filter(function (el) {
			return el != null && el != '';
		});
		//kiểm tra xem url có bộ lọc nào hay chưa
		if(arr[arr.length-1] == 'products'){
			//Nếu chưa có thì cộng cuỗi
			url += '?page=1&'+option+'='+value;
		}else{
			//có bộ lọc và đã có sort
			if (url.indexOf(option+'=')!=-1)
			{
				arr = arr[arr.length-1].split('&');
				$.each(arr, function( index, value_ ) {
					if(value_.indexOf(option+'=')!=-1){
						url = url.replace(value_, option+'='+value);
						return false;
					}
					if(value_.indexOf('page=')!=-1){
						url = url.replace(value_, 'products?page=1');
					}
				});
			}
			//có bộ lọc và không có sort
			else{
				arr = arr[arr.length-1].split('&');
				$.each(arr, function( index, value_ ) {
					if(value_.indexOf('page=')!=-1){
						url = url.replace(value_, 'products?page=1');
						return false;
					}
				});
				url += '&'+option+'='+value;
			}
		}
		return url;
	}
</script>
{{-- xem sản phẩm theo bộ lọc --}}
<script type="text/javascript">
	$(document).on('change','#p_show',function () {
		//Lấy kiểu xem
		let sort = $('#p_show').find(":selected").val();
		window.location.href = add_filter('sort',sort);
	});
	// Lọc theo giá
	$(document).on('click','#price',function () {
		let min = parseInt($('#min').val().replace(',',''));
		let max = parseInt($('#max').val().replace(',',''));
		window.location.href = add_filter('price',min+'-'+max);
	})
	// Đổi kiểu xem
	$(document).on('click','#fw',function () {
		window.location.href = add_filter('style','fw');
	});
	$(document).on('click','#2col',function () {
		window.location.href = add_filter('style','2col');
	});
</script>
@endsection