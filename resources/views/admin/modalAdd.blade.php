{{-- modal add --}}
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-lg modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h2 class="modal-title" id="ModalTitle"><strong>Thêm mới sản phẩm</strong></h2>
			</div style="overflow: auto;">
			<form action="#" method="POST" role="form" id="addForm">
				<div class="modal-body">
					<div class="box-body">
						<div class="row">
							<label for="name">Tên sản phẩm</label>
							<input class="form-control input-lg" type="text" placeholder="Nhập tên sản phẩm" id="name" name="name">
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
								<input id="avatar" class="form-control" type="text" name="thumbnail" readonly>
							</div>
							<img id="preview-ava" style="margin-top:15px;max-height:100px;">
						</div>
						<br>
						<div class="row">
							<label for="images">Ảnh sản phẩm</label>
							<div>
								<span id="holder"></span>
								{{-- <img id="holder" style="margin-top:15px;max-height:100px;"> --}}
								<div style="clear: both;">
									<a id="lfm" data-input="images" class="btn btn-default" title="Thêm ảnh">
										<img src="/storage/icons/add-image.png" class="icons" id="add-icon">
									</a>
									<input id="images" class="form-control" type="text" name="images" hidden>
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Chất liệu <button type="button" class="more" data-toggle="modal" data-target="#materialModal" title="Thêm chất liệu">
										<i class="fa fa-plus-square-o more"></i>
									</button></label>
									<select class="form-control select2" id="materialsSelect" name="materials" data-placeholder="Chọn chất liệu"
									style="width: 100%;">
									@foreach ($materials as $masterial)
									<option value="{{$masterial->id}}" data-acronym="{{$masterial->acronym}}">{{$masterial->name}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Màu sắc<button type="button" class="more" data-toggle="modal" data-target="#colorModal"  title="Thêm màu sắc"><i class="fa fa-plus-square-o more"></i></button></label>
								<select name="colors" class="form-control select2" id="colorsSelect" data-placeholder="Chọn màu sắc"
								style="width: 100%;">
								@foreach ($colors as $color)
								<option>{{$color->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Thương hiệu<button type="button" class="more" data-toggle="modal" data-target="#brandModal" data-name="Thêm thương hiệu" title="Thêm thương hiệu"><i class="fa fa-plus-square-o more"></i></button></label>
							<select name="brand" id="brandsSelect" class="form-control select2" style="width: 100%;" data-placeholder="Chọn thương hiệu">
								@foreach ($brands as $brand)
								<option>{{$brand->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>Xuất xứ<button type="button" class="more" data-toggle="modal" data-target="#originModal" data-name="Thêm xuất xứ" title="Thêm xuất xứ"><i class="fa fa-plus-square-o more"></i></button></label>
							<select name="original" id="originsSelect" class="form-control select2" style="width: 100%;" data-placeholder="Chọn xuất xứ">
								@foreach ($countries as $country)
								<option>{{$country->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Nhà phân phối<button type="button" class="more" data-toggle="modal" data-target="#supplierModal" data-name="Thêm nhà phân phối" title="Thêm nhà phân phối"><i class="fa fa-plus-square-o more"></i></button></label>
							<select name="supplier" id="suppliersSelect" class="form-control select2" style="width: 100%;" data-placeholder="Chọn nhà phân phối">
								@foreach ($suppliers as $supplier)
								<option>{{$supplier->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<label for="name">Mô tả sản phẩm</label>
					<textarea id="description" name="description" class="form-control" placeholder="Nhập mô tả" ></textarea>
				</div>
				<br>
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
{{-- ./modal add--}}
{{-- more --}}
{{-- material modal --}}
<div class="modal fade" id="materialModal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>Thêm mới chất liệu</h4>
			</div>
			<!-- Modal body -->
			<form action="javascript:;" method="POST" id="materialAddForm" class="form" role="form">
				@csrf
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
{{-- color modal --}}
<div class="modal fade" id="colorModal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>Thêm mới màu sắc</h4>
			</div>
			<!-- Modal body -->
			<form action="javascript:;" method="POST" id="colorAddForm" class="form" role="form">
				@csrf
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
</div>
{{-- original modal --}}
<div class="modal fade" id="originModal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>Thêm mới xuất xứ</h4>
			</div>
			<!-- Modal body -->
			<form action="javascript:;" method="POST" id="originAddForm" class="form" role="form">
				@csrf
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
<div class="modal fade" id="brandModal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>Thêm mới thương hiệu</h4>
			</div>
			<!-- Modal body -->
			<form action="javascript:;" method="POST" id="brandAddForm" class="form" role="form">
				@csrf
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
<div class="modal fade" id="supplierModal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>Thêm mới nhà phân phối</h4>
			</div>
			<!-- Modal body -->
			<form action="javascript:;" method="POST" id="supplierAddForm" class="form" role="form">
				@csrf
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