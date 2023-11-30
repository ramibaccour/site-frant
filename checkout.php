<?php  session_start(); ?>
<!doctype html>
<html class="no-js" lang="en">
    <?php
        $saved = "d-none";
        $verifData = "d-none";
        $noProduct = "d-none";
        include("head.php");
        $myCart = array();
        $article = array();
        if(isset($_GET["id_article"]))
        {
            $idArticle = $_GET["id_article"];
            $article = getArticle($idArticle);
            array_push($myCart, $article);
        }
        elseif(isset($_SESSION["cart"]))
        {
            $myCart = $_SESSION["cart"];
        }
        if (!empty($_POST["submit"]))
        {
            if (!empty($_POST["nomLng1"]) &&
                !empty($_POST["mobile1"]) &&
                !empty($_POST["adresseLng1"]) &&
                !empty($_POST["regionLng1"]) &&
                !empty($_POST["villeLng1"]))
            {
                if(!empty($myCart))
                {
                    $totalHt = 0;
                    $date = date('Y-m-d H:i:s');
                    $commande = array();
                    $commande["nomLng1"] = $_POST["nomLng1"] ;
                    $commande["adresseLng1"] = $_POST["adresseLng1"] ;
                    $commande["date"] = $date ;
                    $commande["etat"] = "en_attente" ;
                    $commande["villeLng1"] = $_POST["villeLng1"] ;
                    $commande["regionLng1"] = $_POST["regionLng1"] ;
                    $commande["mobile1"] = $_POST["mobile1"] ;
                    $commande["isDeleted"] = 0 ;
                    $commande["typeDocument"] = "commande_client" ;
                    $commande["idParametre"] = 24 ;
                    $commande["idParametre2"] = 27 ;
                    $commande["totalTva"] = 0 ;
                    $detailDocument = array();
                    foreach($myCart as $articleCart)
                    {
                        $detail = array();
                        $havePromo = havePromo($articleCart);
                        $detail["nomArticle"] = $articleCart["nomLng1"];
                        $detail["quantiteArticle"] = 1;
                        $detail["tauxTva"] = 0;
                        $detail["articlePrix"] = ($havePromo===true? $articleCart["newPrice"] : $articleCart["price"]);
                        $detail["totalHt"] = $detail["articlePrix"];
                        array_push($detailDocument, $detail);
                        $totalHt +=  ($havePromo===true? $articleCart["newPrice"] : $articleCart["price"]) *  $articleCart["qte"];
                    }
                    $commande["totalHt"] = $totalHt ;
                    $commande["totalTtc"] = $totalHt ;
                    
                    $commande["listDetailDocument"] =$detailDocument ;
                    $commande = json_decode (json_encode ($commande), false);
                    saveDocument($commande);
                    $_SESSION["cart"] = array();
                    session_destroy();
                    $myCart = array();
                    $saved = "";
                }
                else
                {                    
                    $noProduct = "";
                }
            }
            else
            {
                $verifData = "";
            }
        }
        
    ?>
    <body>
        <!-- Add your site or application content here -->

        <!-- Body main wrapper start -->
        <div class="wrapper home-one">
            <?php
                include("header.php");
            ?>

            <!-- checkout page content -->
            <div class="checkout-page-area">
                <!-- checkout area -->
                <div class="checkout-area">
                    <div class="container">
                        <form
                                class="needs-validation"
                                novalidate
                                action="<?php echo  $GLOBALS['myHoste'] .
                                                    "/checkout.php" .
                                                    (isset($_GET["id_article"])?
                                                                                '/?id_article='.$_GET["id_article"] :
                                                                                ''); ?>" method="post">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="checkbox-form">
                                        <h3>Coordonnées</h3>
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <div class="checkout-form-list">
                                                    <label for="validNom5" >Nom<span class="required">*</span></label>
                                                    <input class="form-control" id="validNom5" type="text" name="nomLng1" placeholder="Nom" required>
                                                    <div class="invalid-feedback">
                                                        Le nom est obligatoire
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="checkout-form-list mb-30">
                                                    <label for="validNom4">Mobile<span class="required">*</span></label>
                                                    <input class="form-control" id="validNom4" type="text" name="mobile1" placeholder="Mobile" required>
                                                    <div class="invalid-feedback">
                                                        Le mobile est obligatoire
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="checkout-form-list mb-30">
                                                    <label for="validNom3">Adresse<span class="required">*</span></label>
                                                    <input class="form-control" id="validNom3" type="text" name="adresseLng1" placeholder="Adresse" required>
                                                    <div class="invalid-feedback">
                                                        L'adresse nom est obligatoire
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="country-select mb-30 mb-30">
                                                    <label for="validNom2">Région<span class="required">*</span></label>
                                                    <select  class="form-control" id="validNom2" name="regionLng1" required>
                                                        <option  value="Ariana" > Ariana </option>
                                                        <option  value="Béja"  > Béja </option>
                                                        <option  value="Ben Arous" > Ben Arous </option>
                                                        <option  value="Bizerte"  > Bizerte </option>
                                                        <option  value="Gabès"  > Gabès </option>
                                                        <option  value="Gafsa" > Gafsa </option>
                                                        <option  value="Jendouba"  > Jendouba </option>
                                                        <option  value="Kairouan"  > Kairouan </option>
                                                        <option  value="Kasserine"  > Kasserine </option>
                                                        <option  value="Kébili"  > Kébili </option>
                                                        <option  value="La Manouba"  > La Manouba </option>
                                                        <option  value="Le Kef"  > Le Kef </option>
                                                        <option  value="Mahdia"  > Mahdia </option>
                                                        <option  value="Médenine"  > Médenine </option>
                                                        <option  value="Monastir"  > Monastir </option>
                                                        <option  value="Nabeul"  > Nabeul </option>
                                                        <option  value="Sfax"  > Sfax </option>
                                                        <option  value="Sidi Bouzid"  > Sidi Bouzid </option>
                                                        <option  value="Siliana"  > Siliana </option>
                                                        <option  value="Sousse"  > Sousse </option>
                                                        <option  value="Tataouine"  > Tataouine </option>
                                                        <option  value="Tozeur" > Tozeur </option>
                                                        <option  value="Tunis"  > Tunis </option>
                                                        <option  value="Zaghouan" > Zaghouan </option>
                                                        
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        La région est obligatoire
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="checkout-form-list mb-30">
                                                    <label for="validNom1">Ville<span class="required">*</span></label>
                                                    <input class="form-control" id="validNom1" type="text" name="villeLng1" placeholder="Ville" required>
                                                    <div class="invalid-feedback">
                                                        La ville est obligatoire
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="your-order">
                                        <h3>Panier</h3>
                                        <div class="your-order-table table-responsive">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th class="product-name">Produit(s)</th>
                                                        <th class="product-total">Prix</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $somme = 0;
                                                        foreach($myCart as $article)
                                                        {
                                                            $havePromo = havePromo($article);
                                                            $somme += ($havePromo===true?
                                                                $article["newPrice"] :
                                                                $article["price"]) * $article["qte"];
                                                    ?>
                                                            <tr class="cart_item">
                                                                <td class="product-name">
                                                                    <?php echo $article["nomLng1"]; ?>
                                                                </td>
                                                                <td class="product-total">
                                                                    <span class="amount">
                                        <?php echo $havePromo===true? $article["newPrice"] : $article["price"]; ?>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                    <?php
                                                        }
                                                    ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr class="order-total">
                                                        <th>Total</th>
                                            <td><strong><span class="amount"><?php echo $somme ?> DT</span></strong>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <div class="payment-method">
                                            <div class="payment-accordion">
                                                <div class="order-button-payment">
                                                    <input type="submit" name="submit" value="Place order">
                                                </div>                                                
                                                <p class="<?php echo $saved; ?> mt-1 alert alert-success">Enregistrer</p>
                                                <p class="<?php echo $verifData; ?> mt-1 alert alert-danger">Veuillez saisir vos coordonnées</p>
                                                <p class="<?php echo $noProduct; ?> mt-1 alert alert-danger">Aucun produit dans le panier</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- checkout area end -->

            </div>
            <!-- checkout page content end -->

        <!-- footer start -->
        <?php
                include("footer.php");
            ?>
            <!-- footer end -->
            
        </div>
        <!-- Body main wrapper end -->
        

    </body>
</html>
