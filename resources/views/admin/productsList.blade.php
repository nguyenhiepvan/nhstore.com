 @extends('layouts.master')
 @section('title')
 <title>NH Store | products</title>
 @endsection
 @section('css')
 <!-- DataTables -->
 <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
 <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
 <link rel="stylesheet" href="{{asset('assets/dist/css/card.css')}}">
 @endsection
 @section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
 	<!-- Content Header (Page header) -->
 	<section class="content-header">
 		<h1>
 			Sản phẩm
 			<small>advanced tables</small>
 		</h1>
 		<ol class="breadcrumb">
 			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
 			<li><a href="#">Tables</a></li>
 			<li class="active">Data tables</li>
 		</ol>
 	</section>

 	<!-- Main content -->
 	<section class="content">

 		<!-- Default box -->
 		<div class="card">
 			<div class="card-header">
 				<h3 class="card-title">Sản phẩm đang hiển thị</h3>
 				<div class="card-tools">
 					<button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
 						<i class="fa fa-minus"></i></button>
 						<button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
 							<i class="fa fa-times"></i></button>
 						</div>
 					</div>
 					<div class="card-body">
 						<table id="product-table" class="table table-bordered table-hover">
 							<thead>
 								<tr>
 									<th>Stt</th>
 									<th>Tên sản phẩm</th>
 									<th>Thương hiệu</th>
 									<th>Nhà cung cấp</th>
 									<th>#</th>
 								</tr>
 							</thead>
 						</table>
 					</div>
 					<!-- /.card-body -->
 					<div class="card-footer">
 						Footer
 					</div>
 					<!-- /.card-footer-->
 				</div>
 				<!-- /.card -->

 			</section>
 			<!-- /.content -->
 		</div>
 		<!-- /.content-wrapper -->
 		@endsection
 		@section('script')
 		<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
 		<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
 		<script src="{{asset('assets/dist/js/adminlte_.min.js')}}"></script>
 		<!-- page script -->
 		<script>
 			var table = $('#product-table').DataTable({
 				processing: true,
 				serverSide: true,
 				ajax: "{{ route('admin.products.index') }}",
 				columns: [
 				{data: 'DT_RowIndex', name: 'DT_RowIndex'},
 				{data: 'name', name: 'name'},
 				{data: 'brand', name: 'brand'},
 				{data: 'supplier', name: 'supplier'},
 				{data: 'action', name: 'action', orderable: false, searchable: false},
 				],
 				"oLanguage": { "sUrl": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Vietnamese.json" }
 			});
 		</script>
 		@endsection