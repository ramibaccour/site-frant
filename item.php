 <!-- single product -->
 <div class="col-sm-6 col-md-6 col-lg-4">
    <div class="product-miniature js-product-miniature">
        <div class="img_block">
            <a href="<?php echo $GLOBALS['myHoste'] .
                "/detail/article/" . $article["id"] ."/" .
                urlencode($article["nomLng1"]); ?>"
                class="thumbnail product-thumbnail">
                <img src="<?php echo    $myHoste .
                        "/assets/images_upload/" .
                        $images; ?>"
                alt="<?php echo $article["nomLng1"] ?>">
            </a>
            <ul class="product-flag">
                <li class="new"><span>
                <?php echo $article["badge"] ?>
                </span></li>
            </ul>
            <div class="quick-view">
                <a href="<?php echo $GLOBALS['myHoste'] .
                "/detail/article/" . $article["id"] ."/" .
                urlencode($article["nomLng1"]); ?>"
                data-original-title="Voire" class="quick_view">
                <i class="fa fa-search"></i></a>
            </div>
            <!-- <div class="hook-reviews">
                <div class="comments_note">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
            </div> -->
        </div>
        <div class="product_desc">
            <div class="manufacturer">
                <a href="shop.html">Studio Design</a>
            </div>
            <h1> <a href="<?php echo $GLOBALS['myHoste'] .
                "/detail/article/" . $article["id"] ."/" .
                urlencode($article["nomLng1"]); ?>"
                class="product_name"
                title="<?php echo $article["nomLng1"] ?>">
                <?php echo $article["nomLng1"] ?></a></h1>
            <div class="product-price-and-shipping">
                <span class="regular-price <?php echo $havePromo===true? '' : ' text-decoration-none' ?>">
                    <?php echo $article["price"] ?>
                </span>
                <?php
                if( $havePromo)
                {
                ?>
                    <span class="price price-sale">
                        <?php echo $article["newPrice"] ?>
                    </span>
                <?php
                }
                ?>
            </div>
            
          
            <div class="cart">
                <div class="product-add-to-cart">
                    <a  class="add-product-to-cart"
                        href="#"
                        data-image="<?php echo $images;?>"
                        data-product="<?php echo $article["id"];?>">+ Au Panier</a><br><br>
                    <a href="<?php echo $GLOBALS['myHoste'] ."/checkout/".$article["id"] ?>">Acheter</a>
                </div>
            </div>
           
          
        </div>
    </div>
</div>
<!-- single product end -->