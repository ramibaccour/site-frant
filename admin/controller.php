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
 
} 
elseif ($_SERVER['REQUEST_METHOD'] === 'POST') 
{  
  $data = json_decode(file_get_contents('php://input'));
  if($path === '/liste-article')
  {
    getListeArticle($data);
  }
  if($path === '/signin')
  {
    getSignin($data);
  }
} 
elseif ($_SERVER['REQUEST_METHOD'] === "DELETE")  
{
  if (preg_match('/\/delete-article\/(\d+)/', $_SERVER['REQUEST_URI'], $matches)) 
  {
    $productId = intval($matches[1]); // Récupérez l'ID du produit depuis les paramètres de l'URL
    deleteArticle($productId);
  }
  
}
elseif ($_SERVER['REQUEST_METHOD'] === "PUT")  
{
}



//----------- signin by login et mot de passe
function getSignin($data)
{
  $rows = signin($data->username,$data->password);
  if (count($rows) > 0) 
  {             
    $_SESSION["username"] = $data->username;
    $_SESSION["password"] = $data->password;    
  }
  echo json_encode($rows);
}
//----------- fin signin by login et mot de passe


// ----------- liste artcle -----------
function getListeArticle($data)
{
  $rows = listeArticle($data);  
  echo json_encode($rows);

}
// ----------- fin liste artcle -----------
function deleteArticle($productId)
{
  $rows = deleteArticleById($productId);  
  echo json_encode($rows);
}
?>