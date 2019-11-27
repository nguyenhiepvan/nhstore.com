$(document).ready(function function_name(argument) {
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
		Swal.fire({
			position: 'center',
			type: 'success',
			title: 'Đã thêm sản phẩm',
			showConfirmButton: false,
			timer: 1000
		});
		setTimeout(function(){ window.history.back(); }, 1000);
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
}
});
})