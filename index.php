
<?php
  require_once "admin/utility.php" ;
  require_once "admin/getData.php" ;
  $array =  [
              "id" => [6,7,14,15,16,17,18,19,29]
            ];
  $listeParametre = getListeParametreByListeId($array);
  $parametre = $listeParametre["listParametreResponse"];
  $societeName = find($parametre,"id", 6);
  $societeAdresse = find($parametre,"id", 14);
  $societePhone = find($parametre,"id", 15);
  $societeMail = find($parametre,"id", 16);
  $societeInstagrame = find($parametre,"id", 17);
  $societeFacebook = find($parametre,"id", 18);
  $societeLinkedin = find($parametre,"id", 19);
  $societeYoutube = find($parametre,"id", 29);
  $titre = find($parametre,"id", 7);
?>

<!doctype html>
<html class="no-js" lang="en">
    <?php
        include("head.php");
    ?>
<body>
    <!-- Add your site or application content here -->

    <!-- Body main wrapper start -->
    <div class="wrapper home-two">
        <?php
            include("header.php");
        ?>

        <!-- Slider area -->
        <div class="slider-area">
            <!-- slider start -->
            <div class="slider-inner">
                <div id="mainSlider" class="nivoSlider nevo-slider">
                    <img src="assets/images/slider/1.webp" alt="main slider" title="#htmlcaption1"/>
                    <img src="assets/images/slider/2.webp" alt="main slider" title="#htmlcaption2"/>
                </div>
                <div id="htmlcaption1" class="nivo-html-caption slider-caption">
                    <div class="slider-progress"></div>
                    <div class="container">
                        <div class="slider-content slider-content-1 slider-animated-1 text-end">
                            <p class="hp1">It has finally started...</p>
                            <h1 class="hone">Huge sale up to</h1>
                            <h2 class="htwo">40% off</h2> 
                            <div class="button-1 hover-btn-2">
                                <a href="#">SHOP NOW</a>
                            </div>
                        </div>                        
                    </div>
                </div>
                <div id="htmlcaption2" class="nivo-html-caption slider-caption">
                    <div class="slider-progress"></div>
                    <div class="container">
                        <div class="slider-content slider-content-2 slider-animated-2 pull-left">
                            <p class="hp1">It has finally started...</p>
                            <h1 class="hone">Huge sale up to</h1>
                            <h2 class="htwo">40% off</h2> 
                            <div class="button-1 hover-btn-2">
                                <a href="#">SHOP NOW</a>
                            </div>
                        </div>					
                    </div>					
                </div>	
            </div>
            <!-- slider end -->
        </div>
        <!-- Slider area end -->

        <!-- Policy area -->
        <div class="policy-area">
            <div class="container">
                <div class="policy-area-inner">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="single-policy">
                                <div class="icon"><i class=" fa fa-truck"></i></div>
                                <div class="txt_cms">
                                    <h2>Free Shipping</h2>
                                    <p>Free shipping on all order</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="single-policy">
                                <div class="icon"><i class=" fa fa-credit-card"></i></div>
                                <div class="txt_cms">
                                    <h2>Money Guarantee</h2>
                                    <p>30 days money back</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="single-policy">
                                <div class="icon"><i class=" fa fa-question-circle"></i></div>
                                <div class="txt_cms">
                                    <h2>Online Support</h2>
                                    <p>online 24/24 on day</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="single-policy">
                                <div class="icon"><i class=" fa fa-sun-o"></i></div>
                                <div class="txt_cms">
                                    <h2>Secure Payment</h2>
                                    <p>100% secure payment</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
        <!-- Policy area end -->

        <!-- poslistcategories -->
        <div class="poslistcategories">
            <div class="container">
                <div class="pos_title_categories">
                    <h2>Hot <span>Categories</span> on Today</h2>
                    <p>Praesent volutpat ut nisl in hendrerit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Etiam porttitor, lacus in luctus molestie</p>
                </div>

                <div class="row pos_content">
                    <div class="block_content owl-carousel">
                        <!-- single item -->
                        <div class="list-categories">
                            <div class="box-inner">
                                <div class="thumb-category">
                                    <a href="single-product.html">
                                        <img src="assets/images/product/round/thumb-1.webp" alt="">
                                    </a>
                                </div>
                                <div class="desc-listcategoreis">
                                    <h3 class="name_categories"><a href="single-product.html">Women</a></h3>
                                    <p class="description-list">Praesent volutpat ut nisl in hendrerit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia</p>
                                    <div class="listcate_shop_now">
                                        <a href="cart.html">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- single item end -->
                        <!-- single item -->
                        <div class="list-categories">
                            <div class="box-inner">
                                <div class="thumb-category">
                                    <a href="single-product.html">
                                        <img src="assets/images/product/round/thumb-2.webp" alt="">
                                    </a>
                                </div>
                                <div class="desc-listcategoreis">
                                    <h3 class="name_categories"><a href="single-product.html">Men</a></h3>
                                    <p class="description-list">Praesent volutpat ut nisl in hendrerit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia</p>
                                    <div class="listcate_shop_now">
                                        <a href="cart.html">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- single item end -->
                        <!-- single item -->
                        <div class="list-categories">
                            <div class="box-inner">
                                <div class="thumb-category">
                                    <a href="single-product.html">
                                        <img src="assets/images/product/round/thumb-3.webp" alt="">
                                    </a>
                                </div>
                                <div class="desc-listcategoreis">
                                    <h3 class="name_categories"><a href="single-product.html">Health & Beauty</a></h3>
                                    <p class="description-list">Praesent volutpat ut nisl in hendrerit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia</p>
                                    <div class="listcate_shop_now">
                                        <a href="cart.html">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- single item end -->
                        <!-- single item -->
                        <div class="list-categories">
                            <div class="box-inner">
                                <div class="thumb-category">
                                    <a href="single-product.html">
                                        <img src="assets/images/product/round/thumb-1.webp" alt="">
                                    </a>
                                </div>
                                <div class="desc-listcategoreis">
                                    <h3 class="name_categories"><a href="single-product.html">Women</a></h3>
                                    <p class="description-list">Praesent volutpat ut nisl in hendrerit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia</p>
                                    <div class="listcate_shop_now">
                                        <a href="cart.html">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- single item end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- poslistcategories end -->

        <!-- product tabs container slider -->
        <div class="product-tabs-container-slider product_block_container">
            <div class="container-fluid">
                <div class="pos_tab">
                    <div class="pos_title_cate"><h2>Our Products</h2></div>
                    <div class="pos_desc"><p>Praesent volutpat ut nisl in hendrerit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Etiam porttitor, lacus in luctus molestie</p>
                    </div>
                </div>
                
                <ul class="nav tabs_slider">
                    <li><a href="#newarrival" data-bs-toggle="tab" class="active">New Arrival</a></li>
                    <li><a href="#bestseller" data-bs-toggle="tab">Bestseller</a></li>
                    <li><a href="#featuredproducts" data-bs-toggle="tab">Featured Products</a></li>
                </ul>

                <div class="tab-content pos_content">
                    <div class="tab-pane fade active" id="newarrival">
                        <div class="productTabContent1 owl-carousel">
                            <!-- single product -->
                            <div class="item-product">
                                <div class="product-miniature js-product-miniature">
                                    <div class="img_block">
                                        <a href="single-product.html" class="thumbnail product-thumbnail">
                                            <img src="assets/images/product/1.webp" alt="harosa product">
                                        </a>
                                        <ul class="product-flag">
                                            <li class="new"><span>New</span></li>
                                        </ul>
                                        <div class="quick-view">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#product_modal"  data-original-title="Quick View" class="quick_view"><i class="fa fa-search"></i></a>
                                        </div>
                                        <div class="hook-reviews">
                                            <div class="comments_note">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="product-price-and-shipping_top">
                                            <span class="discount-percentage discount-product">-8%</span>
                                        </div>
                                    </div>
                                    <div class="product_desc">
                                        <div class="manufacturer">
                                            <a href="shop.html">Studio Design</a>
                                        </div>
                                        <h1> <a href="single-product.html" class="product_name" title="Hummingbird printed t-shirt">Hummingbird printed t-shirt</a></h1>
                                        <div class="product-price-and-shipping">
                                            <span class="regular-price">$23.90</span>
                                            <span class="price price-sale">$21.99</span>
                                        </div>
                                        <div class="cart">
                                            <div class="product-add-to-cart">
                                                <a href="cart.html">Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single product end -->
                            <!-- single product -->
                            <div class="item-product">
                                <div class="product-miniature js-product-miniature">
                                    <div class="img_block">
                                        <a href="single-product.html" class="thumbnail product-thumbnail">
                                            <img src="assets/images/product/2.webp" alt="harosa product">
                                        </a>
                                        <ul class="product-flag">
                                            <li class="new"><span>New</span></li>
                                        </ul>
                                        <div class="quick-view">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#product_modal"  data-original-title="Quick View" class="quick_view"><i class="fa fa-search"></i></a>
                                        </div>
                                        <div class="hook-reviews">
                                            <div class="comments_note">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product_desc">
                                        <div class="manufacturer">
                                            <a href="shop.html">Studio Design</a>
                                        </div>
                                        <h1> <a href="single-product.html" class="product_name" title="Hummingbird printed t-shirt">Hummingbird printed t-shirt</a></h1>
                                        <div class="product-price-and-shipping">
                                            <span class="regular-price">$23.90</span>
                                            <span class="price price-sale">$21.99</span>
                                        </div>
                                        <div class="cart">
                                            <div class="product-add-to-cart">
                                                <a href="cart.html">Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single product end -->
                            <!-- single product -->
                            <div class="item-product">
                                <div class="product-miniature js-product-miniature">
                                    <div class="img_block">
                                        <a href="single-product.html" class="thumbnail product-thumbnail">
                                            <img src="assets/images/product/3.webp" alt="harosa product">
                                        </a>
                                        <ul class="product-flag">
                                            <li class="new"><span>New</span></li>
                                        </ul>
                                        <div class="quick-view">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#product_modal"  data-original-title="Quick View" class="quick_view"><i class="fa fa-search"></i></a>
                                        </div>
                                        <div class="hook-reviews">
                                            <div class="comments_note">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product_desc">
                                        <div class="manufacturer">
                                            <a href="shop.html">Studio Design</a>
                                        </div>
                                        <h1> <a href="single-product.html" class="product_name" title="Hummingbird printed t-shirt">Hummingbird printed t-shirt</a></h1>
                                        <div class="product-price-and-shipping">
                                            <span class="regular-price">$23.90</span>
                                            <span class="price price-sale">$21.99</span>
                                        </div>
                                        <div class="cart">
                                            <div class="product-add-to-cart">
                                                <a href="cart.html">Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single product end -->
                            <!-- single product -->
                            <div class="item-product">
                                <div class="product-miniature js-product-miniature">
                                    <div class="img_block">
                                        <a href="single-product.html" class="thumbnail product-thumbnail">
                                            <img src="assets/images/product/4.webp" alt="harosa product">
                                        </a>
                                        <ul class="product-flag">
                                            <li class="new"><span>New</span></li>
                                        </ul>
                                        <div class="quick-view">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#product_modal"  data-original-title="Quick View" class="quick_view"><i class="fa fa-search"></i></a>
                                        </div>
                                        <div class="hook-reviews">
                                            <div class="comments_note">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product_desc">
                                        <div class="manufacturer">
                                            <a href="shop.html">Studio Design</a>
                                        </div>
                                        <h1> <a href="single-product.html" class="product_name" title="Hummingbird printed t-shirt">Hummingbird printed t-shirt</a></h1>
                                        <div class="product-price-and-shipping">
                                            <span class="regular-price">$23.90</span>
                                            <span class="price price-sale">$21.99</span>
                                        </div>
                                        <div class="cart">
                                            <div class="product-add-to-cart">
                                                <a href="cart.html">Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single product end -->
                            <!-- single product -->
                            <div class="item-product">
                                <div class="product-miniature js-product-miniature">
                                    <div class="img_block">
                                        <a href="single-product.html" class="thumbnail product-thumbnail">
                                            <img src="assets/images/product/5.webp" alt="harosa product">
                                        </a>
                                        <ul class="product-flag">
                                            <li class="new"><span>New</span></li>
                                        </ul>
                                        <div class="quick-view">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#product_modal"  data-original-title="Quick View" class="quick_view"><i class="fa fa-search"></i></a>
                                        </div>
                                        <div class="hook-reviews">
                                            <div class="comments_note">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product_desc">
                                        <div class="manufacturer">
                                            <a href="shop.html">Studio Design</a>
                                        </div>
                                        <h1> <a href="single-product.html" class="product_name" title="Hummingbird printed t-shirt">Hummingbird printed t-shirt</a></h1>
                                        <div class="product-price-and-shipping">
                                            <span class="regular-price">$23.90</span>
                                            <span class="price price-sale">$21.99</span>
                                        </div>
                                        <div class="cart">
                                            <div class="product-add-to-cart">
                                                <a href="cart.html">Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single product end -->
                            <!-- single product -->
                            <div class="item-product">
                                <div class="product-miniature js-product-miniature">
                                    <div class="img_block">
                                        <a href="single-product.html" class="thumbnail product-thumbnail">
                                            <img src="assets/images/product/9.webp" alt="harosa product">
                                        </a>
                                        <ul class="product-flag">
                                            <li class="new"><span>New</span></li>
                                        </ul>
                                        <div class="quick-view">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#product_modal"  data-original-title="Quick View" class="quick_view"><i class="fa fa-search"></i></a>
                                        </div>
                                        <div class="hook-reviews">
                                            <div class="comments_note">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product_desc">
                                        <div class="manufacturer">
                                            <a href="shop.html">Studio Design</a>
                                        </div>
                                        <h1> <a href="single-product.html" class="product_name" title="Hummingbird printed t-shirt">Hummingbird printed t-shirt</a></h1>
                                        <div class="product-price-and-shipping">
                                            <span class="regular-price">$23.90</span>
                                            <span class="price price-sale">$21.99</span>
                                        </div>
                                        <div class="cart">
                                            <div class="product-add-to-cart">
                                                <a href="cart.html">Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single product end -->
                            <!-- single product -->
                            <div class="item-product">
                                <div class="product-miniature js-product-miniature">
                                    <div class="img_block">
                                        <a href="single-product.html" class="thumbnail product-thumbnail">
                                            <img src="assets/images/product/10.webp" alt="harosa product">
                                        </a>
                                        <ul class="product-flag">
                                            <li class="new"><span>New</span></li>
                                        </ul>
                                        <div class="quick-view">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#product_modal"  data-original-title="Quick View" class="quick_view"><i class="fa fa-search"></i></a>
                                        </div>
                                        <div class="hook-reviews">
                                            <div class="comments_note">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product_desc">
                                        <div class="manufacturer">
                                            <a href="shop.html">Studio Design</a>
                                        </div>
                                        <h1> <a href="single-product.html" class="product_name" title="Hummingbird printed t-shirt">Hummingbird printed t-shirt</a></h1>
                                        <div class="product-price-and-shipping">
                                            <span class="regular-price">$23.90</span>
                                            <span class="price price-sale">$21.99</span>
                                        </div>
                                        <div class="cart">
                                            <div class="product-add-to-cart">
                                                <a href="cart.html">Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single product end -->
                        </div>
                    </div>
                    <div class="tab-pane fade" id="bestseller">
                        <div class="productTabContent1 owl-carousel">
                            <!-- single product -->
                            <div class="item-product">
                                <div class="product-miniature js-product-miniature">
                                    <div class="img_block">
                                        <a href="single-product.html" class="thumbnail product-thumbnail">
                                            <img src="assets/images/product/1.webp" alt="harosa product">
                                        </a>
                                        <ul class="product-flag">
                                            <li class="new"><span>New</span></li>
                                        </ul>
                                        <div class="quick-view">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#product_modal"  data-original-title="Quick View" class="quick_view"><i class="fa fa-search"></i></a>
                                        </div>
                                        <div class="hook-reviews">
                                            <div class="comments_note">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="product-price-and-shipping_top">
                                            <span class="discount-percentage discount-product">-8%</span>
                                        </div>
                                    </div>
                                    <div class="product_desc">
                                        <div class="manufacturer">
                                            <a href="shop.html">Studio Design</a>
                                        </div>
                                        <h1> <a href="single-product.html" class="product_name" title="Hummingbird printed t-shirt">Hummingbird printed t-shirt</a></h1>
                                        <div class="product-price-and-shipping">
                                            <span class="regular-price">$23.90</span>
                                            <span class="price price-sale">$21.99</span>
                                        </div>
                                        <div class="cart">
                                            <div class="product-add-to-cart">
                                                <a href="cart.html">Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single product end -->
                            <!-- single product -->
                            <div class="item-product">
                                <div class="product-miniature js-product-miniature">
                                    <div class="img_block">
                                        <a href="single-product.html" class="thumbnail product-thumbnail">
                                            <img src="assets/images/product/2.webp" alt="harosa product">
                                        </a>
                                        <ul class="product-flag">
                                            <li class="new"><span>New</span></li>
                                        </ul>
                                        <div class="quick-view">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#product_modal"  data-original-title="Quick View" class="quick_view"><i class="fa fa-search"></i></a>
                                        </div>
                                        <div class="hook-reviews">
                                            <div class="comments_note">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product_desc">
                                        <div class="manufacturer">
                                            <a href="shop.html">Studio Design</a>
                                        </div>
                                        <h1> <a href="single-product.html" class="product_name" title="Hummingbird printed t-shirt">Hummingbird printed t-shirt</a></h1>
                                        <div class="product-price-and-shipping">
                                            <span class="regular-price">$23.90</span>
                                            <span class="price price-sale">$21.99</span>
                                        </div>
                                        <div class="cart">
                                            <div class="product-add-to-cart">
                                                <a href="cart.html">Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single product end -->
                            <!-- single product -->
                            <div class="item-product">
                                <div class="product-miniature js-product-miniature">
                                    <div class="img_block">
                                        <a href="single-product.html" class="thumbnail product-thumbnail">
                                            <img src="assets/images/product/3.webp" alt="harosa product">
                                        </a>
                                        <ul class="product-flag">
                                            <li class="new"><span>New</span></li>
                                        </ul>
                                        <div class="quick-view">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#product_modal"  data-original-title="Quick View" class="quick_view"><i class="fa fa-search"></i></a>
                                        </div>
                                        <div class="hook-reviews">
                                            <div class="comments_note">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product_desc">
                                        <div class="manufacturer">
                                            <a href="shop.html">Studio Design</a>
                                        </div>
                                        <h1> <a href="single-product.html" class="product_name" title="Hummingbird printed t-shirt">Hummingbird printed t-shirt</a></h1>
                                        <div class="product-price-and-shipping">
                                            <span class="regular-price">$23.90</span>
                                            <span class="price price-sale">$21.99</span>
                                        </div>
                                        <div class="cart">
                                            <div class="product-add-to-cart">
                                                <a href="cart.html">Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single product end -->
                            <!-- single product -->
                            <div class="item-product">
                                <div class="product-miniature js-product-miniature">
                                    <div class="img_block">
                                        <a href="single-product.html" class="thumbnail product-thumbnail">
                                            <img src="assets/images/product/4.webp" alt="harosa product">
                                        </a>
                                        <ul class="product-flag">
                                            <li class="new"><span>New</span></li>
                                        </ul>
                                        <div class="quick-view">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#product_modal"  data-original-title="Quick View" class="quick_view"><i class="fa fa-search"></i></a>
                                        </div>
                                        <div class="hook-reviews">
                                            <div class="comments_note">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product_desc">
                                        <div class="manufacturer">
                                            <a href="shop.html">Studio Design</a>
                                        </div>
                                        <h1> <a href="single-product.html" class="product_name" title="Hummingbird printed t-shirt">Hummingbird printed t-shirt</a></h1>
                                        <div class="product-price-and-shipping">
                                            <span class="regular-price">$23.90</span>
                                            <span class="price price-sale">$21.99</span>
                                        </div>
                                        <div class="cart">
                                            <div class="product-add-to-cart">
                                                <a href="cart.html">Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single product end -->
                            <!-- single product -->
                            <div class="item-product">
                                <div class="product-miniature js-product-miniature">
                                    <div class="img_block">
                                        <a href="single-product.html" class="thumbnail product-thumbnail">
                                            <img src="assets/images/product/9.webp" alt="harosa product">
                                        </a>
                                        <ul class="product-flag">
                                            <li class="new"><span>New</span></li>
                                        </ul>
                                        <div class="quick-view">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#product_modal"  data-original-title="Quick View" class="quick_view"><i class="fa fa-search"></i></a>
                                        </div>
                                        <div class="hook-reviews">
                                            <div class="comments_note">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product_desc">
                                        <div class="manufacturer">
                                            <a href="shop.html">Studio Design</a>
                                        </div>
                                        <h1> <a href="single-product.html" class="product_name" title="Hummingbird printed t-shirt">Hummingbird printed t-shirt</a></h1>
                                        <div class="product-price-and-shipping">
                                            <span class="regular-price">$23.90</span>
                                            <span class="price price-sale">$21.99</span>
                                        </div>
                                        <div class="cart">
                                            <div class="product-add-to-cart">
                                                <a href="cart.html">Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single product end -->
                            <!-- single product -->
                            <div class="item-product">
                                <div class="product-miniature js-product-miniature">
                                    <div class="img_block">
                                        <a href="single-product.html" class="thumbnail product-thumbnail">
                                            <img src="assets/images/product/10.webp" alt="harosa product">
                                        </a>
                                        <ul class="product-flag">
                                            <li class="new"><span>New</span></li>
                                        </ul>
                                        <div class="quick-view">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#product_modal"  data-original-title="Quick View" class="quick_view"><i class="fa fa-search"></i></a>
                                        </div>
                                        <div class="hook-reviews">
                                            <div class="comments_note">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product_desc">
                                        <div class="manufacturer">
                                            <a href="shop.html">Studio Design</a>
                                        </div>
                                        <h1> <a href="single-product.html" class="product_name" title="Hummingbird printed t-shirt">Hummingbird printed t-shirt</a></h1>
                                        <div class="product-price-and-shipping">
                                            <span class="regular-price">$23.90</span>
                                            <span class="price price-sale">$21.99</span>
                                        </div>
                                        <div class="cart">
                                            <div class="product-add-to-cart">
                                                <a href="cart.html">Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single product end -->
                        </div>
                    </div>
                    <div class="tab-pane fade" id="featuredproducts">
                        <div class="productTabContent1 owl-carousel">
                            <!-- single product -->
                            <div class="item-product">
                                <div class="product-miniature js-product-miniature">
                                    <div class="img_block">
                                        <a href="single-product.html" class="thumbnail product-thumbnail">
                                            <img src="assets/images/product/1.webp" alt="harosa product">
                                        </a>
                                        <ul class="product-flag">
                                            <li class="new"><span>New</span></li>
                                        </ul>
                                        <div class="quick-view">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#product_modal"  data-original-title="Quick View" class="quick_view"><i class="fa fa-search"></i></a>
                                        </div>
                                        <div class="hook-reviews">
                                            <div class="comments_note">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="product-price-and-shipping_top">
                                            <span class="discount-percentage discount-product">-8%</span>
                                        </div>
                                    </div>
                                    <div class="product_desc">
                                        <div class="manufacturer">
                                            <a href="shop.html">Studio Design</a>
                                        </div>
                                        <h1> <a href="single-product.html" class="product_name" title="Hummingbird printed t-shirt">Hummingbird printed t-shirt</a></h1>
                                        <div class="product-price-and-shipping">
                                            <span class="regular-price">$23.90</span>
                                            <span class="price price-sale">$21.99</span>
                                        </div>
                                        <div class="cart">
                                            <div class="product-add-to-cart">
                                                <a href="cart.html">Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single product end -->
                            <!-- single product -->
                            <div class="item-product">
                                <div class="product-miniature js-product-miniature">
                                    <div class="img_block">
                                        <a href="single-product.html" class="thumbnail product-thumbnail">
                                            <img src="assets/images/product/2.webp" alt="harosa product">
                                        </a>
                                        <ul class="product-flag">
                                            <li class="new"><span>New</span></li>
                                        </ul>
                                        <div class="quick-view">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#product_modal"  data-original-title="Quick View" class="quick_view"><i class="fa fa-search"></i></a>
                                        </div>
                                        <div class="hook-reviews">
                                            <div class="comments_note">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product_desc">
                                        <div class="manufacturer">
                                            <a href="shop.html">Studio Design</a>
                                        </div>
                                        <h1> <a href="single-product.html" class="product_name" title="Hummingbird printed t-shirt">Hummingbird printed t-shirt</a></h1>
                                        <div class="product-price-and-shipping">
                                            <span class="regular-price">$23.90</span>
                                            <span class="price price-sale">$21.99</span>
                                        </div>
                                        <div class="cart">
                                            <div class="product-add-to-cart">
                                                <a href="cart.html">Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single product end -->
                            <!-- single product -->
                            <div class="item-product">
                                <div class="product-miniature js-product-miniature">
                                    <div class="img_block">
                                        <a href="single-product.html" class="thumbnail product-thumbnail">
                                            <img src="assets/images/product/3.webp" alt="harosa product">
                                        </a>
                                        <ul class="product-flag">
                                            <li class="new"><span>New</span></li>
                                        </ul>
                                        <div class="quick-view">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#product_modal"  data-original-title="Quick View" class="quick_view"><i class="fa fa-search"></i></a>
                                        </div>
                                        <div class="hook-reviews">
                                            <div class="comments_note">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product_desc">
                                        <div class="manufacturer">
                                            <a href="shop.html">Studio Design</a>
                                        </div>
                                        <h1> <a href="single-product.html" class="product_name" title="Hummingbird printed t-shirt">Hummingbird printed t-shirt</a></h1>
                                        <div class="product-price-and-shipping">
                                            <span class="regular-price">$23.90</span>
                                            <span class="price price-sale">$21.99</span>
                                        </div>
                                        <div class="cart">
                                            <div class="product-add-to-cart">
                                                <a href="cart.html">Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single product end -->
                            <!-- single product -->
                            <div class="item-product">
                                <div class="product-miniature js-product-miniature">
                                    <div class="img_block">
                                        <a href="single-product.html" class="thumbnail product-thumbnail">
                                            <img src="assets/images/product/4.webp" alt="harosa product">
                                        </a>
                                        <ul class="product-flag">
                                            <li class="new"><span>New</span></li>
                                        </ul>
                                        <div class="quick-view">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#product_modal"  data-original-title="Quick View" class="quick_view"><i class="fa fa-search"></i></a>
                                        </div>
                                        <div class="hook-reviews">
                                            <div class="comments_note">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product_desc">
                                        <div class="manufacturer">
                                            <a href="shop.html">Studio Design</a>
                                        </div>
                                        <h1> <a href="single-product.html" class="product_name" title="Hummingbird printed t-shirt">Hummingbird printed t-shirt</a></h1>
                                        <div class="product-price-and-shipping">
                                            <span class="regular-price">$23.90</span>
                                            <span class="price price-sale">$21.99</span>
                                        </div>
                                        <div class="cart">
                                            <div class="product-add-to-cart">
                                                <a href="cart.html">Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single product end -->
                            <!-- single product -->
                            <div class="item-product">
                                <div class="product-miniature js-product-miniature">
                                    <div class="img_block">
                                        <a href="single-product.html" class="thumbnail product-thumbnail">
                                            <img src="assets/images/product/9.webp" alt="harosa product">
                                        </a>
                                        <ul class="product-flag">
                                            <li class="new"><span>New</span></li>
                                        </ul>
                                        <div class="quick-view">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#product_modal"  data-original-title="Quick View" class="quick_view"><i class="fa fa-search"></i></a>
                                        </div>
                                        <div class="hook-reviews">
                                            <div class="comments_note">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product_desc">
                                        <div class="manufacturer">
                                            <a href="shop.html">Studio Design</a>
                                        </div>
                                        <h1> <a href="single-product.html" class="product_name" title="Hummingbird printed t-shirt">Hummingbird printed t-shirt</a></h1>
                                        <div class="product-price-and-shipping">
                                            <span class="regular-price">$23.90</span>
                                            <span class="price price-sale">$21.99</span>
                                        </div>
                                        <div class="cart">
                                            <div class="product-add-to-cart">
                                                <a href="cart.html">Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single product end -->
                            <!-- single product -->
                            <div class="item-product">
                                <div class="product-miniature js-product-miniature">
                                    <div class="img_block">
                                        <a href="single-product.html" class="thumbnail product-thumbnail">
                                            <img src="assets/images/product/10.webp" alt="harosa product">
                                        </a>
                                        <ul class="product-flag">
                                            <li class="new"><span>New</span></li>
                                        </ul>
                                        <div class="quick-view">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#product_modal"  data-original-title="Quick View" class="quick_view"><i class="fa fa-search"></i></a>
                                        </div>
                                        <div class="hook-reviews">
                                            <div class="comments_note">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product_desc">
                                        <div class="manufacturer">
                                            <a href="shop.html">Studio Design</a>
                                        </div>
                                        <h1> <a href="single-product.html" class="product_name" title="Hummingbird printed t-shirt">Hummingbird printed t-shirt</a></h1>
                                        <div class="product-price-and-shipping">
                                            <span class="regular-price">$23.90</span>
                                            <span class="price price-sale">$21.99</span>
                                        </div>
                                        <div class="cart">
                                            <div class="product-add-to-cart">
                                                <a href="cart.html">Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single product end -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- product tabs container slider end -->

        <!-- cms info  -->
        <div class="cms_info">
            <img src="assets/images/bg/1_2.webp" alt="" class="img-responsive">
            <div class="cms_container">
                <div class="container">
                    <div class="info_content">
                        <p class="txt1">Something mystic, Something magical...</p>
                        <h2>Natural Spa</h2>
                        <p class="phone">(+08) 123 456 7890</p>
                        <p class="txt2">Praesent volutpat ut nisl in hendrerit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Etiam porttitor, lacus in luctus molestie</p>
                        <a href="#">Shop Collection in new year</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- cms info end -->

        <!-- home banner -->
        <div class="home-banner">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-md-6">
                        <div class="banner-box m-0">
                            <a href="shop.html"><img src="assets/images/banner/1_1.webp" alt="harosa"></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="banner-box m-0">
                            <a href="shop.html"><img src="assets/images/banner/2_1.webp" alt="harosa"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- home banner end -->

        <!-- categori mini product area -->
        <div class="categori-mini-product-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="pos-featured-products  product_block_container">
                            <div class="pos_title"><h2>featured</h2></div>
                        </div>
                        <div class=" pos_content row">
                            <div class="feature-item owl-carousel">
                                <div class="item-product">
                                    <!-- mini product -->
                                    <div class="product-miniature js-product-miniature">
                                        <div class="img_block">
                                            <a href="" class="thumbnail product-thumbnail">
                                                <img src="assets/images/product/mini/1.webp" alt="">
                                            </a>
                                            <div class="quick-view">
                                                <a href="" class="quick_view">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </div>
                                            <div class="hook-reviews">
                                                <div class="comments_note">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_desc">
                                            <div class="manufacturer">
                                                <a href="#">Graphic Corner</a>
                                            </div>
                                            <h1><a href="single-product.html">Mountain fox - Vector graphics</a></h1>
                                            <div class="product-price-and-shipping">
                                                <span class="price ">$9.00</span>
                                            </div>
                                            <div class="cart">
                                                <div class="product-add-to-cart"><a href="cart.html">Add to cart</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- mini product end -->
                                    <!-- mini product -->
                                    <div class="product-miniature js-product-miniature">
                                        <div class="img_block">
                                            <a href="" class="thumbnail product-thumbnail">
                                                <img src="assets/images/product/mini/2.webp" alt="">
                                            </a>
                                            <div class="quick-view">
                                                <a href="" class="quick_view">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </div>
                                            <div class="hook-reviews">
                                                <div class="comments_note">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_desc">
                                            <div class="manufacturer">
                                                <a href="#">Graphic Corner</a>
                                            </div>
                                            <h1><a href="single-product.html">Mountain fox - Vector graphics</a></h1>
                                            <div class="product-price-and-shipping">
                                                <span class="price ">$9.00</span>
                                            </div>
                                            <div class="cart">
                                                <div class="product-add-to-cart"><a href="cart.html">Add to cart</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- mini product end -->
                                    <!-- mini product -->
                                    <div class="product-miniature js-product-miniature">
                                        <div class="img_block">
                                            <a href="" class="thumbnail product-thumbnail">
                                                <img src="assets/images/product/mini/3.webp" alt="">
                                            </a>
                                            <div class="quick-view">
                                                <a href="" class="quick_view">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </div>
                                            <div class="hook-reviews">
                                                <div class="comments_note">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_desc">
                                            <div class="manufacturer">
                                                <a href="#">Graphic Corner</a>
                                            </div>
                                            <h1><a href="single-product.html">Mountain fox - Vector graphics</a></h1>
                                            <div class="product-price-and-shipping">
                                                <span class="price ">$9.00</span>
                                            </div>
                                            <div class="cart">
                                                <div class="product-add-to-cart"><a href="cart.html">Add to cart</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- mini product end -->
                                </div>
                                <div class="item-product">
                                    <!-- mini product -->
                                    <div class="product-miniature js-product-miniature">
                                        <div class="img_block">
                                            <a href="" class="thumbnail product-thumbnail">
                                                <img src="assets/images/product/mini/4.webp" alt="">
                                            </a>
                                            <div class="quick-view">
                                                <a href="" class="quick_view">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </div>
                                            <div class="hook-reviews">
                                                <div class="comments_note">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_desc">
                                            <div class="manufacturer">
                                                <a href="#">Graphic Corner</a>
                                            </div>
                                            <h1><a href="single-product.html">Mountain fox - Vector graphics</a></h1>
                                            <div class="product-price-and-shipping">
                                                <span class="price ">$9.00</span>
                                            </div>
                                            <div class="cart">
                                                <div class="product-add-to-cart"><a href="cart.html">Add to cart</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- mini product end -->
                                    <!-- mini product -->
                                    <div class="product-miniature js-product-miniature">
                                        <div class="img_block">
                                            <a href="" class="thumbnail product-thumbnail">
                                                <img src="assets/images/product/mini/5.webp" alt="">
                                            </a>
                                            <div class="quick-view">
                                                <a href="" class="quick_view">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </div>
                                            <div class="hook-reviews">
                                                <div class="comments_note">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_desc">
                                            <div class="manufacturer">
                                                <a href="#">Graphic Corner</a>
                                            </div>
                                            <h1><a href="single-product.html">Mountain fox - Vector graphics</a></h1>
                                            <div class="product-price-and-shipping">
                                                <span class="price ">$9.00</span>
                                            </div>
                                            <div class="cart">
                                                <div class="product-add-to-cart"><a href="cart.html">Add to cart</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- mini product end -->
                                    <!-- mini product -->
                                    <div class="product-miniature js-product-miniature">
                                        <div class="img_block">
                                            <a href="" class="thumbnail product-thumbnail">
                                                <img src="assets/images/product/mini/6.webp" alt="">
                                            </a>
                                            <div class="quick-view">
                                                <a href="" class="quick_view">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </div>
                                            <div class="hook-reviews">
                                                <div class="comments_note">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_desc">
                                            <div class="manufacturer">
                                                <a href="#">Graphic Corner</a>
                                            </div>
                                            <h1><a href="single-product.html">Mountain fox - Vector graphics</a></h1>
                                            <div class="product-price-and-shipping">
                                                <span class="price ">$9.00</span>
                                            </div>
                                            <div class="cart">
                                                <div class="product-add-to-cart"><a href="cart.html">Add to cart</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- mini product end -->
                                </div>
                                <div class="item-product">
                                    <!-- mini product -->
                                    <div class="product-miniature js-product-miniature">
                                        <div class="img_block">
                                            <a href="" class="thumbnail product-thumbnail">
                                                <img src="assets/images/product/mini/7.webp" alt="">
                                            </a>
                                            <div class="quick-view">
                                                <a href="" class="quick_view">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </div>
                                            <div class="hook-reviews">
                                                <div class="comments_note">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_desc">
                                            <div class="manufacturer">
                                                <a href="#">Graphic Corner</a>
                                            </div>
                                            <h1><a href="single-product.html">Mountain fox - Vector graphics</a></h1>
                                            <div class="product-price-and-shipping">
                                                <span class="price ">$9.00</span>
                                            </div>
                                            <div class="cart">
                                                <div class="product-add-to-cart"><a href="cart.html">Add to cart</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- mini product end -->
                                    <!-- mini product -->
                                    <div class="product-miniature js-product-miniature">
                                        <div class="img_block">
                                            <a href="" class="thumbnail product-thumbnail">
                                                <img src="assets/images/product/mini/8.webp" alt="">
                                            </a>
                                            <div class="quick-view">
                                                <a href="" class="quick_view">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </div>
                                            <div class="hook-reviews">
                                                <div class="comments_note">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_desc">
                                            <div class="manufacturer">
                                                <a href="#">Graphic Corner</a>
                                            </div>
                                            <h1><a href="single-product.html">Mountain fox - Vector graphics</a></h1>
                                            <div class="product-price-and-shipping">
                                                <span class="price ">$9.00</span>
                                            </div>
                                            <div class="cart">
                                                <div class="product-add-to-cart"><a href="cart.html">Add to cart</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- mini product end -->
                                    <!-- mini product -->
                                    <div class="product-miniature js-product-miniature">
                                        <div class="img_block">
                                            <a href="" class="thumbnail product-thumbnail">
                                                <img src="assets/images/product/mini/9.webp" alt="">
                                            </a>
                                            <div class="quick-view">
                                                <a href="" class="quick_view">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </div>
                                            <div class="hook-reviews">
                                                <div class="comments_note">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_desc">
                                            <div class="manufacturer">
                                                <a href="#">Graphic Corner</a>
                                            </div>
                                            <h1><a href="single-product.html">Mountain fox - Vector graphics</a></h1>
                                            <div class="product-price-and-shipping">
                                                <span class="price ">$9.00</span>
                                            </div>
                                            <div class="cart">
                                                <div class="product-add-to-cart"><a href="cart.html">Add to cart</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- mini product end -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="pos-featured-products  product_block_container">
                            <div class="pos_title"><h2>bestsellers</h2></div>
                        </div>
                        <div class=" pos_content row">
                            <div class="feature-item owl-carousel">
                                <div class="item-product">
                                    <!-- mini product -->
                                    <div class="product-miniature js-product-miniature">
                                        <div class="img_block">
                                            <a href="" class="thumbnail product-thumbnail">
                                                <img src="assets/images/product/mini/4.webp" alt="">
                                            </a>
                                            <div class="quick-view">
                                                <a href="" class="quick_view">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </div>
                                            <div class="hook-reviews">
                                                <div class="comments_note">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_desc">
                                            <div class="manufacturer">
                                                <a href="#">Graphic Corner</a>
                                            </div>
                                            <h1><a href="single-product.html">Mountain fox - Vector graphics</a></h1>
                                            <div class="product-price-and-shipping">
                                                <span class="price ">$9.00</span>
                                            </div>
                                            <div class="cart">
                                                <div class="product-add-to-cart"><a href="cart.html">Add to cart</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- mini product end -->
                                    <!-- mini product -->
                                    <div class="product-miniature js-product-miniature">
                                        <div class="img_block">
                                            <a href="" class="thumbnail product-thumbnail">
                                                <img src="assets/images/product/mini/5.webp" alt="">
                                            </a>
                                            <div class="quick-view">
                                                <a href="" class="quick_view">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </div>
                                            <div class="hook-reviews">
                                                <div class="comments_note">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_desc">
                                            <div class="manufacturer">
                                                <a href="#">Graphic Corner</a>
                                            </div>
                                            <h1><a href="single-product.html">Mountain fox - Vector graphics</a></h1>
                                            <div class="product-price-and-shipping">
                                                <span class="price ">$9.00</span>
                                            </div>
                                            <div class="cart">
                                                <div class="product-add-to-cart"><a href="cart.html">Add to cart</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- mini product end -->
                                    <!-- mini product -->
                                    <div class="product-miniature js-product-miniature">
                                        <div class="img_block">
                                            <a href="" class="thumbnail product-thumbnail">
                                                <img src="assets/images/product/mini/6.webp" alt="">
                                            </a>
                                            <div class="quick-view">
                                                <a href="" class="quick_view">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </div>
                                            <div class="hook-reviews">
                                                <div class="comments_note">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_desc">
                                            <div class="manufacturer">
                                                <a href="#">Graphic Corner</a>
                                            </div>
                                            <h1><a href="single-product.html">Mountain fox - Vector graphics</a></h1>
                                            <div class="product-price-and-shipping">
                                                <span class="price ">$9.00</span>
                                            </div>
                                            <div class="cart">
                                                <div class="product-add-to-cart"><a href="cart.html">Add to cart</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- mini product end -->
                                </div>
                                <div class="item-product">
                                    <!-- mini product -->
                                    <div class="product-miniature js-product-miniature">
                                        <div class="img_block">
                                            <a href="" class="thumbnail product-thumbnail">
                                                <img src="assets/images/product/mini/1.webp" alt="">
                                            </a>
                                            <div class="quick-view">
                                                <a href="" class="quick_view">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </div>
                                            <div class="hook-reviews">
                                                <div class="comments_note">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_desc">
                                            <div class="manufacturer">
                                                <a href="#">Graphic Corner</a>
                                            </div>
                                            <h1><a href="single-product.html">Mountain fox - Vector graphics</a></h1>
                                            <div class="product-price-and-shipping">
                                                <span class="price ">$9.00</span>
                                            </div>
                                            <div class="cart">
                                                <div class="product-add-to-cart"><a href="cart.html">Add to cart</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- mini product end -->
                                    <!-- mini product -->
                                    <div class="product-miniature js-product-miniature">
                                        <div class="img_block">
                                            <a href="" class="thumbnail product-thumbnail">
                                                <img src="assets/images/product/mini/2.webp" alt="">
                                            </a>
                                            <div class="quick-view">
                                                <a href="" class="quick_view">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </div>
                                            <div class="hook-reviews">
                                                <div class="comments_note">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_desc">
                                            <div class="manufacturer">
                                                <a href="#">Graphic Corner</a>
                                            </div>
                                            <h1><a href="single-product.html">Mountain fox - Vector graphics</a></h1>
                                            <div class="product-price-and-shipping">
                                                <span class="price ">$9.00</span>
                                            </div>
                                            <div class="cart">
                                                <div class="product-add-to-cart"><a href="cart.html">Add to cart</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- mini product end -->
                                    <!-- mini product -->
                                    <div class="product-miniature js-product-miniature">
                                        <div class="img_block">
                                            <a href="" class="thumbnail product-thumbnail">
                                                <img src="assets/images/product/mini/3.webp" alt="">
                                            </a>
                                            <div class="quick-view">
                                                <a href="" class="quick_view">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </div>
                                            <div class="hook-reviews">
                                                <div class="comments_note">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_desc">
                                            <div class="manufacturer">
                                                <a href="#">Graphic Corner</a>
                                            </div>
                                            <h1><a href="single-product.html">Mountain fox - Vector graphics</a></h1>
                                            <div class="product-price-and-shipping">
                                                <span class="price ">$9.00</span>
                                            </div>
                                            <div class="cart">
                                                <div class="product-add-to-cart"><a href="cart.html">Add to cart</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- mini product end -->
                                </div>
                                <div class="item-product">
                                    <!-- mini product -->
                                    <div class="product-miniature js-product-miniature">
                                        <div class="img_block">
                                            <a href="" class="thumbnail product-thumbnail">
                                                <img src="assets/images/product/mini/7.webp" alt="">
                                            </a>
                                            <div class="quick-view">
                                                <a href="" class="quick_view">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </div>
                                            <div class="hook-reviews">
                                                <div class="comments_note">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_desc">
                                            <div class="manufacturer">
                                                <a href="#">Graphic Corner</a>
                                            </div>
                                            <h1><a href="single-product.html">Mountain fox - Vector graphics</a></h1>
                                            <div class="product-price-and-shipping">
                                                <span class="price ">$9.00</span>
                                            </div>
                                            <div class="cart">
                                                <div class="product-add-to-cart"><a href="cart.html">Add to cart</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- mini product end -->
                                    <!-- mini product -->
                                    <div class="product-miniature js-product-miniature">
                                        <div class="img_block">
                                            <a href="" class="thumbnail product-thumbnail">
                                                <img src="assets/images/product/mini/8.webp" alt="">
                                            </a>
                                            <div class="quick-view">
                                                <a href="" class="quick_view">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </div>
                                            <div class="hook-reviews">
                                                <div class="comments_note">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_desc">
                                            <div class="manufacturer">
                                                <a href="#">Graphic Corner</a>
                                            </div>
                                            <h1><a href="single-product.html">Mountain fox - Vector graphics</a></h1>
                                            <div class="product-price-and-shipping">
                                                <span class="price ">$9.00</span>
                                            </div>
                                            <div class="cart">
                                                <div class="product-add-to-cart"><a href="cart.html">Add to cart</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- mini product end -->
                                    <!-- mini product -->
                                    <div class="product-miniature js-product-miniature">
                                        <div class="img_block">
                                            <a href="" class="thumbnail product-thumbnail">
                                                <img src="assets/images/product/mini/9.webp" alt="">
                                            </a>
                                            <div class="quick-view">
                                                <a href="" class="quick_view">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </div>
                                            <div class="hook-reviews">
                                                <div class="comments_note">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_desc">
                                            <div class="manufacturer">
                                                <a href="#">Graphic Corner</a>
                                            </div>
                                            <h1><a href="single-product.html">Mountain fox - Vector graphics</a></h1>
                                            <div class="product-price-and-shipping">
                                                <span class="price ">$9.00</span>
                                            </div>
                                            <div class="cart">
                                                <div class="product-add-to-cart"><a href="cart.html">Add to cart</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- mini product end -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="pos-featured-products  product_block_container">
                            <div class="pos_title"><h2>recommended</h2></div>
                        </div>
                        <div class=" pos_content row">
                            <div class="feature-item owl-carousel">
                                <div class="item-product">
                                    <!-- mini product -->
                                    <div class="product-miniature js-product-miniature">
                                        <div class="img_block">
                                            <a href="" class="thumbnail product-thumbnail">
                                                <img src="assets/images/product/mini/7.webp" alt="">
                                            </a>
                                            <div class="quick-view">
                                                <a href="" class="quick_view">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </div>
                                            <div class="hook-reviews">
                                                <div class="comments_note">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_desc">
                                            <div class="manufacturer">
                                                <a href="#">Graphic Corner</a>
                                            </div>
                                            <h1><a href="single-product.html">Mountain fox - Vector graphics</a></h1>
                                            <div class="product-price-and-shipping">
                                                <span class="price ">$9.00</span>
                                            </div>
                                            <div class="cart">
                                                <div class="product-add-to-cart"><a href="cart.html">Add to cart</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- mini product end -->
                                    <!-- mini product -->
                                    <div class="product-miniature js-product-miniature">
                                        <div class="img_block">
                                            <a href="" class="thumbnail product-thumbnail">
                                                <img src="assets/images/product/mini/8.webp" alt="">
                                            </a>
                                            <div class="quick-view">
                                                <a href="" class="quick_view">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </div>
                                            <div class="hook-reviews">
                                                <div class="comments_note">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_desc">
                                            <div class="manufacturer">
                                                <a href="#">Graphic Corner</a>
                                            </div>
                                            <h1><a href="single-product.html">Mountain fox - Vector graphics</a></h1>
                                            <div class="product-price-and-shipping">
                                                <span class="price ">$9.00</span>
                                            </div>
                                            <div class="cart">
                                                <div class="product-add-to-cart"><a href="cart.html">Add to cart</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- mini product end -->
                                    <!-- mini product -->
                                    <div class="product-miniature js-product-miniature">
                                        <div class="img_block">
                                            <a href="" class="thumbnail product-thumbnail">
                                                <img src="assets/images/product/mini/9.webp" alt="">
                                            </a>
                                            <div class="quick-view">
                                                <a href="" class="quick_view">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </div>
                                            <div class="hook-reviews">
                                                <div class="comments_note">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_desc">
                                            <div class="manufacturer">
                                                <a href="#">Graphic Corner</a>
                                            </div>
                                            <h1><a href="single-product.html">Mountain fox - Vector graphics</a></h1>
                                            <div class="product-price-and-shipping">
                                                <span class="price ">$9.00</span>
                                            </div>
                                            <div class="cart">
                                                <div class="product-add-to-cart"><a href="cart.html">Add to cart</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- mini product end -->
                                </div>
                                <div class="item-product">
                                    <!-- mini product -->
                                    <div class="product-miniature js-product-miniature">
                                        <div class="img_block">
                                            <a href="" class="thumbnail product-thumbnail">
                                                <img src="assets/images/product/mini/1.webp" alt="">
                                            </a>
                                            <div class="quick-view">
                                                <a href="" class="quick_view">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </div>
                                            <div class="hook-reviews">
                                                <div class="comments_note">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_desc">
                                            <div class="manufacturer">
                                                <a href="#">Graphic Corner</a>
                                            </div>
                                            <h1><a href="single-product.html">Mountain fox - Vector graphics</a></h1>
                                            <div class="product-price-and-shipping">
                                                <span class="price ">$9.00</span>
                                            </div>
                                            <div class="cart">
                                                <div class="product-add-to-cart"><a href="cart.html">Add to cart</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- mini product end -->
                                    <!-- mini product -->
                                    <div class="product-miniature js-product-miniature">
                                        <div class="img_block">
                                            <a href="" class="thumbnail product-thumbnail">
                                                <img src="assets/images/product/mini/2.webp" alt="">
                                            </a>
                                            <div class="quick-view">
                                                <a href="" class="quick_view">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </div>
                                            <div class="hook-reviews">
                                                <div class="comments_note">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_desc">
                                            <div class="manufacturer">
                                                <a href="#">Graphic Corner</a>
                                            </div>
                                            <h1><a href="single-product.html">Mountain fox - Vector graphics</a></h1>
                                            <div class="product-price-and-shipping">
                                                <span class="price ">$9.00</span>
                                            </div>
                                            <div class="cart">
                                                <div class="product-add-to-cart"><a href="cart.html">Add to cart</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- mini product end -->
                                    <!-- mini product -->
                                    <div class="product-miniature js-product-miniature">
                                        <div class="img_block">
                                            <a href="" class="thumbnail product-thumbnail">
                                                <img src="assets/images/product/mini/3.webp" alt="">
                                            </a>
                                            <div class="quick-view">
                                                <a href="" class="quick_view">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </div>
                                            <div class="hook-reviews">
                                                <div class="comments_note">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_desc">
                                            <div class="manufacturer">
                                                <a href="#">Graphic Corner</a>
                                            </div>
                                            <h1><a href="single-product.html">Mountain fox - Vector graphics</a></h1>
                                            <div class="product-price-and-shipping">
                                                <span class="price ">$9.00</span>
                                            </div>
                                            <div class="cart">
                                                <div class="product-add-to-cart"><a href="cart.html">Add to cart</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- mini product end -->
                                </div>
                                <div class="item-product">
                                    <!-- mini product -->
                                    <div class="product-miniature js-product-miniature">
                                        <div class="img_block">
                                            <a href="" class="thumbnail product-thumbnail">
                                                <img src="assets/images/product/mini/4.webp" alt="">
                                            </a>
                                            <div class="quick-view">
                                                <a href="" class="quick_view">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </div>
                                            <div class="hook-reviews">
                                                <div class="comments_note">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_desc">
                                            <div class="manufacturer">
                                                <a href="#">Graphic Corner</a>
                                            </div>
                                            <h1><a href="single-product.html">Mountain fox - Vector graphics</a></h1>
                                            <div class="product-price-and-shipping">
                                                <span class="price ">$9.00</span>
                                            </div>
                                            <div class="cart">
                                                <div class="product-add-to-cart"><a href="cart.html">Add to cart</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- mini product end -->
                                    <!-- mini product -->
                                    <div class="product-miniature js-product-miniature">
                                        <div class="img_block">
                                            <a href="" class="thumbnail product-thumbnail">
                                                <img src="assets/images/product/mini/5.webp" alt="">
                                            </a>
                                            <div class="quick-view">
                                                <a href="" class="quick_view">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </div>
                                            <div class="hook-reviews">
                                                <div class="comments_note">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_desc">
                                            <div class="manufacturer">
                                                <a href="#">Graphic Corner</a>
                                            </div>
                                            <h1><a href="single-product.html">Mountain fox - Vector graphics</a></h1>
                                            <div class="product-price-and-shipping">
                                                <span class="price ">$9.00</span>
                                            </div>
                                            <div class="cart">
                                                <div class="product-add-to-cart"><a href="cart.html">Add to cart</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- mini product end -->
                                    <!-- mini product -->
                                    <div class="product-miniature js-product-miniature">
                                        <div class="img_block">
                                            <a href="" class="thumbnail product-thumbnail">
                                                <img src="assets/images/product/mini/6.webp" alt="">
                                            </a>
                                            <div class="quick-view">
                                                <a href="" class="quick_view">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </div>
                                            <div class="hook-reviews">
                                                <div class="comments_note">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_desc">
                                            <div class="manufacturer">
                                                <a href="#">Graphic Corner</a>
                                            </div>
                                            <h1><a href="single-product.html">Mountain fox - Vector graphics</a></h1>
                                            <div class="product-price-and-shipping">
                                                <span class="price ">$9.00</span>
                                            </div>
                                            <div class="cart">
                                                <div class="product-add-to-cart"><a href="cart.html">Add to cart</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- mini product end -->
                                </div>
                            </div>
                        </div>
                    </div>     
                </div>
            </div>        
        </div>
        <!-- categori mini product area end -->

        <!-- testimonials container -->
        <div class="testimonials_container">
            <div class="container">
                <div class="testimonialsSlide pos_content owl-carousel">
                    <!-- testimonial iteme -->
                    <div class="item-testimonials">
                        <div class="item">
                            <div class="content_author">
                                <img src="assets/images/testimonials/sample1.webp" alt="Harosa Testimonial">
                                <div class="content_test">
                                    <div class="des_testimonial">
                                        Praesent volutpat ut nisl in hendrerit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Etiam porttitor, lacus in luctus molestie
                                    </div>
                                    <p class="des_namepost"><span>John  Doe </span></p>
                                    <p class="des_email">demo@example.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- testimonial iteme end -->
                    <!-- testimonial iteme -->
                    <div class="item-testimonials">
                        <div class="item">
                            <div class="content_author">
                                <img src="assets/images/testimonials/sample1.webp" alt="Harosa Testimonial">
                                <div class="content_test">
                                    <div class="des_testimonial">
                                        Praesent volutpat ut nisl in hendrerit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Etiam porttitor, lacus in luctus molestie
                                    </div>
                                    <p class="des_namepost"><span>John  Doe </span></p>
                                    <p class="des_email">demo@example.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- testimonial iteme end -->
                    <!-- testimonial iteme -->
                    <div class="item-testimonials">
                        <div class="item">
                            <div class="content_author">
                                <img src="assets/images/testimonials/sample1.webp" alt="Harosa Testimonial">
                                <div class="content_test">
                                    <div class="des_testimonial">
                                        Praesent volutpat ut nisl in hendrerit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Etiam porttitor, lacus in luctus molestie
                                    </div>
                                    <p class="des_namepost"><span>John  Doe </span></p>
                                    <p class="des_email">demo@example.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- testimonial iteme end -->
                </div>                
            </div>
        </div>
        <!-- testimonials container end -->

        <!-- pos special products  -->
        <div class="pos-special-products">
            <div class="container">
                <div class="special-products">
                    <div class="pos_title"><h2>Daily Deals</h2></div>
                    <div class="special-item1 pos_content owl-carousel">
                        <!-- special item -->
                        <div class="product-miniature js-product-miniature">
                            <div class="img_block">
                                <a href="single-product.html" class="thumbnail product-thumbnail">
                                    <img src="assets/images/product/2-2.webp" alt="harosa product">
                                </a>
                                <ul class="product-flag">
                                    <li class="new"><span>New</span></li>
                                </ul>
                                <div class="quick-view">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#product_modal"  data-original-title="Quick View" class="quick_view"><i class="fa fa-search"></i></a>
                                </div>
                                <div class="hook-reviews">
                                    <div class="comments_note">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                                <div class="product-price-and-shipping_top">
                                    <span class="discount-percentage discount-product">-8%</span>
                                </div>
                            </div>
                            <div class="product_desc">
                                <h1><a href="single-product.html" class="product_name" title="Hummingbird printed t-shirt">Hummingbird printed t-shirt</a></h1>
                                <div class="manufacturer">
                                    <a href="shop.html">Studio Design</a>
                                </div>
                                <div class="product-desc" >
                                    <p><span>Regular fit, round neckline, short sleeves. Made of extra long staple pima cotton. </span></p>
                                </div>
                                <div class="product-price-and-shipping">
                                    <span class="regular-price">$23.90</span>
                                    <span class="price price-sale">$21.99</span>
                                </div>
                                <div class="cart">
                                    <div class="product-add-to-cart">
                                        <a href="cart.html">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="countdown">
                                <div class="time_count_down">
                                    <div data-countdown="2023/08/02"></div>
                                </div>
                            </div>
                        </div>
                        <!-- special item end -->
                        <!-- special item -->
                        <div class="product-miniature js-product-miniature">
                            <div class="img_block">
                                <a href="single-product.html" class="thumbnail product-thumbnail">
                                    <img src="assets/images/product/2-2.webp" alt="harosa product">
                                </a>
                                <ul class="product-flag">
                                    <li class="new"><span>New</span></li>
                                </ul>
                                <div class="quick-view">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#product_modal"  data-original-title="Quick View" class="quick_view"><i class="fa fa-search"></i></a>
                                </div>
                                <div class="hook-reviews">
                                    <div class="comments_note">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                                <div class="product-price-and-shipping_top">
                                    <span class="discount-percentage discount-product">-8%</span>
                                </div>
                            </div>
                            <div class="product_desc">
                                <h1><a href="single-product.html" class="product_name" title="Hummingbird printed t-shirt">Hummingbird printed t-shirt</a></h1>
                                <div class="manufacturer">
                                    <a href="shop.html">Studio Design</a>
                                </div>
                                <div class="product-desc" >
                                    <p><span>Regular fit, round neckline, short sleeves. Made of extra long staple pima cotton. </span></p>
                                </div>
                                <div class="product-price-and-shipping">
                                    <span class="regular-price">$23.90</span>
                                    <span class="price price-sale">$21.99</span>
                                </div>
                                <div class="cart">
                                    <div class="product-add-to-cart">
                                        <a href="cart.html">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="countdown">
                                <div class="time_count_down">
                                    <div data-countdown="2023/08/02"></div>
                                </div>
                            </div>
                        </div>
                        <!-- special item end -->
                        <!-- special item -->
                        <div class="product-miniature js-product-miniature">
                            <div class="img_block">
                                <a href="single-product.html" class="thumbnail product-thumbnail">
                                    <img src="assets/images/product/2-3.webp" alt="harosa product">
                                </a>
                                <ul class="product-flag">
                                    <li class="new"><span>New</span></li>
                                </ul>
                                <div class="quick-view">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#product_modal"  data-original-title="Quick View" class="quick_view"><i class="fa fa-search"></i></a>
                                </div>
                                <div class="hook-reviews">
                                    <div class="comments_note">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                                <div class="product-price-and-shipping_top">
                                    <span class="discount-percentage discount-product">-8%</span>
                                </div>
                            </div>
                            <div class="product_desc">
                                <h1><a href="single-product.html" class="product_name" title="Hummingbird printed t-shirt">Hummingbird printed t-shirt</a></h1>
                                <div class="manufacturer">
                                    <a href="shop.html">Studio Design</a>
                                </div>
                                <div class="product-desc" >
                                    <p><span>Regular fit, round neckline, short sleeves. Made of extra long staple pima cotton. </span></p>
                                </div>
                                <div class="product-price-and-shipping">
                                    <span class="regular-price">$23.90</span>
                                    <span class="price price-sale">$21.99</span>
                                </div>
                                <div class="cart">
                                    <div class="product-add-to-cart">
                                        <a href="cart.html">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="countdown">
                                <div class="time_count_down">
                                    <div data-countdown="2023/08/02"></div>
                                </div>
                            </div>
                        </div>
                        <!-- special item end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- pos special products  end -->

        <!-- ft newsletter -->
        <div class="ft_newsletter">
            <div class="container">
                <div class="content-newsletter">
                    <div id="block-newsletter-label">
                        <div class="title-newsletter">
                            <h2>Newsletter sign up</h2>
                            <p class="desc">(Get 30% OFF coupon today subscibers)</p>
                        </div>
                    </div>
                    <form action="#">
                        <input class="btn btn-primary float-xs-right hidden-xs-down" name="submitNewsletter" value="Subscribe" type="submit">
                        <div class="input-wrapper">
                            <input name="email" value="" placeholder="Your email address" aria-labelledby="block-newsletter-label" type="text">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ft newsletter end -->

        <!-- home blog post -->
        <div class="home_blog_post_area general product_block_container">
            <div class="home_blog_post">
                <div class="container pos_content">
                    <div class="page_title_area pos_title">
                        <h2><a href="#">Latest Blog Posts</a></h2>
                        <h3>You <span>Don’t Want</span> To Miss This</h3>
                        <p> Praesent volutpat ut nisl in hendrerit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilianulla</p>
                    </div>
                    <div class="blog_slider owl-carousel">
                        <!-- single blog item -->
                        <div class="item">
                            <div class="blog_post">
                                <div class="post_thumbnail">
                                    <a href="single-blog.html" class="img_content">
                                        <img src="assets/images/blog/1.webp" alt="">
                                    </a>
                                    <a href="single-blog-html" class="read-more">Read More</a>
                                </div>
                                <div class="post_content">
                                    <div class="date_time">
                                        <span class="moth_time">April</span>
                                        <span class="day_time">01</span>
                                    </div>
                                    <div class="content-inner">
                                        <h4 class="post_title">This is Secound Post For XipBlog</h4>
                                        <div class="post_meta">
                                            <span class="meta_date">
                                                <i class="fa fa-calendar"></i>
                                                Apr 01, 2018
                                            </span> / <span class="meta_author">
                                                <i class="fa fa-user"></i>
                                                Demo Posthemes
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- single blog item end -->
                        <!-- single blog item -->
                        <div class="item">
                            <div class="blog_post">
                                <div class="post_thumbnail">
                                    <a href="single-blog.html" class="img_content">
                                        <img src="assets/images/blog/2.webp" alt="">
                                    </a>
                                    <a href="single-blog-html" class="read-more">Read More</a>
                                </div>
                                <div class="post_content">
                                    <div class="date_time">
                                        <span class="moth_time">April</span>
                                        <span class="day_time">01</span>
                                    </div>
                                    <div class="content-inner">
                                        <h4 class="post_title">This is Secound Post For XipBlog</h4>
                                        <div class="post_meta">
                                            <span class="meta_date">
                                                <i class="fa fa-calendar"></i>
                                                Apr 01, 2018
                                            </span> / <span class="meta_author">
                                                <i class="fa fa-user"></i>
                                                Demo Posthemes
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- single blog item end -->
                        <!-- single blog item -->
                        <div class="item">
                            <div class="blog_post">
                                <div class="post_thumbnail">
                                    <a href="single-blog.html" class="img_content">
                                        <img src="assets/images/blog/3.webp" alt="">
                                    </a>
                                    <a href="single-blog-html" class="read-more">Read More</a>
                                </div>
                                <div class="post_content">
                                    <div class="date_time">
                                        <span class="moth_time">April</span>
                                        <span class="day_time">01</span>
                                    </div>
                                    <div class="content-inner">
                                        <h4 class="post_title">This is Secound Post For XipBlog</h4>
                                        <div class="post_meta">
                                            <span class="meta_date">
                                                <i class="fa fa-calendar"></i>
                                                Apr 01, 2018
                                            </span> / <span class="meta_author">
                                                <i class="fa fa-user"></i>
                                                Demo Posthemes
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- single blog item end -->
                        <!-- single blog item -->
                        <div class="item">
                            <div class="blog_post">
                                <div class="post_thumbnail">
                                    <a href="single-blog.html" class="img_content">
                                        <img src="assets/images/blog/4.webp" alt="">
                                    </a>
                                    <a href="single-blog-html" class="read-more">Read More</a>
                                </div>
                                <div class="post_content">
                                    <div class="date_time">
                                        <span class="moth_time">April</span>
                                        <span class="day_time">01</span>
                                    </div>
                                    <div class="content-inner">
                                        <h4 class="post_title">This is Secound Post For XipBlog</h4>
                                        <div class="post_meta">
                                            <span class="meta_date">
                                                <i class="fa fa-calendar"></i>
                                                Apr 01, 2018
                                            </span> / <span class="meta_author">
                                                <i class="fa fa-user"></i>
                                                Demo Posthemes
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- single blog item end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- home blog post end -->

        <!-- footer start -->
        <footer id="footer">
            <div class="footer-container">

                <div class="footer-top">
                    <div class="container">
                        <div class="pos_logo product_block_container">
                            <div class="logo-slider owl-carousel pos_content">
                                <div class="item-banklogo">
                                    <a href="#">
                                        <img src="assets/images/brand/1.webp" alt="harosa brand logo">
                                    </a>
                                </div>
                                <div class="item-banklogo">
                                    <a href="#">
                                        <img src="assets/images/brand/2.webp" alt="harosa brand logo">
                                    </a>
                                </div>
                                <div class="item-banklogo">
                                    <a href="#">
                                        <img src="assets/images/brand/3.webp" alt="harosa brand logo">
                                    </a>
                                </div>
                                <div class="item-banklogo">
                                    <a href="#">
                                        <img src="assets/images/brand/4.webp" alt="harosa brand logo">
                                    </a>
                                </div>
                                <div class="item-banklogo">
                                    <a href="#">
                                        <img src="assets/images/brand/5.webp" alt="harosa brand logo">
                                    </a>
                                </div>
                                <div class="item-banklogo">
                                    <a href="#">
                                        <img src="assets/images/brand/6.webp" alt="harosa brand logo">
                                    </a>
                                </div>
                                <div class="item-banklogo">
                                    <a href="#">
                                        <img src="assets/images/brand/1.webp" alt="harosa brand logo">
                                    </a>
                                </div>
                                <div class="item-banklogo">
                                    <a href="#">
                                        <img src="assets/images/brand/2.webp" alt="harosa brand logo">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- footer main -->
                <div class="footer-main">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 col-lg-3 links footer_block">
                                <h3>Contact Infor</h3>
                                <div class="footer-contact">
                                    <p class="address add">123 Main Street, Anytown, CA 12345 - USA.</p>
                                    <p class="phone add">(+1)866-550-3669</p>
                                    <p class="email add"><a href="#">yourmail@domain.com</a></p>
                                    <p class="time add">Working time: 9.00 -21.00</p>
                                </div>
                                <div class="social_follow">
                                    <ul>
                                        <li class="facebook"><a href="#" target="_blank">Facebook</a></li>
                                        <li class="twitter"><a href="#" target="_blank">Twitter</a></li>
                                        <li class="youtube"><a href="#" target="_blank">YouTube</a></li>
                                        <li class="googleplus"><a href="#" target="_blank">Google +</a></li>
                                        <li class="instagram"><a href="#" target="_blank">Instagram</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3 links footer_block">
                                <h3 class="hidden-sm-down">Products</h3>
                                <ul class="footer_list">
                                    <li><a href="#">Prices drop</a></li>
                                    <li><a href="#">New products</a></li>
                                    <li><a href="#">Best sales</a></li>
                                    <li><a href="#">Stores</a></li>
                                    <li><a href="#">Login</a></li>
                                    <li><a href="#">My account</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-6 col-lg-3 links footer_block">
                                <h3 class="hidden-sm-down">Our company</h3>
                                <ul class="footer_list">
                                    <li><a href="#">Delivery</a></li>
                                    <li><a href="#">Legal Notice</a></li>
                                    <li><a href="#">Terms and conditions of use</a></li>
                                    <li><a href="#">About us</a></li>
                                    <li><a href="#">Secure payment</a></li>
                                    <li><a href="#">Contact us</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-6 col-lg-3 links footer_block">
                                <h3 class="hidden-sm-down">Instagram</h3>
                                <div class="container">
                                    <div class="row item-instagram">
                                        <div class="col-sm-4">
                                            <a href="#">
                                                <img src="assets/images/Instagram/1.webp" alt="harosa Instagram">
                                            </a>
                                        </div>
                                        <div class="col-sm-4">
                                            <a href="#">
                                                <img src="assets/images/Instagram/2.webp" alt="harosa Instagram">
                                            </a>
                                        </div>
                                        <div class="col-sm-4">
                                            <a href="#">
                                                <img src="assets/images/Instagram/3.webp" alt="harosa Instagram">
                                            </a>
                                        </div>
                                        <div class="col-sm-4">
                                            <a href="#">
                                                <img src="assets/images/Instagram/4.webp" alt="harosa Instagram">
                                            </a>
                                        </div>
                                        <div class="col-sm-4">
                                            <a href="#">
                                                <img src="assets/images/Instagram/5.webp" alt="harosa Instagram">
                                            </a>
                                        </div>
                                        <div class="col-sm-4">
                                            <a href="#">
                                                <img src="assets/images/Instagram/6.webp" alt="harosa Instagram">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>                                
                        </div>
                    </div>
                </div>
                <!-- footer main end -->
            </div>
            <!-- footer copyright area -->
            <div class="footer-copyright-area">
                <div class="container">
                    <div class="copyright-inner">
                        <div class="row justify-content-between row-cols-1 row-cols-md-2">
                            <div class="col">
                                <p>&copy; 2023 <span> Harosa </span> Made with <i class="fa fa-heart"></i> by <a href="https://hasthemes.com/">HasThemes</a></p>
                            </div>
                            <div class="col text-md-end">
                                <img src="assets/images/icons/payment-icon.webp" alt="payment icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer copyright area end -->
        </footer>
        <!-- footer end -->

        <!-- QUICKVIEW PRODUCT START -->
        <div id="quickview-wrapper">
            <!-- Modal -->
            <div class="modal fade" id="product_modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-close-btn">
                            <button class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <!-- single product area -->
                            <div class="single-product-page-area">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="page-content">
                                            <div class="images-container">                                                
                                                <div class="js-qv-mask mask pos_content">
                                                    <div class="product-images js-qv-product-images">
                                                        <div class="thumb-container">
                                                            <ul id="tabs1" class="nav nav-tabs" data-bs-tabs="tabs">
                                                                <li class="active"><a href="#red" data-bs-toggle="tab">
                                                                    <img src="assets/images/product/thumbnails/1.webp" alt="">
                                                                </a></li>
                                                                <li><a href="#orange" data-bs-toggle="tab">
                                                                    <img src="assets/images/product/thumbnails/2.webp" alt="">
                                                                </a></li>
                                                                <li><a href="#yellow" data-bs-toggle="tab">
                                                                    <img src="assets/images/product/thumbnails/3.webp" alt="">
                                                                </a></li>
                                                                <li><a href="#green" data-bs-toggle="tab">
                                                                    <img src="assets/images/product/thumbnails/4.webp" alt="">
                                                                </a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-cover">
                                                    <div id="my-tab-content1" class="tab-content">
                                                        <div class="tab-pane fade show active" id="red">
                                                            <img src="assets/images/product/single/1.webp" alt="harosa single product">
                                                            <div class="layer hidden-sm-down">
                                                                <i class="material-icons zoom-in"></i>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="orange">
                                                            <img src="assets/images/product/single/2.webp" alt="harosa single product">
                                                            <div class="layer hidden-sm-down">
                                                                <i class="material-icons zoom-in"></i>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="yellow">
                                                            <img src="assets/images/product/single/3.webp" alt="harosa single product">
                                                            <div class="layer hidden-sm-down">
                                                                <i class="material-icons zoom-in"></i>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="green">
                                                            <img src="assets/images/product/single/4.webp" alt="harosa single product">
                                                            <div class="layer hidden-sm-down">
                                                                <i class="material-icons zoom-in"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 class="h1 namne_details">Hummingbird printed t-shirt</h1>
                                        <p class="reference">Reference: demo_1</p>
                                        <div id="product_comments_block_extra" class="no-print">
                                            <div class="hook-reviews">
                                                <div class="comments_note">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <ul class="comments_advices">
                                                <li>
                                                    <a href="#idTab5" class="reviews _mPS2id-h">Read reviews (<span>1</span>)</a>
                                                </li>
                                                <li>
                                                    <a class="open-comment-form">Write a review</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product-prices">
                                            <div class="product-discount">
                                                <span class="regular-price">$23.90</span>
                                            </div>
                                            <div class="product-price h5 has-discount">
                                                <div class="current-price">
                                                    <span>$21.99</span>
                                                    <span class="discount discount-percentage">Save 8%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-information">
                                            <div class="product-desc">
                                                <p><span>Regular fit, round neckline, short sleeves. Made of extra long staple pima cotton. </span></p>
                                            </div>
                                            <div class="product-actions">
                                                <form action="#">
                                                    <div class="product-variants">
                                                        <div class="product-variants-item">
                                                            <span class="control-label">Size</span>
                                                            <select class="form-control form-control-select" id="group_1">
                                                                <option value="1" title="S" selected="selected">S</option>
                                                                <option value="2" title="M">M</option>
                                                                <option value="3" title="L">L</option>
                                                                <option value="4" title="XL">XL</option>
                                                            </select>
                                                        </div>
                                                        <div class="product-variants-item">
                                                            <span class="control-label">Color</span>
                                                            <ul id="group_2">
                                                                <li class="float-xs-left input-container">
                                                                    <label>
                                                                    <input class="input-color" data-product-attribute="2" name="group[2]" value="8" checked="checked" type="radio">
                                                                    <span class="color"><span class="sr-only">White</span></span>
                                                                    </label>
                                                                </li>
                                                                <li class="float-xs-left input-container">
                                                                    <label>
                                                                    <input class="input-color" data-product-attribute="2" name="group[2]" value="11" type="radio">
                                                                    <span class="color color-two"><span class="sr-only">Black</span></span>
                                                                    </label>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-discounts"></div>
                                                    <div class="product-add-to-cart">
                                                        <span class="control-label">Quantity</span>
                                                        <div class="box-quantity d-flex">
                                                            <input class="quantity mr-40" min="1" value="1" type="number">
                                                            <a class="add-cart" href="cart.html"><i class="fa fa-shopping-cart"></i>add to cart</a>
                                                        </div>
                                                    </div>
                                                    <div class="product-additional-info">
                                                        <div class="social-sharing">
                                                            <span>Share</span>
                                                            <ul>
                                                                <li class="facebook"><a href="#" title="Share" target="_blank">Share</a></li>
                                                                <li class="twitter"><a href="#" title="Tweet" target="_blank">Tweet</a></li>
                                                                <li class="googleplus"><a href="#" title="Google+" target="_blank">Google+</a></li>
                                                                <li class="pinterest"><a href="" title="Pinterest" target="_blank">Pinterest</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single product area -->
                        </div>
                    </div><!-- .modal-content -->
                </div><!-- .modal-dialog -->
            </div><!-- END Modal -->
        </div>
        <!-- QUICKVIEW PRODUCT END -->

    </div>
    <!-- Body main wrapper end -->
    




     <!-- JS
    ============================================ -->

    <!-- Modernizer & jQuery JS -->
    <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins JS -->
    <script src="assets/js/jquery.nivo.slider.pack.js"></script>
    <script src="assets/js/plugins.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

</body>
</html>
