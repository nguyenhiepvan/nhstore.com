$(document).ready(function () {
	// Lấy dữ liệu sản phẩm
	var collectionsTable = $('#colection-table').DataTable({
		processing: true,
		serverSide: true,
		ajax: "/admin/collections",
		columns: [
		{data: 'DT_RowIndex', name: 'DT_RowIndex'},
		{data: 'name', name: 'name'},
		{data: 'created_at', name: 'created_at'},
		{data: 'quantities', name: 'quantities'},
		{data: 'possion', name: 'possion'},
		{data: 'status', name: 'status', searchable: false},
		{data: 'action', name: 'action', orderable: false, searchable: false},
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
		},
		fnDrawCallback:function (oSettings) {
// Đoạn này dùng để set up checkbox
let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
elems.forEach(function(html) {
	let switchery = new Switchery(html,  { size: 'small' });
});
}
});
})