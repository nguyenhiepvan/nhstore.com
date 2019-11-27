@extends('homework.master')
@section('css')
<!-- DataTables -->
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<style type="text/css">
	.tdclolumn{
		text-align: center;
	}
	.error{
		color: red;
		font-style: italic;
	}
</style>
@endsection
@section('content')
<div class="container">
	<button type="button" class="btn btn-primary reset" data-toggle="modal" data-target="#addUser">
		Thêm mới
	</button>
	<div class="table-responsive">
		<table class="table table-hover" id="user-table">
			<thead>
				<tr>
					<th>Stt</th>
					<th>Họ và tên</th>
					<th>Email</th>
					<th>Thời gian tạo tài khoản</th>
					<th>Cập nhật gần nhất</th>
					<th></th>
				</tr>
			</thead>
		</table>
	</div>
</div>
<!-- add modal -->
<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTitle">Thêm mới</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="javascript:;" id="userForm" class="form" method="POST" role="form">
				@csrf
				<div class="modal-body">
					<div class="form-group">
						<label for="name">Họ và tên</label>
						<input type="text" id="name-input" name="name" class="form-control" placeholder="John e.g" required>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" id="email-input" name="email" class="form-control" placeholder="example@email" required>
						<span class="error"></span>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
					<button type="submit" class="btn btn-primary">Lưu lại</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- edit modal -->
<div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTitle">Cập nhật người dùng</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="javascript:;" id="userUpdateForm" class="form" method="POST" role="form">
				@csrf
				@method('PUT')
				<div class="modal-body">
					<div class="form-group">
						<label for="name">Họ và tên</label>
						<input type="text" id="name-edit-input" name="name" class="form-control" placeholder="John e.g" required>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" id="email-edit-input" name="email" class="form-control" placeholder="example@email" required>
						<span class="error"></span>
					</div>
					<input type="hidden" name="id" id="id">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
					<button type="submit" class="btn btn-primary">Lưu lại</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- view modal -->
<div class="modal fade" id="detailUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTitle">Chi tiết người dùng</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" id="detailUserForm">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
{{-- lấy dữ liệu todo --}}
<script>
	var table = $('#user-table').DataTable({
		processing: true,
		serverSide: true,
		ajax: "{{ route('users.index') }}",
		columns: [
		{data: 'DT_RowIndex', name: 'DT_RowIndex'},
		{data: 'name', name: 'name'},
		{data: 'email', name: 'email'},
		{data: 'created_at', name: 'created_at'},
		{data: 'updated_at', name: 'updated_at'},
		{data: 'action', name: 'action', orderable: false, searchable: false},
		],
		"columnDefs": [
		{ className: "tdclolumn", "targets": [ 0,1,2,3,4,5] },
		],
		"language":{
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
			//Xem chi tiết ghi chú
			$('.detail').click(function () {
				let id = $(this).data('id');
				$.ajax({
					url:'users/'+id,
					type:'get',
					success: function (res) {
						let data = '<strong>Họ và tên: </strong>'+res.name+'<br><strong>Email: </strong>'+res.email+'';
						$('#detailUserForm').html(data);
						$('#detailUserModal').modal('show');
					}
				});
			});
			//Lấy data sửa ghi chú
			$('.edit').click(function () {
				let id = $(this).data('id');
				$.ajax({
					url:'users/'+id+'/edit',
					type:'get',
					success: function (res) {
						$('#name-edit-input').val(res.name);
						$('#email-edit-input').val(res.email);
						$('#id').val(id);
						$('#editUser').modal('show');
					}
				});
			});
			//Xóa user
			$('.delete').click(function () {
				Swal.fire({
					title: 'Bạn chắc chắn xóa?',
					text: "Dữ liệu sẽ không thể khôi phục",
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Tôi chắc chắn!'
				}).then((result) => {
					if (result.value) {
						Swal.fire(
							'Đã xóa!',
							'Bản ghi đã được xóa',
							'success'
							);
						let id = $(this).data('id');
						$.ajax({
							url: 'users/'+id,
							type: 'DELETE',
							success: function () {
								table.ajax.reload();
							}
						});
					}
				})
			});
		},
	});
</script>
{{-- hàm này để thêm user --}}
<script type="text/javascript">
	$(document).on('submit','#userForm',function() {
		let form = $(this)[0];
		let formData = new FormData(form);
		$.ajax({
			url:'/users',
			data:formData,
			type:'post',
			cache:false,
			contentType:false,
			processData:false,
			success: function (res) {
				$('#addUser').modal('hide');
				Swal.fire({
					position: 'center',
					type: 'success',
					title: 'Người dùng mới đã được tạo',
					showConfirmButton: false,
					timer: 1500
				});
				table.ajax.reload();
				$('#userForm').trigger('reset');
			},
			error: function(xhr, status, error)
			{
				$.each(xhr.responseJSON.errors, function (key, item)
				{
					$(".error").append("<p>"+item+"</p>")
				});
			}
		});
	});
</script>
{{-- Hàm này dùng để reset error --}}
<script type="text/javascript">
	$(document).on('click','.reset',function () {
		$('.error').empty();
		$('.form').trigger('reset');
	})
</script>
{{-- hàm này dùng để cập nhật user --}}
<script type="text/javascript">
	$(document).on('submit','#userUpdateForm',function () {
		let form = $(this)[0];
		let formData = new FormData(form);
		let id = formData.get('id');
		formData.append('_method', 'PUT');
		$.ajax({
			url:'users/'+id,
			method: 'POST',
			data: formData,
			processData: false,
			contentType: false,
			success: function (res) {
				$('#editUser').modal('hide');
				Swal.fire({
					position: 'center',
					type: 'success',
					title: 'Thay đổi đã được cập nhật',
					showConfirmButton: false,
					timer: 1500
				});
				table.ajax.reload();
				$('#userUpdateForm').trigger('reset');
			},
			error: function(xhr, status, error)
			{
				$.each(xhr.responseJSON.errors, function (key, item)
				{
					$(".error").append("<p>"+item+"</p>")
				});
			}
		});
	})
</script>
@endsection