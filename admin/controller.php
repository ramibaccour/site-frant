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
  if (preg_match('/\/find-article\/(\d+)/', $path, $matches)) 
  {
    $id = intval($matches[1]);
    getArticle( $id);
  }
  if (preg_match('/\/find-parametre\/(\d+)/', $path, $matches)) 
  {
    $id = intval($matches[1]);
    getParametre( $id);
  }
} 
elseif ($_SERVER['REQUEST_METHOD'] === 'POST') 
{  
  $data = json_decode(file_get_contents('php://input'));
  if($path === '/liste-article')
  {
    getListeArticle($data);
  }
  if($path === '/liste-parametre')
  {
    getListeParametre($data);
  }
  if($path === '/signin')
  {
    getSignin($data);
  }
} 
elseif ($_SERVER['REQUEST_METHOD'] === "DELETE")  
{
  if (preg_match('/\/delete-article\/(\d+)/', $path, $matches)) 
  {
    $id = intval($matches[1]); // Récupérez l'ID du produit depuis les paramètres de l'URL
    deleteArticle($id);
  }
}
elseif ($_SERVER['REQUEST_METHOD'] === "PUT")  
{
  $data = json_decode(file_get_contents('php://input'), true);
  if($path === '/save-parametre')
  {
    saveParametre($data);
  }
}
?>