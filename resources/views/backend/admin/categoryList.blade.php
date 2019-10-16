 @extends('backend.layouts.admin.master')
 @section('title')
 <title>NH Store | categories</title>
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
   <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#tab_1" data-toggle="tab">Danh mục hiển thị</a></li>
      <li><a href="#tab_2" data-toggle="tab">Danh mục ẩn</a></li>
      <li><a href="#tab_3" data-toggle="tab">Danh mục đã xóa</a></li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane active" id="tab_1">
       {{-- danh mục hiển thị --}}
       <div class="card box-body">
        {{-- card-header --}}
        <div class="card-header">
          <div class="alert alert-info alert-dismissible">
            <h4><i class="icon fa fa-info"></i> Danh mục hiển thị</h4>
            Những danh mục được hiển thị trên hệ thống
          </div>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Ẩn/hiện">
              <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Đóng">
                <i class="fa fa-times"></i></button>
              </div>
            </div>
            {{-- /.card-header --}}
            {{-- card-body --}}
            <div class="card-body">
              <button class="btn btn-info btn-lg" title="Thêm mới" data-toggle="modal" data-target="#categoryModal"><i class="glyphicon glyphicon-plus-sign"></i></button>
              <br>
              <div class="box-body table-responsive no-padding">
               <table id="category-table" class="table table-hover table-responsive ">
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
          </div>
          {{-- /.card-body --}}
          {{-- card-footer --}}
          <div class="card-footer">
           <h3 class="card-title">Danh mục hiển thị</h3>
         </div>
         {{-- /.card-footer --}}
       </div>
       {{-- /.danh mục hiển thị --}}
     </div>
     <!-- /.tab-pane -->
     <div class="tab-pane" id="tab_2">
       {{-- danh mục ẩn --}}
       <div class="card box-body">
        {{-- card-header --}}
        <div class="card-header">
         <div class="alert alert-warning alert-dismissible">
          <h4><i class="icon fa fa-warning"></i> Danh mục ẩn</h4>
          Danh mục bị ẩn trong hệ thống
        </div>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Ẩn/hiện">
            <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Đóng">
              <i class="fa fa-times"></i></button>
            </div>
          </div>
          {{-- /.card-header --}}
          {{-- card-body --}}
          <div class="card-body">
            <table id="category-hidden-table" class="table  table-striped table-bordered table-hover table-responsive ">
             <thead>
              <tr>
                <th>Stt</th>
                <th>Tên danh mục</th>
                <th>Danh mục cha</th>
                <th>Số lượng sản phẩm</th>
                <th>Người ẩn</th>
                <th>Ngày ẩn</th>
                <th>Hiển thị</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Stt</th>
                <th>Tên danh mục</th>
                <th>Danh mục cha</th>
                <th>Số lượng sản phẩm</th>
                <th>Người ẩn</th>
                <th>Ngày ẩn</th>
                <th>Hiển thị</th>
              </tr>
            </tfoot>
          </table>
        </div>
        {{-- /.card-body --}}
        {{-- card-footer --}}
        <div class="card-footer">
          <h3 class="card-title">Danh mục ẩn</h3>
        </div>
        {{-- /.card-footer --}}
      </div>
      {{-- /.danh mục ẩn --}}
    </div>
    <!-- /.tab-pane -->
    <div class="tab-pane" id="tab_3">
     {{-- danh mục ẩn --}}
     <div class="card box-body">
      {{-- card-header --}}
      <div class="card-header">
       <div class="alert alert-danger alert-dismissible">
        <h4><i class="icon fa fa-ban"></i>Danh mục đã bị xóa</h4>
        Danh mục bị xóa trong hệ thống
      </div>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Ẩn/hiện">
          <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Đóng">
            <i class="fa fa-times"></i></button>
          </div>
        </div>
        {{-- /.card-header --}}
        {{-- card-body --}}
        <div class="card-body">
          <button class="btn btn-danger btn-lg" title="Xóa tất cả" ><i class="fa   fa-trash-o"></i></button>
          <br>
          <table id="category-deleted-table" class="table  table-striped table-bordered table-hover table-responsive ">
           <thead>
            <tr>
              <th>Stt</th>
              <th>Tên danh mục</th>
              <th>Danh mục cha</th>
              <th>Số lượng sản phẩm</th>
              <th>Ngày xóa</th>
              <th>#</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Stt</th>
              <th>Tên danh mục</th>
              <th>Danh mục cha</th>
              <th>Số lượng sản phẩm</th>
              <th>Ngày xóa</th>
              <th>#</th>
            </tr>
          </tfoot>
        </table>
      </div>
      {{-- /.card-body --}}
      {{-- card-footer --}}
      <div class="card-footer">
        <h3 class="card-title">Danh mục đã xóa</h3>
      </div>
      {{-- /.card-footer --}}
    </div>
    {{-- /.danh mục ẩn --}}
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
{{-- add category modal --}}
<div class="modal modal-info  fade more-item" tabindex="-1" role="dialog" id="categoryModal">
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
{{-- /.add category modal --}}
{{-- edit category modal --}}
<div class="modal modal-warning fade more-item" tabindex="-1" role="dialog" id="edit-categoryModal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>Chỉnh sửa danh mục</h4>
      </div>
      <!-- Modal body -->
      <form action="javascript:;" id="edit-categoryAddForm" class="form" role="form">
        @csrf
        {{ method_field('PUT') }}
        <div class="modal-body">
          <div class="form-group">
            <label for="">Tên danh mục</label>
            <input type="text" class="form-control name" name="name"placeholder="Tên danh mục" required>
            <span class="error errors_name"></span>
          </div>
          <div class="form-group">
            <label for="">Danh mục cha</label>
            <select name="parent_id" id="edit-parentSelect" class="form-control select2" style="width: 100%;" data-placeholder="Chọn danh mục">
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
{{-- /.edit category modal --}}
@endsection
@section('script')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script src="{{asset('assets/backend/dist/js/adminlte_.min.js')}}"></script>
<script src="{{asset('assets/backend/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
<script type="text/javascript" src="{{mix('js/common.js')}}"></script>
<script type="text/javascript" src="{{mix('js/categoriesList.js')}}"></script>
@endsection