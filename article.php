
<!doctype html>
<html class="no-js" lang="en">
    <?php
        include("head.php");
        $idArticle = $_GET["id_article"];
        $article = getArticle($idArticle);
        $havePromo = havePromo($article);
        $listeImage = getListeImageArticle($idArticle)["listImageResponse"];
        $listeImage125_156 = filter($listeImage, "idResolution", 15);
        $listeImage605_800 = filter($listeImage, "idResolution", 23);
        
        $filter = '{"idArticle" : {"value" : "' . $idArticle . '", "operator" : "="}}';
        $filter = json_decode($filter, true);
        $filter = (object)$filter;
        $listeArticleRelation = getListeArticleRelation($filter, true);
    ?>
<body>
    <!-- Add your site or application content here -->

    <!-- Body main wrapper start -->
    <div class="wrapper home-one">
        <?php
            include("header.php");
        ?>

        <!-- single product area -->
        <div class="single-product-page-area">
            <div class="container">
                <div class="row gy-5">
                    <div class="col-lg-6">
                        <div class="images-container">
                            <div class="js-qv-mask mask pos_content">
                                <div class="thumb-container">
                                    <ul class="nav nav-tabs">
                                        <?php
                                            $count = 0;
                                            $imgCart =  "";
                                            foreach($listeImage125_156 as $img)
                                            {
                                                $count++;
                                                if($count == 1)
                                                    $imgCart = $img["nom"];
                                        ?>
                                                <li class="<?php echo $count==1? "active" : "";?>">
                                                    <a href="#img125_<?php echo $img["ordre"] ?>" data-bs-toggle="tab">
                                                        <img src="<?php echo    $myHoste .
                                                                                "/assets/images_upload/" .
                                                                                $img["nom"]; ?>" alt="">
                                                    </a>
                                                </li>
                                        <?php
                                            }
                                        ?>
                                        
                                    </ul>
                                </div>
                            </div>
                            <div class="product-cover">
                                <div class="tab-content">
                                    <?php
                                        $count = 0;
                                        foreach($listeImage605_800 as $img)
                                        {
                                            $count++;
                                    ?>
                                            <div    class="tab-pane <?php echo $count==1? " active " : "";?>"
                                                    id="img125_<?php echo $img["ordre"] ?>">
                                                <img src="<?php echo    $myHoste .
                                                                                "/assets/images_upload/" .
                                                                                $img["nom"]; ?>"
                                                                                alt="harosa single product">
                                                <div class="layer hidden-sm-down">
                                                    <i class="material-icons zoom-in"></i>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h1 class="h1 namne_details"><?php echo $article["nomLng1"] ;?></h1>
                        <p class="reference"><?php echo $article["nom2Lng1"] ;?></p>
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
                           
                        </div>
                        <div class="product-prices">
                            <div class="product-discount">
                                <span class="regular-price"><?php echo $article["price"] ;?></span>
                            </div>
                            <?php
                                if($havePromo)
                                {
                            ?>
                                    <div class="product-price h5 has-discount">
                                        <div class="current-price">
                                            <span><?php echo $article["newPrice"] ;?></span>
                                            <span class="discount discount-percentage">
                                                -<?php echo $article["price"]-$article["newPrice"] ;?>
                                            </span>
                                        </div>
                                    </div>
                            <?php
                                }
                            ?>
                            
                        </div>
                        <div class="product-information">
                            <div class="product-desc">
                                <p><span><?php echo $article["descriptionLng1"] ;?></span></p>
                            </div>
                            <div class="product-actions">
                                <form action="#">
                                    <div class="product-variants">
                                    </div>
                                    <div class="product-discounts"></div>
                                    <div class="product-add-to-cart">
                                        <span class="control-label">Quantité</span>
                                        <div class="box-quantity d-flex">
                                            <input id="quantity" class="quantity mr-40" min="1" value="1" type="number">
                                            <a  class="add-cart add-product-to-cart"
                                                href="#"
                                                data-image="<?php echo $imgCart;?>"
                                                data-product="<?php echo $article["id"];?>">
                                                <i class="fa fa-shopping-cart"></i>+ Au panier
                                            </a>&nbsp;
                                            <a  class="add-cart"
                                                href="<?php echo $GLOBALS['myHoste'] ."/checkout/".$article["id"] ?>">
                                                Achter
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single product area -->
        <?php
            if(!empty($article["fullDescriptionLng1"]))
            {
        ?>
                <!-- product tabs container slider -->
                <div class="single-product-description-area product-tabs-container-slider product_block_container">
                    <div class="container">
                        <ul class="nav tabs_slider">
                            <li class="active">
                               <a href="#newarrival" data-bs-toggle="tab">Description du produit</a>
                            </li>
                        </ul>
                        <div class="tab-content pos_content">
                            <div class="tab-pane fade show active" id="newarrival">
                                <p><?php echo $article["fullDescriptionLng1"] ;?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- product tabs container slider end -->
        <?php
            }
        ?>
       
        <?php
            $count =0;
            $listeGroupeArticleRelation = filter(  $listeArticleRelation["listArticleRelationResponse"],
                                                    "idParent",
                                                    null);
            foreach($listeGroupeArticleRelation as $groupeArticleRelation)
            {
                $count +=1;
        ?>
                 <!-- product tabs container slider -->
                <div class="single-product-related-post product-tabs-container-slider product_block_container">
                    <div class="container">
                        <ul class="nav tabs_slider">
                            <li class="active">
                                <a href="#newarrival<?php echo $groupeArticleRelation["id"] ?>" data-bs-toggle="tab">
                                    <?php echo $groupeArticleRelation["nomLng1"] ;?>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content pos_content">
                            <div class="tab-pane active"
                                id="newarrival<?php echo $groupeArticleRelation["id"] ?>">
                                <div class="productTabContent0 owl-carousel">
                                    <?php
                                        $listeDetailArticleRelation = filter(   $listeArticleRelation["listArticleRelationResponse"],
                                                                                "idParent", $groupeArticleRelation["id"]);
                                        foreach($listeDetailArticleRelation as $detailArticleRelation)
                                        {
                                            $detailArticleRelation = $detailArticleRelation["articleRelation"];
                                            $articleRelationhavePromo = havePromo($detailArticleRelation);
                                            $images = filter($detailArticleRelation["listeImage"],"idResolution", 5);
                                            usort($images,function($a, $b){return $a['ordre'] - $b['ordre'];});
                                            if(!empty($images))
                                            {
                                                $images = $images[0]["nom"];
                                            }
                                            else
                                            {
                                                $images = "#";
                                            }
                                    ?>
                                            <!-- single product -->
                                            <div class="item-product">
                                                <div class="product-miniature js-product-miniature">
                                                    <div class="img_block">
                                                        <a href="<?php echo $GLOBALS['myHoste'] .
                                                                "/detail/article/" . $detailArticleRelation["id"] ."/" .
                                                                urlencode($detailArticleRelation["nomLng1"]); ?>"
                                                                class="thumbnail product-thumbnail">
                                                            <img src="<?php echo    $myHoste .
                                                                        "/assets/images_upload/" .
                                                                        $images; ?>"
                                                                    alt="<?php echo $detailArticleRelation["nomLng1"] ?>">
                                                        </a>
                                                        <ul class="product-flag">
                                                            <li class="new">
                                                            <span><?php echo $detailArticleRelation["badge"] ?></span>
                                                            </li>
                                                        </ul>
                                                        <div class="quick-view">
                                                            <a href="<?php echo $GLOBALS['myHoste'] .
                                                                "/detail/article/" . $detailArticleRelation["id"] ."/" .
                                                                urlencode($detailArticleRelation["nomLng1"]); ?>"
                                                                data-bs-target="#product_modal"
                                                                data-original-title="Voire"
                                                                class="quick_view"><i class="fa fa-search"></i></a>
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
                                                        <?php
                                                            if($articleRelationhavePromo)
                                                            {
                                                        ?>
                                                                <div class="product-price-and-shipping_top">
                                                                    <span class="discount-percentage discount-product">
                                                                    <?php echo $detailArticleRelation["newPrice"]-$detailArticleRelation["price"] ;?>
                                                                    </span>
                                                                </div>
                                                        <?php
                                                            }
                                                        ?>
                                                    </div>
                                                    <div class="product_desc">
                                                        <div class="manufacturer">
                                                            <a href="shop.html">
                                                                <?php echo $detailArticleRelation["nom2Lng1"] ?>
                                                            </a>
                                                        </div>
                                                        <h1>
                                                            <a  href="single-product.html" class="product_name"
                                                                title="<?php echo $detailArticleRelation["nomLng1"] ?>">
                                                            <?php echo $detailArticleRelation["nomLng1"] ?>
                                                        </a></h1>
                                                        <div class="product-price-and-shipping">
                                                            <span class="regular-price <?php echo $articleRelationhavePromo===true? '' : 'text-decoration-none' ?>">
                                                                <?php echo $detailArticleRelation["price"] ?>
                                                            </span>
                                                            <?php
                                                                if($articleRelationhavePromo)
                                                                {
                                                            ?>
                                                                    <span class="price price-sale">
                                                                        <?php echo $detailArticleRelation["newPrice"] ?>
                                                                    </span>
                                                            <?php
                                                                }
                                                            ?>
                                                        </div>
                                                        <div class="cart">
                                                            <div class="product-add-to-cart">
                                                                <a href="cart.html">+ Au Panier</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- single product end -->
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- product tabs container slider end -->

                
        <?php
            }
        ?>
       
       
        <!-- footer start -->
        <?php
            include("footer.php");
        ?>
        <!-- footer end -->

     

    </div>
    <!-- Body main wrapper end -->
    
</body>
</html>
