@extends('fontend.layouts.master')
@section('title')
<title>NH Store - cart</title>
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
					<h1>Shopping Cart</h1>
					<div class="breadcrumbs">
						<ul>
							<li><a href="#">home</a>
							</li>
							<li><a href="#">shop</a>
							</li>
							<li><a href="#">men</a>
							</li>
							<li><a href="#" class="active">shopping cart</a>
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
<!-- Cart Table Begin -->
<div class="cart-table">
	<div class="container padding-vertical-100">
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th>Product photo</th>
								<th>Product name</th>
								<th>Description</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Total Price</th>
							</tr>
						</thead>
						<!-- /thead -->
						<tbody>
							<tr>
								<td>
									<img class="shopping-product" src="http://placehold.it/99x128" alt="">
								</td>
								<td class="product-name">
									<p>Name product #01</p>
								</td>
								<!-- /product-name -->
								<td class="product-detail">
									<p>Lorem Ipsum is simply dummy text of the
										<br> printing and typesetting industry.</p>
									</td>
									<!-- /product-detail -->
									<td class="product-price">
										<h5><i class="fa fa-gbp"></i>160.00</h5>
									</td>
									<!-- /product-price -->
									<td>
										<div class="input-group quantity-number">
											<input type="text" class="form-control" value="02">
											<div class="input-group-btn-vertical">
												<div class="btn"><i class="fa fa-angle-up"></i>
												</div>
												<!-- /btn -->
												<div class="btn"><i class="fa fa-angle-down"></i>
												</div>
												<!-- /btn -->
											</div>
											<!-- /input-group-btn-vertical -->
										</div>
										<!-- /quantity-number -->
									</td>
									<td class="product-price">
										<h5><i class="fa fa-gbp"></i>160.00</h5>
									</td>
									<!-- /product-price -->
									<td class="text-center"><a class="btn-close" href="#"><i class="fa fa-close"></i></a>
									</td>
									<!-- /btn-close -->
								</tr>
								<tr class="bd-bottom">
									<td>
										<img class="shopping-product" src="http://placehold.it/99x128" alt="">
									</td>
									<td class="product-name">
										<p>Name product #01</p>
									</td>
									<!-- /product-name -->
									<td class="product-detail">
										<p>Lorem Ipsum is simply dummy text of the
											<br> printing and typesetting industry.</p>
										</td>
										<!-- /product-detail -->
										<td class="product-price">
											<h5><i class="fa fa-gbp"></i>160.00</h5>
										</td>
										<!-- /product-price -->
										<td>
											<div class="input-group quantity-number">
												<input type="text" class="form-control" value="02">
												<div class="input-group-btn-vertical">
													<div class="btn"><i class="fa fa-angle-up"></i>
													</div>
													<!-- /btn -->
													<div class="btn"><i class="fa fa-angle-down"></i>
													</div>
													<!-- /btn -->
												</div>
												<!-- /input-group-btn-vertical -->
											</div>
											<!-- /quantity-number -->
										</td>
										<td class="product-price">
											<h5><i class="fa fa-gbp"></i>160.00</h5>
										</td>
										<!-- /product-price -->
										<td class="text-center"><a class="btn-close" href="#."><i class="fa fa-close"></i></a>
										</td>
										<!-- /btn-close -->
									</tr>
								</tbody>
								<!-- /tbody -->
							</table>
							<!-- /table -->
						</div>
						<!-- /table-responsive -->
						<div class="row padding-top-30">
							<div class="col-md-6">
								<a href="#" class="btn-form">continue shopping</a>
							</div>
							<!-- /column -->
							<div class="col-md-6 btn-group text-right">
								<a href="#" class="btn-cart margin-right-20">Update shopping cart</a>
								<a href="#" class="btn-cart">clear shopping cart</a>
							</div>
							<!-- /column -->
						</div>
						<!-- /row -->
					</div>
					<!-- /column -->
				</div>
				<!-- /row -->
				<div class="row margin-top-100">
					<div class="col-md-4">
						<div class="shop_measures">
							<h4>Calculate shipping</h4>
							<form class="cart-form padding-vertical-45">
								<div class="row">
									<div class="col-md-12 padding-bottom-30 form-group">
										<label for="country">Select your Country:</label>
										<input type="text" class="form-control" id="country" placeholder="United States (USA)" required>
									</div>
									<!-- /form-group -->
									<div class="col-md-6 form-group">
										<label for="city">Select your State:</label>
										<select name="country" id="city">
											<option>State / City</option>
											<option>Canada</option>
											<option>Chilli</option>
											<option>France</option>
										</select>
										<!-- /select -->
									</div>
									<!-- /form-group -->
									<div class="col-md-6 form-group">
										<label for="zip">Zip code:</label>
										<input type="text" class="form-control" id="zip" placeholder="Zip Code" required>
									</div>
									<!-- /form-group -->
									<div class="col-md-12 padding-top-50">
										<button type="submit" class="btn-cart">Update Shipping</button>
									</div>
									<!-- /column -->
								</div>
								<!-- /row -->
							</form>
							<!-- /cart-form -->
						</div>
						<!-- /shop_measures -->
					</div>
					<!-- /column -->
					<div class="col-md-4">
						<div class="shop_measures">
							<h4>Calculate shipping</h4>
							<form class="cart-form padding-vertical-45">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group padding-bottom-5">
											<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
											<input type="text" class="form-control" placeholder="" required>
										</div>
										<!-- /form-group -->
										<div class="form-group coupon-code">
											<label for="zip">Coupon code:</label>
											<input type="text" class="form-control" id="coupon" placeholder="98F101192" required>
										</div>
										<!-- /form-group -->
										<div class="padding-top-50">
											<button type="submit" class="btn-cart">Redeem Code</button>
										</div>
									</div>
									<!-- /column -->
								</div>
								<!-- /row -->
							</form>
							<!-- /cart-form -->
						</div>
						<!-- /shop_measures -->
					</div>
					<!-- /column -->
					<div class="col-md-4">
						<div class="shop_measures">
							<h4>cart totals</h4>
							<ul class="cart-total padding-top-50 margin-bottom-80">
								<li>Cart Subtotal:<span class="product-price"><i class="fa fa-gbp"></i>640.00</span>
								</li>
								<li>Shipping and Handling:<span class="product-price"><i class="fa fa-gbp"></i>10.00</span>
								</li>
								<li>Cart Totals:<span class="product-price total"><i class="fa fa-gbp"></i>650.00</span>
								</li>
							</ul>
							<!-- /cart-total -->
							<a href="#" class="btn-form">Proceeed to Checkout</a>
						</div>
						<!-- /shop_measures -->
					</div>
					<!-- /column -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- Cart Table End -->
		@endsection
		@section('script')
		@endsection