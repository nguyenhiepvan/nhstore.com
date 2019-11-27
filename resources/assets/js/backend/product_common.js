$(document).ready(function () {
   //Chèn link khi click
   $(document).on('click','#products',function () {
    window.history.pushState("object or string", "Title", '/admin/products');
  });
   $(document).on('click','#warehouse',function () {
    window.history.pushState("object or string", "Title", '/admin/warehouse');
  });
   $(document).on('click','#trash',function () {
    window.history.pushState("object or string", "Title", '/admin/trash');
  });
	// Dựng search select
	$('.select2').select2();
  // Tạo ra slug khi nhập:
  $(document).on('input','#name',function () {
    $('#slug').val(ChangeToSlug($(this).val()));
  });
  $(document).on('input','.more-name',function () {
    $('.more-slug').val(ChangeToSlug($(this).val()));
  })
 	// Hàm này dùng đđể tạo ra slug
 	function ChangeToSlug(title)
 	{
 		let slug;
     		//Đổi chữ hoa thành chữ thường
     		slug = title.toLowerCase();
      		//Đổi ký tự có dấu thành không dấu
      		slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
      		slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
      		slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
      		slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
      		slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
      		slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
      		slug = slug.replace(/đ/gi, 'd');
      		//Xóa các ký tự đặt biệt
      		slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
      		//Đổi khoảng trắng thành ký tự gạch ngang
      		slug = slug.replace(/ /gi, " - ");
      		//Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
      		//Phòng trường hợp người nhập vào quá nhiều ký tự trắng
      		slug = slug.replace(/\-\-\-\-\-/gi, '-');
      		slug = slug.replace(/\-\-\-\-/gi, '-');
      		slug = slug.replace(/\-\-\-/gi, '-');
      		slug = slug.replace(/\-\-/gi, '-');
      		//Xóa các ký tự gạch ngang ở đầu và cuối
      		slug = '@' + slug + '@';
      		slug = slug.replace(/\@\-|\-\@|\@/gi, '');
          slug = slug.replace(/\s/g,'');
      		//In slug ra textbox có id “slug”
         	return slug +'-'+ Date.now();
      	}
 	// Hàm này dùng để reset form khi đóng modal
   $(document).on('hidden.bs.modal','.more-item',function () {
    $('.more-form').trigger("reset");
    $('.error').empty();
    $('.more-slug').val('');
    $('.more-select').val(null).trigger('change');
  });
 	// hàm này dùng để reset error khi bấm submit mới
 	$(document).on('click','.save',function () {
 		$('.error').empty();
 	});
   //set up csrf
   $.ajaxSetup({
    headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
 });
// Loại bỏ ảnh sản phẩm
$(document).on('click','.remove-img',function () {
  let value = $('#images').val();
  let src = $(this).parent().find('img').attr('src');
  value = value.replace(src +';', "");
  $('#images').val(value);
//Dùng khi sửa thông tin sản phẩm
value = $('#images').val();
value = value.replace(src +';', "");
$('#images').val(value);
images_changed = true;
$('#btn').prop('disabled', false);
$(this).parent().find('img').remove();
$(this).remove();
});
})