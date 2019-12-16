$(document).ready(function () {
   //set up csrf
   $.ajaxSetup({
    headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
 });
// Lấy dữ liệu sản phẩm
var productsTable = $('#product-table').DataTable({
  processing: true,
  serverSide: true,
  ajax: "/admin/products",
  columns: [
  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
  {data: 'name', name: 'name'},
  {data: 'user', name: 'user'},
  {data: 'created_at', name: 'created_at'},
  {data: 'status', name: 'status', searchable: false},
  {data: 'action', name: 'action', orderable: false, searchable: false},
  ],
  "oLanguage": {
    "sProcessing":   "Đang xử lý...",
    "sLengthMenu":   "Xem _MENU_ mục",
    "sZeroRecords":  "Không tìm thấy dòng nào phù hợp",
    "sInfo":         "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
    "sInfoEmpty":    "Đang xem 0 đến 0 trong tổng số 0 mục",
    "sInfoFiltered": "(được lọc từ _MAX_ mục)",
    "sInfoPostFix":  "",
    "sSearch":       "Tìm:",
    "sUrl":          "",
    "oPaginate": {
      "sFirst":    "Đầu",
      "sPrevious": "Trước",
      "sNext":     "Tiếp",
      "sLast":     "Cuối"
    }
  },
  fnDrawCallback:function (oSettings) {
// Đoạn này dùng để set up checkbox
let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
elems.forEach(function(html) {
  let switchery = new Switchery(html,  { size: 'small' });
});
}
});
//Kho hàng
// var warehouseTable = $('#warehouse-table').DataTable({
//   processing: true,
//   serverSide: true,
//   ajax: "/admin/warehouse",
//   columns: [
//   {data: 'DT_RowIndex', name: 'DT_RowIndex'},
//   {data: 'name', name: 'name'},
//   {data: 'color', name: 'color'},
//   {data: 'size', name: 'size'},
//   {data: 'quantity', name: 'quantity'},
//   {data: 'in_price', name: 'in_price'},
//   {data: 'out_price', name: 'out_price'},
//   {data: 'sale_price', name: 'sale_price'},
//     // {data: 'status', name: 'status', orderable: false, searchable: false},
//     ],
//     "oLanguage": {
//       "sProcessing":   "Đang xử lý...",
//       "sLengthMenu":   "Xem _MENU_ mục",
//       "sZeroRecords":  "Không tìm thấy dòng nào phù hợp",
//       "sInfo":         "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
//       "sInfoEmpty":    "Đang xem 0 đến 0 trong tổng số 0 mục",
//       "sInfoFiltered": "(được lọc từ _MAX_ mục)",
//       "sInfoPostFix":  "",
//       "sSearch":       "Tìm:",
//       "sUrl":          "",
//       "oPaginate": {
//         "sFirst":    "Đầu",
//         "sPrevious": "Trước",
//         "sNext":     "Tiếp",
//         "sLast":     "Cuối"
//       }
//     },
//   });
//Thùng rác
// var trashTable = $('#trash-table').DataTable({
//   processing: true,
//   serverSide: true,
//   ajax: "/admin/trash",
//   columns: [
//   {data: 'DT_RowIndex', name: 'DT_RowIndex'},
//   {data: 'name', name: 'name'},
//   {data: 'user', name: 'user'},
//   {data: 'deleted_at', name: 'deleted_at'},
//   {data: 'action', name: 'action', orderable: false, searchable: false},
//   ],
//   "oLanguage": {
//     "sProcessing":   "Đang xử lý...",
//     "sLengthMenu":   "Xem _MENU_ mục",
//     "sZeroRecords":  "Không tìm thấy dòng nào phù hợp",
//     "sInfo":         "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
//     "sInfoEmpty":    "Đang xem 0 đến 0 trong tổng số 0 mục",
//     "sInfoFiltered": "(được lọc từ _MAX_ mục)",
//     "sInfoPostFix":  "",
//     "sSearch":       "Tìm:",
//     "sUrl":          "",
//     "oPaginate": {
//       "sFirst":    "Đầu",
//       "sPrevious": "Trước",
//       "sNext":     "Tiếp",
//       "sLast":     "Cuối"
//     }
//   },
// });
// Hàm này để xóa mềm sản phẩm
$(document).on('click','.delete',function () {
  let id = $(this).data('id');
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success',
      cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
  })

  swalWithBootstrapButtons.fire({
    title: 'Xóa sản phẩm',
    text: "Sản phẩm sẽ được chuyển vào thùng rác",
    type: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Xác nhận',
    cancelButtonText: 'Hủy bỏ',
    reverseButtons: true
  }).then((result) => {
    if (result.value) {
      swalWithBootstrapButtons.fire(
        'Đã xóa!',
        'Sản phẩm đã được chuyển vào thùng rác',
        'success'
        );
      $.ajax({
        url:'/admin/products/'+id,
        type: 'DELETE',
        success: function () {
          productsTable.ajax.reload(null, false );
          // trashTable.ajax.reload(null, false );
        }
      })
    }
  })
})
// Đoạn này dùng để thay đổi trạng thái hiển thị của sản phẩm
productsTable.on('change',".js-switch",function(e){
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success',
      cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
  });
  let status = $(this).prop('checked') === true ? 1 : 0;
  let id = $(this).data('id');
  let confirm_title,confirm_text,success_title,success_text,confirmButtonText;
  if(status == 1){
    confirm_title = 'Hiện sản phẩm này';
    confirm_text = 'Sản phẩm này sẽ hiển thị trên hệ thống.';
    success_title = 'Đã hiện!';
    success_text = 'Sản phẩm đã hiện';
    confirmButtonText = 'Xác nhận!';
  }else{
    confirm_title = 'Ẩn sản phẩm này';
    confirm_text = 'Sản phẩm này sẽ bị ẩn trên hệ thông.';
    success_title = 'Đã ẩn!';
    success_text = 'Sản phẩm đã bị ẩn';
    confirmButtonText = 'Xác nhận!';
  }
  Swal.fire({
    title: confirm_title,
    text: confirm_text,
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: confirmButtonText
  }).then((result) => {
    if (result.value) {
      Swal.fire(
        success_title,
        success_text,
        'success'
        );
      let formData = new FormData();
      formData.append('status',status);
      formData.append('_method', 'PUT');
      $.ajax({
        url: '/admin/products/'+id,
        type: 'post',
        processData: false,
        contentType: false,
        data: formData,
        success: function () {
          productsTable.ajax.reload();
// categories_hidden_Table.ajax.reload();
}
});
    }else{
      if (status == 0) {
        setSwitchery($(this),true);
      } else {
        setSwitchery($(this),false);
      }
      swalWithBootstrapButtons.fire(
        'Đã hủy',
        'Thao tác đã bị hủy',
        'error'
        );
    }
  })
});
//Hàm này dùng để thay đổi switchery
function setSwitchery(switchElement, checkedBool) {
if (checkedBool && !switchElement.checked) { // switch on if not on
  $(switchElement).trigger('click').attr("checked", "checked");
} else if (!checkedBool && switchElement.checked) { // switch off if not off
  $(switchElement).trigger('click').removeAttr("checked");
}
}
 // Xem chi tiết sản phẩm
 $(document).on('click','.detail-product',function () {
  let id = $(this).attr('data-id');
  $.ajax({
    url:'/admin/products/'+id,
    type:'GET',
    success: function (res) {
      window.history.pushState("object or string", "Title", '/admin/products/'+id);
      $('#slides').append(res.slides);
      $('#product-overview').html(res.product['overview']);
      $('#product-name').text(res.product['name']);
      $('#product-description').html(res.product['description']);
      if (res.colors.length === 0) {
        $('#color-items').append('<li>Đang cập nhật</li>');
      }else{
        $.each(res.colors, function( index, value ) {
          $('#color-items').append('<li><a type="button" href="javascript:;" data-id="'+value['id']+'" class="color">'+value['name']+'</a></li>');
        });
      }
      if (res.sizes.length === 0) {
        $('#size-items').append('<li>Đang cập nhật</li>');
      }else{
        $.each(res.sizes, function( index, value ) {
          $('#size-items').append('<li><a type="button" href="javascript:;" data-id="'+value['id']+'" class="size">'+value['name']+'</a></li>');
        });
      }
      if(res.quantities != 0){
       $('#detail_quantity').text(res.quantities);
     }else{
      $('#detail_quantity').text("Tạm hết hàng");
    }
    if(res.in_price != 0){
      $('#detail_in_price').text(res.in_price);
    }else{
      $('#detail_in_price').text('Đang cập nhật');
    } 
    if(res.out_price != 0){
      $('#detail_out_price').text(res.out_price);
    }else{
      $('#detail_out_price').text('Đang cập nhật');
    } 
    if(res.general_price != 0){
      $('#detail_general_price').text(res.general_price);
    }else{
      $('#detail_general_price').text('Đang cập nhật');
    } 
    if(res.sale_price != 0){
      $('#detail_sale_price').text(res.sale_price);
    }else{
      $('#detail_sale_price').text('Đang cập nhật');
    }
  }
});
  $('#detailProduct').modal('show');
})
// Hàm này dùng để reset form khi hide modal
$(document).on('hidden.bs.modal','#detailProduct',function () {
 window.history.pushState("object or string", "Title", '/admin/products');
 $('#slides').empty();
 $('#product-name').empty();
 $('#product-description').empty();
 $('#color-items').empty();
 $('#size-items').empty();
});
 //Xem theo màu
 $(document).on('click','ul#color-items > li a',function(){
  let id = $(this).data('id');
  $('#color-selected').text($(this).text());
  $('ul#color-items > li a').removeClass('active');
  $(this).addClass('active');
  let url = add_filter('color',id);
  $.ajax({
    url: url,
    type:'GET',
    success: function (res) {
      window.history.pushState("object or string", "Title", url);
      if(res.quantities != 0){
       $('#detail_quantity').text(res.quantities);
     }else{
      $('#detail_quantity').text("Tạm hết hàng");
    }
    $('#detail_in_price').text(res.in_price);
    $('#detail_out_price').text(res.out_price);
    $('#detail_general_price').text(res.general_price);
    if(res.sale_price != 0){
      $('#detail_sale_price').text(res.sale_price);
    }else{
      $('#detail_sale_price').text('Đang cập nhật');
    }
  }
});
})
  //Xem theo kích thước
  $(document).on('click','ul#size-items > li a',function(){
    let id = $(this).data('id');
    $('#size-selected').text($(this).text());
    $('ul#size-items > li a').removeClass('active');
    $(this).addClass('active');
    let url = add_filter('size',id);
    $.ajax({
      url: url,
      type:'GET',
      success: function (res) {
       window.history.pushState("object or string", "Title", url);
       if(res.quantities != 0){
         $('#detail_quantity').text(res.quantities);
       }else{
        $('#detail_quantity').text("Tạm hết hàng");
      }
      $('#detail_in_price').text(res.in_price);
      $('#detail_out_price').text(res.out_price);
      $('#detail_general_price').text(res.general_price);
      if(res.sale_price != 0){
        $('#detail_sale_price').text(res.sale_price);
      }else{
        $('#detail_sale_price').text('Đang cập nhật');
      }
    }
  });
  });
  // Hàm này dùng để thêm bộ lọc
  function add_filter(option,value) {
    //Lấy url hiện tại
    let url = window.location.href;
    //tách url thành mảng
    let arr = url.split('/');
    //Lọc phần tử null hoặc trống khỏi mảng
    arr = arr.filter(function (el) {
      return el != null && el != '';
    });
    //kiểm tra xem url có bộ lọc nào hay chưa
    if(url.indexOf('?') == -1){
      //Nếu chưa có thì cộng cuỗi
      url += '/?'+option+'='+value;
    }else{
      //có bộ lọc và đã có sort
      if (url.indexOf(option+'=')!=-1)
      {
        arr = arr[arr.length-1].split('&');
        $.each(arr, function( index, value_ ) {
          if(value_.indexOf(option+'=')!=-1){
            if (index == 0) {
              url = url.replace(value_, '?'+option+'='+value);
            } else {
              url = url.replace(value_, option+'='+value);
            }
            return false;
          }
        });
      }
      //có bộ lọc và không có sort
      else{
        arr = arr[arr.length-1].split('&');
        $.each(arr, function( index, value_ ) {
          if(value_.indexOf('page=')!=-1){
            url = url.replace(value_, 'products/?');
            return false;
          }
        });
        url += '&'+option+'='+value;
      }
    }
    return url;
  }
});