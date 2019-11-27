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