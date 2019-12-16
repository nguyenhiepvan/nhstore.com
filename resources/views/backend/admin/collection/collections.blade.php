 @extends('backend.layouts.admin.master')
 @section('title')
 <title>NH Store | Collecction</title>
 @endsection
 @section('css')
 <!-- DataTables -->
 <link href="{{ asset('assets/backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
 <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
 <link rel="stylesheet" href="{{mix('/css/card.css')}}">
 <link rel="stylesheet" href="{{mix('css/productList.css')}}">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
 @endsection
 @section('script')
 <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
 <script src="{{asset('assets/backend/dist/js/adminlte_.min.js')}}"></script>
 <script src="{{asset('assets/backend/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
 <script type="text/javascript" src="{{mix('js/collections.js')}}"></script>
 @endsection
 @section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
 	<!-- Content Header (Page header) -->
 	<section class="content-header">
 		<h1>
 			Bộ sưu tập
 			<small>danh sách các bộ sưu tập</small>
 		</h1>
 		<ol class="breadcrumb">
 			<li><a href="{{route('admin.')}}"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
 			<li><a class="active">Bộ sưu tập</a></li>
 		</ol>
 	</section>
 	<!-- Main content -->
 	<section class="content">
 		<!-- Default box -->
 		<div class="box">
 			<div class="box-header with-border">
 				<h3 class="box-title">Bộ sưu tập</h3>
 			</div>
 			<div class="card-body">
 				<a href="{{route('admin.collections.create')}}" title="Thêm mới bộ sưu tập" class="btn btn-primary">
 					<i class="fa fa-plus"></i>
 				</a>
 				<table id="colection-table" class="table  table-striped table-bordered table-hover table-responsive ">
 					<thead>
 						<tr>
 							<th>Stt</th>
 							<th>Tên bộ sưu tập</th>
 							<th>Ngày tạo</th>
 							<th>Số lượng sản phẩm</th>
 							<th>Vị trí</th>
 							<th>Hiển thị</th>
 							<th>#</th>
 						</tr>
 					</thead>
 					<tfoot>
 						<tr>
 							<th>Stt</th>
 							<th>Tên bộ sưu tập</th>
 							<th>Ngày tạo</th>
 							<th>Số lượng sản phẩm</th>
 							<th>Vị trí</th>
 							<th>Hiển thị</th>
 							<th>#</th>
 						</tr>
 					</tfoot>
 				</table>
 			</div>
 			<!-- /.box-body -->
 			<div class="box-footer">
 				Bộ sưu tập
 			</div>
 			<!-- /.box-footer-->
 		</div>
 		<!-- /.box -->
 	</section>
 	<!-- /.content -->
 </div>
 <!-- /.content-wrapper -->
 @endsection