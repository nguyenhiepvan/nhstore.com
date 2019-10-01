<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p>{{Auth::guard('web')->user()->name}}</p>
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
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
					<img src="/storage/icons/dashboard.png" class="icons"> <span>Dashboard</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="#"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
					<li><a href="#"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
				</ul>
			</li>
			<li class="treeview">
				<a href="#">
					<img src="/storage/icons/suit.png" class="icons">
					<span>Sản phẩm</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="{{ route('admin.products.index') }}">
						<img src="/storage/icons/products.png" class="icons">Sản phẩm</a>
					</li>
					<li><a href="#">
						<img src="/storage/icons/trademark.png" class="icons">Thương hiệu</a></li>
						<li><a href="#"><img src="/storage/icons/sewing.png" class="icons"></i>Chất liệu</a></li>
						<li><a href=".#"><img src="/storage/icons/supplier.png" class="icons">Nhà phẩn phối</a></li>
					</ul>
				</li>
				<li class="treeview">
					<a href="#">
						<img src="/storage/icons/bill_.png" class="icons">
						<span>Đơn hàng</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="#"><img src="/storage/icons/bill.png" class="icons">Đơn hàng</a></li>
						<li><a href="#"><img src="/storage/icons/shipping.png" class="icons">Đơn vị vận chuyển</a></li>
					</ul>
				</li>
				<li class="treeview">
					<a href="#">
						<img src="/storage/icons/receipt.png" class="icons">
						<span>Hóa đơn</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="#"><img src="/storage/icons/bill.png" class="icons">Đơn hàng</a></li>
						<li><a href="#"><img src="/storage/icons/shipping.png" class="icons">Đơn vị vận chuyển</a></li>
					</ul>
				</li>
				<li class="treeview">
					<a href="#">
						<img src="/storage/icons/communication.png" class="icons">
						<span>Khách hàng</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="#"><img src="/storage/icons/bill.png" class="icons">Đơn hàng</a></li>
						<li><a href="#"><img src="/storage/icons/shipping.png" class="icons">Đơn vị vận chuyển</a></li>
					</ul>
				</li>
				<li class="treeview">
					<a href="#">
						<img src="/storage/icons/account.png" class="icons">
						<span>Tài khoản</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="#"><img src="/storage/icons/bill.png" class="icons">Đơn hàng</a></li>
						<li><a href="#"><img src="/storage/icons/shipping.png" class="icons">Đơn vị vận chuyển</a></li>
					</ul>
				</li>
				<li class="treeview">
					<a href="#">
						<img src="/storage/icons/website.png" class="icons">
						<span>Website</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="#"><img src="/storage/icons/bill.png" class="icons">Đơn hàng</a></li>
						<li><a href="#"><img src="/storage/icons/shipping.png" class="icons">Đơn vị vận chuyển</a></li>
					</ul>
				</li>
				<li class="treeview">
					<a href="#">
						<img src="/storage/icons/blogging.png" class="icons">
						<span>Blog</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="#"><img src="/storage/icons/bill.png" class="icons">Đơn hàng</a></li>
						<li><a href="#"><img src="/storage/icons/shipping.png" class="icons">Đơn vị vận chuyển</a></li>
					</ul>
				</li>
				<li class="treeview">
					<a href="#">
						<img src="/storage/icons/resume.png" class="icons">
						<span>Trang cá nhân</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="#"><img src="/storage/icons/bill.png" class="icons">Đơn hàng</a></li>
						<li><a href="#"><img src="/storage/icons/shipping.png" class="icons">Đơn vị vận chuyển</a></li>
					</ul>
				</li>
			</ul>
		</section>
		<!-- /.sidebar -->
	</aside>