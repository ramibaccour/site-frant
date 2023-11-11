<?php
session_start();
include_once "getData.php";
header ("Access-Control-Allow-Origin: *");
header ("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
header ("Access-Control-Allow-Headers: *");
header('Content-Type: application/json');

$path = $_SERVER['REQUEST_URI'];
$path = strstr($path, "controller.php");
if ($path !== false)
{
    $path = substr($path, strlen("controller.php"));
}

if ($_SERVER['REQUEST_METHOD'] === 'GET')
{
  if (preg_match('/\/resolution\/get-by-type-content\/(.*)/', $path, $matches))
  {
    $type_content = $matches[1];
    echo json_encode(getListeResolutionByTypeContent($type_content));
  }
  if (preg_match('/\/resolution\/get-by-id-contenuWeb-type\/(\d+)/', $path, $matches))
  {
    $id = intval($matches[1]);
    echo json_encode(getResolutionByIdContenuWebType($id));
  }
  if (preg_match('/\/contenuWeb\/findById\/(\d+)/', $path, $matches))
  {
    $id = intval($matches[1]);
    echo json_encode(getContenuWeb($id));
  }
  if (preg_match('/\/contenuWeb\/get-liste-by-categorie\/(\d+)/', $path, $matches))
  {
    $id = intval($matches[1]);
    echo json_encode(getListeContenuWebByCategorie($id));
  }
  if (preg_match('/\/detailContenuWeb\/findById\/(\d+)/', $path, $matches))
  {
    $id = intval($matches[1]);
    echo json_encode(getLigneContenuWeb($id));
  }
  if (preg_match('/\/user\/findById\/(\d+)/', $path, $matches))
  {
    $id = intval($matches[1]);
    echo json_encode(getUser($id));
  }
  if($path === '/head-ContenuWeb')
  {
    echo json_encode(getHeadContenuWeb());
  }
  if($path === '/head-ligne-ContenuWeb')
  {
    echo json_encode(getHeadLigneContenuWeb());
  }
  if($path === '/contenuWebType/liste-type')
  {
    echo json_encode(getListeContenuWebType());
  }
  if (preg_match('/\/article\/findById\/(\d+)/', $path, $matches))
  {
    $id = intval($matches[1]);
    echo json_encode(getArticle($id));
  }
  if (preg_match('/\/image\/liste\/(\d+)/', $path, $matches))
  {
    $id = intval($matches[1]);
    echo json_encode(getListeImageArticle($id));
  }
  if (preg_match('/\/liste-image-categorie\/(\d+)/', $path, $matches))
  {
    $id = intval($matches[1]);
    echo json_encode(getListeImageCategorie($id));
  }
  if($path === '/head-article')
  {
    echo json_encode(getHeadArticle());
  }
  if (preg_match('/\/document\/findById\/(\d+)/', $path, $matches))
  {
    $id = intval($matches[1]);
    echo json_encode(getDocument($id));
  }
  if($path === '/parametre/liste-type/')
  {
    echo json_encode(getListeParametreType());
  }
  if (preg_match('/\/parametre\/findById\/(\d+)/', $path, $matches))
  {
    $id = intval($matches[1]);
    echo json_encode(getParametre($id));
  }
  if (preg_match('/\/categorie\/findById\/(\d+)/', $path, $matches))
  {
    $id = intval($matches[1]);
    echo json_encode(getCategorie($id));
  }
  if (preg_match('/\/categorie\/liste-categorie-article\/(\d+)/', $path, $matches))
  {
    $id = intval($matches[1]);
    echo json_encode(getListeCategorieArticle($id));
  }
  if ($path ==='/modelAffichage/liste/')
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
    if($path === '/article/findByFilter')
    {
      echo json_encode(getListeArticle($data));
    }
    elseif($path === '/contenuWeb/findByFilter')
    {
      echo json_encode(getListeContenuWeb($data));
    }
    elseif($path === '/detailContenuWeb/findByFilter')
    {
      echo json_encode(getListDetailContenuWeb($data));
    }
    elseif($path === '/parametre/findByFilter')
    {
      echo json_encode(getListeParametre($data));
    }
    elseif($path === '/region/findByFilter')
    {
      echo json_encode(getListeRegion($data));
    }
    elseif($path === '/commissionCommercialle/findByFilter')
    {
      echo json_encode(getListeCommissionCommercialle($data));
    }
    elseif($path === '/commissionCommercialle/saveAllCommission')
    {
      echo json_encode(saveAllCommission($data));
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
}
elseif ($_SERVER['REQUEST_METHOD'] === "PUT")
{
  $data = json_decode(file_get_contents('php://input'), true);
  
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
}