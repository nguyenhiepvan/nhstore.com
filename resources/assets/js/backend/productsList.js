$(document).ready(function () {
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
let elems = Array.prototype.slice.call(document.querySelectorAll('.product-show'));
elems.forEach(function(html) {
  let switchery = new Switchery(html,  { size: 'big' });
});
}
});
//Kho hàng
var warehouseTable = $('#warehouse-table').DataTable({
  processing: true,
  serverSide: true,
  ajax: "/admin/warehouse",
  columns: [
  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
  {data: 'name', name: 'name'},
  {data: 'color', name: 'color'},
  {data: 'size', name: 'size'},
  {data: 'quantity', name: 'quantity'},
  {data: 'in_price', name: 'in_price'},
  {data: 'out_price', name: 'out_price'},
  {data: 'sale_price', name: 'sale_price'},
    // {data: 'status', name: 'status', orderable: false, searchable: false},
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
  });
//Thùng rác
var trashTable = $('#trash-table').DataTable({
  processing: true,
  serverSide: true,
  ajax: "/admin/trash",
  columns: [
  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
  {data: 'name', name: 'name'},
  {data: 'user', name: 'user'},
  {data: 'deleted_at', name: 'deleted_at'},
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
});
// ckeditor
let options ={
  filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
  filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
  filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
  filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
  language: 'vi',
};
CKEDITOR.replace('description-edit',options);
CKEDITOR.replace('overview-edit' ,{
      // Define the toolbar groups as it is a more accessible solution.
      toolbarGroups: [{
        "name": "basicstyles",
        "groups": ["basicstyles"]
      },
      {
        "name": "links",
        "groups": ["links"]
      },
      {
        "name": "paragraph",
        "groups": ["list", "blocks"]
      },
      {
        "name": "document",
        "groups": ["mode"]
      },
      {
        "name": "insert",
        "groups": ["insert"]
      },
      {
        "name": "styles",
        "groups": ["styles"]
      }
      ],
      // Remove the redundant buttons from toolbar groups defined above.
      removeButtons: 'About,Image,Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
    });
CKEDITOR.editorConfig=function( config ){ config.resize_enabled=false;};
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
target_input.value += url+";";
//set or change the preview image src
$('#holder').append('<div class="show-image"><button type="button" title="Loại bỏ" class="remove-img" data-target="javascript:;"><i class="fa fa-close"></i></button><div><img src="'+url+'" style="margin-top:15px;max-height:100px;"></div></div>');
//Dùng khi sửa thông tin sản phẩm
$('#holder-edit').append('<div class="show-image"><button type="button" title="Loại bỏ" class="remove-img" data-target="javascript:;"><i class="fa fa-close"></i></button><div><img src="'+url+'" style="margin-top:15px;max-height:100px;"></div></div>');
};
//Dùng khi sửa thông tin sản phẩm
images_changed = true;
$('#btn-edit').prop('disabled', false);
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
//Dùng khi sửa thông tin sản phẩm
avatar_changed = true;
$('#btn-edit').prop('disabled', false);
return false;
});
};
$('#ava-btn').filemanager_('image');
// Loại bỏ ảnh sản phẩm
$(document).on('click','.remove-img',function () {
  let value = $('#images').val();
  let src = $(this).parent().find('img').attr('src');
  value = value.replace(src +';', "");
  $('#images').val(value);
//Dùng khi sửa thông tin sản phẩm
value = $('#images-edit').val();
value = value.replace(src +';', "");
$('#images-edit').val(value);
images_changed = true;
$('#btn-edit').prop('disabled', false);
$(this).parent().find('img').remove();
$(this).remove();
});
// Hàm này dùng để reset form khi hide modal
$(document).on('hidden.bs.modal','#productEditModal',function () {
  $('#productEditForm').trigger("reset");
  $('#preview-ava-edit').attr({ "src": "" });
  $('.select2').val(null).trigger('change');
  CKEDITOR.instances.description.setData('');
  $('#holder').empty();
  $('#holder-edit').empty();
  $('.slug').val('');
  $('.acronym').val('');
});

// Hàm này dùng để format giá tiền nhập vào:
$("input[data-type='currency']").on({
  keyup: function() {
    formatCurrency($(this));
  },
  blur: function() {
    formatCurrency($(this), "blur");
  }
});
function formatNumber(n) {
// format number 1000000 to 1,234,567
return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}
function formatCurrency(input, blur) {
// appends $ to value, validates decimal side
// and puts cursor back in right position.
// get input value
let input_val = input.val();
// don't validate empty input
if (input_val === "") { return; }
// original length
let original_len = input_val.length;
// initial caret position
let caret_pos = input.prop("selectionStart");
// check for decimal
if (input_val.indexOf(".") >= 0) {
// get position of first decimal
// this prevents multiple decimals from
// being entered
let decimal_pos = input_val.indexOf(".");
// split number by decimal point
let left_side = input_val.substring(0, decimal_pos);
let right_side = input_val.substring(decimal_pos);
// add commas to left side of number
left_side = formatNumber(left_side);
// validate right side
right_side = formatNumber(right_side);
// Limit decimal to only 2 digits
right_side = right_side.substring(0, 2);
// join number by .
input_val = left_side + "." + right_side;
} else {
// no decimal entered
// add commas to number
// remove all non-digits
input_val = formatNumber(input_val);
input_val = input_val;
}
// send updated string to input
input.val(input_val);
// put caret back in the right position
let updated_len = input_val.length;
caret_pos = updated_len - original_len + caret_pos;
input[0].setSelectionRange(caret_pos, caret_pos);
}
// Hàm này dùng để lấy và hiển thị dữ liệu sản phẩm ra form sửa:
$(document).on('click','.edit',function () {
  let id = $(this).data('id');
  $.ajax({
    url:'/admin/products/'+id+'/edit',
    type: 'GET',
    success: function (res) {
      $('#name-edit').val(res.product['name']);
      $('#slug-edit').val(res.product['slug']);
      $('#acronym-edit').val(res.product['acronym']);
      $('#preview-ava-edit').attr('src',res.thumbnail[0]['470X610']);
      $('#avatar-edit').val(res.thumbnail[0]['470X610']);
      let url = '';
      $.each( res.images, function( key, image ) {
        $('#holder-edit').append('<div class="show-image"><button type="button" title="Loại bỏ" class="remove-img" data-target="javascript:;"><i class="fa fa-close"></i></button><div><img src="'+image['470X610']+'" style="margin-top:15px;max-height:100px;"></div></div>');
        url += image['470X610']+";";
      });
      $('#images-edit').val(url);
      $('#materialsSelectEdit').val(res.product['material_id']).trigger('change');
      $('#brandsSelectEdit').val(res.product['brand_id']).trigger('change');
      $('#originsSelectEdit').val(res.product['country_id']).trigger('change');
      $('#suppliersSelectEdit').val(res.product['supplier_id']).trigger('change');
      $('#categoriesSelectEdit').val(res.product['category_id']).trigger('change');
      $('#tagsSelectEdit').val(res.tags).trigger('change');
      $('#colorsSelectEdit').val(res.colors).trigger('change');
      $('#sizesSelectEdit').val(res.sizes).trigger('change');
      $('#general_price').val(res.general_price);
      $('#out_price').val(res.out_price);
      $('#in_price').val(res.in_price);
      CKEDITOR.instances['description-edit'].setData(res.product['description']);
      CKEDITOR.instances['overview-edit'].setData(res.product['overview']);
      $('#productEditForm').data('id',id);
      $('#btn-edit').prop('disabled', true);
      $('#lfm-edit').filemanager('image');
      $('#ava-btn-edit').filemanager_('image');
      $('#productEditModal').modal('show');
    }
  })
})
// Hàm này để chỉnh sửa sản phẩm
var name_changed = false,slug_changed = false,acronym_changed = false,avatar_changed = false,images_changed = false, material_changed = false, brand_changed = false, country_changed = false, supplier_changed = false, category_changed = false, tag_changed = false, color_changed = false, size_changed = false, price_in_changed = false, price_out_changed = false, price_general_changed = false, overview_changed = false, description_changed = false;
$(document).on('change','#name-edit',function() {
  name_changed = true;
  $('#btn-edit').prop('disabled', false);
});
$(document).on('change','#slug-edit',function() {
  slug_changed = true;
  $('#btn-edit').prop('disabled', false);
});
$(document).on('change','#acronym-edit',function() {
  acronym_changed = true;
  $('#btn-edit').prop('disabled', false);
});
$(document).on('change','#preview-ava-edit',function() {
  avatar_changed = true;
  $('#btn-edit').prop('disabled', false);
});
$(document).on('change','#images-edit',function() {
  images_changed = true;
  $('#btn-edit').prop('disabled', false);
});
$(document).on('select2:selecting','#materialsSelectEdit',function() {
  material_changed = true;
  $('#btn-edit').prop('disabled', false);
});
$(document).on('select2:selecting','#brandsSelectEdit',function() {
  brand_changed = true;
  $('#btn-edit').prop('disabled', false);
});
$(document).on('select2:selecting','#originsSelectEdit',function() {
  country_changed = true;
  $('#btn-edit').prop('disabled', false);
});
$(document).on('select2:selecting','#suppliersSelectEdit',function() {
  supplier_changed = true;
  $('#btn-edit').prop('disabled', false);
});
$(document).on('select2:selecting','#categoriesSelectEdit',function() {
  category_changed = true;
  $('#btn-edit').prop('disabled', false);
});
$(document).on('select2:selecting','#tagsSelectEdit',function() {
  tag_changed = true;
  $('#btn-edit').prop('disabled', false);
});
$(document).on('select2:selecting','#colorsSelectEdit',function() {
  color_changed = true;
  $('#btn-edit').prop('disabled', false);
});
$(document).on('select2:selecting','#sizesSelectEdit',function() {
  size_changed = true;
  $('#btn-edit').prop('disabled', false);
});
$(document).on('change','#in_price',function() {
  price_in_changed = true;
  $('#btn-edit').prop('disabled', false);
});
$(document).on('change','#out_price',function() {
  price_out_changed = true;
  $('#btn-edit').prop('disabled', false);
});
$(document).on('change','#general_price',function() {
  price_general_changed = true;
  $('#btn-edit').prop('disabled', false);
});
$(document).on('change','#overview-edit',function() {
  overview_changed = true;
  $('#btn-edit').prop('disabled', false);
});
$(document).on('change','#description-edit',function() {
  description_changed = true;
  $('#btn-edit').prop('disabled', false);
});
$("#productEditForm").validator().on("submit", function (event) {
  if (event.isDefaultPrevented()) {
    Swal.fire({
      type: 'error',
      title: 'Oops...',
      text: 'Bạn chưa nhập đủ dữ liệu bắt buộc',
      showConfirmButton: false,
      timer: 1000
    });
  }
  else {
// everything looks good!
let formData = new FormData();
formData.append('_method', 'PUT');
if(name_changed ){
  formData.append('name', $('#name-edit').val());
};
if(slug_changed ){
  formData.append('slug', $('#slug-edit').val());
};
if(acronym_changed ){
  formData.append('acronym', $('#acronym-edit').val());
};
if(avatar_changed ){
  formData.append('thumbnail', $('#avatar-edit').val());
};
if(images_changed ){
  formData.append('images', $('#images-edit').val());
};
if(material_changed ){
  formData.append('material_id', $('#materialsSelectEdit').val());
};
if(brand_changed ){
  formData.append('brand_id', $('#brandsSelectEdit').val());
};
if(country_changed ){
  formData.append('country_id', $('#originsSelectEdit').val());
};
if(supplier_changed ){
  formData.append('supplier_id', $('#suppliersSelectEdit').val());
};
if(category_changed ){
  formData.append('category_id', $('#categoriesSelectEdit').val());
};
if(tag_changed ){
  formData.append('tag_id', $('#tagsSelectEdit').val());
};
if(color_changed ){
  formData.append('color_id', $('#colorsSelectEdit').val());
};
if(size_changed ){
  formData.append('size_id', $('#sizesSelectEdit').val());
};
if(price_in_changed ){
  formData.append('in_price', $('#in_price').val());
};
if(price_out_changed || price_general_changed|| overview_changed){
  formData.append('out_price', $('#out_price').val());
  formData.append('general_price', $('#general_price').val());
  formData.append('overview', $('#overview-edit').val());
};
if(description_changed ){
  formData.append('description', CKEDITOR.instances['description-edit'].getData());
};
let i = 0;
for (let pair of formData.entries()) {
  i++;
}
if (i>1) {
  $.ajax({
    url:'/admin/products/'+$(this).data('id'),
    data: formData,
    type: 'post',
    contentType:false,
    processData:false,
    success: function (res) {
      $('#productEditModal').modal('hide');
      Swal.fire({
        position: 'center',
        type: 'success',
        title: 'Đã cập nhật sản phẩm',
        showConfirmButton: false,
        timer: 1000
      });
      productsTable.ajax.reload(null, false );
    },
    error: function(xhr, status, errors)
    {
      Swal.fire({
        type: 'error',
        title: 'Oops...',
        text: 'Kiểm tra lại dữ liệu',
        showConfirmButton: false,
        timer: 1000
      });
      $.each(xhr.responseJSON.errors, function (key, item)
      {
        $(".errors_"+key).append("<p class='text-red'>"+item+"</p>")
      });
    }
  });
}
}
})
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
          trashTable.ajax.reload(null, false );
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
      $.each(res.colors, function( index, value ) {
        $('#color-items').append('<li><a type="button" href="javascript:;" data-id="'+value['id']+'" class="color">'+value['name']+'</a></li>');
      });
      $.each(res.sizes, function( index, value ) {
        $('#size-items').append('<li><a type="button" href="javascript:;" data-id="'+value['id']+'" class="size">'+value['name']+'</a></li>');
      });
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