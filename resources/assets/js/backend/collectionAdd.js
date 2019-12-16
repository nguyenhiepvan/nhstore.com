$(document).ready(function () {
//Thêm mới bộ sưu tập:
$(document).on('submit','#collectionsForm',function () {
	let form = $(this)[0];
	let formData = new FormData(form);
	$.ajax({
		url:'/admin/collections',
		type:'post',
		data:formData,
		processData:false,
		contentType:false,
		success: function () {
			Swal.fire({
				position: 'center',
				type: 'success',
				title: 'Đã thêm bộ sưu tập',
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
			// $('html, body').animate({ scrollTop: 0 }, 'slow', function () {
			// });
		}
	});
})
})