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

//liste content search and limit
function getListeContentSearch($search,$numStartShow,$numEndShow)
{
  $sql = "select * from content  WHERE `Content_Content` like '%". $search ."%' or `SousTitle_Content` like '%". $search ."%' or `Date_Content` like '%". $search ."%' or `Title_Content` like '%". $search ."%'" . " limit ".$numStartShow .",".$numEndShow;
  //die($sql);
  return getData($sql,false);

}
if(isset($_GET["data"]) && isset($_GET["search"]) && isset($_GET["numStartShow"]) && isset($_GET["numEndShow"]))
{
   $rows = getListeContentSearch($_GET["search"],$_GET["numStartShow"],$_GET["numEndShow"]);
    echo ($rows);
}
//---------- fin liste content search and limit

//-----------------inscription adherent
function createInscription($Code_Adherent,$Nom_Prenom__Adherent,$Login_Adherent,$Mos_Passe_Adherent,$Mail_Adherent,$Tel__Adherent,$Ville_Adherent)
{
    
  if($Code_Adherent == "")
    $sql = "INSERT INTO `adherent`( `Nom_Prenom__Adherent`, `Login_Adherent`, `Mos_Passe_Adherent`, `Mail_Adherent`, `Tel__Adherent`, `Ville_Adherent`) VALUES ('"  . $Nom_Prenom__Adherent . "', '" . $Login_Adherent ."', '" . $Mos_Passe_Adherent  . "', '". $Mail_Adherent . "', '" . $Tel__Adherent . "', '" . $Ville_Adherent . "')";
  else
    $sql = "UPDATE `adherent` SET `Nom_Prenom__Adherent`='" . $Login_Adherent ."',`Login_Adherent`='" . $Login_Adherent ."',`Mos_Passe_Adherent`='" . $Mos_Passe_Adherent  . "',`Mail_Adherent`='". $Mail_Adherent . "',`Tel__Adherent`='" . $Tel__Adherent . "',`Ville_Adherent`='" . $Ville_Adherent . "'  WHERE `Code_Adherent`=". $Code_Adherent;
  return getData($sql,true);
    
}
if(isset($_POST["Code_Adherent"]) &&  isset($_POST["Nom_Prenom__Adherent"]) && isset($_POST["Login_Adherent"]) && isset($_POST["Mos_Passe_Adherent"]) && isset($_POST["Mail_Adherent"]) && isset($_POST["Tel__Adherent"]) && isset($_POST["Ville_Adherent"]))
{
    
    $res = createInscription($_POST["Code_Adherent"],$_POST["Nom_Prenom__Adherent"],$_POST["Login_Adherent"],$_POST["Mos_Passe_Adherent"],$_POST["Mail_Adherent"],$_POST["Tel__Adherent"],$_POST["Ville_Adherent"]);
    $response = array(
        "status" => "ok",
        "error" => false,
        "message" =>$res
    );
    echo $res;
    
  
}
// ---------- fin inscription adherent



// ------------enregistrement et modification dans content
function createContent($Code_Content,$Content_Content,$Title_Content,$SousTitle_Content,$Image_Content,$Date_Content,$Url_Content,$Type_Content)
{
    if(verificationAdminConnecter())
    {
      $sql = "";
      if($Code_Content == "")
      {
        $sql = "INSERT INTO content( `Content_Content`, `Title_Content`, `SousTitle_Content`,`Image_Content`, `Date_Content`, `Url_Content`, `Type_Content`) VALUES ('"  . $Content_Content . "', '" . $Title_Content ."', '" . $SousTitle_Content  . "', '". $Image_Content . "', '" . $Date_Content . "', '" . $Url_Content ."', '" . $Type_Content . "')";
      }
      else
      {
        if($Image_Content != "")
        {
          $sql="UPDATE `content` SET `Image_Content`='". $Image_Content . "',`Content_Content`='"  . $Content_Content . "',`Title_Content`='" . $Title_Content ."',`SousTitle_Content`='" . $SousTitle_Content  . "',`Date_Content`='" . $Date_Content . "',`Url_Content`='" . $Url_Content ."',`Type_Content`='" . $Type_Content . "' WHERE `Code_Content`=". $Code_Content;
        }
        else
        {
          $sql="UPDATE `content` SET `Content_Content`='"  . $Content_Content . "',`Title_Content`='" . $Title_Content ."',`SousTitle_Content`='" . $SousTitle_Content  . "',`Date_Content`='" . $Date_Content . "',`Url_Content`='" . $Url_Content ."',`Type_Content`='" . $Type_Content . "' WHERE `Code_Content`=". $Code_Content;
        }
      }
      //return $sql;
      getData($sql,false);
    }
}
if( isset($_POST["Code_Content"]) && isset($_POST["Content_Content"]) && isset($_POST["Date_Content"]) && isset($_POST["Title_Content"]) && isset($_POST["SousTitle_Content"]) && isset($_POST["Type_Content"]) && isset($_POST["Url_Content"]))
{
    if(verificationAdminConnecter())
    {
      $image = "";
      if ( 0 < $_FILES['file']['error']) 
      {
        // $response = array(
        //   "status" => "error",
        //   "error" => false,
        //   "message" =>"error"
        // );
        // echo json_encode($response);
      }
      else 
      {
        $name = rand(10000, 90000);
        if($_FILES['file']['name'] != "" && $_FILES['file']['name'] != NULL)
          $image = $name. $_FILES['file']['name'];
      }
      //enregistrement
      $res = createContent($_POST["Code_Content"],$_POST["Content_Content"] ,$_POST["Title_Content"] ,$_POST["SousTitle_Content"],$image ,$_POST["Date_Content"], $_POST["Url_Content"], $_POST["Type_Content"]);
      //creation de ficher
      move_uploaded_file($_FILES['file']['tmp_name'],  "assets/img/".$name.$_FILES['file']['name']);
      $response = array(
        "status" => "ok",
        "error" => false,
        "message" =>$res
      );
      echo json_encode($response);
    }
}
// --------------fin enregistrement et modification dans content

// get liste article
function listeArticle($data)
{
  $sql = "SELECT * FROM article ";  
  $filter = $data->filter ;
  $whereClause = " where true ";

  foreach ($filter as $key => $value) 
  {
    if(gettype($value) == "string" && !empty($value))
      $whereClause .= " AND " . ($key . " like '%" . $value . "%' ");
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
  // echo($sql);
  if (count($listeArt) > 0) 
  {   
    $response = array(  'listeArticle' => $listeArt );
  }
  else
  {
    $response = array('listeArticle' => array());
  }
  $sql = "SELECT COUNT(*) AS count FROM article " . $whereClause;
  // print_r(getData($sql,false));
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
?>