$(document).ready(function () {
	$('#top').trigger('click');
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
				setTimeout(function(){ window.history.back(); }, 1000);
			},
			error: function(xhr, status, errors)
			{
				$.each(xhr.responseJSON.errors, function (key, item)
				{
					if(key == 'code'){
						$('.errors_code').append("<p class='text-red'>"+item+"</p>");
					}
					let index = key.replace(/[^\d.]/g,'');
					let k = key.slice(0,-2);
					index = index.replace('.','');
					$('#in-receipts-form-table tbody tr:eq('+index+') td .errors_'+k+'')
					.append("<p class='text-red'>"+item+"</p>");
				});
				$('html, body').animate({ scrollTop: 0 }, 'slow', function () {
				});
			}
		});
	});
})