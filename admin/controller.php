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
  if (preg_match('/\/resolution\/get-by-id-ContenuWeb-type\/(\d+)/', $path, $matches))
  {
    $id = intval($matches[1]);
    echo json_encode(getResolutionByIdContenuWebType($id));
  }
  if (preg_match('/\/find-ContenuWeb\/(\d+)/', $path, $matches))
  {
    $id = intval($matches[1]);
    echo json_encode(getContenuWeb($id));
  }
  if (preg_match('/\/contenuWeb\/get-liste-by-categorie\/(\d+)/', $path, $matches))
  {
    $id = intval($matches[1]);
    echo json_encode(getListeContenuWebByCategorie($id));
  }
  if (preg_match('/\/find-ligne-ContenuWeb\/(\d+)/', $path, $matches))
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
    if($path === '/liste-ContenuWeb')
    {
      echo json_encode(getListeContenuWeb($data));
    }
    if($path === '/liste-ligne-ContenuWeb')
    {
      echo json_encode(getListeLigneContenuWeb($data));
    }
    if($path === '/parametre/findByFilter')
    {
      echo json_encode(getListeParametre($data));
    }
    if($path === '/region/findByFilter')
    {
      echo json_encode(getListeRegion($data));
    }
    if($path === '/commissionCommercialle/findByFilter')
    {
      echo json_encode(getListeCommissionCommercialle($data));
    }
    if($path === '/commissionCommercialle/saveAllCommission')
    {
      echo json_encode(saveAllCommission($data));
    }
    if($path === '/parametre/findByListId')
    {
      echo json_encode(getListeParametreByListeId($data));
    }
    if($path === '/liste-parametre-by-liste-id')
    {
      echo json_encode(getListeParametreByListeId($data));
    }
    if($path === '/categorie/findByFilter')
    {
      echo json_encode(getListeCategorie($data));
    }
    if($path === '/delete-categorie')
    {
      echo json_encode(deleteCategorie($data));
    }
    if ( $path === "/delete-ligne-ContenuWeb")
    {
      echo json_encode(deleteLigneContenuWeb($data));
    }
    if($path === '/user/signin')
    {
      echo json_encode(getSignin($data));
    }
    if($path === '/user/findByFilter')
    {
      echo json_encode(getListeUser($data));
    }
    if($path === '/typeUser/findByFilter')
    {
      echo json_encode(getListeTypeUser($data));
    }
    if($path === '/document/findByFilter')
    {
      echo json_encode(getListeDocument($data));
    }
    if($path === '/document/findByFilterAll')
    {
      echo json_encode(getListeDocument($data, false));
    }
    if($path === '/articleCategorie/delete-liste')
    {
      echo json_encode(deleteListeArticleCategorie($data));
    }
    if($path === '/categorieContenuWeb/delete-liste')
    {
      echo json_encode(deleteListeCategorieContenuWeb($data));
    }
  }
}
elseif ($_SERVER['REQUEST_METHOD'] === "DELETE")
{
  if (preg_match('/\/delete-article\/(\d+)/', $path, $matches)) 
  {
    $id = intval($matches[1]); // Récupérez l'ID du produit depuis les paramètres de l'URL
    echo json_encode(deleteArticle($id));
  }  
  if (preg_match('/\/delete-ContenuWeb\/(\d+)/', $path, $matches)) 
  {
    $id = intval($matches[1]); // Récupérez l'ID du produit depuis les paramètres de l'URL
    echo json_encode(deleteContenuWeb($id));
  }    
  if (preg_match('/\/delete-image\/(\d+)/', $path, $matches)) 
  {
    $id = intval($matches[1]); // Récupérez l'ID du produit depuis les paramètres de l'URL
    echo json_encode(deleteImage($id));
  }     
  if (preg_match('/\/user\/delete\/(\d+)/', $path, $matches)) 
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
  if($path === '/parametre/save')
  {
    echo json_encode(saveParametre($data));
  }
  if($path === '/user/save')
  {
    echo json_encode(saveUser($data));
  }
  if($path === '/commissionCommercialle/save')
  {
    echo json_encode(saveCommissionCommercialle($data));
  }
  if($path === '/document/save')
  {
    echo json_encode(saveDocument($data));
  }
  if($path === '/user/savePassword')
  {
    echo json_encode(savePassword($data));
  }
  if($path === '/article/save')
  {
    echo json_encode(saveArticle($data));
  }
  if($path === '/save-ContenuWeb')
  {
    echo json_encode(saveContenuWeb($data));
  }
  if($path === '/save-ligne-ContenuWeb')
  {
    echo json_encode(saveLigneContenuWeb($data));
  }
  if($path === '/categorie/save')
  {
    echo json_encode(saveCategorie($data));
  }
  if($path === '/articleCategorie/save-liste')
  {
    echo json_encode(saveListeArticleCategorie($data));
  }
  if($path === '/categorieContenuWeb/save-liste')
  {
    echo json_encode(saveListeCategorieContenuWeb($data));
  }
}
?>