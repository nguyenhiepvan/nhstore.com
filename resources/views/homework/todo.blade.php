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
</style>
@endsection
@section('content')
<div class="container">
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTodo">
		Thêm mới
	</button>
	<div class="table-responsive">
		<table class="table table-hover" id="todo-table">
			<thead>
				<tr>
					<th>Stt</th>
					<th>Ghi chú</th>
					<th>Thời gian tạo</th>
					<th>Đã xong?</th>
					<th></th>
				</tr>
			</thead>
		</table>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="addTodo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTitle">Thêm mới</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="javascript:;" id="todoForm" method="POST" role="form">
				@csrf
				<div class="modal-body">
					<div class="form-group">
						<label for="todo">Ghi chú</label>
						<input type="text" id="todo-input" name="todo" class="form-control" placeholder="Tiếp theo là gì?" required>
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
@endsection
@section('script')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
{{-- lấy dữ liệu todo --}}
<script>
	var table = $('#todo-table').DataTable({
		processing: true,
		serverSide: true,
		ajax: "{{ route('todos.index') }}",
		columns: [
		{data: 'DT_RowIndex', name: 'DT_RowIndex'},
		{data: 'todo', name: 'todo'},
		{data: 'created_at', name: 'created_at'},
		{data: 'done', name: 'done'},
		{data: 'action', name: 'action', orderable: false, searchable: false},
		],
		"columnDefs": [
		{ className: "tdclolumn", "targets": [ 0,1,2,3,4 ] }
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
			// Đoạn này dùng để set up checkbox
			let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
			elems.forEach(function(html) {
				let switchery = new Switchery(html,  { size: 'big' });
			});
			// Hàm này dùng để thay đổi trạng thái hoàn thành của todo
			$('.js-switch').change(function () {
				let done = $(this).prop('checked') === true ? 1 : 0;
				let id = $(this).data('id');
				$.ajax({
					type: "PUT",
					dataType: "json",
					url: 'todos/'+id,
					data: {'done': done},
					success: function (res) {
						if(res.msg){
							toastr.options.closeButton = true;
							toastr.options.closeMethod = 'fadeOut';
							toastr.options.closeDuration = 100;
							toastr.success('Thay đổi đã được cập nhật');
						}
					}
				});
			});
			// Đoạn này dùng để sửa todo
			$('.edit').click(function () {
				let id = $(this).data('id');
				let todo = $(this).data('todo');
				$('#modalTitle').empty();
				$('#modalTitle').text('Sửa ghi chú');
				$('#todo-input').attr("placeholder",todo);
				$('#todoForm').data('id',id);
				$('#addTodo').modal('show');
			});
			// Đoạn này dùng để xóa todo
			$('.delete').click(function () {
				Swal.fire({
					title: 'Chắc chắn xóa?',
					text: "Bạn sẽ không thể lấy lại được bản ghi này!",
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Đúng, Tôi muốn xóa!'
				}).then((result) => {
					if (result.value) {
						let id = $(this).data('id');
						Swal.fire(
							'Đã xóa!',
							'Ghi chú đã được xóa.',
							'success'
							);
						$.ajax({
							type: "DELETE",
							url: 'todos/'+id,
						});
						table.ajax.reload();
					}
				})
			});
		},
	});
</script>
{{-- Hàm này dùng để thêm todo --}}
<script type="text/javascript">
	$('#todoForm').submit(function () {
		// đoạn này để thêm mới todo
		if ($(this).data('id') == undefined) {
			let form = $(this)[0];
			let formData = new FormData(form);
			$.ajax({
				url:'{{ route('todos.store') }}',
				data:formData,
				type:'post',
				cache:false,
				contentType:false,
				processData:false,
				success: function (res) {
					if (res.msg) {
						$('#todoForm').trigger("reset");
						$('#addTodo').modal('hide');
						table.ajax.reload();
					};
				}
			});
		} else {
			//Đoạn này để cập nhật todo
			let id = $(this).data('id');
			let form = $(this)[0];
			let formData = new FormData(form);
			$.ajax({
				url:'{{ route('todos.store') }}',
				type: "PUT",
				dataType: "json",
				url: 'todos/'+id,
				data: {'todo': formData.get('todo')},
				success: function (res) {
					if (res.msg) {
						$('#modalTitle').text('Thêm mới');
						$('#todoForm').removeData( "id" );
						$('#todo-input').attr("placeholder",'Tiếp theo là gì?');
						$('#todoForm').trigger("reset");
						$('#addTodo').modal('hide');
						toastr.options.closeButton = true;
						toastr.options.closeMethod = 'fadeOut';
						toastr.options.closeDuration = 100;
						toastr.success('Thay đổi đã được cập nhật');
						table.ajax.reload();
					};
				}
			});
		}
	})
</script>
@endsection