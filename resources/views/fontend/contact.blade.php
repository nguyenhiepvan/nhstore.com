@extends('fontend.layouts.master')
@section('title')
<title>NH Store - contact page</title>
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
					<h1>Contact Us</h1>
					<div class="breadcrumbs">
						<ul>
							<li><a href="#">home</a>
							</li>
							<li><a href="#" class="active">Contact us</a>
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
<!-- Contact Form Begin -->
<div class="contact">
	<div class="container text-center padding-top-100 padding-bottom-75">
		<h6>Get in touch</h6>
		<h2>Contact Form</h2>
		<p class="contact-p margin-top-50">Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer
			<br>possim assum.</p>
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<form action="contact.php" method="POST" id="contact-form" class="contact-form padding-top-50 margin-bottom-15">
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="form-group text-left">
									<label for="contact-name">Name</label>
									<input type="text" name="name" id="contact-name" class="form-control" placeholder="Mark Stevens" required>
								</div>
								<!-- /form-group -->
							</div>
							<!-- /column -->
							<div class="col-md-6 col-sm-6">
								<div class="form-group text-left">
									<label for="contact-email">Email</label>
									<input type="email" name="email" id="contact-email" class="form-control" placeholder="Mark Stevens@gmail.com" required>
								</div>
								<!-- /form-group -->
							</div>
							<!-- /column -->
							<div class="col-md-12">
								<div class="form-group text-left">
									<label for="contact-message">Message</label>
									<textarea name="message" id="contact-message" class="form-control" placeholder="Write your message here..." required></textarea>
								</div>
								<!-- /form-group -->
								<button type="submit" class="btn-form margin-top-25">Send your message</button>
								<!-- /button -->
								<div id="ajax-message" class="margin-top-30"></div>
								<!-- /ajax-message -->
							</div>
							<!-- /column -->
						</div>
						<!-- /row -->
					</form>
					<!-- /form -->
				</div>
				<!-- /column -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- Contact Form End -->
	<!-- Contact Info Begin -->
	<div class="contact">
		<div class="text-center padding-bottom-40">
			<h6>Get in touch</h6>
			<h2>Contact Info.</h2>
			<p class="contact-p margin-top-50">Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feu-
				<br>giat nulla facilisis at vero eros et accumsan.</p>
				<div class="contact-map margin-top-60">
					<div id="google-map"></div>
				</div>
				<!-- /contact-map -->
				<div class="container contact-info">
					<div class="row padding-vertical-30">
						<div class="col-md-4 col-sm-4">
							<img src="{{asset('assets/fontend/img/icon-pointer.png')}}" alt="" />
							<h4>Our Address</h4>
							<p class="margin-top-10">1234 Heaven Stress, Beverly Hill.</p>
						</div>
						<!-- /column -->
						<div class="col-md-4 col-sm-4">
							<img src="{{asset('assets/fontend/img/icon-phone.png')}}" alt="" />
							<h4>phone number</h4>
							<p class="margin-top-10">Office: (800) 123 456 789</p>
						</div>
						<!-- /column -->
						<div class="col-md-4 col-sm-4">
							<img src="{{asset('assets/fontend/img/icon-mail.png')}}" alt="" />
							<h4 class="margin-top-20">email Address</h4>
							<p class="margin-top-10">Email: Erentheme@gmail.com</p>
						</div>
						<!-- /column -->
					</div>
					<!-- /row -->
					<div class="shadow">
						<img src="{{asset('assets/fontend/img/shadow.png')}}" />
					</div>
					<!-- /shadow -->
				</div>
				<!-- /container -->
			</div>
			<!-- /text-center -->
		</div>
		@endsection
		@section('script')
		<script src="{{asset('assets/fontend/js/vendors/googlemap-init.js')}}"></script>
		<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script>
			$('#contact-form').on('submit', function() {
				var $form = $(this);
				var data = $(this).serialize();
				$.ajax({
					url: 'contact.php',
					type: 'POST',
					data: data,
				})
				.done(function(res) {
					if (res && !$(res).hasClass('failure')) {
						$form.find('input, textarea').val('');
					}
				})
				.always(function(res) {
					$('#ajax-message').html(res);
				});
            // Add text 'Sending...' right after clicking on the submit button.
            $('#ajax-message').text('Sending...');
            setTimeout(function() {
            	$("#ajax-message").hide()
            }, 8000);
            return false;
        });
    </script>
    @endsection