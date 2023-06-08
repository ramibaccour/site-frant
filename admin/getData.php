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
// get article
function getArticle($id)
{
  $sql = "SELECT * FROM article where id = $id"; 
  $data =  getData($sql,false)[0];
  echo json_encode($data);
}
// delete article
function deleteArticle($productId)
{
  $sql = "SELECT * FROM article where id = $productId"; 
  $value = getData($sql,false)[0]["is_deleted"];
  $value = ($value == 1? 0 : 1);
  $sql = "UPDATE article SET is_deleted = $value where id = $productId"; 
  $rows = getData($sql,false);
  echo json_encode($rows);
}
// get liste article
function getListeArticle($data)
{
  $sql = "SELECT * FROM article ";  
  $filter = $data->filter ;
  $whereClause = getWhere($filter);
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
  echo json_encode($response);
}
// get parametre
function getParametre($id)
{
  $sql = "SELECT * FROM parametre where id = $id"; 
  $data =  getData($sql,false)[0];
  echo json_encode($data);
}
// fin liste article

// get liste parametre
function getListeParametre($data)
{
  $sql = "SELECT * FROM parametre ";  
  $filter = $data->filter ;
  $whereClause = getWhere($filter);
  $sql .= $whereClause . " LIMIT " . $data->pager->page . " , " . $data->pager->limit; 
  $listeArt = getData($sql,false);
  if (count($listeArt) > 0) 
  {   
    $response = array(  'listeParametre' => $listeArt );
  }
  else
  {
    $response = array('listeParametre' => array());
  }
  $sql = "SELECT COUNT(*) AS count FROM parametre " . $whereClause;
  $count = getData($sql,false)[0]["count"];
  $totalPages = ceil($count / ($data->pager->limit+1));
  $response['totalPages'] = $totalPages;
  $response['count'] = $count;
  echo json_encode($response);
}
function saveParametre($data)
{
  $sql = "update parametre set " . getUpdateSql($data);
  getData($sql,false);
  return getParametre($data["id"]);
}
//-----------signin by login et mot de passe
function getSignin($data)
{
  $sql = "SELECT * FROM `user`  WHERE username='" . $data->username . "' AND password='" . $data->password . "'" ;
  $rows = getData($sql,false);
  if (count($rows) > 0) 
  {             
    $_SESSION["username"] = $data->username;
    $_SESSION["password"] = $data->password;  
    echo json_encode($rows[0]);  
  }
  else
  echo json_encode($rows);
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
function getUpdateSql($data)
{
  $sql = "";
  $id = 0;
  foreach ($data as $key => $value) 
  {
    if($key != "id")
    {
      if( (gettype($value) == "integer" || gettype($value) == "double") &&  !empty($value))
        $sql .= " $key = $value , ";
      else if (!empty($value))
        $sql .= " $key = '$value' , ";
      else
        $sql .= " $key = NULL , ";
    }
    else
      $id =  $value;
  }
  $sql = rtrim($sql, " , ");
  $sql .= " where id = $id";
  return $sql;
}
function getWhere($filter)
{
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
  return $whereClause;
}
function write($txt)
{
  $myfile = fopen("newfile.txt", "a") or die("Unable to open file!");
  fwrite($myfile, $txt."\n");
  fclose($myfile);
}
?>