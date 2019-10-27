$(document).ready(function () {
	// set up thanh lọc giá
	$('.price-range').filterSlider();
	//Xem chi tiết sản phẩm
	$(document).on('click','.product_overlay',function () {
		let href = $(this).data('href');
		window.location.href = href;
	});
	// Xem thêm item --}}
	$(document).on('click','#view-more-country',function () {
		if($('.more-country').css('display') == "none"){
			$('.more-country').show();
			$('#view-more-country').text("Xem ít");
		}else{
			$('.more-country').hide();
			$('#view-more-country').text("Xem thêm");
		}
	});
	$(document).on('click','#view-more-brand',function () {
		if($('.more-brand').css('display') == "none"){
			$('.more-brand').show();
			$('#view-more-brand').text("Xem ít");
		}else{
			$('.more-brand').hide();
			$('#view-more-brand').text("Xem thêm");
		}
	});
	$(document).on('click','#view-more-color',function () {
		if($('.more-color').css('display') == "none"){
			$('.more-color').show();
			$('#view-more-color').text("Xem ít");
		}else{
			$('.more-color').hide();
			$('#view-more-color').text("Xem thêm");
		}
	});
	$(document).on('click','#view-more-material',function () {
		if($('.more-material').css('display') == "none"){
			$('.more-material').show();
			$('#view-more-material').text("Xem ít");
		}else{
			$('.more-material').hide();
			$('#view-more-material').text("Xem thêm");
		}
	});
	$(document).on('click','#view-more-size',function () {
		if($('.more-size').css('display') == "none"){
			$('.more-size').show();
			$('#view-more-size').text("Xem ít");
		}else{
			$('.more-size').hide();
			$('#view-more-size').text("Xem thêm");
		}
	});
	// Hàm này dùng để thêm bộ lọc --}}
	function add_filter(option,value) {
		//Lấy url hiện tại
		let url = window.location.href;
		//tách url thành mảng
		let arr = url.split('/');
		//Lọc phần tử null hoặc trống khỏi mảng
		arr = arr.filter(function (el) {
			return el != null && el != '';
		});
		//kiểm tra xem url có bộ lọc nào hay chưa
		if(arr[arr.length-1] == 'products'){
			//Nếu chưa có thì cộng cuỗi
			url += '/?'+option+'='+value;
		}else{
			//có bộ lọc và đã có sort
			if (url.indexOf(option+'=')!=-1)
			{
				arr = arr[arr.length-1].split('&');
				$.each(arr, function( index, value_ ) {
					if(value_.indexOf(option+'=')!=-1){
						url = url.replace(value_, option+'='+value);
						return false;
					}
					if(value_.indexOf('page=')!=-1){
						url = url.replace(value_, 'products/?');
					}
				});
			}
			//có bộ lọc và không có sort
			else{
				arr = arr[arr.length-1].split('&');
				$.each(arr, function( index, value_ ) {
					if(value_.indexOf('page=')!=-1){
						url = url.replace(value_, 'products/?');
						return false;
					}
				});
				url += '&'+option+'='+value;
			}
		}
		return url;
	}
	//xem sản phẩm theo bộ lọc:
	$(document).on('change','#p_show',function () {
		//Lấy kiểu xem
		let sort = $('#p_show').find(":selected").val();
		window.location.href = add_filter('sort',sort);
	});
	// Lọc theo giá
	$(document).on('click','#price',function () {
		let min = parseInt($('#min').val().replace(',',''));
		let max = parseInt($('#max').val().replace(',',''));
		window.location.href = add_filter('price',(min*1000)+'-'+(max*1000));
	});
	// Đổi kiểu xem
	$(document).on('click','#fw',function () {
		window.location.href = add_filter('style','fw');
	});
	$(document).on('click','#2col',function () {
		window.location.href = add_filter('style','2col');
	});
	// Hàm này dùng để thêm bộ lọc --}}
	function add_filter(option,value) {
    //Lấy url hiện tại
    let url = window.location.href;
    //tách url thành mảng
    let arr = url.split('/');
    //Lọc phần tử null hoặc trống khỏi mảng
    arr = arr.filter(function (el) {
    	return el != null && el != '';
    });
    //kiểm tra xem url có bộ lọc nào hay chưa
    if(arr[arr.length-1] == 'products'){
      //Nếu chưa có thì cộng cuỗi
      url += '/?'+option+'='+value;
  }else{
      //có bộ lọc và đã có sort
      if (url.indexOf(option+'=')!=-1)
      {
      	arr = arr[arr.length-1].split('&');
      	$.each(arr, function( index, value_ ) {
      		if(value_.indexOf(option+'=')!=-1){
      			if (index == 0) {
      				url = url.replace(value_, '?'+option+'='+value);
      			} else {
      				url = url.replace(value_, option+'='+value);
      			}
      			return false;
      		}
      	});
      }
      //có bộ lọc và không có sort
      else{
      	arr = arr[arr.length-1].split('&');
      	$.each(arr, function( index, value_ ) {
      		if(value_.indexOf('page=')!=-1){
      			url = url.replace(value_, 'products/?');
      			return false;
      		}
      	});
      	url += '&'+option+'='+value;
      }
  }
  return url;
}
});