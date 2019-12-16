$(document).ready(function () {
	 //set up csrf
	 $.ajaxSetup({
	 	headers: {
	 		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	 	}
	 });
	 //Hiển thị thumbnail sản phẩm trong selection
	 function formatState (opt) {
	 	if (!opt.id) {
	 		return opt.text.toUpperCase();
	 	} 

	 	var optimage = $(opt.element).attr('data-image'); 
	 	console.log(optimage)
	 	if(!optimage){
	 		return opt.text.toUpperCase();
	 	} else {                    
	 		var $opt = $(
	 			'<span><img src="' + optimage + '" /> ' + opt.text.toUpperCase() + '</span>'
	 			);
	 		return $opt;
	 	}
	 };
	//dựng select 2
	$('.select2').select2({
		templateResult: formatState,
		templateSelection: formatState
	});
// ảnh sản phẩm
$.fn.filemanager = function(type, options) {
	type = type || 'file';
	this.on('click', function(e) {
		let route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
		localStorage.setItem('target_input', $(this).data('input'));
		let preview =  $(this).data('preview');
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
target_input.value += url;
$('#'+preview).attr('src',url);
// target_preview.src = url;
//set or change the preview image src
};
//Dùng khi sửa thông tin sản phẩm
return false;
});
};
$('#1920X1056-preview').filemanager('image');
$('#540X494-preview').filemanager('image');
$('#540X340-preview').filemanager('image');
$('#450X362-preview').filemanager('image');
})