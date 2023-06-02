<?php
session_start();
include "getData.php";
header ("Access-Control-Allow-Origin: *");
// header ("Access-Control-Expose-Headers: Content-Length, X-JSON");
header ("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
header ("Access-Control-Allow-Headers: *");


//----------- signin by login et mot de passe
$data = json_decode(file_get_contents('php://input'));
if(isset($data->signin) && isset($data->username)  && isset($data->password))
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
if(isset($data->listeArticle))
{
  // print_r($data->pager);
  // $page = isset($data->pager->page) ? ($data->pager->page) : 1;
  // $limit = isset($data->pager->limit) ? ($data->pager->limit) : 10;
  // $offset = ($page - 1) * $limit;
  $rows = listeArticle($data);  
  echo json_encode($rows);

}
// ----------- fin liste artcle -----------

?>