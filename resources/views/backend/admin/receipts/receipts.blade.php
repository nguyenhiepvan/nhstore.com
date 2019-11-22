 @extends('backend.layouts.admin.master')
 @section('title')
 <title>NH Store | receipts</title>
 @endsection
 @section('css')
 <!-- DataTables -->
 <link href="{{ asset('assets/backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
 <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
 <link rel="stylesheet" href="{{mix('/css/card.css')}}">
 <link rel="stylesheet" href="{{asset('assets/backend/bower_components/select2/dist/css/select2.min.css')}}">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
 <link rel="stylesheet" href="{{mix('css/productList.css')}}">
 <style type="text/css">
 	th, td{
 		text-align: center;
 	}
 	/*#in-receipts-form-table th, td {
 		border: 1px solid black !important;
 	}*/
 </style>
 @endsection
 @section('script')
 <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
 <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
 <script src="{{asset('assets/backend/dist/js/adminlte_.min.js')}}"></script>
 <script src="{{asset('assets/backend/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
 <script src="{{asset('assets/backend/dist/js/simple.money.format.js')}}"></script>
 <script type="text/javascript" src="{{mix('js/receipt.js')}}"></script>
 <script type="text/javascript" src="{{mix('js/common.js')}}"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
 @endsection
 @section('content')
 {{-- {{dd(url()->current())}} --}}
 {{-- Content Wrapper. Contains page content --}}
 <div class="content-wrapper">
 	{{-- Content Header (Page header) --}}
 	<section class="content-header">
 		<h1>
 			Hóa đơn nhập, xuất
 		</h1>
 	</section>
 	{{-- Main content --}}
 	{{-- Main content --}}
 	<section class="content">
 		<div class="nav-tabs-custom">
 			<ul class="nav nav-tabs">
 				<li @if(Request::is('*/in-receipts')) class="active" @endif><a href="#tab_1" id="in-receipts" data-toggle="tab">Hóa đơn nhập</a></li>
 				<li  @if(Request::is('*/out-receipts')) class="active" @endif><a href="#tab_2"  id="out-receipt" data-toggle="tab">Hóa đơn xuất</a></li>
 			</ul>
 			<div class="tab-content">
 				{{-- tab 1 --}}
 				<div class="tab-pane @if(Request::is('*/in-receipts')) active @endif" id="tab_1">
 					{{-- danh sách sản phẩm --}}
 					<div class="card box-body">
 						{{-- card-header --}}
 						<div class="card-header">
 							<div class="alert alert-info alert-dismissible">
 								<h4><i class="icon fa fa-info"></i> Danh sách hóa đơn nhập</h4>
 								Hóa đơn nhập hàng hóa vào kho
 							</div>
 						</div>
 						{{-- /.card-header --}}
 						{{-- card-body --}}
 						<div class="card-body">
 							@can('create',nhstore\Models\Product::class)
 							<button class="btn btn-info btn-lg" title="Thêm mới" data-toggle="modal" data-target="#warehouseModal"><i class="fa  fa-plus-circle"></i></button>
 							<br>
 							@endcan
 							<table id="in-receipts-table" class="table  table-striped table-bordered table-hover table-responsive ">
 								<thead>
 									<tr>
 										<th>Stt</th>
 										<th>Mã hóa đơn</th>
 										<th>Ngày nhập</th>
 										<th>Người nhập</th>
 									</tr>
 								</thead>
 							</table>
 						</div>
 						{{-- /.card-body --}}
 						{{-- card-footer --}}
 						<div class="card-footer">
 							<h3 class="card-title">Danh sách hóa đơn nhập</h3>
 						</div>
 						{{-- /.card-footer --}}
 					</div>
 					{{-- /.danh sách sản phẩm --}}
 				</div>
 				<!-- /.tab-pane -->
 				<div class="tab-pane @if(Request::is('*/out-receipts')) active @endif" id="tab_2">
 					{{-- danh sách sản phẩm --}}
 					<div class="card box-body">
 						{{-- card-header --}}
 						<div class="card-header">
 							<div class="alert alert-info alert-dismissible">
 								<h4><i class="icon fa fa-info"></i> Hóa đơn xuất</h4>
 								Danh sách sản phẩm xuất bán
 							</div>
 						</div>
 						{{-- /.card-header --}}
 						{{-- card-body --}}
 						<div class="card-body">
 							<table id="warehouse-table" class="table  table-striped table-bordered table-hover table-responsive ">
 								<thead>
 									<tr>
 										<th>Stt</th>
 										<th>Mã hóa đơn</th>
 										<th>Mã đơn hàng</th>
 										<th>Ngày đặt hàng</th>
 										<th>Ngày xuất</th>
 										<th>Người xuất</th>
 										<th>Tổng tiền</th>
 									</tr>
 								</thead>
 								<tfoot>
 									<tr>
 										<th>Stt</th>
 										<th>Mã hóa đơn</th>
 										<th>Mã đơn hàng</th>
 										<th>Ngày đặt hàng</th>
 										<th>Ngày xuất</th>
 										<th>Người xuất</th>
 										<th>Tổng tiền</th>
 									</tr>
 								</tfoot>
 							</table>
 						</div>
 						{{-- /.card-body --}}
 						{{-- card-footer --}}
 						<div class="card-footer">
 							<h3 class="card-title">Hóa đơn xuất</h3>
 						</div>
 						{{-- /.card-footer --}}
 					</div>
 					{{-- /.danh sách sản phẩm --}}
 				</div>
 				<!-- /.tab-pane -->
 			</div>
 			<!-- /.tab-content -->
 		</div>
 		<!-- nav-tabs-custom -->
 	</section>
 	{{-- /.content --}}
 </div>
 {{-- /.content-wrapper --}}
 @include('backend.admin.product_modal')
 @endsection