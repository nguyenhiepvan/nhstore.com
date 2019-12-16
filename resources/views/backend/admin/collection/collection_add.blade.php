 @extends('backend.layouts.admin.master')
 @section('title')
 <title>NH Store | Add new collection</title>
 @endsection
 @section('css')
 <link rel="stylesheet" href="{{mix('/css/card.css')}}">
 <link rel="stylesheet" href="{{asset('assets/backend/bower_components/select2/dist/css/select2.min.css')}}">
 <link rel="stylesheet" href="{{mix('css/productList.css')}}">
 <style>
 	.input-img{
 		display:none;
 	}
 </style>
 @endsection
 @section('script')
 <script src="{{asset('assets/backend/dist/js/adminlte_.min.js')}}"></script>
 <script src="{{asset('assets/backend/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
 <script type="text/javascript" src="{{mix('js/collection_common.js')}}"></script>
 <script type="text/javascript" src="{{mix('js/collectionAdd.js')}}"></script>
 @endsection
 @section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
 	<!-- Content Header (Page header) -->
 	<section class="content-header">
 		<h1>
 			Thêm mới bộ sưu tập
 		</h1>
 		<ol class="breadcrumb">
 			<li><a href="{{route('admin.')}}"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
 			<li><a href="{{route('admin.collections.index')}}">Bộ sưu tập</a></li>
 			<li class="active">Thêm mới</li>
 		</ol>
 	</section>
 	<!-- Main content -->
 	<section class="content">
 		<!-- Default box -->
 		<div class="box">
 			<div class="box-header with-border">
 				<h3 class="box-title">Thêm mới bộ sưu tập</h3>
 			</div>
 			<div class="box-body">
 				<form action="javascript:;" id="collectionsForm">
 					<div class="form-group">
 						<label for="name"	>Tên bộ sưu tập</label>
 						<input class="form-control" placeholder="Nhập tên bộ sưu tập" type="text" id="name" name="name">
 						<span class="error errors_name"></span>
 					</div>
 					<div class="form-group">
 						<label for="possion"	>Vị trí</label>
 						<select name="possion" class="form-control select2" id="possion" data-placeholder="Chọn vị trí hiển thị">
 							<option value="">Chọn vị trí hiển thị</option>
 							<option value="1">1</option>
 							<option value="1">2</option>
 							<option value="1">3</option>
 							<option value="1">4</option>
 						</select>
 					</div>
 					<div class="form-group">
 						<label for="possion"	>Sản phẩm</label>
 						<select class="form-control productsSelect select2" name="product_id[]" data-placeholder="Chọn sản phẩm"
 						style="width: 100%;" multiple="multiple">
 						<option></option>
 						@foreach ($products as $product)
 						<option value="{{$product->id}}" data-image="{{$product->images->where('is_thumbnail',1)->first()['75X75']}}">{{$product->name}}</option>
 						@endforeach
 					</select>
 				</div>
 				<div class="form-group">
 					<label for="1920X1056">Ảnh 1920 X 1056</label>
 					<img class="form-control" data-input="1920X1056" data-preview="1920X1056-preview" style="height: 50%" src="http://placehold.it/1920x1056" id="1920X1056-preview">
 					<input id="1920X1056" class="form-control input-img" type="text" name="1920X1056" readonly >
 				</div>
 				<div class="form-group">
 					<img style="height: 50%; width:33%;" data-input="450X362" data-preview="450X362-preview" src="http://placehold.it/450x362" id="450X362-preview">
 					<input id="450X362" class="form-control input-img" type="text" name="450X362" readonly >
 					<img style="height: 50%; width:33%;" data-input="540X494" data-preview="540X494-preview" src="http://placehold.it/540x494" id="540X494-preview">
 					<input id="540X494" class="form-control input-img" type="text" name="540X494" readonly >
 					<img style="height: 50%; width:33%;" data-input="540X340" data-preview="540X340-preview" src="http://placehold.it/540x340" id="540X340-preview">
 					<input id="540X340" class="form-control input-img" type="text" name="540X340" readonly >
 				</div>
 				<div class="modal-footer">
 					<button type="submit" class="form-group btn btn-primary save" >Lưu lại</button>
 				</div>
 			</form>
 		</div>
 		<!-- /.box-body -->
 		<div class="box-footer">
 			Thêm mới bộ sưu tập
 		</div>
 		<!-- /.box-footer-->
 	</div>
 	<!-- /.box -->
 </section>
 <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection