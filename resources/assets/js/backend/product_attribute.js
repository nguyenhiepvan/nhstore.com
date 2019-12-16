$(document).ready(function () {
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
				$('#materialsSelect').append('<option  value="'+res.id+'">'+res.name+'</option>');
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
			$('#categoriesSelect').append('<option  value="'+res.id+'">'+res.name+'</option>');
			$('#parentSelect').append('<option  value="'+res.id+'">'+res.name+'</option>');
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
			$('#tagsSelect').append('<option  value="'+res.id+'">'+res.name+'</option>');
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
			$('#originsSelect').append('<option  value="'+res.id+'">'+res.name+'</option>');
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
			$('#brandsSelect').append('<option  value="'+res.id+'">'+res.name+'</option>');
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
			$('#suppliersSelect').append('<option  value="'+res.id+'">'+res.name+'</option>');
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
	});
});
})