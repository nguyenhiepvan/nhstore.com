 @extends('layouts.admin.master')
 @section('title')
 <title>NH Store | products</title>
 @endsection
 @section('css')
 <!-- DataTables -->
 <link href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
 <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
 <link rel="stylesheet" href="{{asset('assets/dist/css/card.css')}}">
 <link rel="stylesheet" href="{{asset('assets/bower_components/select2/dist/css/select2.min.css')}}">
 <style type="text/css">
  .table{
    width: 100% !important;
  }
  .modal-xl{
    max-width: 1140px !important;
  }
  #ModalTitle{
    text-align: center;
  }
  #images{
    display: none;
  }
  #lfm{
    border: none;
    width: 55px;
  }
  #add-icon{
    width: 30px;
    height: 30px
  }
  div.show-image {
    position: relative;
    float:left;
    margin:5px;
  }
  div.show-image:hover button
  {
    display: block;
  }
  div.show-image button {
    position:absolute;
    top:0;
    left:0;
    display:none;
  }
  .fa-close, .more{
    margin-left: 5px;
    color: red;
  }
  .select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #3c8dbc;
    border-color: #367fa9;
  }
  .form-control{
    border-radius: 15px !important;
  }
  input.select2-search__field {
    width: 100% !important;
  }
  .more{
    border: none;
    background-color: white;
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
            <button class="btn btn-info btn-lg" title="Thêm mới" data-toggle="modal" data-target="#Modal"><i class="fa  fa-plus-circle"></i></button>
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
    {{-- Lấy dữ liệu sản phẩm --}}
    <script>
      var table = $('#product-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.products.index') }}",
        columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        {data: 'name', name: 'name'},
        {data: 'thumbnail', name: 'thumbnail'},
        {data: 'brand', name: 'brand'},
        {data: 'supplier', name: 'supplier'},
        {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "oLanguage": { "sUrl": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Vietnamese.json" }
      });
    </script>
    {{-- ckeditor --}}
    <script>
      var options ={
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
        language: 'vi',
      };
      CKEDITOR.replace('description',options);
      CKEDITOR.editorConfig=function( config ){ config.resize_enabled=false;};
    </script>
    {{-- Dựng search select --}}
    <script type="text/javascript">
      $('.select2').select2()
    </script>
    {{-- ảnh sản phẩm --}}
    <script type="text/javascript">
      $.fn.filemanager = function(type, options) {
        type = type || 'file';
        this.on('click', function(e) {
          var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
          localStorage.setItem('target_input', $(this).data('input'));
          //đặt cửa sổ mới vào giữa
          var w = 900, h = 600;
          var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
          var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;
          width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
          height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;
          var left = ((width / 2) - (w / 2)) + dualScreenLeft;
          var top = ((height / 2) - (h / 2)) + dualScreenTop;
          window.open(route_prefix + '?type=' + type, 'FileManager', 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
          window.SetUrl = function (url, file_path) {
                // parent.document.getElementById(field_name).value = url;
                var target_input = parent.document.getElementById(localStorage.getItem('target_input'));
                target_input.value += url+",";
            //set or change the preview image src
            $('#holder').append('<div class="show-image"><button type="button" title="Loại bỏ" class="remove-img" data-target="javascript:;"><i class="fa fa-close"></i></button><div><img src="'+url+'" style="margin-top:15px;max-height:100px;"></div></div>');
          };
          return false;
        });
      };
      $('#lfm').filemanager('image');
    </script>
    {{-- ảnh hiển thị --}}
    <script type="text/javascript">
      $.fn.filemanager_ = function(type, options) {
        type = type || 'file';
        this.on('click', function(e) {
          var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
          localStorage.setItem('target_input', $(this).data('input'));
          localStorage.setItem('target_preview', $(this).data('preview'));
          //đặt cửa sổ mới vào giữa
          var w = 900, h = 600;
          var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
          var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;
          width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
          height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;
          var left = ((width / 2) - (w / 2)) + dualScreenLeft;
          var top = ((height / 2) - (h / 2)) + dualScreenTop;
          window.open(route_prefix + '?type=' + type, 'FileManager', 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
          window.SetUrl = function (url, file_path) {
                // parent.document.getElementById(field_name).value = url;
                var target_input = parent.document.getElementById(localStorage.getItem('target_input'));
                target_input.value = url;
            //set or change the preview image src
            var target_preview = parent.document.getElementById(localStorage.getItem('target_preview'));
            target_preview.src = url;
          };
          return false;
        });
      };
      $('#ava-btn').filemanager_('image');
    </script>
    {{-- Loại bỏ ảnh sản phẩm --}}
    <script type="text/javascript">
      $(document).on('click','.remove-img',function () {
        let value = $('#thumbnail').val();
        let src = $(this).parent().find('img').attr('src');
        value = value.replace(src +',', "");
        $('#thumbnail').val(value);
        $(this).parent().find('img').remove();
        $(this).remove();
      })
    </script>
    {{-- Hàm này dùng để tạo ký tự viết tắt --}}
    <script type="text/javascript">
      function acr(s){
       var words, acronym, nextWord;
       words = s.split(' ');
       acronym= "";
       index = 0
       while (index<words.length) {
        nextWord = words[index];
        acronym = acronym + nextWord.charAt(0);
        index = index + 1 ;
      }
      return acronym
    }
  </script>
  {{-- Hàm này dùng đđể tạo ra slug --}}
  <script type="text/javascript">
    function ChangeToSlug(title)
    {
      var slug;
      //Đổi chữ hoa thành chữ thường
      slug = title.toLowerCase();
      //Đổi ký tự có dấu thành không dấu
      slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
      slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
      slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
      slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
      slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
      slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
      slug = slug.replace(/đ/gi, 'd');
      //Xóa các ký tự đặt biệt
      slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
      //Đổi khoảng trắng thành ký tự gạch ngang
      slug = slug.replace(/ /gi, " - ");
      //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
      //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
      slug = slug.replace(/\-\-\-\-\-/gi, '-');
      slug = slug.replace(/\-\-\-\-/gi, '-');
      slug = slug.replace(/\-\-\-/gi, '-');
      slug = slug.replace(/\-\-/gi, '-');
      //Xóa các ký tự gạch ngang ở đầu và cuối
      slug = '@' + slug + '@';
      slug = slug.replace(/\@\-|\-\@|\@/gi, '');
      //In slug ra textbox có id “slug”
      return slug;
    }
  </script>
  @endsection