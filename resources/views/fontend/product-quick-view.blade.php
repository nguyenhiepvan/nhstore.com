<div class="product-popup product-quickview">
    <div class="product">
        <div class="product-media">
            <div class="product-quickview-slider">
                <ul class="slides">
                    <li data-thumb="http://placehold.it/312x405">
                        <img src="http://placehold.it/312x405" alt="" />
                    </li>
                    <li data-thumb="http://placehold.it/312x405">
                        <img src="http://placehold.it/312x405" alt="" />
                    </li>
                    <li data-thumb="http://placehold.it/312x405">
                        <img src="http://placehold.it/312x405" alt="" />
                    </li>
                </ul>
                <!-- /slides -->
            </div>
            <!-- /product-quickview-slider -->
        </div>
        <!-- /product-media -->

        <div class="product-body">
            <div class="product-title">
                <p><a href="#">Black Cotton Leggings</a></p>
            </div>
            <!-- /product-title -->
            <div class="product-rate padding-top-10">
                <i class="icon_star_alt"></i>
                <i class="icon_star_alt"></i>
                <i class="icon_star_alt"></i>
                <i class="icon_star_alt"></i>
                <i class="icon_star_alt not-rated"></i>
                <span>3 Ratting(s)</span>
            </div>
            <!-- /product-rate -->

            <div class="product-price padding-vertical-30">
                <p><i class="fa fa-gbp"></i>160.00</p>
            </div>
            <!-- /product-price -->

            <div class="product-description">
                <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram.</p>
            </div>
            <!-- /product-description -->

            <div class="product-list-actions padding-vertical-25">
                <form action="product-quick-view.html">

                    <div class="form-group">
                        <label for="p_size">Size *</label>
                        <select name="p_size" id="p_size" class="form-control">
                            <option value="">- Please Select -</option>
                            <option value="">XL</option>
                            <option value="">L</option>
                            <option value="">M</option>
                            <option value="">S</option>
                        </select>
                        <!-- /select -->
                    </div>
                    <!-- /form-group -->

                    <div class="form-group">
                        <label for="p_color">Color *</label>
                        <select name="p_color" id="p_color" class="form-control">
                            <option value="">- Please Select -</option>
                            <option value="">Blue</option>
                            <option value="">Red</option>
                            <option value="">Green</option>
                            <option value="">Yellow</option>
                        </select>
                        <!-- /select -->
                    </div>
                    <!-- /form-group -->

                </form>
                <!-- /form -->

                <div class="required-alert padding-top-10 padding-bottom-25">
                    <p>Required Fields *</p>
                </div>
                <!-- /required-alert -->

                <div class="product-quantity">
                    <p>Quanty:</p>
                    <div class="quantity">
                        <input type="button" value="-" class="minus">
                        <input type="text" value="02" class="quantity-number">
                        <input type="button" value="+" class="plus">
                    </div>
                </div>
                <!-- /product-quantity -->

                <div class="cart-btn">
                    <button class="add-to-cart">+ Add to cart</button>
                </div>
                <!-- /cart-btn -->
            </div>
            <!-- /product-list-actions -->
        </div>
        <!-- /product-body -->
    </div>
    <!-- /product -->
</div>
<!-- /product-popup -->

<script>
    $('.product-quickview-slider').flexslider({
        animation: 'slide',
        controlNav: 'thumbnails',
        directionNav: false
    });
</script>