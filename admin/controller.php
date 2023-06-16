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
  if (preg_match('/\/find-accueille\/(\d+)/', $path, $matches)) 
  {
    $id = intval($matches[1]);
    getAccueille( $id);
  }
  if (preg_match('/\/find-ligne-accueille\/(\d+)/', $path, $matches)) 
  {
    $id = intval($matches[1]);
    getLigneAccueille( $id);
  }
  if($path === '/head-accueille')
  {
    getHeadAccueille();
  }
  if($path === '/head-ligne-accueille')
  {
    getHeadLigneAccueille();
  }
  if($path === '/type-accueille')
  {
    getTypeAccueille();
  }
  if (preg_match('/\/find-article\/(\d+)/', $path, $matches)) 
  {
    $id = intval($matches[1]);
    getArticle( $id);
  }
  if($path === '/head-article')
  {
    getHeadArticle();
  }
  if (preg_match('/\/find-parametre\/(\d+)/', $path, $matches)) 
  {
    $id = intval($matches[1]);
    getParametre( $id);
  }
  if (preg_match('/\/find-categorie\/(\d+)/', $path, $matches)) 
  {
    $id = intval($matches[1]);
    getCategorie( $id);
  }
} 
elseif ($_SERVER['REQUEST_METHOD'] === 'POST') 
{  
  if(isset($_POST['image']) && isset($_POST['name']))
  {
    if($path === '/save-image')
    {
      saveImage($_POST['image'],$_POST['name']);
    }
  }
  else
  {
    $data = json_decode(file_get_contents('php://input'));
    if($path === '/liste-article')
    {
      getListeArticle($data);
    }
    if($path === '/liste-accueille')
    {
      getListeAccueille($data);
    }
    if($path === '/liste-ligne-accueille')
    {
      getListeLigneAccueille($data);
    }
    if($path === '/liste-parametre')
    {
      getListeParametre($data);
    }
    if($path === '/liste-categorie')
    {
      getListeCategorie($data);
    }
    if($path === '/delete-categorie')
    {
      deleteCategorie($data);
    }  
    if($path === '/signin')
    {
      getSignin($data);
    }  
  } 
} 
elseif ($_SERVER['REQUEST_METHOD'] === "DELETE")  
{
  if (preg_match('/\/delete-article\/(\d+)/', $path, $matches)) 
  {
    $id = intval($matches[1]); // Récupérez l'ID du produit depuis les paramètres de l'URL
    deleteArticle($id);
  }  
  if (preg_match('/\/delete-accueille\/(\d+)/', $path, $matches)) 
  {
    $id = intval($matches[1]); // Récupérez l'ID du produit depuis les paramètres de l'URL
    deleteAccueille($id);
  }    
  if (preg_match('/\/delete-ligne-accueille\/(\d+)/', $path, $matches)) 
  {
    $id = intval($matches[1]); // Récupérez l'ID du produit depuis les paramètres de l'URL
    deleteLigneAccueille($id);
  } 
}
elseif ($_SERVER['REQUEST_METHOD'] === "PUT")  
{
  $data = json_decode(file_get_contents('php://input'), true);
  if($path === '/save-parametre')
  {
    saveParametre($data);
  }
  if($path === '/save-article')
  {
    saveArticle($data);
  }
  if($path === '/save-accueille')
  {
    saveAccueille($data);
  }
  if($path === '/save-ligne-accueille')
  {
    saveLigneAccueille($data);
  }
  if($path === '/save-categorie')
  {
    saveCategorie($data);
  }
}
?>