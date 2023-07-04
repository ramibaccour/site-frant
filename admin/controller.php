<?php
session_start();
include "getData.php";
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
  //   
  if (preg_match('/\/get-resolution-by-type-content\/(.*)/', $path, $matches)) 
  {
    $type_content = $matches[1];
    echo json_encode(getListeResolutionByTypeContent($type_content));
  }
  if (preg_match('/\/get-resolution-by-id-accueil-type\/(\d+)/', $path, $matches)) 
  {
    $id = intval($matches[1]);
    echo json_encode(getResolutionByIdAccueilType( $id));
  }
  if (preg_match('/\/find-accueille\/(\d+)/', $path, $matches)) 
  {
    $id = intval($matches[1]);
    echo json_encode(getAccueille( $id));
  }
  if (preg_match('/\/find-ligne-accueille\/(\d+)/', $path, $matches)) 
  {
    $id = intval($matches[1]);
    echo json_encode(getLigneAccueille( $id));
  }
  if($path === '/head-accueille')
  {
    echo json_encode(getHeadAccueille());
  }
  if($path === '/head-ligne-accueille')
  {
    echo json_encode(getHeadLigneAccueille());
  }
  if($path === '/liste-accueille-type')
  {
    echo json_encode(getListeAccueilType());
  }
  if (preg_match('/\/find-article\/(\d+)/', $path, $matches)) 
  {
    $id = intval($matches[1]);
    echo json_encode(getArticle($id));
  }
  if (preg_match('/\/liste-image-article\/(\d+)/', $path, $matches)) 
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
  if($path === '/liste-parametre-type/')
  {
    echo json_encode(getListeParametreType());
  }
  if (preg_match('/\/find-parametre\/(\d+)/', $path, $matches)) 
  {
    $id = intval($matches[1]);
    echo json_encode(getParametre( $id));
  }
  if (preg_match('/\/find-categorie\/(\d+)/', $path, $matches)) 
  {
    $id = intval($matches[1]);
    echo json_encode(getCategorie( $id));
  }
  if (preg_match('/\/liste-categorie-article\/(\d+)/', $path, $matches)) 
  {
    $id = intval($matches[1]);
    echo json_encode(getListeCategorieArticle( $id));
  }
} 
elseif ($_SERVER['REQUEST_METHOD'] === 'POST') 
{  
  if(isset($_POST['image']) && isset($_POST['name']))
  {
    if($path === '/save-image-file')
    {
      echo json_encode(saveImageFile($_POST['image'],$_POST['name'] ,$_POST['id_image']));
    }
  }
  else
  {
    $data = json_decode(file_get_contents('php://input'));
    if($path === '/liste-article')
    {
      echo json_encode(getListeArticle($data));
    }
    if($path === '/liste-accueille')
    {
      echo json_encode(getListeAccueille($data));
    }
    if($path === '/liste-ligne-accueille')
    {
      echo json_encode(getListeLigneAccueille($data));
    }
    if($path === '/liste-parametre')
    {
      echo json_encode(getListeParametre($data));
    }
    if($path === '/liste-parametre-by-liste-id')
    {
      echo json_encode(getListeParametreByListeId($data));
    }
    if($path === '/liste-categorie')
    {
      echo json_encode(getListeCategorie($data));
    }
    if($path === '/delete-categorie')
    {
      echo json_encode(deleteCategorie($data));
    }  
    if($path === '/signin')
    {
      echo json_encode(getSignin($data));
    }
    if($path === '/save-image')
    {
      echo json_encode(saveImage($data));
    }
    if($path === '/delete-liste-article-categorie')
    {
      echo json_encode(deleteListeArticleCategorie($data));
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
  if (preg_match('/\/delete-accueille\/(\d+)/', $path, $matches)) 
  {
    $id = intval($matches[1]); // Récupérez l'ID du produit depuis les paramètres de l'URL
    echo json_encode(deleteAccueille($id));
  }    
  if (preg_match('/\/delete-ligne-accueille\/(\d+)/', $path, $matches)) 
  {
    $id = intval($matches[1]); // Récupérez l'ID du produit depuis les paramètres de l'URL
    echo json_encode(deleteLigneAccueille($id));
  }  
  if (preg_match('/\/delete-image\/(\d+)/', $path, $matches)) 
  {
    $id = intval($matches[1]); // Récupérez l'ID du produit depuis les paramètres de l'URL
    echo json_encode(deleteImage($id));
  } 
}
elseif ($_SERVER['REQUEST_METHOD'] === "PUT")  
{
  $data = json_decode(file_get_contents('php://input'), true);
  if($path === '/save-parametre')
  {
    echo json_encode(saveParametre($data));
  }
  if($path === '/save-article')
  {
    echo json_encode(saveArticle($data));
  }
  if($path === '/save-accueille')
  {
    echo json_encode(saveAccueille($data));
  }
  if($path === '/save-ligne-accueille')
  {
    echo json_encode(saveLigneAccueille($data));
  }
  if($path === '/save-categorie')
  {
    echo json_encode(saveCategorie($data));
  }
  if($path === '/save-liste-article-categorie')
  {
    echo json_encode(saveListeArticleCategorie($data));
  }
}
?>