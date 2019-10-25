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
 <style type="text/css">
  .item{
    height: 400px!important;
  }
  #product-description img{
    max-width: 100%;
  }
  .color-items{
    list-style: none;
    padding: 0;
    margin: 0;
  }
  .color-items li{
    float: left;
    display: block;
    text-align: center;
  }
  .color-items li a{
    display: block;
    padding: 5px 14px;
    background: #fff;
    margin-right: 15px;
    border: 1px solid #189eff;
    font-weight: 400;
    color: #189eff;
    cursor: pointer;
    font-size: 13px;
    -webkit-box-shadow: none;
    box-shadow: none;
    margin-bottom: 10px;
    border-radius: 4px;
    text-decoration: none;
  }
  .color-items li a:hover{
    color: #fff;
    background: #189eff;
    border: 1px solid #189eff;
  }
  .color-items li a:active{
    color: #fff;
    background: #189eff;
    border: 1px solid #189eff;
  }
</style>
@endsection
@section('content')
{{-- {{dd(url()->current())}} --}}
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
  {{-- Main content --}}
  <section class="content">
   <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#tab_1" data-toggle="tab">Danh sách sản phẩm</a></li>
      <li><a href="#tab_2" data-toggle="tab">Kho hàng</a></li>
      <li><a href="#tab_3" data-toggle="tab">Sản phẩm đã ẩn</a></li>
      <li><a href="#tab_4" data-toggle="tab">Sản phẩm đã xóa</a></li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane active" id="tab_1">
        {{-- danh sách sản phẩm --}}
        <div class="card box-body">
          {{-- card-header --}}
          <div class="card-header">
            <div class="alert alert-info alert-dismissible">
              <h4><i class="icon fa fa-info"></i> Danh sách sản phẩm</h4>
              Danh sách sản phẩm có trên hệ thống đang hiển thị
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
                <button class="btn btn-info btn-lg" title="Thêm mới" data-toggle="modal" data-target="#productModal"><i class="fa  fa-plus-circle"></i></button>
                <br>
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
          <div class="tab-pane" id="tab_2">
          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="tab_3">
          </div>
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
      </div>
      <!-- nav-tabs-custom -->
    </section>
    {{-- /.content --}}
    {{-- /.content --}}
  </div>
  {{-- /.content-wrapper --}}
  @include('backend.admin.product_modal')
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
  <script type="text/javascript">
   // Hàm này dùng để reset form khi hide modal
   $(document).on('hidden.bs.modal','#detailProduct',function () {
     $('#slides').empty();
     $('#product-name').empty();
     $('#product-description').empty();
     $('#color-items').empty();
     $('#size-items').empty();
   });
 </script>
 <script type="text/javascript">
  $(document).on('click','.detail-product',function () {
    let id = $(this).attr('data-id');
    $.ajax({
      url:'/admin/products/'+id,
      type:'GET',
      success: function (res) {
        $('#slides').append(res.slides);
        $('#product-name').text(res.product['name']);
        $('#product-description').html(res.product['description']);
        $.each(res.colors, function( index, value ) {
          $('#color-items').append('<li><a type="button" href="javascript:;" class="color">'+value['name']+'</a></li>');
        });
        $.each(res.sizes, function( index, value ) {
          $('#size-items').append('<li><a type="button" href="javascript:;" class="color">'+value['name']+'</a></li>');
        });
      }
    });
    $('#detailProduct').modal('show');
  })
</script>
<script type="text/javascript">
  $(document).on('click','.edit',function () {
    $.ajax({
     url:'/admin/products'+$(this).data('id'),
     type: 'GET',
     success: function (res) {
       
     }
   })
  })
</script>
@endsection