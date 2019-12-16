$(document).ready(function () {
	//Lấy dữ liệu form sửa
	let url = window.location.href;
	$.ajax({
		url: url,
		type:'get',
		success:function (res) {
			$.each(res.items,function (key,item) {
				$('#top').trigger('click');
				setTimeout(function(){
					$('#in-receipts-form-table tbody tr:eq('+key+') td .productsSelect').val(item['product_id']);
					$('#in-receipts-form-table tbody tr:eq('+key+') td .productsSelect').select2().trigger('change');
					$('#in-receipts-form-table tbody tr:eq('+key+') td .colorsSelect').val(item['color_id']);
					$('#in-receipts-form-table tbody tr:eq('+key+') td .colorsSelect').select2().trigger('change');
					$('#in-receipts-form-table tbody tr:eq('+key+') td .sizesSelect').val(item['size_id']);
					$('#in-receipts-form-table tbody tr:eq('+key+') td .sizesSelect').select2().trigger('change');
					$('#in-receipts-form-table tbody tr:eq('+key+') .quantities input').val(item['quantities']);
					$('#in-receipts-form-table tbody tr:eq('+key+') .unit-price input').val(item['price']);
					$('#in-receipts-form-table tbody tr:eq('+key+') .sub-total').text(item['price']*item['quantities']);
				}, 1000);
			});
		}
	});
	//Cập nhật hóa đơn:
	$(document).on('submit','#warehouseForm',function () {	
		Swal.fire({
			title: 'Xác nhận cập nhật hóa đơn?',
			text: "Bạn sẽ cập nhật lại số lượng sản phẩm trong kho!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Xác nhận',
			cancelButtonText: 'Hủy bỏ',
		}).then((result) => {
			if (result.value) {
				let id = window.location.pathname.match(/\d+/);
				let form = $(this)[0];
				let formData = new FormData(form);
				formData.append('_method','PUT');
				$.ajax({
					url:'/admin/in-receipts/'+id,
					data: formData,
					type: 'post',
					contentType:false,
					processData:false,
					success: function (res) {
						Swal.fire({
							position: 'center',
							type: 'success',
							title: 'Đã cập nhật hóa đơn',
							showConfirmButton: false,
							timer: 1000
						});
						setTimeout(function(){ window.location.href = "/admin/in-receipts"; }, 1000);
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
		})
	})
})