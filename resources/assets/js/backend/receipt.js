$(document).ready(function () {
	// ckeditor
	let options ={
		filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
		filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
		filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
		filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
		language: 'vi',
	};
	CKEDITOR.replace('description',options);
	CKEDITOR.replace('overview' ,{
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
			$('#materialsSelect').val(res.id);
			$('#materialsSelect').select2().trigger('change');
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
			$('#parentSelect').append('<option data-acroym="'+res.acronym+'" value="'+res.id+'">'+res.name+'</option>');
			$('#categoriesSelect').select2();
			$('#parentSelect').select2();
			$('#categoriesSelect').val(res.id);
			$('#categoriesSelect').select2().trigger('change');
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
			let my_veriable = $('#tagsSelect').select2().val();
			my_veriable.push(""+res.id);
			$('#tagsSelect').val(my_veriable);
			$('#tagsSelect').select2().trigger('change');
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
$(document).on('submit','#colorAddForm',function () {
	let form = $(this)[0];
	let formData = new FormData(form);
	$.ajax({
		url:'/admin/colors',
		data: formData,
		type: 'post',
		contentType:false,
		processData:false,
		success: function (res) {
			$('#colorModal').modal('hide');
			$('.error').empty();
			Swal.fire({
				position: 'center',
				type: 'success',
				title: 'Đã thêm màu sắc',
				showConfirmButton: false,
				timer: 1000
			});
			$('#colorsSelect').append('<option data-acroym="'+res.acronym+'" value="'+res.id+'">'+res.name+'</option>');
			$('#colorsSelect').select2();
			$('#colorsSelect').val(res.id);
			$('#colorsSelect').select2().trigger('change');
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
// Hàm này dùng để tạo ra kích thước
$(document).on('submit','#sizeAddForm',function () {
	let form = $(this)[0];
	let formData = new FormData(form);
	$.ajax({
		url:'/admin/sizes',
		data: formData,
		type: 'post',
		contentType:false,
		processData:false,
		success: function (res) {
			$('#sizeModal').modal('hide');
			$('.error').empty();
			Swal.fire({
				position: 'center',
				type: 'success',
				title: 'Đã thêm kích thước',
				showConfirmButton: false,
				timer: 1000
			});
			$('#sizesSelect').append('<option data-acroym="'+res.acronym+'" value="'+res.id+'">'+res.name+'</option>');
			$('#sizesSelect').select2();
			$('#sizesSelect').val(res.id);
			$('#sizesSelect').select2().trigger('change');
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
			$('.error').empty();
			Swal.fire({
				position: 'center',
				type: 'success',
				title: 'Đã thêm xuất xứ',
				showConfirmButton: false,
				timer: 1000
			});
			$('#originsSelect').append('<option data-acroym="'+res.acronym+'" value="'+res.id+'">'+res.name+'</option>');
			$('#originsSelect').select2();
			$('#originsSelect').val(res.id);
			$('#originsSelect').select2().trigger('change');
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
			$('.error').empty();
			Swal.fire({
				position: 'center',
				type: 'success',
				title: 'Đã thêm xuất xứ',
				showConfirmButton: false,
				timer: 1000
			});
			$('#brandsSelect').append('<option data-acroym="'+res.acronym+'" value="'+res.id+'">'+res.name+'</option>');
			$('#brandsSelect').select2();
			$('#brandsSelect').val(res.id);
			$('#brandsSelect').select2().trigger('change');
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
			$('.error').empty();
			Swal.fire({
				position: 'center',
				type: 'success',
				title: 'Đã thêm nhà phân phối',
				showConfirmButton: false,
				timer: 1000
			});
			$('#suppliersSelect').append('<option data-acroym="'+res.acronym+'" value="'+res.id+'">'+res.name+'</option>');
			$('#suppliersSelect').select2();
			$('#suppliersSelect').val(res.id);
			$('#suppliersSelect').select2().trigger('change');
		},
		error: function(xhr, status, errors)
		{
			$.each(xhr.responseJSON.errors, function (key, item)
			{
				$(".errors_"+key).append("<p class='text-red'>"+item+"</p>")
			});
		}
	});
	// Hàm này dùng để reset form khi hide modal
	$(document).on('hidden.bs.modal','#productModal',function () {
		$('#productAddForm').trigger("reset");
		$('#preview-ava').attr({ "src": "" });
		$('#productModal.select2').val(null);
		$('#productModal.select2').select2().trigger('change');
		CKEDITOR.instances.description.setData('');
		$('#holder').empty();
		$('#holder-edit').empty();
		$('#productModal.slug').val('');
		$('#productModal.acronym').val('');
	});
});
// Hàm này để tạo ra sản phẩm mới
$("#productAddForm").validator().on("submit", function (event) {
	if (event.isDefaultPrevented()) {
		Swal.fire({
			type: 'error',
			title: 'Oops...',
			text: 'Bạn chưa nhập đủ dữ liệu bắt buộc',
			showConfirmButton: false,
			timer: 1000
		});
	} else {
// everything looks good!
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
// productsTable.ajax.reload(null, false );
// warehouseTable.ajax.reload(null, false );
// location.reload();
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
});
//Hàm này dùng để scroll modal khi nhiều modal mở:
$(document).on('hidden.bs.modal', '.modal', function () {
	$('.modal:visible').length && $(document.body).addClass('modal-open');
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
//Lấy dữ liệu hóa đơn:
var in_receiptsTable = $('#in-receipts-table').DataTable({
	processing: true,
	serverSide: true,
	ajax: "/admin/in-receipts",
	columns: [
	{data: 'DT_RowIndex', name: 'DT_RowIndex'},
	{data: 'code', name: 'code'},
	{data: 'created_at', name: 'created_at'},
	{data: 'user', name: 'user'},
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
	}
});
//dựng select 2
$('.select2').select2();
// Thêm dòng:
window.globalCounter = 2;
$(document).on('click','.add-row',function () {
	$.ajax({
		url:'/admin/in-receipts/create?index='+(window.globalCounter++),
		type:'GET',
		success:function (res) {
			$('#in-receipts-form-table tbody').append(res.row);
			$('.select2').select2();
			// Hàm này dùng để format giá tiền nhập vào:
			$("input[data-type='currency']").on({
				keyup: function() {
					formatCurrency($(this));
				},
				blur: function() {
					formatCurrency($(this), "blur");
				}
			});
		}
	});
});
//reset khi hide modal
// $(document).on('hidden.bs.modal','#warehouseModal',function () {
// 	$('#row-0').css('display','');
// 	$('#row-0 select').prop('required',true);
// 	reset_stt();
// 	$('#warehouseForm').trigger("reset");
// 	$('#add-row').data('target',1);
// 	$('#productsSelect-0').val(null);
// 	$('#productsSelect-0').select2().trigger('change');
// 	for (let i = 1; i < 20; i++) {
// 		$('#row-'+i).css('display','none');
// 		// $('#row-'+i+' select').prop('required',false);
// 		$('#productsSelect-'+i).val(null);
// 		$('#productsSelect-'+i).select2().trigger('change');
// 		$('#colorsSelect-'+i).val(null);
// 		$('#colorsSelect-'+i).select2().trigger('change');
// 		$('#sizesSelect-'+i).val(null);
// 		$('#sizesSelect-'+i).select2().trigger('change');
// 	}
// });
//Xóa dòng:
$(document).on('click','.remove-row',function (ev) {
	let $currentTableRow = $(ev.currentTarget).parents('tr')[0];
	$currentTableRow.remove();
	window.globalCounter--;
	$('#in-receipts-form-table').find('tr').each(function (index) {
		let firstTDDomEl = $(this).find('td')[0];
		let $firstTDJQObject = $(firstTDDomEl);
		$firstTDJQObject.text(index);
	});
});
//Tính thành tiền:
$(document).on('input','.unit-price',function (ev) {
	// alert('aaaaa');
	let quantity = $(this).closest('tr').find('td.quantity input').val();
	quantity = parseInt(quantity.replace(/[^0-9.-]+/g,""));
	let unit_price = $(this).closest('tr').find('.unit-price input').val();
	unit_price = parseInt(unit_price.replace(/[^0-9.-]+/g,""));
	let sub = unit_price*quantity;
	$(this).closest('tr').find('.sub-total').text(formatNumber(''+sub));
});
$(document).on('input','.quantity',function (ev) {
	// alert('aaaaa');
	let quantity = $(this).closest('tr').find('td.quantity input').val();
	quantity = parseInt(quantity.replace(/[^0-9.-]+/g,""));
	let unit_price = $(this).closest('tr').find('.unit-price input').val();
	unit_price = parseInt(unit_price.replace(/[^0-9.-]+/g,""));
	let sub = unit_price*quantity;
	$(this).closest('tr').find('.sub-total').text(formatNumber(''+sub));
});
//Tạo ra hóa đơn mới:
$(document).on('submit','#warehouseForm',function () {
	$('.errors').empty();
	let form = $(this)[0];
	let formData = new FormData(form);
	$.ajax({
		url:'/admin/in-receipts?type=0',
		type:'POST',
		data:formData,
		processData:false,
		contentType:false,
		success:function () {
			Swal.fire({
				position: 'center',
				type: 'success',
				title: 'Đã thêm hóa đơn',
				showConfirmButton: false,
				timer: 1000
			});
			in_receiptsTable.ajax.reload(null, false );
			$('#warehouseModal').modal('hide');
		},
		error: function(xhr, status, errors)
		{
			$.each(xhr.responseJSON.errors, function (key, item)
			{
				let index = key.replace(/[^\d.]/g,'');
				let k = key.slice(0,-2);
				index = index.replace('.','');
				$('#in-receipts-form-table tbody tr:eq('+index+') td .errors_'+k+'')
				.append("<p class='text-red'>"+item+"</p>");
			});
		}
	});
})
});