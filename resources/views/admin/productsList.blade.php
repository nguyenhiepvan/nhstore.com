 @extends('layouts.admin.master')
 @section('title')
 <title>NH Store | products</title>
 @endsection
 @section('css')
 <!-- DataTables -->
 <link href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
 <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
 <link rel="stylesheet" href="{{mix('/css/card.css')}}">
 <link rel="stylesheet" href="{{asset('assets/bower_components/select2/dist/css/select2.min.css')}}">
 <link rel="stylesheet" href="{{mix('css/productList.css')}}">
 @endsection
 @section('content')
 {{-- Content Wrapper. Contains page content --}}
 <div class="content-wrapper">
  {{-- Content Header (Page header) --}}
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
  {{-- Main content --}}
  <section class="content">
    {{-- card --}}
    <div class="card box-body">
      {{-- card-header --}}
      <div class="card-header">
        <h3 class="card-title">Sản phẩm đang hiển thị</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
            </div>
          </div>
          {{-- /.card-header --}}
          {{-- card-body --}}
          <div class="card-body">
            <button class="btn btn-info btn-lg" title="Thêm mới" data-toggle="modal" data-target="#productModal"><i class="fa  fa-plus-circle"></i></button>
            <br>
            <table id="product-table" class="table table-bordered table-hover table-responsive ">
              <thead>
                <tr>
                  <th>Stt</th>
                  <th>Tên sản phẩm</th>
                  <th>Ảnh sản phẩm</th>
                  <th>Thương hiệu</th>
                  <th>Nhà cung cấp</th>
                  <th>#</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Stt</th>
                  <th>Tên sản phẩm</th>
                  <th>Ảnh sản phẩm</th>
                  <th>Thương hiệu</th>
                  <th>Nhà cung cấp</th>
                  <th>#</th>
                </tr>
              </tfoot>
            </table>
          </div>
          {{-- /.card-body --}}
          {{-- card-footer --}}
          <div class="card-footer">
            Footer
          </div>
          {{-- /.card-footer --}}
        </div>
        {{-- /.card --}}
      </section>
      {{-- /.content --}}
    </div>
    {{-- /.content-wrapper --}}
    @include('admin.modalAdd')
    @endsection
    @section('script')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <script src="{{asset('assets/dist/js/adminlte_.min.js')}}"></script>
    <script src="{{asset('assets/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    <script type="text/javascript" src="{{mix('js/productList.js')}}"></script>
    @endsection