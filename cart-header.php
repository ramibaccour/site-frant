<?php
    $cart  = array();
    if(isset($_SESSION["cart"]))
    {
        $cart  = $_SESSION["cart"];
    }
    $somme = 0;
    foreach($cart as $myArticleCart)
    {
        $havePromo = havePromo($myArticleCart);
        $somme += $havePromo===true? $myArticleCart["newPrice"] : $myArticleCart["price"];
    }
?>
<div class="dropdown">
    <button class="cart-icon" data-bs-toggle="dropdown">
        <i class="fa fa-shopping-basket"></i>
        <span class="item_txt"> Panier</span>
        <span class="item_count">(<?php echo count($cart);?>)</span>
        <span class="item_total"><?php echo $somme ?> DT</span>
    </button>
    <div class="header-cart dropdown-menu">
    <ul>
        <?php
            foreach($cart as $myArticleCart)
            {
                $havePromo = havePromo($myArticleCart);
        ?>
                <li>
                    <div class="img_content">
                        <img  class="product-image img-responsive"
                            src="<?php echo    $myHoste .
                                                "/assets/images_upload/" .
                                                $myArticleCart["image"]; ?>"
                            alt="" title="">
                        <span class="product-quantity"><?php echo $myArticleCart["qte"]; ?>x</span>
                    </div>
                    <div class="right_block">
                        <span class="product-name"><?php echo $myArticleCart["nomLng1"]; ?></span>
                        <span class="product-price">
                            <?php echo $havePromo===true? $myArticleCart["newPrice"] : $myArticleCart["price"]; ?>DT
                        </span>
                        <a href="#" class="remove-from-cart"> <i class="fa fa-remove pull-xs-left"></i></a>
                    </div>
                </li>
        <?php
            }
        ?>
    </ul>
    <div class="price_content">
        <div class="cart-total price_inline">
            <span class="label">Total</span>
            <span class="value"><?php echo $somme ?> DT</span>
        </div>
    </div>
    <div class="checkout">
        <a href="<?php echo $myHoste ; ?>/checkout.php" class="btn btn-primary">Acheter</a>
    </div>
</div>

