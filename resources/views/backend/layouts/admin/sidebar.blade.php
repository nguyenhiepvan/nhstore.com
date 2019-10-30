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
			<li class="header">MAIN NAVIGATION</li>
			<li class="treeview">
				<a href="#">
					<img src="{{asset('assets/backend/dist/img/icons/iconsdashboard.png')}}" class="icons"> <span>Dashboard</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="#"><i class="fa fa-circle-o"></i> Dashboard v1
						</a>
					</li>
					<li>
						<a href="#"><i class="fa fa-circle-o"></i> Dashboard v2
						</a>
					</li>
				</ul>
			</li>
			<li class="treeview">
				<a href="#">
					<img src="{{asset('assets/backend/dist/img/icons/iconssuit.png')}}" class="icons">
					<span>Sản phẩm</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="{{ route('admin.products.index') }}">
							<img src="{{asset('assets/backend/dist/img/icons/iconsproducts.png')}}" class="icons">Sản phẩm
						</a>
					</li>
					<li>
						<a href="{{ route('admin.categories.index') }}">
							<img src="{{asset('assets/backend/dist/img/icons/category.png')}}" class="icons">Danh mục
						</a>
					</li>
					<li>
						<a href="#">
							<img src="{{asset('assets/backend/dist/img/icons/iconstrademark.png')}}" class="icons">Thương hiệu
						</a>
					</li>
					<li>
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
					<img src="{{asset('assets/backend/dist/img/icons/iconsbill_.png')}}" class="icons">
					<span>Đơn hàng</span>
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
					<img src="{{asset('assets/backend/dist/img/icons/iconsreceipt.png')}}" class="icons">
					<span>Hóa đơn</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="#"><img src="{{asset('assets/backend/dist/img/icons/invoice.png')}}" class="icons">Hóa đơn nhập
						</a>
					</li>
					<li>
						<a href="#"><img src="{{asset('assets/backend/dist/img/icons/bill.png')}}" class="icons">Hóa đơn xuất
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
					<img src="{{asset('assets/backend/dist/img/icons/iconsblogging.png')}}" class="icons">
					<span>Blog</span>
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
					<img src="{{asset('assets/backend/dist/img/icons/iconsresume.png')}}" class="icons">
					<span>Trang cá nhân</span>
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
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>