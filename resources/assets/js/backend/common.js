$(document).ready(function () {
	// Dựng search select
	$('.select2').select2();
	// Hàm này dùng để tạo ký tự viết tắt
	function acr(s){
		let words, acronym, nextWord;
		words = s.split(' ');
		acronym= "";
		index = 0
		while (index<words.length) {
			nextWord = words[index];
			acronym = acronym + nextWord.charAt(0);
			index = index + 1 ;
		}
		return acronym;
	}
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
      		//In slug ra textbox có id “slug”
      		return slug;
      	}
 	// Hàm này tạo ra ký tự viết tắt và đường dẫn khi nhập tên
 	$(document).on('input','.name',function () {
 		let name = $(this).val();
 		let slug = ChangeToSlug(name);
 		let acronym = acr(name);
 		$('.slug').val(slug);
 		$('.acronym').val(acronym);
 	});
   $(document).on('input','.more-name',function () {
      let name = $(this).val();
      let slug = ChangeToSlug(name);
      let acronym = acr(name);
      $('.more-slug').val(slug);
      $('.more-acronym').val(acronym);
   });
   //Hàm này dùng để thay đổi switchery
   function setSwitchery(switchElement, checkedBool) {
        if (checkedBool && !switchElement.checked) { // switch on if not on
         $(switchElement).trigger('click').attr("checked", "checked");
        } else if (!checkedBool && switchElement.checked) { // switch off if not off
         $(switchElement).trigger('click').removeAttr("checked");
      }
   }
 	// Hàm này dùng để reset form khi đóng modal
   $(document).on('hidden.bs.modal','.more-item',function () {
      $('.more-form').trigger("reset");
      $('.error').empty();
      $('.more-slug').val('');
      $('.more-acronym').val('');
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
})