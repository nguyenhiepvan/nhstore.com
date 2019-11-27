$(document).ready(function () {
	// Thêm dòng:
	window.globalCounter = 1;
	$(document).on('click',' .add-row',function () {
		$.ajax({
			url:'/admin/in-receipts/create?index='+(window.globalCounter++),
			type:'GET',
			success:function (res) {
				$('#in-receipts-form-table tbody').append(res.row);
				$('.select2').select2();
			// Hàm này dùng để format giá tiền nhập vào:
			$("input[data-type='currency']").on({
				keyup: function() {
					formatCurrency($(this));
				},
				blur: function() {
					formatCurrency($(this), "blur");
				}
			});
		}
	});
	});
	//Xóa dòng:
	$(document).on('click',' .remove-row',function (ev) {
		let $currentTableRow = $(ev.currentTarget).parents('tr')[0];
		$currentTableRow.remove();
		window.globalCounter--;
		$('#in-receipts-form-table').find('tr').each(function (index) {
			let firstTDDomEl = $(this).find('td')[0];
			let $firstTDJQObject = $(firstTDDomEl);
			$firstTDJQObject.text(index);
		});
	});
	// Hàm này dùng để format giá tiền nhập vào:
	$("input[data-type='currency']").on({
		keyup: function() {
			alert('aaa');
			formatCurrency($(this));
		},
		blur: function() {
			alert('aaa');
			formatCurrency($(this), "blur");
		}
	});
	function formatNumber(n) {
// format number 1000000 to 1,234,567
return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}
function formatCurrency(input, blur) {
// appends $ to value, validates decimal side
// and puts cursor back in right position.
// get input value
let input_val = input.val();
// don't validate empty input
if (input_val === "") { return; }
// original length
let original_len = input_val.length;
// initial caret position
let caret_pos = input.prop("selectionStart");
// check for decimal
if (input_val.indexOf(".") >= 0) {
// get position of first decimal
// this prevents multiple decimals from
// being entered
let decimal_pos = input_val.indexOf(".");
// split number by decimal point
let left_side = input_val.substring(0, decimal_pos);
let right_side = input_val.substring(decimal_pos);
// add commas to left side of number
left_side = formatNumber(left_side);
// validate right side
right_side = formatNumber(right_side);
// Limit decimal to only 2 digits
right_side = right_side.substring(0, 2);
// join number by .
input_val = left_side + "." + right_side;
} else {
// no decimal entered
// add commas to number
// remove all non-digits
input_val = formatNumber(input_val);
input_val = input_val;
}
// send updated string to input
input.val(input_val);
// put caret back in the right position
let updated_len = input_val.length;
caret_pos = updated_len - original_len + caret_pos;
input[0].setSelectionRange(caret_pos, caret_pos);
}
//dựng select 2
$('.select2').select2();
//Tính thành tiền:
$(document).on('input','.unit-price',function () {
	// alert('aaaaa');
	let quantities = $(this).closest('tr').find('td.quantities input').val();
	quantities = parseInt(quantities.replace(/[^0-9.-]+/g,""));
	let unit_price = $(this).closest('tr').find('.unit-price input').val();
	unit_price = parseInt(unit_price.replace(/[^0-9.-]+/g,""));
	let sub = unit_price*quantities;
	$(this).closest('tr').find('.sub-total').text(formatNumber(''+sub));
});
$(document).on('input','.quantities',function () {
	// alert('aaaaa');
	let quantities = $(this).closest('tr').find('td.quantities input').val();
	quantities = parseInt(quantities.replace(/[^0-9.-]+/g,""));
	let unit_price = $(this).closest('tr').find('.unit-price input').val();
	unit_price = parseInt(unit_price.replace(/[^0-9.-]+/g,""));
	let sub = unit_price*quantities;
	$(this).closest('tr').find('.sub-total').text(formatNumber(''+sub));
});
// Hàm này dùng để tạo ra màu sắc mới
$(document).on('submit','#colorAddForm',function () {
	let form = $(this)[0];
	let formData = new FormData(form);
	$.ajax({
		url:'/admin/colors',
		data: formData,
		type: 'post',
		contentType:false,
		processData:false,
		success: function (res) {
			$('#colorModal').modal('hide');
			$('.error').empty();
			Swal.fire({
				position: 'center',
				type: 'success',
				title: 'Đã thêm màu sắc',
				showConfirmButton: false,
				timer: 1000
			});
			$('.colorsSelect').append('<option  value="'+res.id+'">'+res.name+'</option>');
			$('.colorsSelect').select2();
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
// Hàm này dùng để tạo ra kích thước
$(document).on('submit','#sizeAddForm',function () {
	let form = $(this)[0];
	let formData = new FormData(form);
	$.ajax({
		url:'/admin/sizes',
		data: formData,
		type: 'post',
		contentType:false,
		processData:false,
		success: function (res) {
			$('#sizeModal').modal('hide');
			$('.error').empty();
			Swal.fire({
				position: 'center',
				type: 'success',
				title: 'Đã thêm kích thước',
				showConfirmButton: false,
				timer: 1000
			});
			$('.sizesSelect').append('<option value="'+res.id+'">'+res.name+'</option>');
			$('.sizesSelect').select2();
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