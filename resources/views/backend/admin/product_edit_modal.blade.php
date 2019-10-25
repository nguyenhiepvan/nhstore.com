@php
function checkTag($id){
	foreach ($product->tags as $tag) {
		if ($id == $tag['id']) {
			return true;
		}
	}
	return false;
}
function checkColor($id){
	foreach ($product->colors as $color) {
		if ($id == $color['id']) {
			return true;
		}
	}
	return false;
}
@endphp
{{-- modal edit --}}
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-lg modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="modal-title" id="ModalTitle"><strong>Cập nhật sản phẩm</strong></h2>
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
								<input class="form-control input-lg name" type="text" placeholder="Nhập tên sản phẩm" value="{{$product->name}}" id="name" name="name" required>
								<span class="error errors_name"></span>
								<br>
								<label for="slug">Đường dẫn sản phẩm <em>(*)</em></label>
								<input class="form-control input-lg slug" type="text" placeholder="Nhập đường dẫn sản phẩm" value="{{$product->slug}}" id="slug" name="slug" required>
								<span class="error errors_slug"></span>
								<br>
								<label for="">Viết tắt</label>
								<input type="text" class="form-control input-lg acronym" value="{{$product->acronym}}" name="acronym"placeholder="Viết tắt" required>
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
									<img id="preview-ava" src="{{$product->images->where('is_thumbnail',true)->first()['470X610']}}" style="margin-left: 15px;margin-top:15px;max-height:100px;">
									<input id="avatar" src="{{$product->images->where('is_thumbnail',true)->first()['470X610']}}" class="form-control" type="text" name="thumbnail" readonly hidden required>
								</div>
								<br>
								<label for="images">Ảnh sản phẩm</label>
								<div>
									<span id="holder">
										@foreach ($product->images->where('is_thumbnail',false) as $image)
										<div class="show-image"><button type="button" title="Loại bỏ" class="remove-img" data-target="javascript:;"><i class="fa fa-close"></i></button><div><img src="{{$image['470X610']}}" style="margin-top:15px;max-height:100px;"></div></div>
										@endforeach
									</span>
									<div style="clear: both;">
										<a id="lfm" data-input="images" class="btn " title="Thêm ảnh">
											<img src="{{ asset('assets/backend/dist/img/icons/add-image.png') }}" class="icons" id="add-icon">
										</a>
										<input id="images" value="
										@foreach ($product->images->where('is_thumbnail',false) as $image)
										{{$image['470X610']}};
										@endforeach
										" class="form-control" type="text" name="images" hidden>
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
										<option value="{{$masterial->id}}" data-acronym="{{$masterial->acronym}}"
											@if ($material->id == $product->material_id)
											selected
											@endif
											>{{$masterial->name}}</option>
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
												<option value="{{$brand->id}}"
													@if ($brand->id == $product->brand_id)
													selected
													@endif
													>{{$brand->name}}</option>
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
														<option value="{{$country->id}}"
															@if ($country->id == $product->country_id)
															selected
															@endif
															>{{$country->name}}</option>
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
																<option value="{{$supplier->id}}"
																	@if ($supplier->id == $product->supplier_id)
																	selected
																	@endif
																	>{{$supplier->name}}</option>
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
																	<option value="{{$category->id}}"
																		@if ($category->id == $product->category_id)
																		selected
																		@endif
																		>{{$category->name}}</option>
																		@endforeach
																	</select>
																</div>
																{{-- thẻ --}}
																<div class="col-md-3">
																	<label>Thẻ<button type="button" class="more" data-toggle="modal" data-target="#tagModal" data-name="Thêm thẻ" title="Thêm thẻ"><i class="fa fa-plus-square-o more"></i></button></label>
																	<select name="tag_id[]" id="tagsSelect" class="form-control select2" style="width: 100%;" data-placeholder="Chọn thẻ" multiple="multiple">
																		<option></option>
																		@foreach ($tags as $tag)
																		<option value="{{$tag->id}}"
																			@if (checkTag($tag->id ))
																			selected
																			@endif
																			>{{$tag->name}}</option>
																			@endforeach
																		</select>
																	</div>
																	{{-- màu sắc --}}
																	<div class="col-md-3">
																		<label>Màu sắc<button type="button" class="more" data-toggle="modal" data-target="#colorModal" data-name="Thêm màu sắc" title="Thêm màu sắc"><i class="fa fa-plus-square-o more"></i></button></label>
																		<select name="color_id[]" id="colorsSelect" class="form-control select2" style="width: 100%;" data-placeholder="Chọn màu sắc" multiple="multiple">
																			<option></option>
																			@foreach ($colors as $color)
																			<option value="{{$color->id}}"
																				@if (checkColor($color->id ))
																				selected
																				@endif
																				>{{$color->name}}</option>
																				@endforeach
																			</select>
																		</div>
																		{{-- kích thước --}}
																		<div class="col-md-3">
																			<label>Kích thước<button type="button" class="more" data-toggle="modal" data-target="#sizeModal" data-name="Thêm kích thước" title="Thêm kích thước"><i class="fa fa-plus-square-o more"></i></button></label>
																			<select name="size_id[]" id="sizesSelect" class="form-control select2" style="width: 100%;" data-placeholder="Chọn kích thước" multiple="multiple" >
																				<option></option>
																				@foreach ($sizes as $size)
																				<option value="{{$size->id}}"
																					@if (checkSize($size->id ))
																					selected
																					@endif
																					>{{$size->name}}</option>
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
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
																<button type="submit" class="btn btn-primary save" >Lưu lại</button>
															</div>
														</form>
													</div>
												</div>
											</div>
			{{-- ./modal add--}}