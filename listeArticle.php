
<!doctype html>
<html class="no-js" lang="en">
    <?php
        include("head.php");
        $idCategorie = $_GET["id_categorie"];
        $listeArticle = getArticleByCategorie($idCategorie);
    ?>
<body>
    <!-- Add your site or application content here -->

    <!-- Body main wrapper start -->
    <div class="wrapper home-one">
        <?php
            include("header.php");
        ?>


      
        <!-- Shop page wraper -->
        <div class="shop-page-wraper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-toolbar">
                            <div class="topbar-title">
                                <h1>Liste Articles</h1>
                            </div>
                            <div class="product-toolbar-inner">
                                <div class="product-view-mode">
                                    <ul class="nav nav-tabs">
                                        <li><a data-bs-toggle="tab" href="#grid" class="active">
                                            <i class="ion-grid"></i>
                                        </a></li>
                                        <li><a data-bs-toggle="tab" href="#list"><i class="ion-navicon"></i></a></li>
                                    </ul>
                                </div>
                                <div class="woocommerce-ordering">
                                   
                                </div>
                                <p class="woocommerce-result-count">
                                    <?php echo count($listeArticle)?> article(s) trouvé
                                </p>
                            </div>
                            <div class="shop-page-product-area tab-content">
                                <div id="grid" class="tab-pane fade show active">
                                    <div class="row">
                                        <?php
                                            foreach($listeArticle as $article)
                                            {
                                                $havePromo = havePromo($article);
                                                $images = filter($article["listeImage"],"idResolution", 5);
                                                usort($images,function($a, $b){return $a['ordre'] - $b['ordre'];});
                                                if(!empty($images))
                                                {
                                                    $images = $images[0]["nom"];
                                                }
                                                else
                                                {
                                                    $images = "#";
                                                }
                                                include "item.php";
                                            }
                                        ?>
                                    </div>
                                </div>

                                <div id="list" class="tab-pane fade">
                                    <div class="row">
                                        <!-- single product list view -->
                                        <div class="col-md-12">
                                        <?php
                                            foreach($listeArticle as $article)
                                            {
                                                $havePromo = havePromo($article);
                                                $images = filter($article["listeImage"],"idResolution", 5);
                                                usort($images,function($a, $b){return $a['ordre'] - $b['ordre'];});
                                                if(!empty($images))
                                                {
                                                    $images = $images[0]["nom"];
                                                }
                                                else
                                                {
                                                    $images = "#";
                                                }
                                                include "item.php";
                                            }
                                        ?>
                                    </div>
                                        </div>
                                        <!-- single product list view end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <!-- Shop page wraper end -->

      <!-- footer start -->
      <?php
            include("footer.php");
        ?>
        <!-- footer end -->
    </div>
    <!-- Body main wrapper end -->
</body>
</html>
