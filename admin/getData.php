<?php
header ("Access-Control-Allow-Origin: *");
header ("Access-Control-Expose-Headers: Content-Length, X-JSON");
header ("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
header ("Access-Control-Allow-Headers: *");


define('DB_HOST', 'localhost:3306');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'site');
//  define('DB_HOST', 'karamasfax.org');
//  define('DB_USER', 'karamasf_rami');
//  define('DB_PASS', 'rami_123');
//  define('DB_NAME', 'karamasf_karama');


$rows = array();
function getData($sql,$getAutoIncrement)
{

  $pdo = new PDO("mysql:dbname=" . DB_NAME . ";host=" . DB_HOST, DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
  
  $statement = $pdo->prepare($sql);
  $statement->execute();
  $results = "";
  if($getAutoIncrement == true)
  {
    $autoIncrement = $pdo->lastInsertId();
    $results = array(
      "id" => $autoIncrement . ""
    );
    
  }
  else
  {
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
  }
  return $results;
}
// delete article
function deleteArticleById($productId)
{
  $sql = "SELECT * FROM article where id = $productId"; 
  $value = getData($sql,false)[0]["is_deleted"];
  $value = ($value == 1? 0 : 1);
  $sql = "UPDATE article SET is_deleted = $value where id = $productId"; 
  return getData($sql,false);
}
// get liste article
function listeArticle($data)
{
  $sql = "SELECT * FROM article ";  
  $filter = $data->filter ;
  $whereClause = " where true ";

  foreach ($filter as $key => $value) 
  {
    if((gettype($value) == "string" || gettype($value) == "integer" || gettype($value) == "double" || gettype($value) == "boolean" ) && !empty($value) || $value == "0" || $value == "1")
      $whereClause .= " AND CONVERT(". "$key,char)" . " like '%" . ((string) $value) . "%' ";
    else
    {
      if(isset($value->start) && !empty($value->start) && isset($value->end) && !empty($value->end))
      {
        $property = str_replace("Filter", "", $key);
        $whereClause .= " AND $property >=  '$value->start' AND $property <= '$value->end' ";
      }
    }
  }
  $sql .= $whereClause . " LIMIT " . $data->pager->page . " , " . $data->pager->limit; 
  $listeArt = getData($sql,false);
  if (count($listeArt) > 0) 
  {   
    $response = array(  'listeArticle' => $listeArt );
  }
  else
  {
    $response = array('listeArticle' => array());
  }
  $sql = "SELECT COUNT(*) AS count FROM article " . $whereClause;
  $count = getData($sql,false)[0]["count"];
  $totalPages = ceil($count / ($data->pager->limit+1));
  $response['totalPages'] = $totalPages;
  $response['count'] = $count;
  return ( $response);
}
// fin liste article

//-----------signin by login et mot de passe
function signin($username,$password)
{
   $sql = "SELECT * FROM `user`  WHERE username='" . $username . "' AND password='" . $password . "'" ;
   return getData($sql,false);
}
//-----------fin signin by login et mot de passe

// verification admin connecter (existance de session)
function verificationAdminConnecter()
{
    return true;
    if( isset($_SESSION["username"]) && isset($_SESSION["password"]))
        return true;
    else
        return false;
}
// fin verification admin connecter


function write($txt)
{
  $myfile = fopen("newfile.txt", "a") or die("Unable to open file!");
  fwrite($myfile, $txt."\n");
  fclose($myfile);
}
?>