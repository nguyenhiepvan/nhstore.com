@extends('fontend.layouts.master')
@section('title')
<title>NH Store - blog page</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('assets/fontend/css/jquery-ui.css')}}">
@endsection
@section('content')
<!-- Breadcrumbs Begin -->

<div class="container padding-top-100">
	<div class="row margin-top-30">
		<div class="col-md-12">
			<div class="breadcrumbs text-dark padding-vertical-30">
				<ul>
					<li><a href="#">home</a>
					</li>
					<li><a href="#">blog</a>
					</li>
					<li><a href="#" class="active">How To Wear Prints In Winter</a>
					</li>
				</ul>
			</div>
			<!-- /breadcrumbs -->
		</div>
		<!-- /column -->
	</div>
	<!-- /row -->
</div>
<!-- /container -->

<!-- Breadcrumbs End -->

<!-- Blog Begin -->

<div class="container blog-post">
	<div class="row">
		<div class="col-md-9 padding-bottom-100">
			<div class="blog-item">
				<div class="blog-post-image">
					<img src="http://placehold.it/848x501" alt="" />
				</div>
				<div class="blog-short-description padding-bottom-40">
					<div class="post-title padding-vertical-10">
						<h5><a href="#">How To Wear Prints In Winter</a>
						</h5>
					</div>
					<!-- /post-title -->
					<div class="post-info padding-top-5">
						<p><span>August 02, 2016 </span>by <a href="#">Erentheme</a> in <a href="#">Fashion for men’s</a>
						</p>
					</div>
					<!-- /post-info -->
					<div class="post-paragraph padding-top-25 padding-bottom-40">
						<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan...</p>
						<p class="padding-top-20">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
						</p>
					</div>
					<!-- /post-paragraph -->

					<img src="http://placehold.it/848x556" alt="" />
					<blockquote class="margin-vertical-50">
						<p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose.</p>
					</blockquote>
					<!-- /blockquote -->

					<span class="posted"><i class="icon_box-checked"></i>Posted in News By <a href="#">Erentheme.</a></span>
				</div>
				<!-- /blog-short-description -->

				<div class="blog-share">
					<div class="row">
						<div class="col-md-6 post-share">
							<span>share to friends:</span>
							<div class="share margin-left-30">
								<a href="#"><i class="fa fa-facebook"></i>
								</a>
								<a href="#"><i class="fa fa-twitter"></i>
								</a>
								<a href="#"><i class="fa fa-dribbble"></i>
								</a>
								<a href="#"><i class="fa fa-linkedin"></i>
								</a>
							</div>
						</div>
						<!-- /post-share -->

						<div class="col-md-6 post-tags text-right">
							<span>tags:</span>
							<ul class="margin-left-30">
								<li><a href="#">Furniture</a>
								</li>
								<li><a href="#">Erentheme</a>
								</li>
								<li><a href="#">Chair</a>
								</li>
							</ul>
						</div>
						<!-- /post-tags -->
					</div>
					<!-- /row -->
				</div>
				<!-- /blog-share -->

				<div class="blog-comment bd-bottom padding-vertical-70">
					<div class="post-comment">
						<a href="#"><img src="http://placehold.it/86x79" alt="" />
						</a>
						<div class="comment-body bd-bottom padding-bottom-30">
							<div class="comment-head">
								<p>Artical by <a href="#">Erentheme</a><span> August 02, 2016</span>
								</p>
							</div>
							<!-- /comment-head -->
							<div class="leave-reply pull-right">
								<a href="#"><i class="fa fa-share fa-flip-vertical"></i>Leave reply</a>
							</div>
							<!-- /leave-reply -->
							<p class="comment margin-top-15">Many desktop publishing packages and web page editors now use <strong>Lorem Ipsum as their default model text</strong>, and a search for <strong>'lorem ipsum'</strong> will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose.</p>
						</div>
						<!-- /comment-body -->
					</div>
					<!-- /post-comment -->

					<div class="post-comment padding-top-30 padding-left-100">
						<a href="#"><img src="http://placehold.it/86x79" alt="" />
						</a>
						<div class="comment-body">
							<div class="comment-head">
								<p>Artical by <a href="#">Erentheme</a><span> August 02, 2016</span>
								</p>
							</div>
							<!-- /comment-head -->
							<div class="leave-reply pull-right">
								<a href="#"><i class="fa fa-share fa-flip-vertical"></i>Leave reply</a>
							</div>
							<!-- /leave-reply -->
							<p class="comment margin-top-15">Many desktop publishing packages and web page editors now use <strong>Lorem Ipsum as their default model text</strong>, and a search for <strong>'lorem ipsum'</strong> will uncover many web sites still in their infancy.</p>
						</div>
						<!-- /comment-body -->
					</div>
					<!-- /post-comment -->
				</div>
				<!-- /blog-comment -->

				<div class="related-posts padding-vertical-60">
					<h4>Post Comments</h4>
					<div class="row padding-top-40">
						<div class="col-md-4 col-sm-4">
							<div class="product">
								<img src="http://placehold.it/262x165" class="img-responsive" alt="" />
								<div class="hover_overlay">
									<div class="hover-search">
										<a href="#"><i class="icon_link_alt"></i></a>
									</div>
								</div>
								<!-- /hover_overlay -->
							</div>
							<div class="blog-short-description">
								<div class="post-title padding-vertical-10">
									<h6><a href="#">How To Wear Prints In Winter</a></h6>
								</div>
								<!-- /post-title -->
								<div class="post-info padding-top-5">
									<p><span>August 02, 2016 </span>by <a href="#">Erentheme</a>
									</p>
								</div>
								<!-- /post-info -->
							</div>
							<!-- /blog-short-description -->
						</div>
						<!-- /column -->

						<div class="col-md-4 col-sm-4">
							<div class="product">
								<img src="http://placehold.it/262x165" class="img-responsive" alt="" />
								<div class="hover_overlay">
									<div class="hover-search">
										<a href="#"><i class="icon_link_alt"></i></a>
									</div>
								</div>
								<!-- /hover_overlay -->
							</div>
							<div class="blog-short-description">
								<div class="post-title padding-vertical-10">
									<h6><a href="#">How To Wear Prints In Winter</a></h6>
								</div>
								<!-- /post-title -->
								<div class="post-info padding-top-5">
									<p><span>August 02, 2016 </span>by <a href="#">Erentheme</a>
									</p>
								</div>
								<!-- /post-info -->
							</div>
							<!-- /blog-short-description -->
						</div>
						<!-- /column -->

						<div class="col-md-4 col-sm-4">
							<div class="product">
								<img src="http://placehold.it/262x165" class="img-responsive" alt="" />
								<div class="hover_overlay">
									<div class="hover-search">
										<a href="#"><i class="icon_link_alt"></i></a>
									</div>
								</div>
								<!-- /hover_overlay -->
							</div>
							<div class="blog-short-description">
								<div class="post-title padding-vertical-10">
									<h6><a href="#">How To Wear Prints In Winter</a></h6>
								</div>
								<!-- /post-title -->
								<div class="post-info padding-top-5">
									<p><span>August 02, 2016 </span>by <a href="#">Erentheme</a>
									</p>
								</div>
								<!-- /post-info -->
							</div>
							<!-- /blog-short-description -->
						</div>
						<!-- /column -->
					</div>
					<!-- /row -->
				</div>
				<!-- /related-posts -->

				<div class="comment-form padding-bottom-50">
					<h4>Post Comments</h4>
					<p>Submit comment</p>
					<form class="contact-form margin-bottom-15">
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" placeholder="" required>
						</div>
						<!-- /popular-body -->
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" placeholder="" required>
						</div>
						<!-- /popular-body -->
						<div class="form-group">
							<label>Comments</label>
							<textarea class="form-control" placeholder="" required></textarea>
						</div>
						<!-- /popular-body -->
						<button type="submit" class="btn-form margin-top-25">Post comment</button>
					</form>
					<!-- /form -->
				</div>
				<!-- /comment-form -->
			</div>
			<!-- /blog-item -->
		</div>
		<!-- /column -->

		<div class="col-md-3">
			<div class="blog-sidebar">
				<div class="popular-post">
					<h4>Popular</h4>
					<ul class="padding-top-10">
						<li>
							<a href="#"><img src="http://placehold.it/110x69" alt="" />
							</a>
							<div class="popular-body">
								<p><a href="#">A sample blog title #1</a>
								</p>
								<span><i class="fa fa-eye"></i>210 View(s)</span>
							</div>
							<!-- /popular-body -->
						</li>

						<li>
							<a href="#"><img src="http://placehold.it/110x69" alt="" />
							</a>
							<div class="popular-body">
								<p><a href="#">A sample blog title #2</a>
								</p>
								<span><i class="fa fa-eye"></i>230 View(s)</span>
							</div>
							<!-- /popular-body -->
						</li>

						<li>
							<a href="#"><img src="http://placehold.it/110x69" alt="" />
							</a>
							<div class="popular-body">
								<p><a href="#">A sample blog title #3</a>
								</p>
								<span><i class="fa fa-eye"></i>30 View(s)</span>
							</div>
							<!-- /popular-body -->
						</li>

						<li>
							<a href="#"><img src="http://placehold.it/110x69" alt="" />
							</a>
							<div class="popular-body">
								<p><a href="#">A sample blog title #4</a>
								</p>
								<span><i class="fa fa-eye"></i>60 View(s)</span>
							</div>
							<!-- /popular-body -->
						</li>
					</ul>
				</div>
				<!-- /popular-post -->
			</div>
			<!-- /blog-sidebar -->

			<div class="widget-blog padding-top-30">
				<h4>Blog</h4>
				<div class="blog-categories padding-top-30">
					<p>Categories</p>
					<ul>
						<li><a href="#">News</a>
						</li>
						<li><a href="#">Event</a>
						</li>
					</ul>
				</div>
				<!-- /blog-categories -->

				<div class="blog-recent-post">
					<p>Recent Post</p>
					<ul>
						<li><a href="#">A sample blog title #1</a>
						</li>
						<li><a href="#">A sample blog title #2</a>
						</li>
						<li><a href="#">A sample blog title #3</a>
						</li>
						<li><a href="#">A sample blog title #4</a>
						</li>
					</ul>
				</div>
				<!-- /blog-recent-post -->
			</div>
			<!-- /widget-blog -->
		</div>
		<!-- /column -->
	</div>
	<!-- /row -->
</div>
<!-- /container -->

<!-- Blog End -->
@endsection
@section('script')
@endsection