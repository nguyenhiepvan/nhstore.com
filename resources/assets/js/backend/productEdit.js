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
$('.save').prop('disabled', false);
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
$('.save').prop('disabled', false);
return false;
});
};
$('#ava-btn').filemanager_('image');
	// Hàm này dùng để lấy và hiển thị dữ liệu sản phẩm ra form sửa:
	$.ajax({
		url:window.location.href,
		type: 'GET',
		success: function (res) {
			$('#name').val(res.product['name']);
			$('#slug').val(res.product['slug']);
			$('#preview-ava').attr('src',res.thumbnail['470X610']);
			$('#avatar').val(res.thumbnail['470X610']);
			let url = '';
			$.each( res.images, function( key, image ) {
				$('#holder').append('<div class="show-image"><button type="button" title="Loại bỏ" class="remove-img" data-target="javascript:;"><i class="fa fa-close"></i></button><div><img src="'+image['470X610']+'" style="margin-top:15px;max-height:100px;"></div></div>');
				url += image['470X610']+";";
			});
			$('#images').val(url);
			$('#materialsSelect').val(res.product['material_id']).trigger('change');
			$('#brandsSelect').val(res.product['brand_id']).trigger('change');
			$('#originsSelect').val(res.product['country_id']).trigger('change');
			$('#suppliersSelect').val(res.product['supplier_id']).trigger('change');
			$('#categoriesSelect').val(res.product['category_id']).trigger('change');
			$('#tagsSelect').val(res.tags).trigger('change');
			$('#colorsSelect').val(res.colors).trigger('change');
			$('#sizesSelect').val(res.sizes).trigger('change');
			$('#general_price').val(res.general_price);
			$('#out_price').val(res.out_price);
			$('#in_price').val(res.in_price);
			CKEDITOR.instances['description'].setData(res.product['description']);
			CKEDITOR.instances['overview'].setData(res.product['overview']);
			$('#btn').prop('disabled', true);
			$('#lfm').filemanager('image');
			$('#ava-btn').filemanager_('image');
		}
	})
// Hàm này để chỉnh sửa sản phẩm
var name_changed = false,slug_changed = false,avatar_changed = false,images_changed = false, material_changed = false, brand_changed = false, country_changed = false, supplier_changed = false, category_changed = false, tag_changed = false, color_changed = false, size_changed = false, overview_changed = false, description_changed = false;
$(document).on('change','#name',function() {
	name_changed = true;
	$('#btn').prop('disabled', false);
});
$(document).on('change','#slug',function() {
	slug_changed = true;
	$('#btn').prop('disabled', false);
});
$(document).on('change','#preview-ava',function() {
	avatar_changed = true;
	$('#btn').prop('disabled', false);
});
$(document).on('change','#images',function() {
	images_changed = true;
	$('#btn').prop('disabled', false);
});
$(document).on('select2:selecting','#materialsSelect',function() {
	material_changed = true;
	$('#btn').prop('disabled', false);
});
$(document).on('select2:selecting','#brandsSelect',function() {
	brand_changed = true;
	$('#btn').prop('disabled', false);
});
$(document).on('select2:selecting','#originsSelect',function() {
	country_changed = true;
	$('#btn').prop('disabled', false);
});
$(document).on('select2:selecting','#suppliersSelect',function() {
	supplier_changed = true;
	$('#btn').prop('disabled', false);
});
$(document).on('select2:selecting','#categoriesSelect',function() {
	category_changed = true;
	$('#btn').prop('disabled', false);
});
$(document).on('select2:selecting','#tagsSelect',function() {
	tag_changed = true;
	$('#btn').prop('disabled', false);
});
$(document).on('select2:unselecting','#tagsSelect',function() {
	tag_changed = true;
	$('#btn').prop('disabled', false);
});
CKEDITOR.instances.overview.on('change',function() {
	overview_changed = true;
	$('#btn').prop('disabled', false);
});
CKEDITOR.instances.description.on('change',function() {
	description_changed = true;
	$('#btn').prop('disabled', false);
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
	formData.append('name', $('#name').val());
	formData.append('slug', $('#slug').val());
};
if(slug_changed ){
	formData.append('slug', $('#slug').val());
};
if(avatar_changed ){
	formData.append('thumbnail', $('#avatar').val());
};
if(images_changed ){
	formData.append('images', $('#images').val());
};
if(material_changed ){
	formData.append('material_id', $('#materialsSelect').val());
};
if(brand_changed ){
	formData.append('brand_id', $('#brandsSelect').val());
};
if(country_changed ){
	formData.append('country_id', $('#originsSelect').val());
};
if(supplier_changed ){
	formData.append('supplier_id', $('#suppliersSelect').val());
};
if(category_changed ){
	formData.append('category_id', $('#categoriesSelect').val());
};
if(tag_changed ){
	formData.append('tag_id', $('#tagsSelect').val());
};
if(color_changed ){
	formData.append('color_id', $('#colorsSelect').val());
};
if(size_changed ){
	formData.append('size_id', $('#sizesSelect').val());
};
if(overview_changed ){
	formData.append('overview', CKEDITOR.instances['overview'].getData());
};
if(description_changed ){
	formData.append('description', CKEDITOR.instances['description'].getData());
};
let i = 0;
for (let pair of formData.entries()) {
	i++;
}
if (i>1) {
	let id = window.location.pathname.match(/\d+/);
	$.ajax({
		url:'/admin/products/'+id,
		data: formData,
		type: 'post',
		contentType:false,
		processData:false,
		success: function (res) {
			$('#productModal').modal('hide');
			Swal.fire({
				position: 'center',
				type: 'success',
				title: 'Đã cập nhật sản phẩm',
				showConfirmButton: false,
				timer: 1000
			});
			setTimeout(function(){ window.location.href = "/admin/products"; }, 1000);
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
			$('html, body').animate({ scrollTop: 0 }, 'slow', function () {
		});
		}
	});
}else{
	Swal.fire({
		type: 'error',
		title: 'Oops...',
		text: 'Bạn không thay đổi gì cả',
		showConfirmButton: false,
		timer: 1000
	});
	setTimeout(function(){ window.location.href = "/admin/products"; }, 1000);
}
}
})
})