@extends('fontend.layouts.master')
@section('title')
<title>NH Store - 404 page</title>
@endsection
@section('css')
@endsection
@section('header')
@include('fontend.layouts.header-landingpage')
@endsection
@section('content')
<!-- Page Header Begins -->

<div id="page-header">
	<div class="header-bg-parallax-2">
		<div class="overlay-2">
			<div class="container text-center">
				<div class="header-description">
					<h1>File not found</h1>
					<div class="breadcrumbs">
						<ul>
							<li><a href="#">home</a>
							</li>
							<li><a href="#" class="active">404 error page</a>
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

<!-- Error Wrapper Begin -->

<div class="error-wrapper">
	<div class="container text-center padding-vertical-100">
		<span class="error-big-heading">404</span>
		<h4 class="margin-top-50">component not found</h4>
		<h2>Nothing to see here!</h2>
		<p>The page are looking for has been moved or doesn’t exist anymore, if you like you can return to our homepage. If the problem persists, please send us an email to <a href="mailto:erentheme@gmail.com">Erentheme@gmail.com</a>
		</p>
		<div class="error-search">
			<form class="error-search-form padding-top-80 padding-bottom-40">
				<button class="btn-search" type="submit" title="Search">Search</button>
				<!-- /button -->
				<input type="text" class="form-control" placeholder="Enter text type...">
			</form>
			<!-- /form -->
		</div>
		<!-- /error-search -->
	</div>
	<!-- /container -->
</div>

<!-- Error Wrapper End -->
@endsection
@section('script')
@endsection