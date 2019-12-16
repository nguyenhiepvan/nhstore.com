<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="{{asset('assets/backend/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p>{{Auth::guard('web')->user()->name}}</p>
				<a href="#"><i class="fa fa-circle text-success"></i> Online
				</a>
			</div>
		</div>
		<!-- search form -->
		<form action="#" method="get" class="sidebar-form">
			<div class="input-group">
				<input type="text" name="q" class="form-control" placeholder="Search...">
				<span class="input-group-btn">
					<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
					</button>
				</span>
			</div>
		</form>
		<!-- /.search form -->
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">Quản trị hệ thống</li>
			<li>
				<a href="#">
					<img src="{{asset('assets/backend/dist/img/icons/iconsdashboard.png')}}" class="icons"> <span>Dashboard</span>
				</a>
			</li>
			{{-- Hóa đơn nhập xuất --}}
			<li class="treeview @if(Request::is('*receipts')||Request::is('*receipts*')) active menu-open @endif">
				<a href="#">
					<img src="{{asset('assets/backend/dist/img/icons/iconsreceipt.png')}}" class="icons">
					<span>Hóa đơn</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu" @if(Request::is('*receipts')||Request::is('*receipts*')) style="display: block;" @endif>
					<li @if(Request::is('*in-receipts')||Request::is('*in-receipts*')) class="active" @endif>
						<a href="{{ route('admin.in-receipts.index') }}"><img src="{{asset('assets/backend/dist/img/icons/invoice.png')}}" class="icons">Hóa đơn nhập
						</a>
					</li>
					<li>
						<a href="#"><img src="{{asset('assets/backend/dist/img/icons/bill.png')}}" class="icons">Hóa đơn xuất
						</a>
					</li>
					<li>
						<a href="#"><img src="{{asset('assets/backend/dist/img/icons/bill.png')}}" class="icons">Đơn hàng
						</a>
					</li>
				</ul>
			</li>
			{{-- Kho hàng --}}
			<li class="treeview @if(Request::is('*collections')
			||Request::is('*collections*')
			||Request::is('*products')
			||Request::is('*products*')
			||Request::is('*warehouse')
			||Request::is('*warehouse*')
			||Request::is('*brands')
			||Request::is('*brands*')
			||Request::is('*materials')
			||Request::is('*materials*')
			||Request::is('*suppliers')
			||Request::is('*suppliers*')
			)
			active menu-open @endif">
			<a href="#">
				<img src="{{asset('assets/backend/dist/img/icons/warehouse.png')}}" class="icons">
				<span>Kho hàng</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu" @if(Request::is('*products')||Request::is('*products*')
				||Request::is('*warehouse')||Request::is('*warehouse*')
				) style="display: block;" @endif>
				<li @if(Request::is('*products')||Request::is('*products*')) class="active" @endif>
					<a href="{{ route('admin.products.index') }}">
						<img src="{{asset('assets/backend/dist/img/icons/suit.png')}}" class="icons">Sản phẩm
					</a>
				</li>
				<li @if(Request::is('*collections')||Request::is('*collections*')) class="active" @endif>
					<a href="{{ route('admin.collections.index') }}">
						<img src="{{asset('assets/backend/dist/img/icons/collection.png')}}" class="icons">Bộ sưu tập
					</a>
				</li>
				<li @if(Request::is('*warehouse')||Request::is('*warehouse*')) class="active" @endif>
					<a href="{{ route('admin.warehouse.index') }}">
						<img src="{{asset('assets/backend/dist/img/icons/list.png')}}" class="icons">Kho hàng
					</a>
				</li>
				<li @if(Request::is('*brand')||Request::is('*brand*')) class="active" @endif>
					<a href="#">
						<img src="{{asset('assets/backend/dist/img/icons/iconstrademark.png')}}" class="icons">Thương hiệu
					</a>
				</li>
				<li @if(Request::is('*suppliers')||Request::is('*suppliers*')) class="active" @endif>
					<a href="#"><img src="{{asset('assets/backend/dist/img/icons/iconssewing.png')}}" class="icons"></i>Chất liệu
					</a>
				</li>
				<li>
					<a href=".#"><img src="{{asset('assets/backend/dist/img/icons/iconssupplier.png')}}" class="icons">Nhà phẩn phối
					</a>
				</li>
			</ul>
		</li>
		<li class="treeview">
			<a href="#">
				<img src="{{asset('assets/backend/dist/img/icons/iconscommunication.png')}}" class="icons">
				<span>Khách hàng</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li>
					<a href="#"><img src="{{asset('assets/backend/dist/img/icons/iconsbill.png')}}" class="icons">Đơn hàng
					</a>
				</li>
				<li>
					<a href="#"><img src="{{asset('assets/backend/dist/img/icons/iconsshipping.png')}}" class="icons">Đơn vị vận chuyển
					</a>
				</li>
			</ul>
		</li>
		<li class="treeview">
			<a href="#">
				<img src="{{asset('assets/backend/dist/img/icons/iconsaccount.png')}}" class="icons">
				<span>Tài khoản</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li>
					<a href="#"><img src="{{asset('assets/backend/dist/img/icons/iconsbill.png')}}" class="icons">Đơn hàng
					</a>
				</li>
				<li>
					<a href="#"><img src="{{asset('assets/backend/dist/img/icons/iconsshipping.png')}}" class="icons">Đơn vị vận chuyển
					</a>
				</li>
			</ul>
		</li>
		<li class="treeview">
			<a href="#">
				<img src="{{asset('assets/backend/dist/img/icons/iconswebsite.png')}}" class="icons">
				<span>Website</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li>
					<a href="{{ route('admin.categories.index') }}">
						<img src="{{asset('assets/backend/dist/img/icons/category.png')}}" class="icons">Danh mục
					</a>
				</li>
				<li>
					<a href="#">
						<img src="{{asset('assets/backend/dist/img/icons/iconsblogging.png')}}" class="icons">
						<span>Blog</span>
					</a>
				</li>
			</ul>
		</li>
		<li >
			<a href="#">
				<img src="{{asset('assets/backend/dist/img/icons/iconsresume.png')}}" class="icons">
				<span>Trang cá nhân</span>
			</a>
		</li>
	</ul>
</section>
<!-- /.sidebar -->
</aside>