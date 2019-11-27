        <!-- Header Begin -->
        <header class="header absolute bg-white">
          <div class="container">
            <div id="nav-bar" class="side-nav toggled">
              <a class="sidebar-toggle" href="#menu-toggle" id="menu-toggle"><i class="fa fa-bars"></i></a>
              <!-- /sidebar-toggle -->
              <nav class="sidebar-inner sidebar-nav">
                <div class="close-btn text-center padding-vertical-50">
                  <a href="#menu-toggle" class="close-menu">Đóng</a>
                </div>
                <!-- /close-btn -->
                <ul class="sidebar-menu">
                  <li><a href="{{ route('homepage') }}">Trang chủ</a>
                  </li>
                  <!-- /dropdown -->
                  <li><a href="{{ route('cart') }}">Giỏ hàng</a>
                  </li>
                  <li><a href="{{ route('products') }}">Sản phẩm</a>
                  </li>
                  <li class="level-dropdown"><a href="#">Danh mục sản phẩm</a>
                    {!!$categories!!}
                    <!-- /sub-menu -->
                  </li>
                  <li><a href="{{ route('contact') }}">Liên hệ</a>
                  </li>
                  <li><a href="{{ route('blogs') }}">Blog</a>
                  </li>
                </ul>
                <!-- /sidebar-menu -->
                <div class="menu-social margin-top-60">
                  <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-pinterest-p"></i></a>
                    </li>
                  </ul>
                </div>
                <!-- /menu-social -->
              </nav>
              <!-- /sidebar-nav -->
              <div class="side-cart">
                <div class="close-btn text-center padding-vertical-30">
                  <a href="#" class="close-cart">Đóng</a>
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
              <div class="nav-logo text-center">
                <a class="logo-wrapper" href="{{ route('homepage') }}">
                  <img class="logo" src="{{asset('assets/fontend/img/logo-dark.png')}}" alt="">
                </a>
                <!-- /logo-wrapper -->
              </div>
              <!-- /nav-logo -->
              <div class="pull-right">
                <div class="right-nav">
                  <ul>
                    <li>
                      <a href="#" id="search-trigger"><i class="fa fa-search"></i></a>
                      <form action="#" id="search" method="get">
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
                      <!-- /form-->
                    </li>
                    <li>
                      <a href="#" class="side-cart-toggle">
                        <i class="icon_bag_alt"></i>
                        <span class="notice-num">1</span>
                      </a>
                    </li>
                  </ul>
                </div>
                <!-- /right-nav -->
              </div>
              <!-- /pull-right -->
            </div>
            <!-- /side-nav -->
          </div>
          <!-- /container -->
        </header>
        <!-- header End -->