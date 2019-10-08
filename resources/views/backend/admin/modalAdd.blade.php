{{-- modal add --}}
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-lg modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h2 class="modal-title" id="ModalTitle"><strong>Thêm mới sản phẩm</strong></h2>
			</div style="overflow: auto;">
			<form action="javascript:;" method="POST" role="form" id="productAddForm">
				@csrf
				<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
				<div class="modal-body">
					<div class="box-body">
						<div class="row">
							<label for="name">Tên sản phẩm</label>
							<input class="form-control input-lg name" type="text" placeholder="Nhập tên sản phẩm" id="name" name="name" required>
						</div>
						<br>
						<div class="row">
							<label for="slug">Đường dẫn sản phẩm</label>
							<input class="form-control input-lg slug" type="text" placeholder="Nhập đường dẫn sản phẩm" id="slug" name="slug" required>
						</div>
						<br>
						<div class="row">
							<label for="">Viết tắt</label>
							<input type="text" class="form-control input-lg acronym" name="acronym"placeholder="Viết tắt" required>
							<span class="error errors_acronym"></span>
						</div>
						<br>
						<div class="row">
							<label>Ảnh hiển thị</label>
							<div class="input-group">
								<span class="input-group-btn">
									<a id="ava-btn" data-input="avatar" data-preview="preview-ava" class="btn btn-primary">
										<i class="fa fa-picture-o"></i>Chọn ảnh
									</a>
								</span>
								<img id="preview-ava" style="margin-left: 15px;margin-top:15px;max-height:100px;">
								<input id="avatar" class="form-control" type="text" name="thumbnail" readonly hidden required>
							</div>
						</div>
						<br>
						<div class="row">
							<label for="images">Ảnh sản phẩm</label>
							<div>
								<span id="holder"></span>
								{{-- <img id="holder" style="margin-top:15px;max-height:100px;"> --}}
								<div style="clear: both;">
									<a id="lfm" data-input="images" class="btn btn-default" title="Thêm ảnh">
										<img src="{{ asset('assets/dist/img/icons/add-image.png') }}" class="icons" id="add-icon">
									</a>
									<input id="images" class="form-control" type="text" name="images" hidden>
								</div>
							</div>
						</div>
						<br>
						{{-- Chất liệu --}}
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label>Chất liệu <button type="button" class="more" data-toggle="modal" data-target="#materialModal" title="Thêm chất liệu">
										<i class="fa fa-plus-square-o more"></i>
									</button></label>
									<select required class="form-control select2" id="materialsSelect" name="material_id" data-placeholder="Chọn chất liệu"
									style="width: 100%;">
									<option></option>
									@foreach ($materials as $masterial)
									<option value="{{$masterial->id}}" data-acronym="{{$masterial->acronym}}">{{$masterial->name}}</option>
									@endforeach
								</select>
							</div>
						</div>
							{{-- <div class="col-md-4">
								<div class="form-group">
									<label>Màu sắc<button type="button" class="more" data-toggle="modal" data-target="#colorModal"  title="Thêm màu sắc"><i class="fa fa-plus-square-o more"></i></button></label>
									<select name="colors" class="form-control select2" id="colorsSelect" data-placeholder="Chọn màu sắc"
									style="width: 100%;">
									@foreach ($colors as $color)
									<option>{{$color->name}}</option>
									@endforeach
								</select>
							</div> --}}
							{{-- Thương hiệu --}}
							<div class="col-md-3">
								<div class="form-group">
									<label>Thương hiệu<button type="button" class="more" data-toggle="modal" data-target="#brandModal" data-name="Thêm thương hiệu" title="Thêm thương hiệu"><i class="fa fa-plus-square-o more"></i></button></label>
									<select required name="brand_id" id="brandsSelect" class="form-control select2" style="width: 100%;" data-placeholder="Chọn thương hiệu">
										<option></option>
										@foreach ($brands as $brand)
										<option value="{{$brand->id}}">{{$brand->name}}</option>
										@endforeach
									</select>
								</div>
							</div>
							{{-- Xuất xứ --}}
							<div class="col-md-3">
								<div class="form-group">
									<label>Xuất xứ<button type="button" class="more" data-toggle="modal" data-target="#originModal" data-name="Thêm xuất xứ" title="Thêm xuất xứ"><i class="fa fa-plus-square-o more"></i></button></label>
									<select required name="country_id" id="originsSelect" class="form-control select2" style="width: 100%;" data-placeholder="Chọn xuất xứ">
										<option></option>
										@foreach ($countries as $country)
										<option value="{{$country->id}}">{{$country->name}}</option>
										@endforeach
									</select>
								</div>
							</div>
							{{-- Nhà phân phối --}}
							<div class="col-md-3">
								<div class="form-group">
									<label>Nhà phân phối<button type="button" class="more" data-toggle="modal" data-target="#supplierModal" data-name="Thêm nhà phân phối" title="Thêm nhà phân phối"><i class="fa fa-plus-square-o more"></i></button></label>
									<select required name="supplier_id" id="suppliersSelect" class="form-control select2" style="width: 100%;" data-placeholder="Chọn nhà phân phối">
										<option></option>
										@foreach ($suppliers as $supplier)
										<option value="{{$supplier->id}}" >{{$supplier->name}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
								<label>Danh mục<button type="button" class="more" data-toggle="modal" data-target="#categoryModal" data-name="Thêm danh mục" title="Thêm danh mục"><i class="fa fa-plus-square-o more"></i></button></label>
								<select required name="category_id" id="categoriesSelect" class="form-control select2" style="width: 100%;" data-placeholder="Chọn danh mục">
									<option></option>
									@foreach ($categories as $category)
									<option value="{{$category->id}}" >{{$category->name}}</option>
									@endforeach
								</select>
							</div>
							<div class="col-md-6">
								<label>Thẻ<button type="button" class="more" data-toggle="modal" data-target="#tagModal" data-name="Thêm thẻ" title="Thêm thẻ"><i class="fa fa-plus-square-o more"></i></button></label>
								<select name="tag_id[]" id="tagsSelect" class="form-control select2" style="width: 100%;" data-placeholder="Chọn thẻ" multiple="multiple">
									<option></option>
									@foreach ($tags as $tag)
									<option value="{{$tag->id}}" >{{$tag->name}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<br>
						<div class="row">
							<label for="name">Mô tả sản phẩm</label>
							<textarea id="description" name="description" class="form-control" placeholder="Nhập mô tả" required></textarea>
						</div>
						<br>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
					<button type="submit" class="btn btn-primary save" >Lưu lại</button>
				</div>
			</form>
		</div>
	</div>
</div>
{{-- ./modal add--}}
{{-- more --}}
{{-- material modal --}}
<div class="modal fade" tabindex="-2" role="dialog" id="materialModal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>Thêm mới chất liệu</h4>
			</div>
			<!-- Modal body -->
			<form action="javascript:;" method="POST" id="materialAddForm" class="form" role="form">
				@csrf
				<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
				<div class="modal-body">
					<div class="form-group">
						<label for="">Tên chất liệu</label>
						<input type="text" class="form-control name" name="name"placeholder="Tên chất liệu" required>
						<span class="error errors_name"></span>
					</div>
					<div class="form-group">
						<label for="">Đường dẫn</label>
						<input type="text" class="form-control slug" name="slug"placeholder="Đường dẫn" required>
						<span class="error errors_slug"></span>
					</div>
					<div class="form-group">
						<label for="">Viết tắt</label>
						<input type="text" class="form-control acronym" name="acronym"placeholder="Viết tắt" required>
						<span class="error errors_acronym"></span>
					</div>
				</div>
				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
					<button type="submit" class="btn btn-danger save" >Lưu lại</button>
				</div>
			</form>
		</div>
	</div>
</div>
{{-- category modal --}}
<div class="modal fade" tabindex="-2" role="dialog" id="categoryModal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>Thêm mới danh mục</h4>
			</div>
			<!-- Modal body -->
			<form action="javascript:;" method="POST" id="categoryAddForm" class="form" role="form">
				@csrf
				<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
				<div class="modal-body">
					<div class="form-group">
						<label for="">Tên danh mục</label>
						<input type="text" class="form-control name" name="name"placeholder="Tên danh mục" required>
						<span class="error errors_name"></span>
					</div>
					<div class="form-group">
						<label for="">Danh mục cha</label>
						<select name="parent_id" id="parentSelect" class="form-control select2" style="width: 100%;" data-placeholder="Chọn danh mục">
							<option></option>
							@foreach ($categories as $category)
							<option value="{{$category->id}}" >{{$category->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="">Đường dẫn</label>
						<input type="text" class="form-control slug" name="slug"placeholder="Đường dẫn" required>
						<span class="error errors_slug"></span>
					</div>
					<div class="form-group">
						<label for="">Viết tắt</label>
						<input type="text" class="form-control acronym" name="acronym"placeholder="Viết tắt" required>
						<span class="error errors_acronym"></span>
					</div>
				</div>
				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
					<button type="submit" class="btn btn-danger save" >Lưu lại</button>
				</div>
			</form>
		</div>
	</div>
</div>
{{-- tag modal --}}
<div class="modal fade" tabindex="-2" role="dialog" id="tagModal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>Thêm mới thẻ</h4>
			</div>
			<!-- Modal body -->
			<form action="javascript:;" method="POST" id="tagAddForm" class="form" role="form">
				@csrf
				<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
				<div class="modal-body">
					<div class="form-group">
						<label for="">Tên thẻ</label>
						<input type="text" class="form-control name" name="name"placeholder="Tên thẻ" required>
						<span class="error errors_name"></span>
					</div>
					<div class="form-group">
						<label for="">Đường dẫn</label>
						<input type="text" class="form-control slug" name="slug"placeholder="Đường dẫn" required>
						<span class="error errors_slug"></span>
					</div>
					<div class="form-group">
						<label for="">Viết tắt</label>
						<input type="text" class="form-control acronym" name="acronym"placeholder="Viết tắt" required>
						<span class="error errors_acronym"></span>
					</div>
				</div>
				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
					<button type="submit" class="btn btn-danger save" >Lưu lại</button>
				</div>
			</form>
		</div>
	</div>
</div>
{{-- color modal --}}
{{-- <div class="modal fade" id="colorModal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>Thêm mới màu sắc</h4>
			</div>
			<!-- Modal body -->
			<form action="javascript:;" method="POST" id="colorAddForm" class="form" role="form">
				@csrf
				<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
				<div class="modal-body">
					<div class="form-group">
						<label for="">Tên màu sắc</label>
						<input type="text" class="form-control name" name="name"placeholder="Tên màu sắc" required>
						<span class="error errors_name"></span>
					</div>
					<div class="form-group">
						<label for="">Đường dẫn</label>
						<input type="text" class="form-control slug" name="slug"placeholder="Đường dẫn" required>
						<span class="error errors_slug"></span>
					</div>
					<div class="form-group">
						<label for="">Viết tắt</label>
						<input type="text" class="form-control acronym" name="acronym"placeholder="Viết tắt" required>
						<span class="error errors_acronym"></span>
					</div>
				</div>
				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
					<button type="submit" class="btn btn-danger save" >Lưu lại</button>
				</div>
			</form>
		</div>
	</div>
</div> --}}
{{-- original modal --}}
<div class="modal fade" tabindex="-2" role="dialog" id="originModal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>Thêm mới xuất xứ</h4>
			</div>
			<!-- Modal body -->
			<form action="javascript:;" method="POST" id="originAddForm" class="form" role="form">
				@csrf
				<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
				<div class="modal-body">
					<div class="form-group">
						<label for="">Xuất xứ</label>
						<input type="text" class="form-control name" name="name"placeholder="Nơi sản xuất" required>
						<span class="error errors_name"></span>
					</div>
					<div class="form-group">
						<label for="">Đường dẫn</label>
						<input type="text" class="form-control slug" name="slug"placeholder="Đường dẫn" required>
						<span class="error errors_slug"></span>
					</div>
					<div class="form-group">
						<label for="">Viết tắt</label>
						<input type="text" class="form-control acronym" name="acronym"placeholder="Viết tắt" required>
						<span class="error errors_acronym"></span>
					</div>
				</div>
				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
					<button type="submit" class="btn btn-danger save" >Lưu lại</button>
				</div>
			</form>
		</div>
	</div>
</div>
{{-- brand modal --}}
<div class="modal fade" tabindex="-2" role="dialog" id="brandModal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>Thêm mới thương hiệu</h4>
			</div>
			<!-- Modal body -->
			<form action="javascript:;" method="POST" id="brandAddForm" class="form" role="form">
				@csrf
				<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
				<div class="modal-body">
					<div class="form-group">
						<label for="">Thương hiệu</label>
						<input type="text" class="form-control name" name="name"placeholder="Tên thương hiệu" required>
						<span class="error errors_name"></span>
					</div>
					<div class="form-group">
						<label for="">Đường dẫn</label>
						<input type="text" class="form-control slug" name="slug"placeholder="Đường dẫn" required>
						<span class="error errors_slug"></span>
					</div>
					<div class="form-group">
						<label for="">Viết tắt</label>
						<input type="text" class="form-control acronym" name="acronym"placeholder="Viết tắt" required>
						<span class="error errors_acronym"></span>
					</div>
				</div>
				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
					<button type="submit" class="btn btn-danger save" >Lưu lại</button>
				</div>
			</form>
		</div>
	</div>
</div>
{{-- supplier modal --}}
<div class="modal fade" tabindex="-2" role="dialog" id="supplierModal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>Thêm mới nhà phân phối</h4>
			</div>
			<!-- Modal body -->
			<form action="javascript:;" method="POST" id="supplierAddForm" class="form" role="form">
				@csrf
				<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
				<div class="modal-body">
					<div class="form-group">
						<label for="">Nhà phân phối</label>
						<input type="text" class="form-control name" name="name"placeholder="Tên nhà phân phối" required>
						<span class="error errors_name"></span>
					</div>
					<div class="form-group">
						<label for="">Số điện thoại</label>
						<input type="text" class="form-control" name="phone" placeholder="số điện thoại" pattern="[0-9]{10}" title="Số điện thoại gồm 10 số" required>
						<span class="error errors_phone"></span>
					</div>
					<div class="form-group">
						<label for="">Địa chỉ email</label>
						<input type="email" class="form-control" name="email"placeholder="Địa chỉ email" required>
						<span class="error errors_email"></span>
					</div>
					<div class="form-group">
						<label for="">Địa chỉ</label>
						<input type="text" class="form-control" name="address"placeholder="Địa chỉ" required>
						<span class="error errors_address"></span>
					</div>
					<div class="form-group">
						<label for="">Đường dẫn</label>
						<input type="text" class="form-control slug" name="slug"placeholder="Đường dẫn" required>
						<span class="error errors_slug"></span>
					</div>
					<div class="form-group">
						<label for="">Viết tắt</label>
						<input type="text" class="form-control acronym" name="acronym"placeholder="Viết tắt" required>
						<span class="error errors_acronym"></span>
					</div>
				</div>
				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
					<button type="submit" class="btn btn-danger save" >Lưu lại</button>
				</div>
			</form>
		</div>
	</div>
</div>
{{-- Xem chi tiết sản phẩm --}}
<div class="modal fade" id="detailProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-lg modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h2 class="modal-title" id="ModalTitle"><strong>Chi tiết sản phẩm</strong></h2>
			</div style="overflow: auto;">
			<div class="modal-body">
				<div id="product-info">
					<div class="col-md-6">
						<div class="box box-solid">
							<div class="box-body">
								<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
									<ol class="carousel-indicators">
										<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
									</ol>
									<div class="carousel-inner">
										<div class="item active" id="product-thumbnail">
										</div>
									</div>
									<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
										<span class="fa fa-angle-left"></span>
									</a>
									<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
										<span class="fa fa-angle-right"></span>
									</a>
								</div>
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.box -->
					</div>
					<div class="col-md-6" id="info">
						<span id="product-name"></span>
						<span id="product-price"></span>
						<span id="product-size">Kích cỡ:</span>
						<span id="product-amount">Số lượng:</span>
					</div>
				</div>
				<div id="product-description"> đây là mô tả</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
			</div>
		</div>
	</div>
</div>