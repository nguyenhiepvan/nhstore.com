@extends('fontend.layouts.master')
@section('title')
<title>NH Store - checkout page</title>
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
					<h1>Checkout</h1>
					<div class="breadcrumbs">
						<ul>
							<li><a href="#">home</a>
							</li>
							<li><a href="#">shop</a>
							</li>
							<li><a href="#">men</a>
							</li>
							<li><a href="#" class="active">Checkout</a>
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

<!-- Checkout Begin -->

<div class="checkout">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="accordion-container padding-vertical-100">
					<ul>
						<li class="set">
							<a href="#." class="active">Checkout Method</a>
							<div class="row">
								<div class="col-md-6">
									<h6>Create a new account</h6>
									<p class="padding-vertical-25">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

									<form class="cart-form padding-top-35 padding-bottom-70">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group padding-bottom-5">
													<label for="zip">Email</label>
													<input type="text" class="form-control" placeholder="Mark Stevens" required>
												</div>
												<!-- /form-group -->
												<div class="form-group coupon-code margin-top-25">
													<label for="zip">Password:</label>
													<input type="text" class="form-control" id="coupon" placeholder="*********" required>
												</div>
												<!-- /form-group -->
												<div class="row padding-top-20">
													<div class="col-md-6 col-sm-6">
														<button type="submit" class="btn-cart">register now</button>
													</div>
													<!-- /column -->
													<div class="col-md-6 col-sm-6">
														<button type="submit" class="btn-cart">checkout as guest</button>
													</div>
													<!-- /column -->
												</div>
												<!-- /row -->
											</div>
											<!-- /column -->
										</div>
										<!-- /row -->
									</form>
									<!-- /cart-form -->
								</div>
								<!-- /column -->

								<div class="col-md-6">
									<h6>Login to your account</h6>

									<form class="cart-form padding-top-25 padding-bottom-70">
										<div class="row">
											<div class="col-md-12">
												<div class="padding-bottom-5 form-group">
													<label for="zip">Email</label>
													<input type="text" class="form-control" placeholder="Mark Stevens@gmail.com" required>
												</div>
												<!-- /form-group -->
												<div class="form-group coupon-code margin-top-25">
													<label for="zip">Password:</label>
													<input type="text" class="form-control" id="coupon" placeholder="*********" required>
												</div>
												<!-- /form-group -->
												<div class="form-group login-options margin-bottom-20">
													<label>
														<div class="squaredFour">
															<input type="checkbox" value="None" id="squaredFour" name="check" checked="">
															<label for="squaredFour"></label>
														</div>
														<!-- /squaredFour -->
														<p>Keep me logged in</p>
														<a href="#">Forgot your password?</a>
													</label>
													<!-- /label -->
												</div>
												<!-- /login-options -->
												<button type="submit" class="btn-login">Login to your account</button>

												<div class="row margin-top-30">
													<div class="col-md-6 col-sm-6">
														<button class="btn-login-social facebook-btn"><i class="fa fa-facebook"></i>Login facebook</button>
													</div>
													<!-- /column -->
													<div class="col-md-6 col-sm-6">
														<button class="btn-login-social twitter-btn"><i class="fa fa-twitter"></i>Login twitter</button>
													</div>
													<!-- /column -->
												</div>
												<!-- /row -->
											</div>
											<!-- /column -->
										</div>
										<!-- /row -->
									</form>
									<!-- /cart-form -->
								</div>
								<!-- /column -->
							</div>
							<!-- /row -->
						</li>
						<!-- /set -->

						<li class="set">
							<a href="#.">billing Information </a>
							<div class="content" style="">
								<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
								<p>when an unknown printer took a galley of type and scrambled it to make a type specimen book lorem Ipsum has been the industry's standard dummy text ever since the</p>
							</div>
							<!-- /content -->
						</li>
						<!-- /set -->

						<li class="set">
							<a href="#.">Shipping Information</a>
							<div class="content" style="">
								<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
								<p>when an unknown printer took a galley of type and scrambled it to make a type specimen book lorem Ipsum has been the industry's standard dummy text ever since the</p>
							</div>
							<!-- /content -->
						</li>
						<!-- /set -->

						<li class="set">
							<a href="#.">shipping method </a>
							<div class="content" style="">
								<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
								<p>when an unknown printer took a galley of type and scrambled it to make a type specimen book lorem Ipsum has been the industry's standard dummy text ever since the</p>
							</div>
							<!-- /content -->
						</li>
						<!-- /set -->
						<li class="set">
							<a href="#.">payment information</a>
							<div class="content" style="">
								<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
								<p>when an unknown printer took a galley of type and scrambled it to make a type specimen book lorem Ipsum has been the industry's standard dummy text ever since the</p>
							</div>
							<!-- /content -->
						</li>
						<!-- /set -->

						<li class="set">
							<a href="#.">order review</a>
							<div class="content" style="">
								<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
								<p>when an unknown printer took a galley of type and scrambled it to make a type specimen book lorem Ipsum has been the industry's standard dummy text ever since the</p>
							</div>
							<!-- /content -->
						</li>
						<!-- /set -->
					</ul>
				</div>
				<!-- /accordion-container -->
			</div>
			<!-- /column -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>

<!-- Checkout End -->
@endsection
@section('script')
@endsection