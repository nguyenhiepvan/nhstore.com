 @extends('backend.layouts.admin.master')
 @section('title')
 <title>NH Store | receipts</title>
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
 							<button class="btn btn-info btn-lg" title="Thêm mới" data-toggle="modal" data-target="#productModal"><i class="fa  fa-plus-circle"></i></button>
 							<br>
 							@endcan
 							<table id="product-table" class="table  table-striped table-bordered table-hover table-responsive ">
 								<thead>
 									<tr>
 										<th>Stt</th>
 										<th>Mã hóa đơn</th>
 										<th>Ngày nhập</th>
 										<th>Người nhập</th>
 										<th>Tổng tiền</th>
 									</tr>
 								</thead>
 								<tfoot>
 									<tr>
 										<th>Stt</th>
 										<th>Mã hóa đơn</th>
 										<th>Ngày nhập</th>
 										<th>Người nhập</th>
 										<th>Tổng tiền</th>
 									</tr>
 								</tfoot>
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
 @endsection