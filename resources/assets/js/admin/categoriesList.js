$(document).ready(function () {
	 // Lấy dữ liệu danh mục
	 var categoriesTable = $('#category-table').DataTable({
	 	processing: true,
	 	serverSide: true,
	 	ajax: "/admin/categories",
	 	columns: [
	 	{data: 'DT_RowIndex', name: 'DT_RowIndex'},
	 	{data: 'name', name: 'name'},
	 	{data: 'parent', name: 'parent'},
	 	{data: 'products', name: 'products'},
	 	{data: 'user', name: 'user'},
	 	{data: 'created_at', name: 'created_at'},
	 	{data: 'status', name: 'status', searchable: false},
	 	{data: 'action', name: 'action', orderable: false, searchable: false},
	 	],
	 	"oLanguage": { "sUrl": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Vietnamese.json" },
	 	fnDrawCallback:function (oSettings) {
      		// Đoạn này dùng để set up checkbox
      		let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
      		elems.forEach(function(html) {
      			let switchery = new Switchery(html,  { size: 'big' });
      		});
      	}
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
	   			categoriesTable.ajax.reload(null, false );
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
	})