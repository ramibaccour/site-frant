 <!-- footer start -->
 <footer id="footer">
    <div class="footer-container">
        <!-- footer main -->
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-lg-3 links footer_block">
                        <h3>Contact</h3>
                        <div class="footer-contact">
                            <p class="address add"><?php echo $societeAdresse["value"] ; ?></p>
                            <p class="phone add"><?php echo $societePhone["value"] ; ?></p>
                            <p class="email add"><a href="#"><?php echo $societeMail["value"] ; ?></a></p>
                            <p class="time add"><?php echo $societeHoraire["value"] ; ?></p>
                        </div>
                        <div class="social_follow">
                            <ul>
                            <li class="facebook"><a href="<?php echo $societeFacebook["value"] ; ?>"></a></li>
                            <li class="youtube"><a href="<?php echo $societeYoutube["value"] ; ?>"></a></li>
                            <li class="instagram"><a href="<?php echo $societeInstagrame["value"] ; ?>"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 links footer_block">
                        <h3 class="hidden-sm-down">Catégories</h3>
                        <ul class="footer_list">
                            <?php
                                $filter =   '{ "isDeleted" : {"value" : "0",       "operator" : "=" }, '.
                                            '  "type":       {"value" : "categorie", "operator" : "="}  }';
                                $filter = json_decode($filter, true);
                                $filter = (object)$filter;
                                $productCategorie = getListeCategorie($filter,true)["listCategorieResponse"];
                                $filtredCategories = array();
                                if(!empty($productCategorie))
                                {
                                    for($i=0;$i<count($productCategorie);$i++)
                                    {
                                        if(find($productCategorie,"id",$productCategorie[$i]["idParent"])!=null)
                                        {
                                            array_push($filtredCategories, $productCategorie[$i]);
                                        }
                                    }
                                }
                                foreach($filtredCategories as $cat)
                                {
                            ?>
                                    <li><a href="#"><?php echo $cat["nomLng1"] ?></a></li>
                            <?php
                                }
                            ?>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-lg-3 links footer_block">
                        <h3 class="hidden-sm-down">Our company</h3>
                        <ul class="footer_list">
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Contact us</a></li>
                            <li><a href="#">Login</a></li>
                            <li><a href="#">My account</a></li>
                        </ul>
                    </div>



                    <?php
                        $imageFooter = find($listeContenuWeb,"idContenuWebType",10);
                        if( !empty($imageFooter) &&
                            isset($imageFooter["listDetailContenuWeb"]) &&
                            count($imageFooter["listDetailContenuWeb"])>0)
                        {
                        $ContenuWeb = getStaticContenuWeb($imageFooter);
                    ?>
                            <div class="col-sm-6 col-lg-3 links footer_block">
                                <h3 class="hidden-sm-down"><?php echo $ContenuWeb["nomLng1"] ; ?></h3>
                                <div class="container">
                                    <div class="row item-instagram">
                                        <?php
                                            foreach($ContenuWeb["listDetailContenuWeb"] as
                                                    $detailContenuWeb)
                                            {
                                        ?>
                                                    <div class="col-sm-4">
                                                        <a href="#">
                                                            <img src="<?php echo $myHoste .
                                                                        "/assets/images_upload/" .
                                                                        $detailContenuWeb["image"]; ?>"
                                                                alt="">
                                                        </a>
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


   <!-- JS
    ============================================ -->

    <!-- Modernizer & jQuery JS -->
    <script src="<?php echo $myHoste ; ?>/assets/js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="<?php echo $myHoste ; ?>/assets/js/vendor/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="<?php echo $myHoste ; ?>/assets/js/bootstrap.min.js"></script>

    <!-- Plugins JS -->
    <script src="<?php echo $myHoste ; ?>/assets/js/jquery.nivo.slider.pack.js"></script>
    <script src="<?php echo $myHoste ; ?>/assets/js/plugins.js"></script>

    <!-- Main JS -->
    <script src="<?php echo $myHoste ; ?>/assets/js/main.js"></script>