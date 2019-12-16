{{-- material modal --}}
<div class="modal fade more-item" tabindex="-2" role="dialog" id="materialModal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
			Thêm mới chất liệu</h4>
		</div>
		<!-- Modal body -->
		<form action="javascript:;" method="POST" id="materialAddForm" class="form more-form" role="form">
			@csrf
			<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
			<div class="modal-body">
				<div class="form-group">
					<label for="">Tên chất liệu</label>
					<input type="text" class="form-control more-name" name="name" placeholder="Tên chất liệu" required>
					<span class="error errors_name"></span>
				</div>
				<div class="form-group">
					<label for="">Đường dẫn</label>
					<input type="text" class="form-control more-slug" name="slug"placeholder="Đường dẫn" required>
					<span class="error errors_slug"></span>
				</div>
			</div>
			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="submit" class="btn btn-danger save" >Lưu lại</button>
			</div>
		</form>
	</div>
</div>
</div>
{{-- category modal --}}
<div class="modal fade more-item" tabindex="-2" role="dialog" id="categoryModal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
			Thêm mới danh mục</h4>
		</div>
		<!-- Modal body -->
		<form action="javascript:;" method="POST" id="categoryAddForm" class="form more-form" role="form">
			@csrf
			<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
			<div class="modal-body">
				<div class="form-group">
					<label for="">Tên danh mục</label>
					<input type="text" class="form-control more-name" name="name" placeholder="Tên danh mục" required>
					<span class="error errors_name"></span>
				</div>
				<div class="form-group">
					<label for="">Danh mục cha</label>
					<select name="parent_id" id="parentSelect" class="form-control select2 more-select" style="width: 1-2-2%;" data-placeholder="Chọn danh mục">
						<option></option>
						@foreach ($categories as $category)
						<option value="{{$category->id}}" >{{$category->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="">Đường dẫn</label>
					<input type="text" class="form-control more-slug" name="slug"placeholder="Đường dẫn" required>
					<span class="error errors_slug"></span>
				</div>
				
			</div>
			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="submit" class="btn btn-danger save" >Lưu lại</button>
			</div>
		</form>
	</div>
</div>
</div>
{{-- tag modal --}}
<div class="modal fade more-item" tabindex="-2" role="dialog" id="tagModal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
			Thêm mới thẻ</h4>
		</div>
		<!-- Modal body -->
		<form action="javascript:;" method="POST" id="tagAddForm" class="form more-form" role="form">
			@csrf
			<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
			<div class="modal-body">
				<div class="form-group">
					<label for="">Tên thẻ</label>
					<input type="text" class="form-control more-name" name="name" placeholder="Tên thẻ" required>
					<span class="error errors_name"></span>
				</div>
				<div class="form-group">
					<label for="">Đường dẫn</label>
					<input type="text" class="form-control more-slug" name="slug"placeholder="Đường dẫn" required>
					<span class="error errors_slug"></span>
				</div>
				
			</div>
			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="submit" class="btn btn-danger save" >Lưu lại</button>
			</div>
		</form>
	</div>
</div>
</div>
{{-- color modal --}}
<div class="modal fade more-item" id="colorModal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<h4>Thêm mới màu sắc</h4>
			</div>
			<!-- Modal body -->
			<form action="javascript:;" method="POST" id="colorAddForm" class="form more-form" role="form">
				@csrf
				<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
				<div class="modal-body">
					<div class="form-group">
						<label for="">Tên màu sắc</label>
						<input type="text" class="form-control more-name" name="name" placeholder="Tên màu sắc" required>
						<span class="error errors_name"></span>
					</div>
					<div class="form-group">
						<label for="">Đường dẫn</label>
						<input type="text" class="form-control more-slug" name="slug"placeholder="Đường dẫn" required>
						<span class="error errors_slug"></span>
					</div>
				</div>
				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="submit" class="btn btn-danger save" >Lưu lại</button>
				</div>
			</form>
		</div>
	</div>
</div>
{{-- size modal --}}
<div class="modal fade more-item" id="sizeModal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
			Thêm mới kích thước</h4>
		</div>
		<!-- Modal body -->
		<form action="javascript:;" method="POST" id="sizeAddForm" class="form more-form" role="form">
			@csrf
			<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
			<div class="modal-body">
				<div class="form-group">
					<label for="">Tên kích thước</label>
					<input type="text" class="form-control more-name" name="name" placeholder="Tên kích thước" required>
					<span class="error errors_name"></span>
				</div>
				<div class="form-group">
					<label for="">Đường dẫn</label>
					<input type="text" class="form-control more-slug" name="slug"placeholder="Đường dẫn" required>
					<span class="error errors_slug"></span>
				</div>
			</div>
			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="submit" class="btn btn-danger save" >Lưu lại</button>
			</div>
		</form>
	</div>
</div>
</div>
{{-- original modal --}}
<div class="modal fade more-item" tabindex="-2" role="dialog" id="originModal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
			Thêm mới xuất xứ</h4>
		</div>
		<!-- Modal body -->
		<form action="javascript:;" method="POST" id="originAddForm" class="form more-form" role="form">
			@csrf
			<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
			<div class="modal-body">
				<div class="form-group">
					<label for="">Xuất xứ</label>
					<input type="text" class="form-control more-name" name="name" placeholder="Nơi sản xuất" required>
					<span class="error errors_name"></span>
				</div>
				<div class="form-group">
					<label for="">Đường dẫn</label>
					<input type="text" class="form-control more-slug" name="slug"placeholder="Đường dẫn" required>
					<span class="error errors_slug"></span>
				</div>
				
			</div>
			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="submit" class="btn btn-danger save" >Lưu lại</button>
			</div>
		</form>
	</div>
</div>
</div>
{{-- brand modal --}}
<div class="modal fade more-item" tabindex="-2" role="dialog" id="brandModal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
			Thêm mới thương hiệu</h4>
		</div>
		<!-- Modal body -->
		<form action="javascript:;" method="POST" id="brandAddForm" class="form more-form" role="form">
			@csrf
			<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
			<div class="modal-body">
				<div class="form-group">
					<label for="">Thương hiệu</label>
					<input type="text" class="form-control more-name" name="name" placeholder="Tên thương hiệu" required>
					<span class="error errors_name"></span>
				</div>
				<div class="form-group">
					<label for="">Đường dẫn</label>
					<input type="text" class="form-control more-slug" name="slug"placeholder="Đường dẫn" required>
					<span class="error errors_slug"></span>
				</div>
				
			</div>
			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="submit" class="btn btn-danger save" >Lưu lại</button>
			</div>
		</form>
	</div>
</div>
</div>
{{-- supplier modal --}}
<div class="modal fade more-item" tabindex="-2" role="dialog" id="supplierModal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
			Thêm mới nhà phân phối</h4>
		</div>
		<!-- Modal body -->
		<form action="javascript:;" method="POST" id="supplierAddForm" class="form more-form" role="form">
			@csrf
			<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
			<div class="modal-body">
				<div class="form-group">
					<label for="">Nhà phân phối</label>
					<input type="text" class="form-control more-name" name="name" placeholder="Tên nhà phân phối" required>
					<span class="error errors_name"></span>
				</div>
				<div class="form-group">
					<label for="">Số điện thoại</label>
					<input type="text" class="form-control" name="phone" placeholder="số điện thoại" pattern="[-2-9]{1-2}" title="Số điện thoại gồm 1-2 số" required>
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
					<input type="text" class="form-control more-slug" name="slug"placeholder="Đường dẫn" required>
					<span class="error errors_slug"></span>
				</div>
				
			</div>
			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="submit" class="btn btn-danger save" >Lưu lại</button>
			</div>
		</form>
	</div>
</div>
</div>