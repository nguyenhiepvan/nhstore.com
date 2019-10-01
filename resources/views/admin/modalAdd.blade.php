modal add--}}
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
									<select class="form-control select2" multiple="multiple" name="materials" data-placeholder="Chọn chất liệu"
									style="width: 100%;">
									@foreach ($masterials as $masterial)
									<option>{{$masterial->name}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Màu sắc<button type="button" class="more" data-toggle="modal" data-target="#colorModal"  title="Thêm màu sắc"><i class="fa fa-plus-square-o more"></i></button></label>
								<select name="colors" class="form-control select2" multiple="multiple" data-placeholder="Chọn màu sắc"
								style="width: 100%;">
								@foreach ($colors as $color)
								<option>{{$color->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Kích thước<button type="button" class="more" data-toggle="modal" data-target="#moreModal" title="Thêm kích thước"><i class="fa fa-plus-square-o more"></i></button></label>
							<select name="sizes" class="form-control select2" multiple="multiple" data-placeholder="Chọn kích thước"
							style="width: 100%;">
							@foreach ($sizes as $size)
							<option>{{$size->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label>Thương hiệu<button type="button" class="more" data-toggle="modal" data-target="#moreModal" data-name="Thêm thương hiệu" title="Thêm thương hiệu"><i class="fa fa-plus-square-o more"></i></button></label>
						<select name="brand" class="form-control select2" style="width: 100%;" data-placeholder="Chọn thương hiệu">
							@foreach ($brands as $brand)
							<option>{{$brand->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Xuất xứ<button type="button" class="more" data-toggle="modal" data-target="#moreModal" data-name="Thêm xuất xứ" title="Thêm xuất xứ"><i class="fa fa-plus-square-o more"></i></button></label>
						<select name="original" class="form-control select2" style="width: 100%;" data-placeholder="Chọn xuất xứ">
							@foreach ($countries as $country)
							<option>{{$country->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Nhà phân phối<button type="button" class="more" data-toggle="modal" data-target="#moreModal" data-name="Thêm nhà phân phối" title="Thêm nhà phân phối"><i class="fa fa-plus-square-o more"></i></button></label>
						<select name="supplier" class="form-control select2" style="width: 100%;" data-placeholder="Chọn nhà phân phối">
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
			<form action="" method="POST" role="form">
				<div class="modal-body">
					<div class="form-group">
						<label for="">Tên chất liệu</label>
						<input type="text" class="form-control" id="nameMaterial" name="name"placeholder="Input field">
					</div>
					<div class="form-group">
						<label for="">Đường dẫn</label>
						<input type="text" class="form-control" id="slugMaterial" name="slug"placeholder="Đường dẫn">
					</div>
					<div class="form-group">
						<label for="">Viết tắt</label>
						<input type="text" class="form-control" id="acronymMaterial" name="acronym"placeholder="Viết tắt">
					</div>
				</div>
				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
					<button type="submit" class="btn btn-danger" data-dismiss="modal">Lưu lại</button>
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
			<form action="" method="POST" role="form">
				<div class="modal-body">
					<div class="form-group">
						<label for="">Tên màu sắc</label>
						<input type="text" class="form-control" id="nameColor" name="name"placeholder="Input field">
					</div>
					<div class="form-group">
						<label for="">Đường dẫn</label>
						<input type="text" class="form-control" id="slugColor" name="slug"placeholder="Đường dẫn">
					</div>
					<div class="form-group">
						<label for="">Viết tắt</label>
						<input type="text" class="form-control" id="acronymColor" name="acronym"placeholder="Viết tắt">
					</div>
				</div>
				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
					<button type="submit" class="btn btn-danger" data-dismiss="modal">Lưu lại</button>
				</div>
			</form>
		</div>
	</div>
</div>
{{-- size modal --}}
<div class="modal fade" id="sizeModal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>Thêm mới kích thước</h4>
			</div>
			<!-- Modal body -->
			<form action="" method="POST" role="form">
				<div class="modal-body">
					<div class="form-group">
						<label for="">Kích thước</label>
						<input type="text" class="form-control" id="nameSize" name="name"placeholder="Input field">
					</div>
				</div>
				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
					<button type="submit" class="btn btn-danger" data-dismiss="modal">Lưu lại</button>
				</div>
			</form>
		</div>
	</div>
</div>
