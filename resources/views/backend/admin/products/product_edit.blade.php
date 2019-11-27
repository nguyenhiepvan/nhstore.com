 @extends('backend.layouts.admin.master')
 @section('title')
 <title>NH Store | Update product</title>
 @endsection
 @section('css')
 <link rel="stylesheet" href="{{mix('/css/card.css')}}">
 <link rel="stylesheet" href="{{asset('assets/backend/bower_components/select2/dist/css/select2.min.css')}}">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
 <link rel="stylesheet" href="{{mix('css/productList.css')}}">
 @endsection
 @section('script')
 <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
 <script src="{{asset('assets/backend/dist/js/adminlte_.min.js')}}"></script>
 <script src="{{asset('assets/backend/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
 <script src="{{asset('assets/backend/dist/js/simple.money.format.js')}}"></script>
 <script type="text/javascript" src="{{mix('js/productEdit.js')}}"></script>
 <script type="text/javascript" src="{{mix('js/product_common.js')}}"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
 @endsection
 @section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
 	<!-- Content Header (Page header) -->
 	<section class="content-header">
 		<h1>
 			Cập nhật sản phẩm
 			<small>Cập nhật thông tin sản phẩm</small>
 		</h1>
 		<ol class="breadcrumb">
 			<li><a href="{{route('admin.')}}"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
 			<li><a href="{{route('admin.products.index')}}">Sản phẩm</a></li>
 			<li class="active">Chỉnh sửa</li>
 		</ol>
 	</section>
 	<!-- Main content -->
 	<section class="content">
 		<!-- Default box -->
 		<div class="box">
 			<div class="box-header with-border">
 				<h3 class="box-title">Cập nhật sản phẩm</h3>
 				<div class="box-body">
 					<form action="javascript:;" method="POST" role="form" id="productEditForm">
 						@csrf
 						<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
 						<div class="modal-body">
 							{{-- Tên sản phẩm --}}
 							<div class="row">
 								<div class="box">
 									<div class="box-header with-border">
 										<h3 class="box-title">Tên sản phẩm</h3>
 										<h6 >(Lưu ý: Mục có dấu <em>(*)</em> là bắt buộc)</h6>
 									</div>
 									<div class="box-body">
 										<label for="name">Tên sản phẩm <em>(*)</em></label>
 										<input class="form-control input-lg name" type="text" placeholder="Nhập tên sản phẩm" id="name" name="name" required>
 										<span class="error errors_name"></span>
 										<br>
 										<label for="slug">Đường dẫn sản phẩm <em>(*)</em></label>
 										<input class="form-control input-lg slug" type="text" placeholder="Nhập đường dẫn sản phẩm" id="slug" name="slug" required>
 										<span class="error errors_slug"></span>
 									</div>
 								</div>
 							</div>
 							<br>
 							{{-- Ảnh sản phẩm --}}
 							<div class="row">
 								<div class="box">
 									<div class="box-header with-border">
 										<h3 class="box-title">Ảnh sản phẩm</h3>
 										<h6 >Lưu ý: Mục có dấu <em>(*)</em> là bắt buộc</h6>
 									</div>
 									<div class="box-body">
 										<label>Ảnh hiển thị <em>(*)</em></label>
 										<span class="error errors_thumbnail"></span>
 										<div class="input-group">
 											<span class="input-group-btn">
 												<a id="ava-btn" data-input="avatar" data-preview="preview-ava" class="btn btn-primary">
 													<i class="fa fa-picture-o"></i>Chọn ảnh
 												</a>
 											</span>
 											<img id="preview-ava" style="margin-left: 15px;margin-top:15px;max-height:100px;">
 											<input id="avatar" class="form-control" type="text" name="thumbnail" readonly hidden required>
 										</div>
 										<br>
 										<label for="images">Ảnh sản phẩm</label>
 										<div>
 											<span id="holder"></span>
 											<div style="clear: both;">
 												<a id="lfm" data-input="images" class="btn " title="Thêm ảnh">
 													<img src="{{ asset('assets/backend/dist/img/icons/add-image.png') }}" class="icons" id="add-icon">
 												</a>
 												<input id="images" class="form-control" type="text" name="images" hidden>
 											</div>
 										</div>
 									</div>
 								</div>
 							</div>
 							<br>
 							{{-- Thuộc tính sản phẩm --}}
 							<div class="row">
 								<div class="box">
 									<div class="box-header with-border">
 										<h3 class="box-title">Thuộc tính sản phẩm</h3>
 										<h6 >Lưu ý: Mục có dấu <em>(*)</em> là bắt buộc</h6>
 									</div>
 									<div class="box-body">
 										{{-- chất liệu --}}
 										<div class="col-md-4">
 											<div class="form-group">
 												<label>Chất liệu <em>(*)</em>
 													<span class="error errors_material_id"></span>
 													<button type="button" class="more" data-toggle="modal" data-target="#materialModal" title="Thêm chất liệu">
 														<i class="fa fa-plus-square-o more"></i>
 													</button>
 												</label>
 												<select required class="form-control select2" id="materialsSelect" name="material_id" data-placeholder="Chọn chất liệu"
 												style="width: 100%;">
 												<option></option>
 												@foreach ($materials as $masterial)
 												<option value="{{$masterial->id}}" data-acronym="{{$masterial->acronym}}">{{$masterial->name}}</option>
 												@endforeach
 											</select>
 										</div>
 									</div>
 									{{-- thương hiệu --}}
 									<div class="col-md-4">
 										<div class="form-group">
 											<label>Thương hiệu <em>(*)</em>
 												<span class="error errors_brand_id"></span>
 												<button type="button" class="more" data-toggle="modal" data-target="#brandModal" data-name="Thêm thương hiệu" title="Thêm thương hiệu"><i class="fa fa-plus-square-o more"></i></button></label>
 												<select required name="brand_id" id="brandsSelect" class="form-control select2" style="width: 100%;" data-placeholder="Chọn thương hiệu">
 													<option></option>
 													@foreach ($brands as $brand)
 													<option value="{{$brand->id}}">{{$brand->name}}</option>
 													@endforeach
 												</select>
 											</div>
 										</div>
 										{{-- Xuất xứ --}}
 										<div class="col-md-4">
 											<div class="form-group">
 												<label>Xuất xứ <em>(*)</em>
 													<span class="error errors_country_id"></span>
 													<button type="button" class="more" data-toggle="modal" data-target="#originModal" data-name="Thêm xuất xứ" title="Thêm xuất xứ"><i class="fa fa-plus-square-o more"></i></button></label>
 													<select required name="country_id" id="originsSelect" class="form-control select2" style="width: 100%;" data-placeholder="Chọn xuất xứ">
 														<option></option>
 														@foreach ($countries as $country)
 														<option value="{{$country->id}}">{{$country->name}}</option>
 														@endforeach
 													</select>
 												</div>
 											</div>
 											<br>
 											{{-- Nhà phân phối --}}
 											<div class="col-md-4">
 												<div class="form-group">
 													<label>Nhà phân phối <em>(*)</em>
 														<span class="error errors_supplier_id"></span>
 														<button type="button" class="more" data-toggle="modal" data-target="#supplierModal" data-name="Thêm nhà phân phối" title="Thêm nhà phân phối"><i class="fa fa-plus-square-o more"></i></button></label>
 														<select required name="supplier_id" id="suppliersSelect" class="form-control select2" style="width: 100%;" data-placeholder="Chọn nhà phân phối">
 															<option></option>
 															@foreach ($suppliers as $supplier)
 															<option value="{{$supplier->id}}" >{{$supplier->name}}</option>
 															@endforeach
 														</select>
 													</div>
 												</div>
 												{{-- danh mục --}}
 												<div class="col-md-4">
 													<label>Danh mục <em>(*)</em>
 														<span class="error errors_category_id"></span>
 														<button type="button" class="more" data-toggle="modal" data-target="#categoryModal" data-name="Thêm danh mục" title="Thêm danh mục"><i class="fa fa-plus-square-o more"></i></button></label>
 														<select required name="category_id" id="categoriesSelect" class="form-control select2" style="width: 100%;" data-placeholder="Chọn danh mục">
 															<option></option>
 															@foreach ($categories as $category)
 															<option value="{{$category->id}}" >{{$category->name}}</option>
 															@endforeach
 														</select>
 													</div>
 													{{-- thẻ --}}
 													<div class="col-md-4">
 														<label>Thẻ<button type="button" class="more" data-toggle="modal" data-target="#tagModal" data-name="Thêm thẻ" title="Thêm thẻ"><i class="fa fa-plus-square-o more"></i></button></label>
 														<select name="tag_id[]" id="tagsSelect" class="form-control select2" style="width: 100%;" data-placeholder="Chọn thẻ" multiple="multiple">
 															<option></option>
 															@foreach ($tags as $tag)
 															<option value="{{$tag->id}}" >{{$tag->name}}</option>
 															@endforeach
 														</select>
 													</div>
 												</div>
 											</div>
 										</div>
 										<br>
 										{{-- Mô tả sản phẩm --}}
 										<div class="row">
 											<div class="box">
 												<div class="box-header with-border">
 													<h3 class="box-title">Thông tin sản phẩm</h3>
 												</div>
 												<div class="box-body">
 													<label for="name">Giới thiệu sản phẩm</label>
 													<textarea id="overview" name="overview" class="form-control" placeholder="Giới thiệu sản phẩm"></textarea>
 													<br>
 													<label for="name">Thông tin sản phẩm</label>
 													<textarea id="description" name="description" class="form-control" placeholder="Nhập mô tả"></textarea>
 												</div>
 											</div>
 										</div>
 										<br>
 									</div>
 									<div class="modal-footer">
 										<button type="submit" class="btn btn-primary save" >Lưu lại</button>
 									</div>
 								</form>
 							</div>
 							<!-- /.box-body -->
 							<div class="box-footer">
 								Cập nhật sản phẩm
 							</div>
 							<!-- /.box-footer-->
 						</div>
 						<!-- /.box -->
 					</section>
 					<!-- /.content -->
 				</div>
 				<!-- /.content-wrapper -->
 				@endsection