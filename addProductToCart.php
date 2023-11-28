<?php
if( isset($_POST["artToAdd"]) &&
    isset($_POST["imageToAdd"]) &&
    isset($_POST["qteToAdd"]))
{
    $cart = array();
    if(isset($_SESSION["cart"]))
    {
        $cart = $_SESSION["cart"];
    }
    $idArtToAdd = $_POST["artToAdd"];
    if(!empty($idArtToAdd))
    {
        $artToAdd = getArticle($idArtToAdd);
        $findArticle = find( $cart, "id", $idArtToAdd );
        if(empty($findArticle))
        {
            $artToAdd["image"] = $_POST["imageToAdd"];
            $artToAdd["qte"] = $_POST["qteToAdd"];
            array_push($cart, $artToAdd);
        }
        else
        {
            for($i=0;$i<count($cart);$i++)
            {
                if($cart[$i]["id"] == $idArtToAdd)
                {
                    $cart[$i]["qte"] += $_POST["qteToAdd"];
                }
            }
        }
        $_SESSION["cart"] = $cart;
    }

}
?>
<form id="form-cart" action="<?php echo $baseHose . $_SERVER['REQUEST_URI'] ?>"  method="post" style="display: none" >
    <input type="text" name="artToAdd" id="artToAdd" >
    <input type="text" name="imageToAdd" id="imageToAdd">
    <input type="text" name="qteToAdd" id="qteToAdd">
</form>
