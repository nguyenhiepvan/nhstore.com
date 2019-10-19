<!-- Header Begin -->
<header>
  <nav class="main-nav menu-dark menu-transparent nav-transparent">
    <div class="col-md-12">
      <div class="navbar">
        <div class="brand-logo">
          <a href="{{ route('homepage') }}" class="navbar-brand">
            <img src="{{ asset('assets/fontend/img/logo.png') }}" alt="" />
          </a>
        </div>
        <!-- brand-logo -->
        <div class="navbar-header">
          <div class="inner-nav right-nav">
            <ul class="rightnav-links">
              <li>
                <a href="#" id="search-trigger"><i class="fa fa-search"></i></a>
                <form action="#" id="search" method="get" class="">
                  <div class="input">
                    <div class="container">
                      <input class="search" placeholder="Search for products..." type="text">
                      <button class="submit" type="submit" value="close"><i class="fa fa-search"></i>
                      </button>
                    </div>
                    <!-- /container -->
                  </div>
                  <!-- /input -->
                  <button class="icon_close" id="close" type="reset"></button>
                </form>
                <!-- /form -->
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-bars"></i>
                </a>
              </li>
              <li>
                <a href="#" class="side-cart-toggle">
                  <i class="icon_bag_alt"></i>
                  <span class="notice-num">1</span>
                </a>
              </li>
              <li>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".collapse">
                  <span class="sr-only"></span>
                  <i class="fa fa-bars"></i>
                </button>
              </li>
            </ul>
          </div>
          <!-- /right-nav -->
        </div>
        <!-- navbar-header -->
        <div class="custom-collapse navbar-collapse collapse inner-nav margin-left-100">
          <ul class="nav navbar-nav nav-links">
            <li><a href="{{ route('homepage') }}">Trang chủ</a>
            </li>
            <!-- /dropdown -->
            <li><a href="{{ route('cart') }}">Giỏ hàng</a>
            </li>
            <li><a href="{{ route('products') }}">Sản phẩm</a>
            </li>
            <li><a href="{{ route('contact') }}">Liên hệ</a>
            </li>
            <li><a href="{{ route('blogs') }}">Blog</a>
            </li>
          </ul>
          <!-- /nav -->
        </div>
        <!-- /collapse -->
      </div>
      <!-- /navbar -->
      <div class="side-cart">
        <div class="close-btn text-center padding-vertical-30">
          <a href="#" class="close-cart">close</a>
        </div>
        <!-- /close-btn -->
        <div class="shoping-cart-box">
          <div class="cart-product-list padding-bottom-20">
            <div class="cart-product">
              <a href="#"><img src="http://placehold.it/74x98" alt="">
              </a>
              <div class="cart-product-info">
                <div class="product-name">
                  <a href="#">Black Cotton Leggings</a>
                </div>
                <!-- /product-name -->
                <div class="product-atributes padding-vertical-15">
                  <p class="quantity">Qty: 02</p>
                </div>
                <!-- /product-atributes -->
                <div class="product-price">
                  <p><i class="fa fa-gbp"></i>160.00</p>
                </div>
                <!-- /product-price -->
                <a href="#" class="remove-btn"><i class="fa fa-close"></i></a>
              </div>
              <!-- /cart-product-info -->
            </div>
            <!-- /cart-product -->
            <div class="cart-product">
              <a href="#"><img src="http://placehold.it/74x98" alt="">
              </a>
              <div class="cart-product-info">
                <div class="product-name">
                  <a href="#">Black Cotton Leggings</a>
                </div>
                <!-- /product-name -->
                <div class="product-atributes padding-vertical-15">
                  <p class="quantity">Qty: 02</p>
                </div>
                <!-- /product-atributes -->
                <div class="product-price">
                  <p><i class="fa fa-gbp"></i>160.00</p>
                </div>
                <!-- /product-price -->
                <a href="#" class="remove-btn"><i class="fa fa-close"></i></a>
              </div>
              <!-- /cart-product-info -->
            </div>
            <!-- /cart-product -->
          </div>
          <!-- /cart-product-list -->
          <div class="cart-prices padding-top-30">
            <div class="shipping">
              <span class="shipping-text">Shipping :</span>
              <span class="product-price pull-right"><i class="fa fa-gbp"></i> 20.00</span>
            </div>
            <!-- /shipping -->
            <div class="total-price padding-top-15">
              <span class="price-text">Total :</span>
              <span class="product-price pull-right"><i class="fa fa-gbp"></i>160.00</span>
            </div>
            <!-- /total-price -->
          </div>
          <!-- /cart-prices -->
          <div class="cart-buttons margin-top-30">
            <a href="#" class="view-cart-btn">View Cart</a>
            <a href="#" class="checkout-btn margin-top-25">Checkout</a>
          </div>
          <!-- /cart-buttons -->
        </div>
        <!-- /shoping-cart-box -->
      </div>
      <!-- /side-cart -->
    </div>
    <!-- /container -->
  </nav>
  <!-- /nav -->
</header>
    <!-- Header End -->