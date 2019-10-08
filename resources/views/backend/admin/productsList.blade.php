 @extends('backend.layouts.admin.master')
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
 <style type="text/css">
  .item{
    height: 400px!important;
  }
</style>
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
    @include('backend.admin.card')
  </section>
  {{-- /.content --}}
</div>
{{-- /.content-wrapper --}}
@include('backend.admin.modalAdd')
@endsection
@section('script')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script src="{{asset('assets/dist/js/adminlte_.min.js')}}"></script>
<script src="{{asset('assets/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script type="text/javascript" src="{{mix('js/productsList.js')}}"></script>
<script type="text/javascript" src="{{mix('js/common.js')}}"></script>
<script type="text/javascript">
   // Hàm này dùng để reset form khi hide modal
   $(document).on('hidden.bs.modal','#detailProduct',function () {
     $('#product-thumbnail').empty();
     $('.more-item').remove();
   });
 </script>
 <script type="text/javascript">
  $(document).on('click','.detail-product',function () {
    let id = $(this).attr('data-id');
    $.ajax({
      url:'/admin/products/'+id,
      type:'GET',
      success: function (res) {
        $('#product-thumbnail').append('<img src="'+res.product['thumbnail']+'"/>');
        $.each(res.images, function( index, value ) {
          $('.carousel-indicators').append('<li data-target="#carousel-example-generic" data-slide-to="'+(index+1)+'" class=" more-item"></li>');
          $('.carousel-inner').append('<div class="item more-item"><a data-fancybox="gallery" href="'+value['src']+'"><img src="'+value['src']+'"></a></div>');
        });
        $('#product-name').html('<h3><strong>'+res.product['name']+'</strong></h3>');
        // $('#product-price').text('Tên sản phẩm: '+res.product['name']);
      }
    });
    $('#detailProduct').modal('show');
  })
</script>
@endsection