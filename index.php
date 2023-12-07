<?php  session_start(); ?>
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
        <?php
            foreach($listeContenuWeb as $ContenuWeb)
            {
                $ContenuWeb = getStaticContenuWeb($ContenuWeb);
                // ------------------------------------ Slider area (Bannière) ---------------------------------
                if( $ContenuWeb["idContenuWebType"] == 1 &&
                    isset($ContenuWeb["listDetailContenuWeb"]) && count($ContenuWeb["listDetailContenuWeb"])>0)
                {
        ?>
                        <!-- Slider area -->
                        <div class="slider-area">
                            <!-- slider start -->
                            <div class="slider-inner">
                                <div id="mainSlider" class="mainSlider nivoSlider nevo-slider">
                                    <?php
                                        foreach($ContenuWeb["listDetailContenuWeb"] as $detailContenuWeb)
                                        {
                                    ?>
                                            <img src="<?php echo    $myHoste .
                                                                    "/assets/images_upload/" .
                                                                    $detailContenuWeb["image"]; ?>"
                                            
                                            alt="main slider"
                                            title="#<?php echo $detailContenuWeb["id"]."_image_slide"?>"/>
                                    <?php
                                        }
                                    ?>
                                </div>
                                <?php
                                        foreach($ContenuWeb["listDetailContenuWeb"] as $detailContenuWeb)
                                        {
                                ?>
                                <div    id="<?php echo $detailContenuWeb["id"]."_image_slide"?>"
                                        class="nivo-html-caption slider-caption">
                                    <div class="slider-progress"></div>
                                    <div class="container">
                                        <div class="slider-content slider-content-1 slider-animated-1 text-end">
                                            <p class="hp1"><?php echo $detailContenuWeb["nomLng1"] ; ?></p>
                                            <h1 class="hone"><?php echo $detailContenuWeb["nom2Lng1"] ; ?></h1>
                                            <h2 class="htwo"><?php echo $detailContenuWeb["textLng1"] ; ?></h2>
                                            <div class="button-1 hover-btn-2">
                                                <a href="<?php echo $detailContenuWeb["url"] ; ?>">Voire</a>
                                            </div>
                                            <?php
                                                if(isset($detailContenuWeb["article"]))
                                                {
                                            ?>
                                                    <div class="button-1 hover-btn-2 pt-2">
                                                        <a href="<?php echo $detailContenuWeb["checkout"] ; ?>">Acheter</a>
                                                    </div>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                        }
                                ?>
                            </div>
                            <!-- slider end -->
                        </div>
                        <!-- Slider area end -->
                    <?php
                }
        ?>
        <!-- ------------------Policy area  ------------------ -->
                <?php
                    if( $ContenuWeb["idContenuWebType"] == 2 &&
                        isset($ContenuWeb["listDetailContenuWeb"]) && count($ContenuWeb["listDetailContenuWeb"])>0)
                    {
                ?>
                        <div class="policy-area">
                            <div class="container">
                                <div class="policy-area-inner">
                                    <div class="row">
                                        <?php
                                            foreach($ContenuWeb["listDetailContenuWeb"] as $detailContenuWeb)
                                            {
                                        ?>
                                                <div class="col-sm-6 col-lg-3">
                                                    <div class="single-policy">
                                                        <div class="icon">
                                                            <i class="fa">
                                                                <img width="28px" src="<?php echo    $myHoste .
                                                                    "/assets/images_upload/" .
                                                                    $detailContenuWeb["image"]; ?>" alt="">
                                                            </i>
                                                        </div>
                                                        <div class="txt_cms">
                                                            <h2><?php echo $detailContenuWeb["nomLng1"] ; ?></h2>
                                                            <p><?php echo $detailContenuWeb["nom2Lng1"] ; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                ?>
            <!-- ------------------Policy area  ------------------ -->

                <!-- --------------poslistcategories -------------- -->
                <?php
                    if( $ContenuWeb["idContenuWebType"] == 3 &&
                        isset($ContenuWeb["listDetailContenuWeb"]) && count($ContenuWeb["listDetailContenuWeb"])>0)
                    {
                ?>
                    <div class="poslistcategories">
                        <div class="container">
                            <div class="pos_title_categories">
                                <h2><?php echo $ContenuWeb["nomLng1"]; ?></h2>
                                <p><?php echo $ContenuWeb["textLng1"]; ?></p>
                            </div>

                            <div class="row pos_content">
                                <div class="block_content owl-carousel">
                                    <!-- single item -->
                                    <?php
                                        foreach($ContenuWeb["listDetailContenuWeb"] as $detailContenuWeb)
                                        {
                                    ?>
                                            <div class="list-categories">
                                                <div class="box-inner">
                                                    <div class="thumb-category">
                                                        <a href="<?php echo $detailContenuWeb["url"] ; ?>">
                                                        <img src="<?php echo    $myHoste .
                                                                                "/assets/images_upload/" .
                                                                                $detailContenuWeb["image"]; ?>" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="desc-listcategoreis">
                                                        <h3 class="name_categories">
                                                            <a href="<?php echo $detailContenuWeb["url"] ; ?>">
                                                                <?php echo $detailContenuWeb["nomLng1"] ;?>
                                                            </a>
                                                        </h3>
                                                        <p class="description-list">
                                                            <?php echo $detailContenuWeb["textLng1"] ;?>
                                                        </p>
                                                        <div class="listcate_shop_now">
                                                            <a href="<?php echo $detailContenuWeb["url"] ; ?>">Voire</a>
                                                        </div>
                                                        <?php
                                                            if(isset($detailContenuWeb["article"]))
                                                            {
                                                        ?>
                                                                <div class="listcate_shop_now pt-2">
                                                                    <a href="<?php echo $detailContenuWeb["checkout"] ; ?>">Acheter</a>
                                                                </div>                                                        
                                                        <?php
                                                            }
                                                        ?>

                                                    </div>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                    ?>
                                    <!-- single item end -->
                                
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    }
                ?>
                <!-- --------------poslistcategories end ---------------->
                <?php
                    if( $ContenuWeb["idContenuWebType"] == 4 &&
                        isset($ContenuWeb["listDetailContenuWeb"]) && count($ContenuWeb["listDetailContenuWeb"])>0)
                    {
                ?>
                <!-- --------------product tabs container slider-------------- -->
                        <div class="product-tabs-container-slider product_block_container">
                            <div class="container-fluid">
                                <div class="pos_tab">
                                    <div class="pos_title_cate"><h2><?php echo $ContenuWeb["nomLng1"]; ?></h2></div>
                                    <div class="pos_desc"><p><?php echo $ContenuWeb["textLng1"]; ?></p>
                                    </div>
                                </div>
                                
                                <ul class="nav tabs_slider">
                                    <?php
                                        $count =0;
                                        $listeGroupeDetailContenuWeb = filter(  $ContenuWeb["listDetailContenuWeb"],
                                                                                "idParent",
                                                                                null);
                                        foreach($listeGroupeDetailContenuWeb as $detailGroupeContenuWeb)
                                        {
                                            $count +=1;
                                    ?>
                                            <li>
                                                <a  href="#newarrival<?php echo $count ?>"
                                                    data-bs-toggle="tab"
                                                    class="<?php echo ($count==1? "active" : "");?>">
                                                    <?php echo $detailGroupeContenuWeb["nomLng1"] ;?>
                                                </a>
                                            </li>
                                    <?php
                                        }
                                    ?>
                                </ul>

                                <div class="tab-content pos_content">
                                    <?php
                                        $count =0;
                                        foreach($listeGroupeDetailContenuWeb as $detailGroupeContenuWeb)
                                        {
                                            $count +=1;
                                            $listeDetailContenuWeb = filter( $ContenuWeb["listDetailContenuWeb"],
                                                                             "idParent", $detailGroupeContenuWeb["id"]);
                                    ?>
                                            <div    class="tab-pane fade <?php echo ($count==1?  " active" : "");?>"
                                                    id="newarrival<?php echo $count ?>">
                                                <div class="productTabContent1 owl-carousel">
                                                    <!-- ----------------single product------------- -->
                                                    <?php
                                                        foreach($listeDetailContenuWeb as $detailContenuWeb)
                                                        {
                                                    ?>
                                                            <div class="item-product">
                                                                <div class="product-miniature js-product-miniature">
                                                                    <div class="img_block">
                                                                    <a  href="<?php echo $detailContenuWeb["url"] ; ?>"
                                                                        class="thumbnail product-thumbnail">
                                                                        <img
                                                                        src="<?php echo    $myHoste .
                                                                                "/assets/images_upload/" .
                                                                                $detailContenuWeb["image"]; ?>"
                                                                                alt="harosa product">
                                                                        </a>
                                                                        <ul class="product-flag">
                                                                            <li class="new">
                                                                                <span>
                                                                            <?php echo $detailContenuWeb["badge"] ;?>
                                                                                </span>
                                                                            </li>
                                                                        </ul>
                                                                        <div class="quick-view">
                                                                            <a href="<?php echo $detailContenuWeb["url"] ; ?>"
                                                                                data-original-title="Voir"
                                                                                class="quick_view">
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
                                                                    <a href="<?php echo $detailContenuWeb["url"] ; ?>">
                                                                    <?php echo $detailContenuWeb["nom2Lng1"] ;?>
                                                                    </a>
                                                                        </div>
                                                                        <h1>
                                                                    <a  href="<?php echo $detailContenuWeb["url"] ; ?>"
                                                                        class="product_name"
                                                                        title="Hummingbird printed t-shirt">
                                                                    <?php echo $detailContenuWeb["nomLng1"] ;?>
                                                                    </a>
                                                                        </h1>
                                                                        <div class="product-price-and-shipping">
                                                                            <span class="regular-price">
                                                                            <?php echo $detailContenuWeb["price"] ;?>
                                                                            </span>
                                                                            <?php
                                                                                if($detailContenuWeb["havePromo"])
                                                                                {
                                                                            ?>
                                                                                <span class="price price-sale">
                                                                                <?php echo $detailContenuWeb["newPrice"] ;?>
                                                                                </span>
                                                                            <?php
                                                                                }
                                                                            ?>
                                                                        </div>
                                                                        <?php
                                                                            if(isset($detailContenuWeb["article"]))
                                                                            {
                                                                        ?>
                                                                                <div class="cart">
                                                                                    <div class="product-add-to-cart">
                                                                                    <a  class=" add-product-to-cart"
                                                                                        href="#"
                                                                                        data-image="<?php echo $detailContenuWeb["image"];?>"
                                                                                        data-product="<?php echo $detailContenuWeb["article"]["id"];?>">
                                                                                        + Au panier
                                                                                    </a><br><br>
                                                                                    <a href="<?php echo $detailContenuWeb["checkout"] ;?>">Acheter</a>
                                                                                </div>
                                                                        </div>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    <?php
                                                        }
                                                    ?>
                                                    <!-- -------------single product end------------- -->
                                                </div>
                                            </div>
                                    <?php
                                        }
                                    ?>
                                </div>

                            </div>
                        </div>
                <!-- --------------product tabs container slider end-------------- -->
                <?php
                    }
                    if( $ContenuWeb["idContenuWebType"] == 5 &&
                        isset($ContenuWeb["listDetailContenuWeb"]) && count($ContenuWeb["listDetailContenuWeb"])>0)
                    {
                        $firstElemnt = find($ContenuWeb["listDetailContenuWeb"],"ordre",1);
                        $segondElemnt = find($ContenuWeb["listDetailContenuWeb"],"ordre",2);
                        $thirdElemnt = find($ContenuWeb["listDetailContenuWeb"],"ordre",3);
                ?>
                        <!-- cms info  -->
                        <div class="cms_info">
                            <img src="<?php echo    $myHoste .
                                                    "/assets/images_upload/" .
                                                    $firstElemnt["image"]; ?>" alt="" class="img-responsive">
                            <div class="cms_container">
                                <div class="container">
                                    <div class="info_content">
                                        <p class="txt1"><?php echo $firstElemnt["nom2Lng1"] ;?></p>
                                        <h2><?php echo $firstElemnt["nomLng1"] ;?></h2>
                                        <p class="txt2"><?php echo $firstElemnt["textLng1"] ;?></p>
                                        <a href="<?php echo $firstElemnt["url"] ;?>">Voir</a><br>
                                        <?php
                                            if(isset($detailContenuWeb["article"]))
                                            {
                                        ?>
                                            <a href="<?php echo $firstElemnt["checkout"] ;?>">Acheter</a>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- cms info end -->
                        <?php
                            if(!empty($segondElemnt) || !empty($thirdElemnt))
                            {
                        ?>
                                <!-- home banner -->
                                <div class="home-banner">
                                    <div class="container-fluid p-0">
                                        <div class="row g-0">
                                        <?php
                                            if(!empty($segondElemnt))
                                            {
                                        ?>
                                                <div class="col-md-6">
                                                    <div class="banner-box m-0">
                                                        <a href="<?php echo $segondElemnt["url"] ; ?>">
                                                            <img src="<?php echo    $myHoste .
                                                            "/assets/images_upload/" .
                                                            $segondElemnt["image"]; ?>" alt="harosa">
                                                        </a>
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                            if(!empty($thirdElemnt))
                                            {
                                        ?>
                                                <div class="col-md-6">
                                                    <div class="banner-box m-0">
                                                        <a href="<?php echo $thirdElemnt["url"] ; ?>">
                                                            <img src="<?php echo    $myHoste .
                                                            "/assets/images_upload/" .
                                                            $thirdElemnt["image"]; ?>" alt="harosa">
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- home banner end -->
                        <?php
                            }
                        ?>
                <?php
                    }
                ?>
                <?php
                    if( $ContenuWeb["idContenuWebType"] == 6 &&
                        isset($ContenuWeb["listDetailContenuWeb"]) && count($ContenuWeb["listDetailContenuWeb"])>0)
                    {
                ?>
                        <!-- categori mini product area -->
                        <div class="categori-mini-product-area">
                            <div class="container">
                                <div class="row">
                                    <?php
                                        $count =0;
                                        $listeGroupeDetailContenuWeb = filter(  $ContenuWeb["listDetailContenuWeb"],
                                                                                "idParent",
                                                                                null);
                                        foreach($listeGroupeDetailContenuWeb as $detailGroupeContenuWeb)
                                        {
                                            $count +=1;
                                            
                                            $listeDetailContenuWeb = filter( $ContenuWeb["listDetailContenuWeb"],
                                                                             "idParent", $detailGroupeContenuWeb["id"]);
                                            $matrice = array_chunk($listeDetailContenuWeb, 3);

                                    ?>
                                            <div class="col-lg-4">
                                                <div class="pos-featured-products  product_block_container">
                                                    <div class="pos_title">
                                                        <h2><?php echo $detailGroupeContenuWeb["nomLng1"] ?></h2>
                                                    </div>
                                                </div>
                                                <div class=" pos_content row">
                                                    <div class="feature-item owl-carousel">
                                                        <?php
                                                            foreach($matrice as $elementMatrice)
                                                            {
                                                        ?>
                                                                <div class="item-product">
                                                                <?php
                                                                    foreach($elementMatrice as $m)
                                                                    {
                                                                ?>
                                                                    <!-- mini product -->
                                                                    <div class="product-miniature js-product-miniature">
                                                                        <div class="img_block">
                                                                            <a  href="<?php echo $m["url"] ; ?>"
                                                                                class="thumbnail product-thumbnail">
                                                                                <img src="<?php echo    $myHoste .
                                                                                            "/assets/images_upload/" .
                                                                                            $m["image"]; ?>" alt="">
                                                                            </a>
                                                                            <div class="quick-view">
                                                                <a href="<?php echo $m["url"] ; ?>" class="quick_view">
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
                                                                                <a href="<?php echo $m["url"] ; ?>">
                                                                                    <?php echo $m["nom2Lng1"]; ?>
                                                                                </a>
                                                                            </div>
                                                                            <h1>
                                                                                <a href="<?php echo $m["url"] ; ?>">
                                                                                <?php echo $m["nomLng1"]; ?></a>
                                                                            </h1>
                                                                            <div class="product-price-and-shipping">
                                                                                <?php
                                                                                    if($m["havePromo"])
                                                                                    {
                                                                                ?>
                                                                                        <span class="regular-price">
                                                                                        <?php echo $m["newPrice"] ; ?>
                                                                                        </span>
                                                                                <?php
                                                                                    }
                                                                                ?>
                                                                                <span class="price ">
                                                                                    <?php echo $m["price"]; ?>
                                                                                </span>
                                                                            </div>
                                                                            <?php
                                                                                if(isset($m["article"]))
                                                                                {
                                                                            ?>                                           
                                                                                    <div class="cart">
                                                                                        <div class="product-add-to-cart">
                                                                                            <a class=" add-product-to-cart"
                                                                                                href="#"                                                                                                
                                                                                                data-image="<?php echo $m["image"];?>"
                                                                                                data-product="<?php echo $m["article"]["id"];?>">+ Au panier</a><br>
                                                                                            <a class="mt-2" href="<?php echo $m["checkout"] ;?>">Acheter</a>
                                                                                        </div>
                                                                                    </div>
                                                                            <?php
                                                                                }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <!-- mini product end -->
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </div>
                                                        <?php
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <!-- categori mini product area end -->
                <?php
                    }
                    if( $ContenuWeb["idContenuWebType"] == 7 &&
                        isset($ContenuWeb["listDetailContenuWeb"]) && count($ContenuWeb["listDetailContenuWeb"])>0)
                    {
                ?>
                        <!-- testimonials container -->
                        <div    class="testimonials_container"
                                style="background: url(<?php
                                                        echo    $myHoste .
                                                        "/assets/images_upload/" .
                                                        $ContenuWeb["image"]; ?>) no-repeat center center fixed;">
                                    <div class="container">
                                        <div class="testimonialsSlide pos_content owl-carousel">
                                        <?php
                                            foreach($ContenuWeb["listDetailContenuWeb"] as $detailContenuWeb)
                                            {
                                        ?>
                                                <!-- testimonial iteme -->
                                                <div class="item-testimonials">
                                                    <div class="item">
                                                        <div class="content_author">
                                                            <img src="<?php echo $myHoste .
                                                                                "/assets/images_upload/" .
                                                                                $detailContenuWeb["image"]; ?>"
                                                                alt="Harosa Testimonial">
                                                            <div class="content_test">
                                                                <div class="des_testimonial">
                                                                <?php echo $detailContenuWeb["textLng1"] ; ?>
                                                                </div>
                                                                <p class="des_namepost"><span>
                                                                    <?php echo $detailContenuWeb["nomLng1"] ; ?>
                                                                </span></p>
                                                                <p class="des_email">
                                                                    <?php echo $detailContenuWeb["nom2Lng1"] ; ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- testimonial iteme end -->
                                            <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- testimonials container end -->
                                <?php
                    }
                    if( $ContenuWeb["idContenuWebType"] == 8 &&
                        isset($ContenuWeb["listDetailContenuWeb"]) && count($ContenuWeb["listDetailContenuWeb"])>0)
                    {
                ?>
                        <!-- pos special products  -->
                        <div class="pos-special-products">
                            <div class="container">
                                <div class="special-products">
                                    <div class="pos_title"><h2> <?php echo $ContenuWeb["nomLng1"] ; ?></h2></div>
                                    <div class="special-item1 pos_content owl-carousel">
                                        <!-- special item -->
                                        <?php
                                            foreach($ContenuWeb["listDetailContenuWeb"] as $detailContenuWeb)
                                            {
                                                
                                        ?>
                                                    <div class="product-miniature js-product-miniature">
                                                        <div class="img_block">
                                                            <a  href="<?php echo $detailContenuWeb["url"] ; ?>" 
                                                                class="thumbnail product-thumbnail">
                                                                    <img src="<?php echo $myHoste .
                                                                                    "/assets/images_upload/" .
                                                                                    $detailContenuWeb["image"]; ?>"
                                                                        alt="harosa product">
                                                            </a>
                                                            <ul class="product-flag">
                                                                <li class="new">
                                                                <span><?php echo $detailContenuWeb["badge"] ; ?></span>
                                                                </li>
                                                            </ul>
                                                            <div class="quick-view">
                                                                <a  href="<?php echo $detailContenuWeb["url"] ; ?>"
                                                                    data-original-title="Voir"
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
                                                        </div>
                                                        <div class="product_desc">
                                                            <h1>
                                                                <a  href="<?php echo $detailContenuWeb["url"] ; ?>"
                                                                    class="product_name"
                                                                    title="Hummingbird printed t-shirt">
                                                                    <?php echo $detailContenuWeb["nomLng1"] ; ?>
                                                                </a>
                                                            </h1>
                                                            <div class="manufacturer">
                                                                <a href="<?php echo $detailContenuWeb["url"] ; ?>">
                                                                    <?php echo $detailContenuWeb["nom2Lng1"] ; ?>
                                                                </a>
                                                            </div>
                                                            <div class="product-desc" >
                                                                <p><span>
                                                                    <?php echo $detailContenuWeb["textLng1"] ; ?>
                                                                </span></p>
                                                            </div>
                                                            <div class="product-price-and-shipping">
                                                                <?php
                                                                    if($detailContenuWeb["havePromo"])
                                                                    {
                                                                ?>
                                                                        <span class="regular-price">
                                                                        <?php echo $detailContenuWeb["newPrice"] ; ?>
                                                                        </span>
                                                                <?php
                                                                    }
                                                                ?>
                                                                <span class="price price-sale">
                                                                    <?php echo $detailContenuWeb["price"] ; ?>
                                                                </span>
                                                            </div>
                                                            <?php
                                                                if(isset($detailContenuWeb["article"]))
                                                                {
                                                            ?>
                                                                    <div class="cart">
                                                                        <div class="product-add-to-cart">
                                                                            <a  class=" add-product-to-cart"
                                                                            href="#"
                                                                            data-image="<?php echo $detailContenuWeb["image"];?>"
                                                                            data-product="<?php echo $detailContenuWeb["article"]["id"];?>">+ Au panier</a><br><br>
                                                                            <a href="<?php echo $detailContenuWeb["checkout"] ;?>">Acheter</a>
                                                                        </div>
                                                                    </div>
                                                            <?php
                                                                }
                                                            ?>
                                                        </div>
                                                        <div class="countdown">
                                                            <div class="time_count_down">
                                            <div data-countdown="<?php echo $detailContenuWeb["finPromo"] ; ?>"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                        <?php
                                                
                                            }
                                        ?>
                                        <!-- special item end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- pos special products  end -->
                <?php
                    }
                    if( $ContenuWeb["idContenuWebType"] == 9 &&
                        isset($ContenuWeb["listDetailContenuWeb"]) && count($ContenuWeb["listDetailContenuWeb"])>0)
                    {
                ?>
                        <footer id="footer">
                            <div class="footer-container">
                                <div class="footer-top">
                                    <div class="container">
                                        <div class="pos_logo product_block_container">
                                            <div class="logo-slider owl-carousel pos_content">
                                            <?php
                                                foreach($ContenuWeb["listDetailContenuWeb"] as $detailContenuWeb)
                                                {
                                            ?>
                                                    <div class="item-banklogo">
                                                        <a href="<?php echo $detailContenuWeb["url"] ; ?>">
                                                            <img src="<?php echo $myHoste .
                                                                                "/assets/images_upload/" .
                                                                                $detailContenuWeb["image"]; ?>"
                                                                 alt="harosa brand logo">
                                                        </a>
                                                    </div>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </footer>
                <?php
                    }
                    if( $ContenuWeb["idContenuWebType"] == 11 )
                    {
                ?>
                       <div class="about__us_page_area">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="banner_h2__left_image">
                                            <img alt="" src="<?php echo $myHoste .
                                                                                "/assets/images_upload/" .
                                                                                $ContenuWeb["image"]; ?>">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="banner_h2_Right_text">
                                            <div class="wpb_wrapper">
                                                <h3><?php echo $ContenuWeb["nomLng1"] ; ?></h3>
                                                <p><?php echo $ContenuWeb["textLng1"] ; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                    if( $ContenuWeb["idContenuWebType"] == 12 &&
                        isset($ContenuWeb["listDetailContenuWeb"]) && count($ContenuWeb["listDetailContenuWeb"])>0)
                    {
                        ?>
                            <div class="funfact-area bg--white" >
                                <div class="funfacts">
                                    <div class="container">
                                        <div class="row g-0">
                                            <?php
                                                foreach($ContenuWeb["listDetailContenuWeb"] as $detailContenuWeb)
                                                {
                                            ?>
                                                    <!--  Single Funfact -->
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="funfact">
                                                            <div class="fun__fact_img">
                                                                <img src="<?php echo $myHoste .
                                                                                "/assets/images_upload/" .
                                                                                $detailContenuWeb["image"]; ?>" alt="">
                                                            </div>
                                                            <div class="fun_fact_info">
                                                                <h1>
                                                                    <span class="counter">
                                                                        <?php echo $detailContenuWeb["nomLng1"] ; ?>
                                                                    </span>
                                                                </h1>
                                                                <h5><?php echo $detailContenuWeb["nom2Lng1"] ; ?></h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--//  Single Funfact -->
                                            <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                        </div>
                <?php
                    }
                    if( $ContenuWeb["idContenuWebType"] == 13 &&
                        isset($ContenuWeb["listDetailContenuWeb"]) && count($ContenuWeb["listDetailContenuWeb"])>0)
                    {
                        ?>
                            <div class="abou_skrill__area">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="skrill_here">
                                                <h3><?php echo $ContenuWeb["nomLng1"] ; ?></h3>
                                                <div class="ht-single-about">
                                                    <div class="skill-bar">
                                                        <?php
                                                            foreach($ContenuWeb["listDetailContenuWeb"] as
                                                                    $detailContenuWeb)
                                                            {
                                                        ?>
                                                                <div class="skill-bar-item">
                                                                        <span>
                                                                            <?php echo $detailContenuWeb["nomLng1"] ; ?>
                                                                        </span>
                                                                        <div class="progress">
                                                                        <div class="progress-bar wow fadeInLeft width80"
                                                                            data-progress="80%" data-wow-duration="1.5s"
                                                                                    data-wow-delay="1.2s">
                                                                        <span class="text-top">
                                                                           <?php echo $detailContenuWeb["number1"] ; ?>%
                                                                        </span>
                                                                            </div>
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
                                            <div class="banner_h2__left_image lft_to_right">
                                                <img alt="" src="<?php echo    $myHoste .
                                                                            "/assets/images_upload/" .
                                                                            $ContenuWeb["image"]; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <?php
                    }
                    if( $ContenuWeb["idContenuWebType"] == 14 &&
                        isset($ContenuWeb["listDetailContenuWeb"]) && count($ContenuWeb["listDetailContenuWeb"])>0)
                    {
                ?>
                         <!--Service Item Area Start-->
                        <section class="service-item-area mt-20">
                            <div class="container">
                                <div class="row">
                                <?php
                                    foreach($ContenuWeb["listDetailContenuWeb"] as $detailContenuWeb)
                                    {
                                ?>
                                        <!--Single Service Item Start-->
                                        <div class="col-lg-4 col-md-6">
                                            <div class="single-service-item">
                                                <div class="service-img img-full mb-35">
                                                    <img src="<?php echo $myHoste .
                                                                                "/assets/images_upload/" .
                                                                                $detailContenuWeb["image"]; ?>" alt="">
                                                </div>
                                                <div class="service-content">
                                                    <div class="service-title">
                                                        <h4><?php echo $detailContenuWeb["nomLng1"] ; ?></h4>
                                                    </div>
                                                    <p><?php echo $detailContenuWeb["textLng1"] ; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Single Service Item End-->
                                <?php
                                    }
                                ?>
                                </div>
                            </div>
                        </section>
                        <!--Service Item Area End-->
                <?php
                    }
                ?>
                <?php
                    
                    if( $ContenuWeb["idContenuWebType"] == 15 &&
                        isset($ContenuWeb["listDetailContenuWeb"]) && count($ContenuWeb["listDetailContenuWeb"])>0)
                    {
                ?>
                           <!--Our Service Area Start-->
                            <section class="our-service-area pt-30" style="background: url(<?php
                                    echo    $myHoste .
                                    "/assets/images_upload/" .
                                    $ContenuWeb["image"]; ?>) no-repeat center center;background-size: cover;">
                                <div class="container">
                                    <!--Section Title3 Start-->
                                    <div class="section-title3 mb-70">
                                        <h3><?php echo $ContenuWeb["nomLng1"] ; ?></h3>
                                        <p><?php echo $ContenuWeb["textLng1"] ; ?></p>
                                    </div>
                                    <!--Section Title3 End-->
                                
                                    <div class="row">
                                    <?php
                                        foreach($ContenuWeb["listDetailContenuWeb"] as $detailContenuWeb)
                                        {
                                    ?>
                                            <!--Single Service Start-->
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="single-service mb-50">
                                                    <div class="service-icon f-left">
                                                        <i>
                                                            <img width="28px" src="<?php echo    $myHoste .
                                                                "/assets/images_upload/" .
                                                                $detailContenuWeb["image"]; ?>" alt="">
                                                        </i>
                                                    </div>
                                                    <div class="service-info f-right">
                                                        <h3> <?php echo $detailContenuWeb["nomLng1"] ; ?></h3>
                                                        <p> <?php echo $detailContenuWeb["textLng1"] ; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Single Service End-->
                                    <?php
                                        }
                                    ?>
                                    </div>
                                </div>
                            </section>
                            <!--Our Service Area End-->
                <?php
                    }
                    if( $ContenuWeb["idContenuWebType"] == 16)
                    {
                ?>
                        <!-- contact form area -->
                        <div class="contact-form-area">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="contact-form-inner">
                                            <h2><?php echo $ContenuWeb["nomLng1"] ; ?></h2>
                                            <form action="mail.php" method="get">
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="text" class="form-control" placeholder="First name*" required>
                                                    </div>
                                                    <div class="col">
                                                        <input type="text" class="form-control" placeholder="Last name*" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="text" class="form-control" placeholder="Email*" required>
                                                    </div>
                                                    <div class="col">
                                                        <input type="text" class="form-control" placeholder="Subject*" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <textarea name="your-message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true"
                                                            aria-invalid="false" placeholder="Message *" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="contact-submit">
                                                    <input type="submit" value="Send Email" class="wpcf7-form-control wpcf7-submit button">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="contact-address-area">
                                            <h2><?php echo $ContenuWeb["nom2Lng1"] ; ?></h2>
                                            <p><?php echo $ContenuWeb["textLng1"] ; ?></p>
                                            <ul>
                                                <li>
                                                    <i class="fa fa-fax">&nbsp;</i> Adresse : <?php echo $societeAdresse["value"] ; ?></li>
                                                <li>
                                                    <i class="fa fa-phone">&nbsp;</i> <?php echo $societeMail["value"] ; ?></li>
                                                <li>
                                                    <i class="fa fa-envelope-o"></i>&nbsp;</i> <?php echo $societePhone["value"] ; ?></li>
                                            </ul>
                                            <h3>
                                                <strong>Heures d'ouverture</strong>
                                            </h3>
                                            <p><?php echo $societeHoraire["value"] ; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- contact form area end -->
                <?php
                    }
                    if( $ContenuWeb["idContenuWebType"] == 17)
                    {
                ?>
                        <!-- contact page map -->
                        <div class="contact-page-map">
                            <!-- Google Map Start -->
                            <div class="container">
                                <iframe src = "https://maps.google.com/maps?q=<?php echo($longitude)?>,<?php echo($latitude)?>&hl=es;z=14&amp;output=embed"  style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
                            </div>
                            <!-- Google Map End -->
                        </div>
                        <!-- contact page map -->
        <?php
                    }
            }
        ?>
        
        <?php
            include("footer.php");
        ?>
    </div>
    <!-- Body main wrapper end -->

  

</body>
</html>
