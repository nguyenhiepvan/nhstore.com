$(document).ready(function () {
  // Lấy dữ liệu sản phẩm
  var table = $('#product-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: "/admin/products",
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
   // ckeditor
   let options ={
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
    language: 'vi',
  };
  CKEDITOR.replace('description',options);
  CKEDITOR.editorConfig=function( config ){ config.resize_enabled=false;};
   // Dựng search select
   $('.select2').select2()
   // ảnh sản phẩm
   $.fn.filemanager = function(type, options) {
    type = type || 'file';
    this.on('click', function(e) {
      let route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
      localStorage.setItem('target_input', $(this).data('input'));
          //đặt cửa sổ mới vào giữa
          let w = 900, h = 600;
          let dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
          let dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;
          width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
          height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;
          let left = ((width / 2) - (w / 2)) + dualScreenLeft;
          let top = ((height / 2) - (h / 2)) + dualScreenTop;
          window.open(route_prefix + '?type=' + type, 'FileManager', 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
          window.SetUrl = function (url, file_path) {
                // parent.document.getElementById(field_name).value = url;
                let target_input = parent.document.getElementById(localStorage.getItem('target_input'));
                target_input.value += url+",";
            //set or change the preview image src
            $('#holder').append('<div class="show-image"><button type="button" title="Loại bỏ" class="remove-img" data-target="javascript:;"><i class="fa fa-close"></i></button><div><img src="'+url+'" style="margin-top:15px;max-height:100px;"></div></div>');
          };
          return false;
        });
  };
  $('#lfm').filemanager('image');
   // ảnh hiển thị
   $.fn.filemanager_ = function(type, options) {
    type = type || 'file';
    this.on('click', function(e) {
      let route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
      localStorage.setItem('target_input', $(this).data('input'));
      localStorage.setItem('target_preview', $(this).data('preview'));
          //đặt cửa sổ mới vào giữa
          let w = 900, h = 600;
          let dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
          let dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;
          width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
          height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;
          let left = ((width / 2) - (w / 2)) + dualScreenLeft;
          let top = ((height / 2) - (h / 2)) + dualScreenTop;
          window.open(route_prefix + '?type=' + type, 'FileManager', 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
          window.SetUrl = function (url, file_path) {
                // parent.document.getElementById(field_name).value = url;
                let target_input = parent.document.getElementById(localStorage.getItem('target_input'));
                target_input.value = url;
            //set or change the preview image src
            let target_preview = parent.document.getElementById(localStorage.getItem('target_preview'));
            target_preview.src = url;
          };
          return false;
        });
  };
  $('#ava-btn').filemanager_('image');
   // Loại bỏ ảnh sản phẩm
   $(document).on('click','.remove-img',function () {
    let value = $('#images').val();
    let src = $(this).parent().find('img').attr('src');
    value = value.replace(src +',', "");
    $('#images').val(value);
    $(this).parent().find('img').remove();
    $(this).remove();
  });
   // Hàm này dùng để tạo ký tự viết tắt
   function acr(s){
    let words, acronym, nextWord;
    words = s.split(' ');
    acronym= "";
    index = 0
    while (index<words.length) {
      nextWord = words[index];
      acronym = acronym + nextWord.charAt(0);
      index = index + 1 ;
    }
    return acronym;
  }
 // Hàm này dùng đđể tạo ra slug
 function ChangeToSlug(title)
 {
  let slug;
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
 // Hàm này tạo ra ký tự viết tắt và đường dẫn khi nhập tên
 $(document).on('input','.name',function () {
  let name = $(this).val();
  let slug = ChangeToSlug(name);
  let acronym = acr(name);
  $('.slug').val(slug);
  $('.acronym').val(acronym);
});
 // Hàm này dùng để reset form khi mở modal
 $(document).on('click','.more',function () {
  $('.form').trigger("reset");
  $('.error').empty();
  $('.slug').val('');
  $('.acronym').val('');
});
 // hàm này dùng để reset error khi bấm submit mới
 $(document).on('click','.save',function () {
  $('.error').empty();
});
 // Hàm này dùng để tạo ra chất liệu mới
 $(document).on('submit','#materialAddForm',function () {
  let form = $(this)[0];
  let formData = new FormData(form);
  $.ajax({
    url:'/admin/materials',
    data: formData,
    type: 'post',
    contentType:false,
    processData:false,
    success: function (res) {
      $('#materialModal').modal('hide');
      $('.form').trigger("reset");
      $('.error').empty();
      Swal.fire({
        position: 'center',
        type: 'success',
        title: 'Đã thêm chất liệu',
        showConfirmButton: false,
        timer: 1000
      });
      $('#materialsSelect').append('<option data-acroym="'+res.acronym+'" value="'+res.id+'">'+res.name+'</option>');
      $('#materialsSelect').select2();
    },
    error: function(xhr, status, errors)
    {
      $.each(xhr.responseJSON.errors, function (key, item)
      {
        $(".errors_"+key).append("<p class='text-red'>"+item+"</p>")
      });
    }
  });
});
 // Hàm này dùng để tạo ra danh mục
 $(document).on('submit','#categoryAddForm',function () {
  let form = $(this)[0];
  let formData = new FormData(form);
  $.ajax({
    url:'/admin/categories',
    data: formData,
    type: 'post',
    contentType:false,
    processData:false,
    success: function (res) {
      $('#categoryModal').modal('hide');
      $('.form').trigger("reset");
      $('.error').empty();
      Swal.fire({
        position: 'center',
        type: 'success',
        title: 'Đã thêm danh mục',
        showConfirmButton: false,
        timer: 1000
      });
      $('#categoriesSelect').append('<option data-acroym="'+res.acronym+'" value="'+res.id+'">'+res.name+'</option>');
      $('#categoriesSelect').select2();
    },
    error: function(xhr, status, errors)
    {
      $.each(xhr.responseJSON.errors, function (key, item)
      {
        $(".errors_"+key).append("<p class='text-red'>"+item+"</p>")
      });
    }
  });
});
 // Hàm này dùng để tạo ra thẻ
 $(document).on('submit','#tagAddForm',function () {
  let form = $(this)[0];
  let formData = new FormData(form);
  $.ajax({
    url:'/admin/tags',
    data: formData,
    type: 'post',
    contentType:false,
    processData:false,
    success: function (res) {
      $('#tagModal').modal('hide');
      $('.form').trigger("reset");
      $('.error').empty();
      Swal.fire({
        position: 'center',
        type: 'success',
        title: 'Đã thêm thẻ',
        showConfirmButton: false,
        timer: 1000
      });
      $('#tagsSelect').append('<option data-acroym="'+res.acronym+'" value="'+res.id+'">'+res.name+'</option>');
      $('#tagsSelect').select2();
    },
    error: function(xhr, status, errors)
    {
      $.each(xhr.responseJSON.errors, function (key, item)
      {
        $(".errors_"+key).append("<p class='text-red'>"+item+"</p>")
      });
    }
  });
});
 // Hàm này dùng để tạo ra màu sắc mới
//
// $(document).on('submit','#colorAddForm',function () {
//   let form = $(this)[0];
//   let formData = new FormData(form);
//   $.ajax({
//     url:'/admin/colors'',
//   data: formData,
//   type: 'post',
//   contentType:false,
//   processData:false,
//   success: function (res) {
//     $('#colorModal').modal('hide');
//     $('.form').trigger("reset");
//     $('.error').empty();
//     Swal.fire({
//       position: 'center',
//       type: 'success',
//       title: 'Đã thêm màu sắc',
//       showConfirmButton: false,
//       timer: 1000
//     });
//     $('#colorsSelect').append('<option data-acroym="'+res.acronym+'" value="'+res.id+'">'+res.name+'</option>');
//     $('#colorsSelect').select2();
//   },
//   error: function(xhr, status, errors)
//   {
//     $.each(xhr.responseJSON.errors, function (key, item)
//     {
//       $(".errors_"+key).append("<p class='text-red'>"+item+"</p>")
//     });
//   }
// });
// });
 // Hàm này dùng để tạo ra xuất xứ mới
 $(document).on('submit','#originAddForm',function () {
  let form = $(this)[0];
  let formData = new FormData(form);
  $.ajax({
    url:'/admin/origins',
    data: formData,
    type: 'post',
    contentType:false,
    processData:false,
    success: function (res) {
      $('#originModal').modal('hide');
      $('.form').trigger("reset");
      $('.error').empty();
      Swal.fire({
        position: 'center',
        type: 'success',
        title: 'Đã thêm xuất xứ',
        showConfirmButton: false,
        timer: 1000
      });
      $('#originsSelect').append('<option data-acroym="'+res.acronym+'" value="'+res.id+'">'+res.name+'</option>');
      $('#colorsSelect').select2();
    },
    error: function(xhr, status, errors)
    {
      $.each(xhr.responseJSON.errors, function (key, item)
      {
        $(".errors_"+key).append("<p class='text-red'>"+item+"</p>")
      });
    }
  });
});
 // Hàm này dùng để tạo ra thương hiệu mới
 $(document).on('submit','#brandAddForm',function () {
  let form = $(this)[0];
  let formData = new FormData(form);
  $.ajax({
    url:'/admin/brands',
    data: formData,
    type: 'post',
    contentType:false,
    processData:false,
    success: function (res) {
      $('#brandModal').modal('hide');
      $('.form').trigger("reset");
      $('.error').empty();
      Swal.fire({
        position: 'center',
        type: 'success',
        title: 'Đã thêm xuất xứ',
        showConfirmButton: false,
        timer: 1000
      });
      $('#brandsSelect').append('<option data-acroym="'+res.acronym+'" value="'+res.id+'">'+res.name+'</option>');
      $('#colorsSelect').select2();
    },
    error: function(xhr, status, errors)
    {
      $.each(xhr.responseJSON.errors, function (key, item)
      {
        $(".errors_"+key).append("<p class='text-red'>"+item+"</p>")
      });
    }
  });
});
 // Hàm này dùng để tạo ra nhà phân phối mới
 $(document).on('submit','#supplierAddForm',function () {
  let form = $(this)[0];
  let formData = new FormData(form);
  $.ajax({
    url:'/admin/suppliers',
    data: formData,
    type: 'post',
    contentType:false,
    processData:false,
    success: function (res) {
      $('#supplierModal').modal('hide');
      $('.form').trigger("reset");
      $('.error').empty();
      Swal.fire({
        position: 'center',
        type: 'success',
        title: 'Đã thêm nhà phân phối',
        showConfirmButton: false,
        timer: 1000
      });
      $('#suppliersSelect').append('<option data-acroym="'+res.acronym+'" value="'+res.id+'">'+res.name+'</option>');
      $('#colorsSelect').select2();
    },
    error: function(xhr, status, errors)
    {
      $.each(xhr.responseJSON.errors, function (key, item)
      {
        $(".errors_"+key).append("<p class='text-red'>"+item+"</p>")
      });
    }
  });
});
 // Hàm này dùng để reset form khi hide modal
 $(document).on('hidden.bs.modal','#productModal',function () {
  $('#productAddForm').trigger("reset");
  $('#preview-ava').attr({ "src": "" });
  $('.select2').val(null).trigger('change');
  CKEDITOR.instances.description.setData('');
  $('#holder').empty();
});
 // Hàm này để tạo ra sản phẩm mới
 $("#productAddForm").validator().on("submit", function (event) {
  if (event.isDefaultPrevented()) {
        // handle the invalid form...
      } else {
        // everything looks good!
        event.preventDefault();
        let form = $(this)[0];
        let formData = new FormData(form);
        formData.append('description', CKEDITOR.instances['description'].getData());
        $.ajax({
          url:'/admin/products',
          data: formData,
          type: 'post',
          contentType:false,
          processData:false,
          success: function (res) {
           $('#productModal').modal('hide');
           // $('.error').empty();
           Swal.fire({
            position: 'center',
            type: 'success',
            title: 'Đã thêm sản phẩm',
            showConfirmButton: false,
            timer: 1000
          });
           table.ajax.reload(null, false );
         },
         error: function(xhr, status, errors)
         {
          $.each(xhr.responseJSON.errors, function (key, item)
          {
            $(".errors_"+key).append("<p class='text-red'>"+item+"</p>")
          });
        }
      });
      }
    });
});