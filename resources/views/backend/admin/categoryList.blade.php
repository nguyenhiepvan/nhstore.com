 @extends('backend.layouts.admin.master')
 @section('title')
 <title>NH Store | categories</title>
 @endsection
 @section('css')
 <!-- DataTables -->
 <link href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
 <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
 <link rel="stylesheet" href="{{mix('/css/card.css')}}">
 <link rel="stylesheet" href="{{asset('assets/bower_components/select2/dist/css/select2.min.css')}}">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
 @endsection
 @section('content')
 {{-- Content Wrapper. Contains page content --}}
 <div class="content-wrapper">
  {{-- Content Header (Page header) --}}
  <section class="content-header">
    <h1>
      Danh mục sản phẩm
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
    {{-- Kho hàng --}}
    <div class="card box-body">
      {{-- card-body --}}
      <div class="card-body">
        <button class="btn btn-danger btn-lg" title="Thêm mới" data-toggle="modal" data-target="#categoryModal"><i class="fa  fa-plus-circle"></i></button>
        <br>
        <table id="category-table" class="table table-bordered table-striped table-hover table-responsive ">
          <thead>
            <tr>
              <th>Stt</th>
              <th>Tên danh mục</th>
              <th>Danh mục cha</th>
              <th>Số lượng sản phẩm</th>
              <th>Người tạo</th>
              <th>Ngày tạo</th>
              <th>Hiển thị</th>
              <th>#</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Stt</th>
              <th>Tên danh mục</th>
              <th>Danh mục cha</th>
              <th>Số lượng sản phẩm</th>
              <th>Người tạo</th>
              <th>Ngày tạo</th>
              <th>Hiển thị</th>
              <th>#</th>
            </tr>
          </tfoot>
        </table>
      </div>
      {{-- /.card-body --}}
    </div>
    {{-- /.kho hàng --}}
  </section>
  {{-- /.content --}}
</div>
{{-- /.content-wrapper --}}
{{-- category modal --}}
<div class="modal fade" tabindex="-1" role="dialog" id="categoryModal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>Thêm mới danh mục</h4>
      </div>
      <!-- Modal body -->
      <form action="javascript:;" method="POST" id="categoryAddForm" class="form" role="form">
        @csrf
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        <div class="modal-body">
          <div class="form-group">
            <label for="">Tên danh mục</label>
            <input type="text" class="form-control name" name="name"placeholder="Tên danh mục" required>
            <span class="error errors_name"></span>
          </div>
          <div class="form-group">
            <label for="">Danh mục cha</label>
            <select name="parent_id" id="parentSelect" class="form-control select2" style="width: 100%;" data-placeholder="Chọn danh mục">
              <option></option>
              @foreach ($categories as $category)
              <option value="{{$category->id}}" >{{$category->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="">Đường dẫn</label>
            <input type="text" class="form-control slug" name="slug"placeholder="Đường dẫn" required>
            <span class="error errors_slug"></span>
          </div>
          <div class="form-group">
            <label for="">Viết tắt</label>
            <input type="text" class="form-control acronym" name="acronym"placeholder="Viết tắt" required>
            <span class="error errors_acronym"></span>
          </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
          <button type="submit" class="btn btn-danger save" >Lưu lại</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
@section('script')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('assets/dist/js/adminlte_.min.js')}}"></script>
<script src="{{asset('assets/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
<script type="text/javascript" src="{{mix('js/common.js')}}"></script>
<script type="text/javascript" src="{{mix('js/categoriesList.js')}}"></script>
@endsection