{{-- danh sách sản phẩm --}}
<div class="card box-body">
	{{-- card-header --}}
	<div class="card-header">
		<h3 class="card-title">Danh sách sản phẩm</h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Ẩn/hiện">
				<i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Đóng">
					<i class="fa fa-times"></i></button>
				</div>
			</div>
			{{-- /.card-header --}}
			{{-- card-body --}}
			<div class="card-body">
				<button class="btn btn-info btn-lg" title="Thêm mới" data-toggle="modal" data-target="#productModal"><i class="fa  fa-plus-circle"></i></button>
				<br>
				<table id="product-table" class="table  table-striped table-bordered table-hover table-responsive ">
					<thead>
						<tr>
							<th>Stt</th>
							<th>Tên sản phẩm</th>
							<th>Người tạo</th>
							<th>Thương hiệu</th>
							<th>Nhà cung cấp</th>
							<th>#</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Stt</th>
							<th>Tên sản phẩm</th>
							<th>Người tạo</th>
							<th>Thương hiệu</th>
							<th>Nhà cung cấp</th>
							<th>#</th>
						</tr>
					</tfoot>
				</table>
			</div>
			{{-- /.card-body --}}
			{{-- card-footer --}}
			<div class="card-footer">
				<h3 class="card-title">Danh sách sản phẩm</h3>
			</div>
			{{-- /.card-footer --}}
		</div>
		{{-- /.danh sách sản phẩm --}}
		{{-- Kho hàng --}}
		<div class="card box-body">
			{{-- card-header --}}
			<div class="card-header">
				<h3 class="card-title">Kho hàng</h3>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Ẩn/hiện">
						<i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Đóng">
							<i class="fa fa-times"></i></button>
						</div>
					</div>
					{{-- /.card-header --}}
					{{-- card-body --}}
					<div class="card-body">
						<button class="btn btn-danger btn-lg" title="Thêm mới" data-toggle="modal" data-target="#productModal"><i class="fa  fa-plus-circle"></i></button>
						<br>
						<table id="warehouse-table" class="table table-bordered table-striped table-hover table-responsive ">
							<thead>
								<tr>
									<th>Stt</th>
									<th>Tên sản phẩm</th>
									<th>Ảnh sản phẩm</th>
									<th>Kích thước</th>
									<th>Màu sắc</th>
									<th>Số lượng</th>
									<th>Giá</th>
									<th>#</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Stt</th>
									<th>Tên sản phẩm</th>
									<th>Ảnh sản phẩm</th>
									<th>Kích thước</th>
									<th>Màu sắc</th>
									<th>Số lượng</th>
									<th>Giá</th>
									<th>#</th>
								</tr>
							</tfoot>
						</table>
					</div>
					{{-- /.card-body --}}
					{{-- card-footer --}}
					<div class="card-footer">
						<h3 class="card-title">Kho hàng</h3>
					</div>
					{{-- /.card-footer --}}
				</div>
{{-- /.kho hàng --}}