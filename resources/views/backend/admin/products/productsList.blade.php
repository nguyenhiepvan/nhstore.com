@extends('backend.layouts.admin.master')
@section('title')
<title>NH Store | products</title>
@endsection
@section('css')
<!-- DataTables -->
<link href="{{ asset('assets/backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{mix('/css/card.css')}}">
<link rel="stylesheet" href="{{asset('assets/backend/bower_components/select2/dist/css/select2.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
<link rel="stylesheet" href="{{mix('css/productList.css')}}">
@endsection
@section('script')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script src="{{asset('assets/backend/dist/js/adminlte_.min.js')}}"></script>
<script src="{{asset('assets/backend/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{asset('assets/backend/dist/js/simple.money.format.js')}}"></script>
<script type="text/javascript" src="{{mix('js/productsList.js')}}"></script>
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
      Sản phẩm, Kho hàng
    </h1>
  </section>
  {{-- Main content --}}
  {{-- Main content --}}
  <section class="content">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li @if(Request::is('*/products')) class="active" @endif><a href="#tab_1" id="products" data-toggle="tab">Danh sách sản phẩm</a></li>
        <li  @if(Request::is('*warehouse')) class="active" @endif><a href="#tab_2"  id="warehouse" data-toggle="tab">Kho hàng</a></li>
        <li @if(Request::is('*/trash')) class="active" @endif><a href="#tab_3" id="trash" data-toggle="tab">Sản phẩm đã xóa</a></li>
      </ul>
      <div class="tab-content">
        {{-- tab 1 --}}
        <div class="tab-pane @if(Request::is('*/products')) active @endif" id="tab_1">
          {{-- danh sách sản phẩm --}}
          <div class="card box-body">
            {{-- card-header --}}
            <div class="card-header">
              <div class="alert alert-info alert-dismissible">
                <h4><i class="icon fa fa-info"></i> Danh sách sản phẩm</h4>
                Danh sách sản phẩm có trên hệ thống đang hiển thị
              </div>
            </div>
            {{-- /.card-header --}}
            {{-- card-body --}}
            <div class="card-body">
              <table id="product-table" class="table  table-striped table-bordered table-hover table-responsive ">
                <thead>
                  <tr>
                    <th>Stt</th>
                    <th>Tên sản phẩm</th>
                    <th>Người tạo</th>
                    <th>Ngày tạo</th>
                    <th>Hiển thị</th>
                    <th>#</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Stt</th>
                    <th>Tên sản phẩm</th>
                    <th>Người tạo</th>
                    <th>Ngày tạo</th>
                    <th>Hiển thị</th>
                    <th>#</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            {{-- /.card-body --}}
            {{-- card-footer --}}
            <div class="card-footer">
              <h3 class="card-title">Danh sách sản phẩm</h3>
            </div>
            {{-- /.card-footer --}}
          </div>
          {{-- /.danh sách sản phẩm --}}
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane @if(Request::is('*/warehouse')) active @endif" id="tab_2">
          {{-- danh sách sản phẩm --}}
          <div class="card box-body">
            {{-- card-header --}}
            <div class="card-header">
              <div class="alert alert-info alert-dismissible">
                <h4><i class="icon fa fa-info"></i> Kho hàng</h4>
                Danh sách sản phẩm trong kho
              </div>
            </div>
            {{-- /.card-header --}}
            {{-- card-body --}}
            <div class="card-body">
              <table id="warehouse-table" class="table  table-striped table-bordered table-hover table-responsive ">
                <thead>
                  <tr>
                    <th>Stt</th>
                    <th>Tên sản phẩm</th>
                    <th>Màu sắc</th>
                    <th>Kích thước</th>
                    <th>Số lượng</th>
                    <th>Giá nhập</th>
                    <th>Giá bán</th>
                    <th>Giá khuyến mãi</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Stt</th>
                    <th>Tên sản phẩm</th>
                    <th>Màu sắc</th>
                    <th>Kích thước</th>
                    <th>Số lượng</th>
                    <th>Giá nhập</th>
                    <th>Giá bán</th>
                    <th>Giá khuyến mãi</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            {{-- /.card-body --}}
            {{-- card-footer --}}
            <div class="card-footer">
              <h3 class="card-title">Kho hàng</h3>
            </div>
            {{-- /.card-footer --}}
          </div>
          {{-- /.danh sách sản phẩm --}}
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane @if(Request::is('*/trash')) active @endif" id="tab_3">
          {{-- danh sách sản phẩm đã xóa--}}
          <div class="card box-body">
            {{-- card-header --}}
            <div class="card-header">
              <div class="alert alert-danger alert-dismissible">
                <h4><i class="icon fa fa-info"></i> Thùng rác</h4>
                Danh sách sản phẩm đã xóa
              </div>
            </div>
            {{-- /.card-header --}}
            {{-- card-body --}}
            <div class="card-body">
             <button class="btn btn-danger btn-lg" title="Xóa toàn bộ"><i class="glyphicon glyphicon-trash"></i></button>
             <br>
             <table id="trash-table" class="table  table-striped table-bordered table-hover table-responsive ">
              <thead>
                <tr>
                  <th>Stt</th>
                  <th>Tên sản phẩm</th>
                  <th>Người tạo</th>
                  <th>Ngày xóa</th>
                  <th>#</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                 <th>Stt</th>
                 <th>Tên sản phẩm</th>
                 <th>Người tạo</th>
                 <th>Ngày xóa</th>
                 <th>#</th>
               </tr>
             </tfoot>
           </table>
         </div>
         {{-- /.card-body --}}
         {{-- card-footer --}}
         <div class="card-footer">
          <h3 class="card-title">Thùng rác</h3>
        </div>
        {{-- /.card-footer --}}
      </div>
      {{-- /.danh sách sản phẩm --}}
    </div>
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
