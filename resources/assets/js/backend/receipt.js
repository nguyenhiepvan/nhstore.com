$(document).ready(function () {
//Hàm này dùng để scroll modal khi nhiều modal mở:
$(document).on('hidden.bs.modal', '.modal', function () {
	$('.modal:visible').length && $(document.body).addClass('modal-open');
});
//Lấy dữ liệu hóa đơn:
var in_receiptsTable = $('#in-receipts-table').DataTable({
	processing: true,
	serverSide: true,
	ajax: "/admin/in-receipts",
	columns: [
	{data: 'DT_RowIndex', name: 'DT_RowIndex'},
	{data: 'code', name: 'code'},
	{data: 'created_at', name: 'created_at'},
	{data: 'user', name: 'user'},
	{data: 'subtotal', name: 'subtotal'},
	{data: 'action', name: 'action',orderable: false, searchable: false},
	],
	"oLanguage": {
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
	}
});
//reset khi hide modal
//Modal xem chi tiết
$(document).on('hidden.bs.modal','#warehouseDetailModal',function () {
	$('#in-receipts-detail-table tbody').empty();
});
//Hàm này để xem chi tiết hóa đơn
$(document).on('click','.detail-receipt',function () {
	let code = $(this).text();
	let id = $(this).data('id');
	$('#in-receipts-detail-table').DataTable({
		processing: true,
		serverSide: true,
		paging: false,
		destroy: true,
		ajax: "/admin/in-receipts/"+id,
		columns: [
		{data: 'DT_RowIndex', name: 'DT_RowIndex'},
		{data: 'name', name: 'name'},
		{data: 'color', name: 'color'},
		{data: 'size', name: 'size'},
		{data: 'quantity', name: 'quantity'},
		{data: 'price', name: 'price'},
		{data: 'subtotal', name: 'subtotal'},
		],
		"oLanguage": {
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
		}
	});
	$('#warehouseDetailModal #ModalTitle').html('<strong>Thông tin hóa đơn nhập '+code+'</strong>');
	$('#warehouseDetailModal').modal('show');
});
//Hàm này để xóa hóa đơn:
$(document).on('click','.delete',function () {
	let id = $(this).data('id');
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
		$.ajax({
			url:'/admin/in-receipts/'+id,
			type:"DELETE",
			success:function () {
				Swal.fire({
					position: 'center',
					type: 'success',
					title: 'Đã xóa hóa đơn',
					showConfirmButton: false,
					timer: 1000
				});
				in_receiptsTable.ajax.reload(null, false );
			}
		})
	})
})
});