
<!doctype html>
<html class="no-js" lang="en">
    <?php
        include("head.php");
        $idCategorie = $_GET["id_categorie"];
        $filter =   '{ "isDeleted" : {"value" : "0",       "operator" : "=" }, '.
                    '  "idParent":       {"value" : ' . $idCategorie . ', "operator" : "="}  }';
        $filter = json_decode($filter, true);
        $filter = (object)$filter;
        $listeCategorieChildren = getListeCategorie($filter,true, true)["listCategorieResponse"];
    ?>
<body>
    <!-- Add your site or application content here -->

    <!-- Body main wrapper start -->
    <div class="wrapper home-one">
        <?php
            include("header.php");
        ?>

       


        <!-- Portfolio Area -->
        <div class="co-portfolio-section-1">
            <div class="container">
                

                <div class="co-isotop-grid-1 isotop-grid row">
                    <?php
                        foreach($listeCategorieChildren as $categorieChildren)
                        {
                            $image = "";
                            $url = "#";
                            //recherche image
                            if(isset($categorieChildren["listImage"]) && !empty($categorieChildren["listImage"]))
                            {
                                $listeImage = filter($categorieChildren["listImage"],"idResolution",22);
                                if(!empty($listeImage))
                                {
                                    usort($listeImage, function($a, $b)
                                    {
                                        return $a['ordre'] - $b['ordre'];
                                    });
                                    $image = $listeImage[0]["nom"];
                                }
                            }
                            // recherche children
                            if( isset($categorieChildren["listeArticleCategorie"]) &&
                                !empty($categorieChildren["listeArticleCategorie"]))
                            {
                                $url = $GLOBALS['myHoste'].
                                        "/liste/article/" .
                                        $categorieChildren["id"] . "/".
                                        urlencode($categorieChildren["nomLng1"]);
                            }
                            else
                            {
                                $url = $GLOBALS['myHoste'].
                                        "/liste/categorie/" .
                                        $categorieChildren["id"] . "/".
                                        urlencode($categorieChildren["nomLng1"]);
                                
                            }
                    ?>
                            <div class="co-isotop-item-1 isotop-item branding web col-lg-4 col-sm-6">
                                <div class="portfolio___single">
                                        <img src="<?php echo    $myHoste .
                                                                "/assets/images_upload/" .
                                                                $image; ?>" alt="">
                                        <div class="content">
                                            <div class="portfolio__icon">
                                                <a href="<?php echo $url; ?>">
                                                    <i class="fa fa-link"></i>
                                                </a>
                                                <a class="image-popup" href="<?php echo    $myHoste .
                                                                                            "/assets/images_upload/" .
                                                                                            $image; ?>">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </div>
                                            <div class="title"><?php echo $categorieChildren["nomLng1"]; ?></div>
                                        </div>
                                </div>
                            </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        <!--// Portfolio Area -->

        <?php
            include("footer.php");
        ?>

       
    </div>
    <!-- Body main wrapper end -->
    
</body>
</html>
