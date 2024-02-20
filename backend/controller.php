
<?php
include_once "getData.php";
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: *");
header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS')
{
    exit;
}

$path = $_SERVER['REQUEST_URI'];
$path = strstr($path, "controller.php");
if ($path !== false)
{
    $path = substr($path, strlen("controller.php"));
}

if ($_SERVER['REQUEST_METHOD'] === 'GET')
{
  if (preg_match('/\/codePromo\/findById\/(\d+)/', $path, $matches))
  {
    $id = intval($matches[1]);
    echo json_encode(getCodePromo($id));
  }
  elseif (preg_match('/\/etatDocument\/findById\/(\d+)/', $path, $matches))
  {
    $id = intval($matches[1]);
    echo json_encode(getEtatDocument($id));
  }
  elseif (preg_match('/\/resolution\/get-by-type-content\/(.*)/', $path, $matches))
  {
    $type_content = $matches[1];
    echo json_encode(getListeResolutionByTypeContent($type_content));
  }
  elseif (preg_match('/\/resolution\/get-by-id-contenuWeb-type\/(\d+)/', $path, $matches))
  {
    $id = intval($matches[1]);
    echo json_encode(getResolutionByIdContenuWebType($id));
  }
  elseif (preg_match('/\/contenuWeb\/findById\/(\d+)/', $path, $matches))
  {
    $id = intval($matches[1]);
    echo json_encode(getContenuWeb($id));
  }
  elseif (preg_match('/\/articleRelation\/findById\/(\d+)/', $path, $matches))
  {
    $id = intval($matches[1]);
    echo json_encode(getArticleRelation($id));
  }
  elseif (preg_match('/\/contenuWeb\/get-liste-by-categorie\/(\d+)/', $path, $matches))
  {
    $id = intval($matches[1]);
    echo json_encode(getListeContenuWebByCategorie($id));
  }
  elseif (preg_match('/\/detailContenuWeb\/findById\/(\d+)/', $path, $matches))
  {
    $id = intval($matches[1]);
    echo json_encode(getLigneContenuWeb($id));
  }
  elseif (preg_match('/\/user\/findById\/(\d+)/', $path, $matches))
  {
    $id = intval($matches[1]);
    echo json_encode(getUser($id));
  }
  elseif($path === '/head-ContenuWeb')
  {
    echo json_encode(getHeadContenuWeb());
  }
  elseif($path === '/head-ligne-ContenuWeb')
  {
    echo json_encode(getHeadLigneContenuWeb());
  }
  elseif($path === '/contenuWebType/liste-type')
  {
    echo json_encode(getListeContenuWebType());
  }
  elseif (preg_match('/\/article\/findById\/(\d+)/', $path, $matches))
  {
    $id = intval($matches[1]);
    echo json_encode(getArticle($id));
  }
  elseif (preg_match('/\/image\/liste\/(\d+)/', $path, $matches))
  {
    $id = intval($matches[1]);
    echo json_encode(getListeImageArticle($id));
  }
  elseif (preg_match('/\/liste-image-categorie\/(\d+)/', $path, $matches))
  {
    $id = intval($matches[1]);
    echo json_encode(getListeImageCategorie($id));
  }
  elseif($path === '/head-article')
  {
    echo json_encode(getHeadArticle());
  }
  elseif (preg_match('/\/document\/findById\/(\d+)/', $path, $matches))
  {
    $id = intval($matches[1]);
    echo json_encode(getDocument($id));
  }
  elseif($path === '/parametre/liste-type')
  {
    echo json_encode(getListeParametreType());
  }
  elseif (preg_match('/\/parametre\/findById\/(\d+)/', $path, $matches))
  {
    $id = intval($matches[1]);
    echo json_encode(getParametre($id));
  }
  elseif (preg_match('/\/categorie\/findById\/(\d+)/', $path, $matches))
  {
    $id = intval($matches[1]);
    echo json_encode(getCategorie($id));
  }
  elseif (preg_match('/\/categorie\/liste-categorie-article\/(\d+)/', $path, $matches))
  {
    $id = intval($matches[1]);
    echo json_encode(getListeCategorieArticle($id));
  }
  elseif ($path ==='/modelAffichage/liste/')
  {
    echo json_encode(getListeModelAffichage());
  }
}
elseif ($_SERVER['REQUEST_METHOD'] === 'POST')
{
  if(isset($_POST['image']) && isset($_POST['name']))
  {
    if($path === '/image/save-file')
    {
      echo json_encode(saveImageFile($_POST['image'],$_POST['name'] ,$_POST['idImage']));
    }
  }
  else
  {
    $data = json_decode(file_get_contents('php://input'));
    if($path === '/codePromo/findByFilter')
    {
      echo json_encode(getListeCodePromo($data));
    }
    elseif($path === '/codePromo/verifierCodePromo')
    {
      $code = $_POST['code'];
      $prix = $_POST['prix'];
      echo json_encode(verifierCodePromo($code,$prix));
    }
    elseif($path === '/article/findByFilter')
    {
      echo json_encode(getListeArticle($data));
    }
    elseif($path === '/articleRelation/findByFilter')
    {
      echo json_encode(getListeArticleRelation($data));
    }
    elseif($path === '/contenuWeb/findByFilter')
    {
      echo json_encode(getListeContenuWeb($data));
    }
    elseif($path === '/detailContenuWeb/findByFilter')
    {
      echo json_encode(getListDetailContenuWeb($data));
    }
    elseif($path === '/etatDocument/findByFilter')
    {
      echo json_encode(getListeEtatDocument($data));
    }
    elseif($path === '/region/findByFilter')
    {
      echo json_encode(getListeRegion($data));
    }
    elseif($path === '/commissionCommercialle/findByFilter')
    {
      echo json_encode(getListeCommissionCommercialle($data));
    }
    elseif($path === '/commissionCommercialle/deleteByFilter')
    {
      echo json_encode(commissionCommercialleDeleteByFilter($data));
    }
    elseif($path === '/commissionCommercialle/saveAllCommission')
    {
      echo json_encode(saveAllCommission($data));
    }
    elseif($path === '/parametre/findByFilter')
    {
      echo json_encode(getListeParametre($data));
    }
    elseif($path === '/parametre/findByListId')
    {
      echo json_encode(getListeParametreByListeId($data));
    }
    elseif($path === '/liste-parametre-by-liste-id')
    {
      echo json_encode(getListeParametreByListeId($data));
    }
    elseif($path === '/categorie/findByFilter')
    {
      echo json_encode(getListeCategorie($data));
    }
    elseif($path === '/categorie/delete')
    {
      echo json_encode(deleteCategorie($data));
    }
    elseif ( $path === "/detailContenuWeb/delete")
    {
      echo json_encode(deleteLigneContenuWeb($data));
    }
    elseif($path === '/user/signin')
    {
      echo json_encode(getSignin($data));
    }
    elseif($path === '/user/findByFilter')
    {
      echo json_encode(getListeUser($data));
    }
    elseif($path === '/typeUser/findByFilter')
    {
      echo json_encode(getListeTypeUser($data));
    }
    elseif($path === '/document/findByFilter')
    {
      echo json_encode(getListeDocument($data));
    }
    elseif($path === '/document/findByFilterAll')
    {
      echo json_encode(getListeDocument($data, false));
    }
    elseif($path === '/articleCategorie/delete-liste')
    {
      echo json_encode(deleteListeArticleCategorie($data));
    }
    elseif($path === '/categorieContenuWeb/delete-liste')
    {
      echo json_encode(deleteListeCategorieContenuWeb($data));
    }
  }
}
elseif ($_SERVER['REQUEST_METHOD'] === "DELETE")
{
  if (preg_match('/\/article\/delete\/(\d+)/', $path, $matches))
  {
    $id = intval($matches[1]); // Récupérez l'ID du produit depuis les paramètres de l'URL
    echo json_encode(deleteArticle($id));
  }
  elseif (preg_match('/\/articleRelation\/delete\/(\d+)/', $path, $matches))
  {
    $id = intval($matches[1]); 
    echo json_encode(deleteArticleRelation($id));
  }
  elseif (preg_match('/\/contenuWeb\/delete\/(\d+)/', $path, $matches))
  {
    $id = intval($matches[1]); // Récupérez l'ID du produit depuis les paramètres de l'URL
    echo json_encode(deleteContenuWeb($id));
  }
  elseif (preg_match('/\/delete-image\/(\d+)/', $path, $matches))
  {
    $id = intval($matches[1]); // Récupérez l'ID du produit depuis les paramètres de l'URL
    echo json_encode(deleteImage($id));
  }
  elseif (preg_match('/\/user\/delete\/(\d+)/', $path, $matches))
  {
    $id = intval($matches[1]); // Récupérez l'ID du produit depuis les paramètres de l'URL
    echo json_encode(deleteUser($id));
  }
  elseif (preg_match('/\/codePromo\/delete\/(\d+)/', $path, $matches))
  {
    $id = intval($matches[1]); // Récupérez l'ID du produit depuis les paramètres de l'URL
    echo json_encode(deleteCodePromo($id));
  }
}
elseif ($_SERVER['REQUEST_METHOD'] === "PUT")
{
  $data = json_decode(file_get_contents('php://input'), true);
  
  if($path === '/articleRelation/save')
  {
    echo json_encode(saveArticleRelation($data));
  }
  if($path === '/image/save')
  {
    echo json_encode(saveImage($data));
  }
  elseif($path === '/parametre/save')
  {
    echo json_encode(saveParametre($data));
  }
  elseif($path === '/user/save')
  {
    echo json_encode(saveUser($data));
  }
  elseif($path === '/commissionCommercialle/save')
  {
    echo json_encode(saveCommissionCommercialle($data));
  }
  elseif($path === '/document/save')
  {
    echo json_encode(saveDocument($data));
  }
  elseif($path === '/user/savePassword')
  {
    echo json_encode(savePassword($data));
  }
  elseif($path === '/article/save')
  {
    echo json_encode(saveArticle($data));
  }
  elseif($path === '/contenuWeb/save')
  {
    echo json_encode(saveContenuWeb($data));
  }
  elseif($path === '/detailContenuWeb/save')
  {
    echo json_encode(saveLigneContenuWeb($data));
  }
  elseif($path === '/categorie/save')
  {
    echo json_encode(saveCategorie($data));
  }
  elseif($path === '/articleCategorie/save-liste')
  {
    echo json_encode(saveListeArticleCategorie($data));
  }
  elseif($path === '/categorieContenuWeb/save-liste')
  {
    echo json_encode(saveListeCategorieContenuWeb($data));
  }
  elseif($path === '/codePromo/save')
  {
    echo json_encode(saveCodePromo($data));
  }
}
