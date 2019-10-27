{{-- modal add --}}
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-lg modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="modal-title" id="ModalTitle"><strong>Thêm mới sản phẩm</strong></h2>
			</div style="overflow: auto;">
			<form action="javascript:;" method="POST" role="form" id="productAddForm">
				@csrf
				<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
				<div class="modal-body">
					{{-- Tên sản phẩm --}}
					<div class="row">
						<div class="box collapsed-box  box-danger">
							<div class="box-header with-border">
								<h3 class="box-title">Tên sản phẩm</h3>
								<h6 >(Lưu ý: Mục có dấu <em>(*)</em> là bắt buộc)</h6>
								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
									title="Collapse">
									<i class="fa fa-plus"></i></button>
								</div>
							</div>
							<div class="box-body">
								<label for="name">Tên sản phẩm <em>(*)</em></label>
								<input class="form-control input-lg name" type="text" placeholder="Nhập tên sản phẩm" id="name" name="name" required>
								<span class="error errors_name"></span>
								<br>
								<label for="slug">Đường dẫn sản phẩm <em>(*)</em></label>
								<input class="form-control input-lg slug" type="text" placeholder="Nhập đường dẫn sản phẩm" id="slug" name="slug" required>
								<span class="error errors_slug"></span>
								<br>
								<label for="">Viết tắt</label>
								<input type="text" class="form-control input-lg acronym" name="acronym"placeholder="Viết tắt" required>
								<span class="error errors_acronym"></span>
							</div>
						</div>
					</div>
					<br>
					{{-- Ảnh sản phẩm --}}
					<div class="row">
						<div class="box collapsed-box box-success">
							<div class="box-header with-border">
								<h3 class="box-title">Ảnh sản phẩm</h3>
								<h6 >Lưu ý: Mục có dấu <em>(*)</em> là bắt buộc</h6>
								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
									title="Collapse">
									<i class="fa fa-plus"></i></button>
								</div>
							</div>
							<div class="box-body">
								<label>Ảnh hiển thị <em>(*)</em></label>
								<span class="error errors_thumbnail"></span>
								<div class="input-group">
									<span class="input-group-btn">
										<a id="ava-btn" data-input="avatar" data-preview="preview-ava" class="btn btn-primary">
											<i class="fa fa-picture-o"></i>Chọn ảnh
										</a>
									</span>
									<img id="preview-ava" style="margin-left: 15px;margin-top:15px;max-height:100px;">
									<input id="avatar" class="form-control" type="text" name="thumbnail" readonly hidden required>
								</div>
								<br>
								<label for="images">Ảnh sản phẩm</label>
								<div>
									<span class="holder"></span>
									<div style="clear: both;">
										<a id="lfm" data-input="images" class="btn " title="Thêm ảnh">
											<img src="{{ asset('assets/backend/dist/img/icons/add-image.png') }}" class="icons" id="add-icon">
										</a>
										<input id="images" class="form-control" type="text" name="images" hidden>
									</div>
								</div>
							</div>
						</div>
					</div>
					<br>
					{{-- Thuộc tính sản phẩm --}}
					<div class="row">
						<div class="box collapsed-box box-warning">
							<div class="box-header with-border">
								<h3 class="box-title">Thuộc tính sản phẩm</h3>
								<h6 >Lưu ý: Mục có dấu <em>(*)</em> là bắt buộc</h6>
								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
									title="Collapse">
									<i class="fa fa-plus"></i></button>
								</div>
							</div>
							<div class="box-body">
								{{-- chất liệu --}}
								<div class="col-md-3">
									<div class="form-group">
										<label>Chất liệu <em>(*)</em>
											<span class="error errors_material_id"></span>
											<button type="button" class="more" data-toggle="modal" data-target="#materialModal" title="Thêm chất liệu">
												<i class="fa fa-plus-square-o more"></i>
											</button>
										</label>
										<select required class="form-control select2" id="materialsSelect" name="material_id" data-placeholder="Chọn chất liệu"
										style="width: 100%;">
										<option></option>
										@foreach ($materials as $masterial)
										<option value="{{$masterial->id}}" data-acronym="{{$masterial->acronym}}">{{$masterial->name}}</option>
										@endforeach
									</select>
								</div>
							</div>
							{{-- thương hiệu --}}
							<div class="col-md-3">
								<div class="form-group">
									<label>Thương hiệu <em>(*)</em>
										<span class="error errors_brand_id"></span>
										<button type="button" class="more" data-toggle="modal" data-target="#brandModal" data-name="Thêm thương hiệu" title="Thêm thương hiệu"><i class="fa fa-plus-square-o more"></i></button></label>
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
										<label>Xuất xứ <em>(*)</em>
											<span class="error errors_country_id"></span>
											<button type="button" class="more" data-toggle="modal" data-target="#originModal" data-name="Thêm xuất xứ" title="Thêm xuất xứ"><i class="fa fa-plus-square-o more"></i></button></label>
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
											<label>Nhà phân phối <em>(*)</em>
												<span class="error errors_supplier_id"></span>
												<button type="button" class="more" data-toggle="modal" data-target="#supplierModal" data-name="Thêm nhà phân phối" title="Thêm nhà phân phối"><i class="fa fa-plus-square-o more"></i></button></label>
												<select required name="supplier_id" id="suppliersSelect" class="form-control select2" style="width: 100%;" data-placeholder="Chọn nhà phân phối">
													<option></option>
													@foreach ($suppliers as $supplier)
													<option value="{{$supplier->id}}" >{{$supplier->name}}</option>
													@endforeach
												</select>
											</div>
										</div>
										<br>
										{{-- danh mục --}}
										<div class="col-md-3">
											<label>Danh mục <em>(*)</em>
												<span class="error errors_category_id"></span>
												<button type="button" class="more" data-toggle="modal" data-target="#categoryModal" data-name="Thêm danh mục" title="Thêm danh mục"><i class="fa fa-plus-square-o more"></i></button></label>
												<select required name="category_id" id="categoriesSelect" class="form-control select2" style="width: 100%;" data-placeholder="Chọn danh mục">
													<option></option>
													@foreach ($categories as $category)
													<option value="{{$category->id}}" >{{$category->name}}</option>
													@endforeach
												</select>
											</div>
											{{-- thẻ --}}
											<div class="col-md-3">
												<label>Thẻ<button type="button" class="more" data-toggle="modal" data-target="#tagModal" data-name="Thêm thẻ" title="Thêm thẻ"><i class="fa fa-plus-square-o more"></i></button></label>
												<select name="tag_id[]" id="tagsSelect" class="form-control select2" style="width: 100%;" data-placeholder="Chọn thẻ" multiple="multiple">
													<option></option>
													@foreach ($tags as $tag)
													<option value="{{$tag->id}}" >{{$tag->name}}</option>
													@endforeach
												</select>
											</div>
											{{-- màu sắc --}}
											<div class="col-md-3">
												<label>Màu sắc<button type="button" class="more" data-toggle="modal" data-target="#colorModal" data-name="Thêm màu sắc" title="Thêm màu sắc"><i class="fa fa-plus-square-o more"></i></button></label>
												<select name="color_id[]" id="colorsSelect" class="form-control select2" style="width: 100%;" data-placeholder="Chọn màu sắc" multiple="multiple">
													<option></option>
													@foreach ($colors as $color)
													<option value="{{$color->id}}" >{{$color->name}}</option>
													@endforeach
												</select>
											</div>
											{{-- kích thước --}}
											<div class="col-md-3">
												<label>Kích thước<button type="button" class="more" data-toggle="modal" data-target="#sizeModal" data-name="Thêm kích thước" title="Thêm kích thước"><i class="fa fa-plus-square-o more"></i></button></label>
												<select name="size_id[]" id="sizesSelect" class="form-control select2" style="width: 100%;" data-placeholder="Chọn kích thước" multiple="multiple" >
													<option></option>
													@foreach ($sizes as $size)
													<option value="{{$size->id}}" >{{$size->name}}</option>
													@endforeach
												</select>
											</div>
										</div>
									</div>
								</div>
								<br>
								{{-- Giá sản phẩm --}}
								<div class="row">
									<div class="box collapsed-box box-primary">
										<div class="box-header with-border">
											<h3 class="box-title">Giá sản phẩm</h3>
											<div class="box-tools pull-right">
												<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
												title="Collapse">
												<i class="fa fa-plus"></i></button>
											</div>
										</div>
										<div class="box-body">
											<label for="in_price">Giá nhập (VNĐ)</label>
											<input class="form-control input-lg" type="text" value="0" data-type="currency" placeholder="1,000,000" name="in_price">
											<br>
											<label for="general_price">Giá thị trường (VNĐ)</label>
											<input class="form-control input-lg" type="text" value="0" data-type="currency" placeholder="1,000,000" name="general_price">
											<br>
											<label for="in_price">Giá bán (VNĐ)</label>
											<input class="form-control input-lg" type="text" value="0" data-type="currency" placeholder="1,000,000" name="out_price">
										</div>
									</div>
								</div>
								<br>
								{{-- Mô tả sản phẩm --}}
								<div class="row">
									<div class="box collapsed-box box-info">
										<div class="box-header with-border">
											<h3 class="box-title">Thông tin sản phẩm</h3>
											<div class="box-tools pull-right">
												<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
												title="Collapse">
												<i class="fa fa-plus"></i></button>
											</div>
										</div>
										<div class="box-body">
											<label for="name">Giới thiệu sản phẩm</label>
											<textarea id="overview" name="overview" class="form-control" placeholder="Giới thiệu sản phẩm"></textarea>
											<br>
											<label for="name">Thông tin sản phẩm</label>
											<textarea id="description" name="description" class="form-control" placeholder="Nhập mô tả"></textarea>
										</div>
									</div>
								</div>
								<br>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary save" >Lưu lại</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			{{-- ./modal add--}}
			{{-- modal edit --}}
			<div class="modal fade" id="productEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-lg modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h2 class="modal-title" id="ModalTitle"><strong>Chỉnh sửa sản phẩm</strong></h2>
						</div style="overflow: auto;">
						<form action="javascript:;" method="POST" data-id="-1" role="form" id="productEditForm">
							@csrf
							<div class="modal-body">
								{{-- Tên sản phẩm --}}
								<div class="row">
									<div class="box collapsed-box  box-danger">
										<div class="box-header with-border">
											<h3 class="box-title">Tên sản phẩm</h3>
											<h6 >(Lưu ý: Mục có dấu <em>(*)</em> là bắt buộc)</h6>
											<div class="box-tools pull-right">
												<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
												title="Collapse">
												<i class="fa fa-plus"></i></button>
											</div>
										</div>
										<div class="box-body">
											<label for="name">Tên sản phẩm <em>(*)</em></label>
											<input class="form-control input-lg name" type="text" placeholder="Nhập tên sản phẩm" id="name-edit" name="name" required>
											<span class="error errors_name"></span>
											<br>
											<label for="slug">Đường dẫn sản phẩm <em>(*)</em></label>
											<input class="form-control input-lg slug" type="text" placeholder="Nhập đường dẫn sản phẩm" id="slug-edit" name="slug" required>
											<span class="error errors_slug"></span>
											<br>
											<label for="">Viết tắt</label>
											<input type="text" class="form-control input-lg acronym" name="acronym"placeholder="Viết tắt" id="acronym-edit" required>
											<span class="error errors_acronym"></span>
										</div>
									</div>
								</div>
								<br>
								{{-- Ảnh sản phẩm --}}
								<div class="row">
									<div class="box collapsed-box box-success">
										<div class="box-header with-border">
											<h3 class="box-title">Ảnh sản phẩm</h3>
											<h6 >Lưu ý: Mục có dấu <em>(*)</em> là bắt buộc</h6>
											<div class="box-tools pull-right">
												<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
												title="Collapse">
												<i class="fa fa-plus"></i></button>
											</div>
										</div>
										<div class="box-body">
											<label>Ảnh hiển thị <em>(*)</em></label>
											<span class="error errors_thumbnail"></span>
											<div class="input-group">
												<span class="input-group-btn">
													<a id="ava-btn-edit" data-input="avatar-edit" data-preview="preview-ava-edit" class="btn btn-primary">
														<i class="fa fa-picture-o"></i>Chọn ảnh
													</a>
												</span>
												<img id="preview-ava-edit" style="margin-left: 15px;margin-top:15px;max-height:100px;">
												<input id="avatar-edit" class="form-control" type="text" name="thumbnail" readonly hidden required>
											</div>
											<br>
											<label for="images">Ảnh sản phẩm</label>
											<div>
												<span id="holder-edit"></span>
												<div style="clear: both;">
													<a id="lfm-edit" data-input="images-edit" class="btn " title="Thêm ảnh">
														<img src="{{ asset('assets/backend/dist/img/icons/add-image.png') }}" class="icons" id="add-icon">
													</a>
													<input id="images-edit" class="form-control" type="text" name="images" hidden>
												</div>
											</div>
										</div>
									</div>
								</div>
								<br>
								{{-- Thuộc tính sản phẩm --}}
								<div class="row">
									<div class="box collapsed-box box-warning">
										<div class="box-header with-border">
											<h3 class="box-title">Thuộc tính sản phẩm</h3>
											<h6 >Lưu ý: Mục có dấu <em>(*)</em> là bắt buộc</h6>
											<div class="box-tools pull-right">
												<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
												title="Collapse">
												<i class="fa fa-plus"></i></button>
											</div>
										</div>
										<div class="box-body">
											{{-- chất liệu --}}
											<div class="col-md-3">
												<div class="form-group">
													<label>Chất liệu <em>(*)</em>
														<span class="error errors_material_id"></span>
														<button type="button" class="more" data-toggle="modal" data-target="#materialModal" title="Thêm chất liệu">
															<i class="fa fa-plus-square-o more"></i>
														</button>
													</label>
													<select required class="form-control select2" id="materialsSelectEdit" name="material_id" data-placeholder="Chọn chất liệu"
													style="width: 100%;">
													<option></option>
													@foreach ($materials as $masterial)
													<option value="{{$masterial->id}}" data-acronym="{{$masterial->acronym}}">{{$masterial->name}}</option>
													@endforeach
												</select>
											</div>
										</div>
										{{-- thương hiệu --}}
										<div class="col-md-3">
											<div class="form-group">
												<label>Thương hiệu <em>(*)</em>
													<span class="error errors_brand_id"></span>
													<button type="button" class="more" data-toggle="modal" data-target="#brandModal" data-name="Thêm thương hiệu" title="Thêm thương hiệu"><i class="fa fa-plus-square-o more"></i></button></label>
													<select required name="brand_id" id="brandsSelectEdit" class="form-control select2" style="width: 100%;" data-placeholder="Chọn thương hiệu">
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
													<label>Xuất xứ <em>(*)</em>
														<span class="error errors_country_id"></span>
														<button type="button" class="more" data-toggle="modal" data-target="#originModal" data-name="Thêm xuất xứ" title="Thêm xuất xứ"><i class="fa fa-plus-square-o more"></i></button></label>
														<select required name="country_id" id="originsSelectEdit" class="form-control select2" style="width: 100%;" data-placeholder="Chọn xuất xứ">
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
														<label>Nhà phân phối <em>(*)</em>
															<span class="error errors_supplier_id"></span>
															<button type="button" class="more" data-toggle="modal" data-target="#supplierModal" data-name="Thêm nhà phân phối" title="Thêm nhà phân phối"><i class="fa fa-plus-square-o more"></i></button></label>
															<select required name="supplier_id" id="suppliersSelectEdit" class="form-control select2" style="width: 100%;" data-placeholder="Chọn nhà phân phối">
																<option></option>
																@foreach ($suppliers as $supplier)
																<option value="{{$supplier->id}}" >{{$supplier->name}}</option>
																@endforeach
															</select>
														</div>
													</div>
													<br>
													{{-- danh mục --}}
													<div class="col-md-3">
														<label>Danh mục <em>(*)</em>
															<span class="error errors_category_id"></span>
															<button type="button" class="more" data-toggle="modal" data-target="#categoryModal" data-name="Thêm danh mục" title="Thêm danh mục"><i class="fa fa-plus-square-o more"></i></button></label>
															<select required name="category_id" id="categoriesSelectEdit" class="form-control select2" style="width: 100%;" data-placeholder="Chọn danh mục">
																<option></option>
																@foreach ($categories as $category)
																<option value="{{$category->id}}" >{{$category->name}}</option>
																@endforeach
															</select>
														</div>
														{{-- thẻ --}}
														<div class="col-md-3">
															<label>Thẻ<button type="button" class="more" data-toggle="modal" data-target="#tagModal" data-name="Thêm thẻ" title="Thêm thẻ"><i class="fa fa-plus-square-o more"></i></button></label>
															<select name="tag_id[]" id="tagsSelectEdit" class="form-control select2" style="width: 100%;" data-placeholder="Chọn thẻ" multiple="multiple">
																<option></option>
																@foreach ($tags as $tag)
																<option value="{{$tag->id}}" >{{$tag->name}}</option>
																@endforeach
															</select>
														</div>
														{{-- màu sắc --}}
														<div class="col-md-3">
															<label>Màu sắc<button type="button" class="more" data-toggle="modal" data-target="#colorModal" data-name="Thêm màu sắc" title="Thêm màu sắc"><i class="fa fa-plus-square-o more"></i></button></label>
															<select name="color_id[]" id="colorsSelectEdit" class="form-control select2" style="width: 100%;" data-placeholder="Chọn màu sắc" multiple="multiple">
																<option></option>
																@foreach ($colors as $color)
																<option value="{{$color->id}}" >{{$color->name}}</option>
																@endforeach
															</select>
														</div>
														{{-- kích thước --}}
														<div class="col-md-3">
															<label>Kích thước<button type="button" class="more" data-toggle="modal" data-target="#sizeModal" data-name="Thêm kích thước" title="Thêm kích thước"><i class="fa fa-plus-square-o more"></i></button></label>
															<select name="size_id[]" id="sizesSelectEdit" class="form-control select2" style="width: 100%;" data-placeholder="Chọn kích thước" multiple="multiple" >
																<option></option>
																@foreach ($sizes as $size)
																<option value="{{$size->id}}" >{{$size->name}}</option>
																@endforeach
															</select>
														</div>
													</div>
												</div>
											</div>
											<br>
											{{-- Giá sản phẩm --}}
											<div class="row">
												<div class="box collapsed-box box-primary">
													<div class="box-header with-border">
														<h3 class="box-title">Giá sản phẩm</h3>
														<div class="box-tools pull-right">
															<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
															title="Collapse">
															<i class="fa fa-plus"></i></button>
														</div>
													</div>
													<div class="box-body">
														<label for="in_price">Giá nhập (VNĐ)</label>
														<input class="form-control input-lg" id="in_price" type="text" value="0" data-type="currency" placeholder="1,000,000" name="in_price">
														<br>
														<label for="general_price">Giá thị trường (VNĐ)</label>
														<input class="form-control input-lg" id="general_price" type="text" value="0" data-type="currency" placeholder="1,000,000" name="general_price">
														<br>
														<label for="in_price">Giá bán (VNĐ)</label>
														<input class="form-control input-lg" id="out_price" type="text" value="0" data-type="currency" placeholder="1,000,000" name="out_price">
													</div>
												</div>
											</div>
											<br>
											{{-- Mô tả sản phẩm --}}
											<div class="row">
												<div class="box collapsed-box box-info">
													<div class="box-header with-border">
														<h3 class="box-title">Thông tin sản phẩm</h3>
														<div class="box-tools pull-right">
															<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
															title="Collapse">
															<i class="fa fa-plus"></i></button>
														</div>
													</div>
													<div class="box-body">
														<label for="name">Giới thiệu sản phẩm</label>
														<textarea id="overview-edit" name="overview" class="form-control" placeholder="Giới thiệu sản phẩm"></textarea>
														<br>
														<label for="name">Thông tin sản phẩm</label>
														<textarea id="description-edit" name="description-edit" class="form-control" placeholder="Nhập mô tả"></textarea>
													</div>
												</div>
											</div>
											<br>
										</div>
										<div class="modal-footer">
											<button type="submit" id="btn-edit" class="btn btn-primary save" >Lưu lại</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						{{-- ./modal edit--}}
						{{-- more --}}
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
										<div class="form-group">
											<label for="">Viết tắt</label>
											<input type="text" class="form-control more-acronym" name="acronym" placeholder="Viết tắt" required>
											<span class="error errors_acronym"></span>
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
										<select name="parent_id" id="parentSelect" class="form-control select2 more-select" style="width: 100%;" data-placeholder="Chọn danh mục">
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
									<div class="form-group">
										<label for="">Viết tắt</label>
										<input type="text" class="form-control more-acronym" name="acronym" placeholder="Viết tắt" required>
										<span class="error errors_acronym"></span>
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
								<div class="form-group">
									<label for="">Viết tắt</label>
									<input type="text" class="form-control more-acronym" name="acronym" placeholder="Viết tắt" required>
									<span class="error errors_acronym"></span>
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
								<div class="form-group">
									<label for="">Viết tắt</label>
									<input type="text" class="form-control more-acronym" name="acronym" placeholder="Viết tắt" required>
									<span class="error errors_acronym"></span>
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
							<div class="form-group">
								<label for="">Viết tắt</label>
								<input type="text" class="form-control more-acronym" name="acronym" placeholder="Viết tắt" required>
								<span class="error errors_acronym"></span>
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
						<div class="form-group">
							<label for="">Viết tắt</label>
							<input type="text" class="form-control more-acronym" name="acronym" placeholder="Viết tắt" required>
							<span class="error errors_acronym"></span>
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
					<div class="form-group">
						<label for="">Viết tắt</label>
						<input type="text" class="form-control more-acronym" name="acronym" placeholder="Viết tắt" required>
						<span class="error errors_acronym"></span>
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
					<input type="text" class="form-control more-slug" name="slug"placeholder="Đường dẫn" required>
					<span class="error errors_slug"></span>
				</div>
				<div class="form-group">
					<label for="">Viết tắt</label>
					<input type="text" class="form-control more-acronym" name="acronym" placeholder="Viết tắt" required>
					<span class="error errors_acronym"></span>
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
{{-- Xem chi tiết sản phẩm --}}
<div class="modal fade more-item" id="detailProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-lg modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="modal-title" id="ModalTitle"><strong>Chi tiết sản phẩm</strong></h2>
			</div>
			<div class="modal-body">
				<div class="col-md-12" id="product-info" style="margin-top: 25px">
					<div class="col-md-6" id="slides">
					</div>
					<div class="col-md-6" id="info" style="display: grid;">
						<h3 id="product-name"></h3>
						<div id="product-overview"></div>
						<div id="product-color">
							<h5><strong>Chọn màu: <span id="color-selected"></span></strong></h5>
							<div class="color-box options">
								<ul class="color-items" id="color-items">
								</ul>
							</div>
						</div>
						<div id="product-size">
							<h5><strong>Chọn kích cỡ: <span id="size-selected"></span></strong></h5>
							<div class="color-box options">
								<ul class="color-items" id="size-items">
								</ul>
							</div>
						</div>
						<div id="product-quantity">
							<h5><strong>Số lượng: </strong><span id="detail_quantity"></span></h5>
						</div>
						<div id="product-price">
							<h5><strong>Giá nhập: </strong><span id="detail_in_price"></span></h5>
							<h5><strong>Giá thị trường: </strong><span id="detail_general_price"></span></h5>
							<h5><strong>Giá bán: </strong><span id="detail_out_price"></span></h5>
							<h5><strong>Giá khuyến mại: </strong><span id="detail_sale_price"></span></h5>
						</div>
					</div>
				</div>
				<br>
				<div class="col-md-12">
					<div style="border-top: 1px solid #e1e1e1;
					border-bottom: 1px solid #e1e1e1;
					text-align: center;">
					<h3>Mô tả sản phẩm</h3>
				</div>
				<div  id="product-description"></div>
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>
</div>