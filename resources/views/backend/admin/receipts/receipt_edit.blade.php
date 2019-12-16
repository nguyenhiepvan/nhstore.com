 @extends('backend.layouts.admin.master')
 @section('title')
 <title>NH Store | Update in receipt</title>
 @endsection
 @section('css')
 <link rel="stylesheet" href="{{mix('/css/card.css')}}">
 <link rel="stylesheet" href="{{asset('assets/backend/bower_components/select2/dist/css/select2.min.css')}}">
 <link rel="stylesheet" href="{{mix('css/productList.css')}}">
 @endsection
 @section('script')
 <script src="{{asset('assets/backend/dist/js/adminlte_.min.js')}}"></script>
 <script src="{{asset('assets/backend/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
 <script src="{{asset('assets/backend/dist/js/simple.money.format.js')}}"></script>
 <script type="text/javascript" src="{{mix('js/product_common.js')}}"></script>
 <script type="text/javascript" src="{{mix('js/receipt_common.js')}}"></script>
 <script type="text/javascript" src="{{mix('js/receiptEdit.js')}}"></script>
 <script type="text/javascript" src="{{mix('js/product_attribute.js')}}"></script>
 @endsection
 @include('backend.admin.product_attribute_modal');
 @section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
 	<!-- Content Header (Page header) -->
 	<section class="content-header">
 		<h1>
 			Chỉnh sửa hóa đơn nhập
 		</h1>
 		<ol class="breadcrumb">
 			<li><a href="{{route('admin.')}}"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
 			<li><a href="{{route('admin.in-receipts.index')}}">hóa đơn</a></li>
 			<li class="active">Chỉnh sửa</li>
 		</ol>
 	</section>
 	<!-- Main content -->
 	<section class="content">
 		<!-- Default box -->
 		<div class="box">
 			<div class="box-header with-border">
 				<h3 class="box-title">Chỉnh sửa hóa đơn nhập</h3>
 				<div class="box-body">
 					<form id="warehouseForm" action="javascript:;">
 						<div class="modal-body">
 							<div class="form-group">
 								<label for="code">Mã hóa đơn</label>
 								<input type="text" required id="code" name="code" value="{{$code}}" class="form-control" placeholder="Nhập mã hóa đơn">
 								<span class="error errors_code"></span>
 							</div>
 							<table id="in-receipts-form-table" class="table  table-striped table-bordered table-hover table-responsive ">
 								<thead>
 									<tr>
 										<th>Stt</th>
 										<th>Tên sản phẩm <a type="button" class="more" href="{{route('admin.products.create')}}" data-name="Thêm sản phẩm" title="Thêm sản phẩm"><i class="fa fa-plus-square-o more"></i></a></th>
 										<th>Màu sắc <button type="button" class="more" data-toggle="modal" data-target="#colorModal" data-name="Thêm màu sắc" title="Thêm màu sắc"><i class="fa fa-plus-square-o more"></i></button></th>
 										<th>Kích thước <button type="button" class="more" data-toggle="modal" data-target="#sizeModal" data-name="Thêm kích thước" title="Thêm kích thước"><i class="fa fa-plus-square-o more"></i></button></th>
 										<th>Số lượng</th>
 										<th>Giá đơn vị</th>
 										<th>Thành tiền</th>
 										<th><a href="javascript:;" class="add btn btn-primary btn-sm add-row" id="top" title="Thêm dòng"><i class="fa  fa-plus"></i></a></th>
 									</tr>
 								</thead>
 								<tbody>
 								</tbody>
 								<tfoot>
 									<tr>
 										<th>Stt</th>
 										<th>Tên sản phẩm</th>
 										<th>Màu sắc</th>
 										<th>Kích thước</th>
 										<th>Số lượng</th>
 										<th>Giá đơn vị</th>
 										<th>Thành tiền</th>
 										<th><a href="javascript:;" class="add btn btn-primary btn-sm add-row" data-target="1"R title="Thêm dòng"><i class="fa  fa-plus"></i></a></th>
 									</tr>
 								</tfoot>
 							</table>
 						</div>
 						<div class="modal-footer">
 							<button type="submit" class="btn btn-danger save" >Lưu lại</button>
 						</div>
 					</form>
 				</div>
 				<!-- /.box-body -->
 				<div class="box-footer">
 					Chỉnh sửa hóa đơn nhập
 				</div>
 				<!-- /.box-footer-->
 			</div>
 			<!-- /.box -->
 		</section>
 		<!-- /.content -->
 	</div>
 	<!-- /.content-wrapper -->
 	@endsection