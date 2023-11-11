<?php
header ("Access-Control-Allow-Origin: *");
header ("Access-Control-Expose-Headers: Content-Length, X-JSON");
header ("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
header ("Access-Control-Allow-Headers: *");

include_once "utility.php";
include_once "entity/UserFilter.php";
include_once "entity/ParametreFilter.php";
include_once "entity/DetailDocumentFilter.php";
include_once "entity/DocumentFilter.php";
include_once "entity/CommissionCommercialleFilter.php";
include_once "entity/RegionFilter.php";
include_once "entity/CategorieFilter.php";
include_once "entity/ImageFilter.php";
include_once "entity/CategorieContenuWebFilter.php";
include_once "entity/ArticleFilter.php";
include_once "entity/ArticleCategorieFilter.php";
include_once "entity/DetailContenuWebFilter.php";
include_once "entity/ContenuWebFilter.php";

define('DB_HOST', 'localhost:3306');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'big_open');

// define('DB_HOST', 'localhost:3306');
// define('DB_USER', 'qjufmdrw_rami');
// define('DB_PASS', '8zz*x[H7iP?a');
// define('DB_NAME', 'qjufmdrw_big_open');


$rows = array();
function executeSql($sql,$getAutoIncrement)
{
  $pdo = new PDO("mysql:dbname=" . DB_NAME .";host=" . DB_HOST,
                  DB_USER,
                  DB_PASS,
                  array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  $pdo->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
  $statement = $pdo->prepare($sql);
  $statement->execute();
  $results = "";
  if($getAutoIncrement === true)
  {
    $autoIncrement = $pdo->lastInsertId();
    $results = array(
      "id" => $autoIncrement . ""
    );
  }
  else
  {
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($results))
    {
      for($i=0;$i< count($results);$i++)
      {
        $results[$i] = convertKeys($results[$i]);
      }

    }
  }
  return $results;
}
function getData($sql,$getAutoIncrement)
{
  if(verificationUserConnecter())
  {
    return executeSql($sql,$getAutoIncrement);
  }
}
function getImage($id)
{
  $sql = "SELECT * FROM image where id = $id";
  return getData($sql,false)[0];
}
function saveImageFile($image,$name, $idImage)
{
  $targetDirectory = '../assets/images_upload/';
  $targetFile = $targetDirectory . $name;
  // Décoder les données de l'image à partir de la base64
  $imageData = base64_decode(explode(',', $image)[1]);
  
  // Enregistrer l'image sur le serveur
  file_put_contents($targetFile, $imageData);

  if(!empty($idImage))
  {
    $image = getImage($idImage);
    // suppression de l'encienne image
    unlink($targetDirectory . $image["nom"]);
    // modification name image par la nouvelle image
    $image["nom"] = $name;
    saveImage($image);
  }
}
function saveImage($data)
{
  try
  {
    // converting stdClass -> array
    $data = json_decode(json_encode($data), true);
    // mode update
    if(isset($data["id"]) && $data["id"]>0)
    {
      $sql = "update image set " . getUpdateSql(convertInstance($data, "ImageFilter"));
      getData($sql,false);
    }
    // mode add
    else
    {
      $sql = "insert into image " . getInsertSql(convertInstance($data, "ImageFilter"));
      $data["id"] = getData($sql,true)["id"];
    }
    return array("imageResponse"=>$data, "imageResponseError"=>array("haveError"=>false));
  }
  catch (Exception $e)
  {
    return array("imageResponse"=>null, "imageResponseError"=>array("haveError"=>true));
  }
}
function deleteImage($id)
{
  $sql = "delete from image where id = $id";
  getData($sql,true);
}
function getListeContenuWeb($data)
{
  $sql = "SELECT * FROM contenu_web " .  getWhere(convertInstance($data, "ContenuWebFilter")) . " order by ordre";
  $data = getData($sql,false);
  return array("listContenuWebResponse"=>$data, "pager"=>array("count"=>count($data)));
}
function getContenuWeb($id)
{
  $sql = "SELECT * FROM contenu_web where id = $id";
  $data =  getData($sql,false)[0];
  if($data["idArticle"] > 0)
  {
    $data["article"] = getArticle($data['idArticle']);
  }
  if($data["idCategorie"] > 0)
  {
    $data["categorie"] = getCategorie( $data['idCategorie']);
  }
  if($data["idContenuWebType"] > 0)
  {
    $contenuWebType = getContenuWebType( $data['idContenuWebType']);
    $data["contenuWebType"] = $contenuWebType;
  }
  if(!empty($contenuWebType["idResolution"]))
    {$contenuWebType["resolution"] = getResolution( $contenuWebType["idResolution"]);}
  return $data;
}
function deleteContenuWeb($id)
{
  $sql = "SELECT * FROM contenu_web where id = $id";
  $value = getData($sql,false)[0]["isDeleted"];
  $value = ($value == 1? 0 : 1);
  $sql = "UPDATE contenu_web SET is_deleted = $value where id = $id";
  return getData($sql,false);
}
function getHeadContenuWeb()
{
  return getParametre(3);
}
function saveContenuWeb($data)
{
  // mode update
  if(isset($data["id"]) && $data["id"]>0)
  {
    $sql = "update contenu_web set " . getUpdateSql(convertInstance($data,"ContenuWebFilter"));
    getData($sql,false);
  }
  // mode add
  else
  {
    $sql = "insert into contenu_web " . getInsertSql(convertInstance($data,"ContenuWebFilter"));
    $data["id"] = getData($sql,true)["id"];
  }
  return array("contenuWebResponse"=>$data, "contenuWebResponseError"=> null);
}

function getListeContenuWebByCategorie($idCategorie, $getLigneAcceuille = false)
{
  $sql = " select * from contenu_web".
          " where id in ".
          "(SELECT id_contenu_web FROM categorie_contenu_web where id_categorie =  $idCategorie)  ".
          "order by ordre";
  $listeContenuWeb = getData($sql,false);
  usort($listeContenuWeb, function($a, $b) {return $a["ordre"] - $b["ordre"];});
  $idArticleUniques = (array_column($listeContenuWeb, 'idArticle'));
  $idCategorieUniques = (array_column($listeContenuWeb, 'idCategorie'));
  // remplissage des ligneAcceuille
  if($getLigneAcceuille === true)
  {
    // recherche liste ContenuWeb Type
    $listeContenuWebType = getListeContenuWebType();
    // recherche liste ContenuWeb Type Resolutio
    $listeContenuWebTypeResolution = getContenuWebTypeResolution();

    $idContenuWebUniques = array_unique(array_column($listeContenuWeb, 'id'));
    $idContenuWebUniques =  array_filter($idContenuWebUniques, function ($value) {return !is_null($value); });
    // remplissage  liste ContenuWeb Type
    if(count($listeContenuWebType)>0)
    {
      for ($i = 0; $i < count($listeContenuWeb); $i++)
      {
        $contenuWebType = find($listeContenuWebType, "id", $listeContenuWeb[$i]["idContenuWebType"]);
        if(!empty($contenuWebType))
        {
          $listeResolution = filter($listeContenuWebTypeResolution, "idContenuWebType", $contenuWebType["id"]);
          usort($listeResolution, function($a, $b) {return $a["ordre"] - $b["ordre"];});
          $contenuWebType["listeResolution"] = $listeResolution;
        }
        $listeContenuWeb[$i]["contenuWebType"] = $contenuWebType;
      }
    }
    // recherche liste Ligne ContenuWeb
    if(count($idContenuWebUniques)>0)
    {
      $idContenuWeb_concatenes = implode(',', $idContenuWebUniques);
      $listDetailContenuWeb = getData("select * from detail_contenu_web ".
                                    "where id_contenu_web in ( $idContenuWeb_concatenes ) and".
                                    " is_deleted = 0   order by ordre",false);
      $idArticleUniques = array_merge($idArticleUniques, array_column($listDetailContenuWeb, "idArticle"));
      $idCategorieUniques = array_merge($idCategorieUniques, array_column($listDetailContenuWeb, "idCategorie"));
      for ($i = 0; $i < count($listeContenuWeb); $i++)
      {
        $lst = filter($listDetailContenuWeb, "idContenuWeb", $listeContenuWeb[$i]["id"]);
        usort($lst, function($a, $b){return $a["ordre"] - $b["ordre"];});
        $listeContenuWeb[$i]["listDetailContenuWeb"] = $lst;
      }
    }
    // remplissage des article au ContenuWeb et ligne ContenuWeb et les image
    $idArticleUniques = array_unique($idArticleUniques);
    $idArticleUniques =  array_filter($idArticleUniques, function ($value) {return !is_null($value); });
    $lsiteCategorieArticle = [];
    if(count($idArticleUniques)>0)
    {
      $idArticleConcatenes = implode(',', $idArticleUniques);
      // rechreche categorie article
      $lsiteCategorieArticle = getData("select * from article_categorie ".
                                        "where id_article in ( $idArticleConcatenes )",false);
      $listeArticle = getData("select * from article where id in ( $idArticleConcatenes )",false);
      // rechreche des images
      $listeImage = getData("select * from image where id_article in ( $idArticleConcatenes ) order by ordre",false);

      for ($i = 0; $i < count($listeContenuWeb); $i++)
      {
        $art = find($listeArticle, "id", $listeContenuWeb[$i]["idArticle"]);
        if(!empty($art))
        {$art["listeImage"] = filter($listeImage, "idArticle",$art["id"]);}
        $listeContenuWeb[$i]["article"] = $art;
        if(isset($listeContenuWeb[$i]["listDetailContenuWeb"]) && count($listeContenuWeb[$i]["listDetailContenuWeb"])>0)
        {
          $listDetailContenuWeb = $listeContenuWeb[$i]["listDetailContenuWeb"];
          // remplissage des ligne ContenuWeb
          for($j=0; $j<count($listDetailContenuWeb); $j++)
          {
            if(!empty($listDetailContenuWeb[$j]["idArticle"]))
            {
              $listDetailContenuWeb[$j]["article"] =  find($listeArticle, "id", $listDetailContenuWeb[$j]["idArticle"]);
              // remplissage des image
              $listDetailContenuWeb[$j]["article"]["listeImage"] =
                                                              filter($listeImage,
                                                              "idArticle",
                                                              $listDetailContenuWeb[$j]["article"]["id"]);
            }
          }
          $listeContenuWeb[$i]["listDetailContenuWeb"] = $listDetailContenuWeb;
        }
      }
    }
    
    $idCategorieUniques = array_merge($idCategorieUniques, array_column($lsiteCategorieArticle, "idCategorie"));
    // remplissage des categorie au ContenuWeb et ligne ContenuWeb
    $idCategorieUniques = array_unique($idCategorieUniques);
    $idCategorieUniques =  array_filter($idCategorieUniques, function ($value) {return !is_null($value); });
    if(count($idCategorieUniques)>0)
    {
      $idCategorieConcatenes = implode(',', $idCategorieUniques);
      $listeCategorie = getData("select * from categorie where id in
                                ( $idCategorieConcatenes )  order by ordre",false);
      // recherche les article pour les categorie
      $listeArticleCategorie = getData("select * from article_categorie where id_categorie in
                                      ( $idCategorieConcatenes )",false);

      // recherche ContenuWeb par categorie
      $listeCategorieContenuWeb = getData("select * from categorie_contenu_web where id_categorie in
                                      ( $idCategorieConcatenes )",false);
      // rechreche des images
      $listeImage = getData("select * from image where id_categorie in
                          ( $idCategorieConcatenes ) order by ordre",false);

      for ($i = 0; $i < count($listeContenuWeb); $i++)
      {
        $cat = find($listeCategorie, "id", $listeContenuWeb[$i]["idCategorie"]);
        if(!empty($cat))
        {
          $cat["listeImage"] = filter($listeImage, "idCategorie",$cat["id"]);
          $cat["listeCategorieContenuWeb"] = filter($listeCategorieContenuWeb, "idCategorie",$cat["id"]);
          $cat["listeArticleCategorie"] = filter($listeArticleCategorie, "idCategorie",$cat["id"]);
        }
        $listeContenuWeb[$i]["categorie"] = $cat;
        // remplissage  categorie article pour listeContenuWeb
        if(isset($listeContenuWeb[$i]["article"]))
        {
          $listeContenuWeb[$i]["article"]["listeCategorie"] = [];
          $listeCategorieFiltred = filter($lsiteCategorieArticle, "idArticle", $listeContenuWeb[$i]["article"]["id"]);
          foreach($listeCategorieFiltred as $catart)
          {
            array_push( $listeContenuWeb[$i]["article"]["listeCategorie"],
                        find($listeCategorie, "id", $catart["idCategorie"]));
          }
        }
        if(isset($listeContenuWeb[$i]["listDetailContenuWeb"]) && count($listeContenuWeb[$i]["listDetailContenuWeb"])>0)
        {
          $listDetailContenuWeb = $listeContenuWeb[$i]["listDetailContenuWeb"];
          // remplissage des ligne ContenuWeb
          for($j=0; $j<count($listDetailContenuWeb); $j++)
          {
            if(!empty($listDetailContenuWeb[$j]["idCategorie"]))
            {
              $listDetailContenuWeb[$j]["categorie"] =  find(
                                                          $listeCategorie,
                                                          "id",
                                                          $listDetailContenuWeb[$j]["idCategorie"]);
              // remplissage des image
              $listDetailContenuWeb[$j]["categorie"]["listeImage"] = filter(
                                                                        $listeImage,
                                                                        "idCategorie",
                                                                        $listDetailContenuWeb[$j]["categorie"]["id"]);
              // remplissage ContenuWeb par categorie
              $listDetailContenuWeb[$j]["categorie"]["listeCategorieContenuWeb"] = filter(
                                                                        $listeCategorieContenuWeb,
                                                                        "idCategorie",
                                                                        $listDetailContenuWeb[$j]["categorie"]["id"]);
              
              $listDetailContenuWeb[$j]["categorie"]["listeArticleCategorie"] = filter(
                                                                        $listeArticleCategorie,
                                                                        "idCategorie",
                                                                        $listDetailContenuWeb[$j]["categorie"]["id"]);
            }
            // remplissage  categorie article pour listDetailContenuWeb
            if(isset($listDetailContenuWeb[$j]["article"]))
            {
                $listDetailContenuWeb[$j]["article"]["listeCategorie"] = [];
                $listeCategorieFiltred = filter($lsiteCategorieArticle,
                                                "idArticle",
                                                $listDetailContenuWeb[$j]["article"]["id"]);
                foreach($listeCategorieFiltred as $catart)
                {
                  array_push($listDetailContenuWeb[$j]["article"]["listeCategorie"],
                            find($listeCategorie, 
                            "id", $catart["idCategorie"]));
                }
            }
          }
          $listeContenuWeb[$i]["listDetailContenuWeb"] = $listDetailContenuWeb;
        }
      }
    }
  }
  
  return array("listContenuWebResponse"=>$listeContenuWeb, "pager" => array("count" =>count($listeContenuWeb)));
}
function getResolutionByIdContenuWebType($id)
{
  $sql = "select * from resolution where id in
          (SELECT id_resolution FROM contenu_web_type_resolution where id_contenu_web_type =  $id)";
  $data =  getData($sql,false);
  return array("listResolutionResponse" => $data);
}
function getContenuWebTypeResolution()
{
  $sql = "select * from contenu_web_type_resolution  order by ordre";
  return getData($sql,false);
}
function getResolution($id)
{
  $sql = "SELECT * FROM resolution where id = $id";
  return getData($sql,false);
}
function getListDetailContenuWeb($data)
{
  $sql = "SELECT * FROM detail_contenu_web " .
          getWhere(convertInstance($data,"DetailContenuWebFilter")) .
          " order by ordre";
  $listeArt = getData($sql,false);
  $idArticleUniques = array_unique(array_column($listeArt, 'idArticle'));
  $idArticleUniques =  array_filter($idArticleUniques, function ($value) {return !is_null($value); });
  if(count($idArticleUniques)>0)
  {
    $idArticleConcatenes = implode(',', $idArticleUniques);
    $listeArticle = getData("select * from article where id in ( $idArticleConcatenes )",false);
    for ($i = 0; $i < count($listeArt); $i++)
    {
      foreach ($listeArticle as $article)
      {
        if ($article['id'] == $listeArt[$i]["idArticle"])
        {
          $listeArt[$i]["article"] = $article;
        }
      }
    }
  }
  $idCategorieUniques = array_unique(array_column($listeArt, 'idCategorie'));
  $idCategorieUniques =  array_filter($idCategorieUniques, function ($value) {return !is_null($value); });
  if(count($idCategorieUniques)>0)
  {
    $idCategorieConcatenes = implode(',', $idCategorieUniques);
    $listeCategorie = getData("select * from categorie where id in ( $idCategorieConcatenes )  order by ordre",false);
    for ($i = 0; $i < count($listeArt); $i++)
    {
      foreach ($listeCategorie as $categorie)
      {
        if ($categorie['id'] == $listeArt[$i]["idCategorie"])
        {
          $listeArt[$i]["categorie"] = $categorie;
        }
      }
    }
  }
  return array("listDetailContenuWebResponse"=>$listeArt, "pager"=>array("count"=>count($listeArt)));
}
function getLigneContenuWeb($id)
{
  $sql = "SELECT * FROM detail_contenu_web where id = $id";
  $data =  getData($sql,false)[0];
  if($data["idArticle"] != null && $data["idArticle"] !="")
  {
    $data["article"] = getArticle($data["idArticle"]);
  }
  if($data["idCategorie"] != null && $data["idCategorie"] !="")
  {
    $data["categorie"] = getCategorie($data["idCategorie"]);
  }
  return $data;
}
function deleteLigneContenuWeb($data)
{
  $sql = "SELECT * FROM detail_contenu_web ";
  $sql.= getWhere(convertInstance($data,"DetailContenuWebFilter"));
  $value = getData($sql,false)[0]["isDeleted"];
  $value = ($value == 1? 0 : 1);
  $sql = "UPDATE detail_contenu_web SET is_deleted = $value ";
  $sql.= getWhere(convertInstance($data,"DetailContenuWebFilter"));
  getData($sql,false);
  return $data;
}
function getHeadLigneContenuWeb()
{
  return getParametre(4);
}
function saveLigneContenuWeb($data)
{
  // mode update
  if(isset($data["id"]) && $data["id"]>0)
  {
    $sql = "update detail_contenu_web set " . getUpdateSql(convertInstance($data,"DetailContenuWebFilter"));
    getData($sql,false);
  }
  // mode add
  else
  {
    $sql = "insert into detail_contenu_web " . getInsertSql(convertInstance($data,"DetailContenuWebFilter"));
    $data["id"] = getData($sql,true)["id"];
  }
  return array("detailContenuWebResponse" => $data);
}

function getListeContenuWebType()
{
  $sql = "SELECT * FROM contenu_web_type";
  $rows = getData($sql,false);
  $rows = setResolutionContenuWebType($rows);
  $rows = setParametreContenuWebType($rows);
  return $rows;
}
function setResolutionContenuWebType($rows)
{
  $idResolutionUniques = array_unique(array_column($rows, 'idResolution'));
  $idResolutionUniques =  array_filter($idResolutionUniques, function ($value){return !is_null($value);});
  if(count($idResolutionUniques)>0 )
  {
    $idResolution_concatenes = implode(',', $idResolutionUniques);
    $listeResolution = getData("select * from resolution where id in ( $idResolution_concatenes )",false);
    for ($i = 0; $i < count($rows); $i++)
    {
      foreach ($listeResolution as $resolution)
      {
        if ($resolution['id'] == $rows[$i]["idResolution"])
        {
          $rows[$i]["resolution"] = $resolution;
        }
      }
    }
  }
  return $rows;
}
function setParametreContenuWebType($rows)
{
  $idParametreUniques = array_unique(array_column($rows, 'idParametre'));
  $idParametreUniques =  array_filter($idParametreUniques, function ($value){return !is_null($value);});
  if(count($idParametreUniques)>0 )
  {
    $idParametreConcatenes = implode(',', $idParametreUniques);
    $listeParametre = getData("select * from parametre where id in ( $idParametreConcatenes )",false);
    for ($i = 0; $i < count($rows); $i++)
    {
      foreach ($listeParametre as $parametre)
      {
        if ($parametre['id'] == $rows[$i]["idParametre"])
        {
          $rows[$i]["parametre"] = $parametre;
        }
      }
    }
  }
  return $rows;
}
function getContenuWebType($id)
{
  $sql = "SELECT * FROM contenu_web_type where id = $id";
  $data = getData($sql,false)[0];
  if(!empty($data["idParametre"]))
  {
    $data["parametre"] = getParametre($data["idParametre"]);
  }
  if(!empty($data["idParametreDetail"]))
  {
    $data["parametreDetail"] = getParametre($data["idParametreDetail"]);
  }
  if(!empty($data["idParametreDetailParent"]))
  {
    $data["parametreDetailParent"] = getParametre($data["idParametreDetailParent"]);
  }
  return  $data;
}
function getListeImageArticle($id)
{
  $sql = "SELECT * FROM image  where id_article = $id  order by ordre";
  $data = getData($sql,false);
  return array("listImageResponse"=>$data, "pager"=>array("count"=>count($data)));
}
function getListeImageCategorie($id)
{
  $sql = "SELECT * FROM image  where id_categorie = $id order by ordre";
  return  getData($sql,false);
}
function getListeModelAffichage()
{
  $sql = "SELECT * FROM model_affichage";
  $data = getData($sql,false);
  return array("listModelAffichageResponse"=> $data , "pager" =>array("count"=>count($data )));
}
// get article
function getArticleByCategorie($idCategorie)
{
  $sql = "SELECT * FROM article where id in (select id_article from article_categorie".
         " where id_categorie = $idCategorie)";
  $listeArt =  getData($sql,false);

  $idart = (array_column($listeArt, 'id'));
  $idart =  array_filter($idart, function ($value) {return !is_null($value); });
  $idart = implode(',', $idart);
  $sql = "SELECT * FROM image ";

  if(!empty($idart))
    {$sql .=  " where id_article in ($idart) ";}
  $lstImg = getData($sql,false);
  for($i=0;$i<count($listeArt);$i++)
  {
    $lst_Img = filter($lstImg,"idArticle",$listeArt[$i]["id"]);
    usort($lst_Img, function($a, $b) {return $a["ordre"] - $b["ordre"];});
    $listeArt[$i]["listeImage"] = $lst_Img;
  }
  return $listeArt;
}
function getArticle($id)
{
  $sql = "SELECT * FROM article where id = $id";
  return  getData($sql,false)[0];
}
function getListeCategorieArticle($id)
{
  $sql = "select * from categorie where id in ".
         "(select id_categorie from article_categorie where id_article =  $id)  order by ordre";
  $data =  getData($sql,false);
  return array("listCategorieResponse"=>$data, "pager"=>array("count"=>count($data)));
}
function getAllResolution()
{
  $sql = "SELECT * FROM resolution";
  return getData($sql,false);
}
function getListeResolutionByTypeContent($type_content)
{
  $sql = "SELECT * FROM resolution_by_content where type_content = '$type_content'";
  $allResolution = getAllResolution();
  $data =  getData($sql,false);
  for($i=0;$i<count($data);$i++)
  {
    $idResolution = $data[$i]["idResolution"];
    $j = array_search($idResolution, array_column($allResolution, "id"));
    $data[$i]["resolution"] = ($j !== false ? $allResolution[$j] : null);
  }
  return $data ;
}
// delete article
function deleteArticle($id)
{
  $sql = "SELECT * FROM article where id = $id";
  $value = getData($sql,false)[0]["isDeleted"];
  $value = ($value == 1? 0 : 1);
  $sql = "UPDATE article SET is_deleted = $value where id = $id";
  return getData($sql,false);
}
function getLastBlog($id_model_affichage = 3)
{
  $sql = "select * from article where id_model_affichage = $id_model_affichage order by date1 desc limit 5";
  $listeArt = getData($sql,false);
  $idart = (array_column($listeArt, 'id'));
  $idart =  array_filter($idart, function ($value) {return !is_null($value); });
  $idart = implode(',', $idart);
  $sql = "SELECT * FROM image  where id_article in ($idart)  order by ordre";
  $lstImg = getData($sql,false);
  for($i=0;$i<count($listeArt);$i++)
  {
    $listeArt[$i]["listeImage"] = filter($lstImg,"idArticle",$listeArt[$i]["id"]);
  }
  return $listeArt;
}
// get liste article
function getListeArticle($data)
{
  $sql = "SELECT * FROM article ";
  $filter = $data ;
  $whereClause = getWhere(convertInstance($filter,"ArticleFilter"));
  $sql .= $whereClause . " LIMIT  " . $data->pager->limit . " , " . $data->pager->size;
  $listeArt = getData($sql,false);
	
  if (count($listeArt) > 0)
  {
    $sql = "SELECT COUNT(*) AS count FROM article " . $whereClause;
    $count = getData($sql,false)[0]["count"];
    $response = array(  'listArticleResponse' => $listeArt, "pager" =>array("count"=>$count) );
  }
  else
  {
    $response = array('listArticleResponse' => array(), "pager" =>array("count"=>0) );
  }
  
  return $response ;
}
function saveArticle($data)
{
  $resultCheckData=checkData($data["idParametre"],$data);
  $articleResponseError=$resultCheckData["error"];
  if($articleResponseError->haveError === false)
  {
    // mode update
    if(isset($data["id"]) && $data["id"]>0)
    {
      $sql = "update article set " . getUpdateSql(convertInstance($data,"ArticleFilter"));
      getData($sql,false);
    }
    // mode add
    else
    {
      $sql = "insert into article " . getInsertSql(convertInstance($data,"ArticleFilter"));
      $id = getData($sql,true)["id"];
      $data["id"] = $id;
    }
    return array("articleResponse"=>$data, "articleResponseError"=>$articleResponseError);
  }
  else
  {
    return array("articleResponse"=>null, "articleResponseError"=>$articleResponseError);
  }
}
function getHeadArticle()
{
  return getParametre(1);
}
// get parametre
function getParametre($id)
{
  $sql = "SELECT * FROM parametre where id = $id";
  $data =  getData($sql,false);
  if(empty($data))
    {return  array(  'id' => null );}
  else
    {return $data[0] ;}
}
// get liste parametre
function getListeParametre($data)
{
  $sql = "SELECT * FROM parametre ";

  $whereClause = getWhere(convertInstance($data,"ParametreFilter"));
  $sql .= $whereClause . " LIMIT  " . $data->pager->limit . " , " . $data->pager->size;
  $listeArt = getData($sql,false);
  if (!empty($listeArt))
  {
    $response = array(  'listParametreResponse' => $listeArt );
    $sql = "SELECT COUNT(*) AS count FROM parametre " . $whereClause;
    $data->pager->count = getData($sql,false)[0]["count"];
    $response['pager'] = $data->pager;
    return $response;
  }
  else
  {
    $response = array('listParametreResponse' => array());
    $data->pager->count = 0;
    $response['pager'] = $data->pager;
    return $response;
  }
  
}
function saveParametre($data)
{
  $sql = "update parametre set " . getUpdateSql($data);
  getData($sql,false);
  return getParametre($data["id"]);
}
function getListeRegion($data)
{
  $sql = "SELECT * FROM region ";
  $listeRegion = getData($sql,false);
  if (!empty($listeRegion))
  {
    $response = array(  'listRegionResponse' => $listeRegion );
    $data->pager->count = count($listeRegion);
    $response['pager'] = $data->pager;
    return $response;
  }
  else
  {
    $response = array('listRegionResponse' => array());
    $data->pager->count = 0;
    $response['pager'] = $data->pager;
    return $response;
  }
  
}
function getListeCommissionCommercialle($data)
{
  $tab = json_decode(json_encode($data), true);
  $sql = "SELECT * FROM commission_commercialle ";
  $str = convertInstance($tab,"CommissionCommercialleFilter");
  $whereClause = getWhere($str);
  $sql .= $whereClause;
  $listCommission = getData($sql,false);
  if (!empty($listCommission))
  {
    $response = array(  'listCommissionCommercialleResponse' => $listCommission );
    $data->pager->count = count($listCommission);
    $response['pager'] = $data->pager;
    return $response;
  }
  else
  {
    $response = array('listCommissionCommercialleResponse' => array());
    $data->pager->count = 0;
    $response['pager'] = $data->pager;
    return $response;
  }
  
}
function saveAllCommission($data)
{
  $respance = array( "commissionCommercialleResponse" => array(),
                      "commissionCommercialleResponseError" =>array("haveError" => false));
  for($i=0; $i<count($data);$i++)
  {
    $dataArray = json_decode(json_encode($data[$i]),true);
    $res = saveCommissionCommercialle( $dataArray);
    $bool = $res["commissionCommercialleResponseError"]["haveError"];
    $respance["commissionCommercialleResponseError"]["haveError"] =
                  $respance["commissionCommercialleResponseError"]["haveError"] ||
                  $bool;
  }
  return $respance;

}
function saveCommissionCommercialle($data)
{
  // vrification existance encienne commission
  $sql = "select * from commission_commercialle  where " .
          " id_user_commerciale = " . $data["idUserCommerciale"] .
          " and id_document = "  . $data["idDocument"];
  $existeCommission = getData($sql,false);
  if(empty($existeCommission))
  {
    $sql = "insert into commission_commercialle  " . getInsertSql($data);
    $com = getData($sql,false);
    $document = getDocument($data["idDocument"]);
    $sql = "update document set  etat ='livrer_payer' where id = ". $document['id'] ;
    getData($sql,false);
    return array( "commissionCommercialleResponse" => $com,
                  "commissionCommercialleResponseError" =>array("haveError" => false));

  }
  else
  {
    return array( "commissionCommercialleResponse" => array(),
                  "commissionCommercialleResponseError" =>array("haveError" => true));
  }
}
function getListeParametreType()
{
  $sql = "SELECT distinct type FROM parametre where type IS NOT NULL";
  return getData($sql,false);
}
function getListeParametreByListeId($data)
{
  $sql = "SELECT * FROM parametre " . getWhere($data);
  $listeArt = getData($sql,false);
  if (!empty($listeArt))
  {
    $response = array(  'listParametreResponse' => $listeArt );
    $response['pager'] = array("count"=>count($listeArt));
    return $response ;
  }
  else
  {
    $response = array(  'listParametreResponse' =>  array() );
    $response['pager'] = array("count"=>0);
    return $response;
  }
}

function getDocument($id)
{
  $sql = "SELECT * FROM document where id = $id";
  $data =  getData($sql,false);
  if(empty($data))
  {
    return  array(  'id' => null );
  }
  else
  {
    $data = $data[0];
    if(isset($data["idUserCommerciale"]) && !empty($data["idUserCommerciale"]))
    {
      $data["userCommerciale"] = getUser($data["idUserCommerciale"]);
    }
    $res = $data;
    $sql = "SELECT * FROM detail_document where id_document = $id";
    $data =  getData($sql,false);
    if(!empty($data))
    {
      $res["listDetailDocument"] = $data;
    }
    return $res;
  }
}
function getListeDocument($data, $setLimit = true)
{
  $response = array('listDocumentResponse' => array());
  $data->pager->count = 0;
  $response['pager'] = $data->pager;
  $documentResponse = convertInstance($data,"DocumentFilter");
  $sql = "SELECT * FROM document ";
  $whereClause = getWhere($documentResponse);
  if(checkModule($data->idUserConnected, 44) === true)
  {
      if(strlen($whereClause)>0)
      {
          $whereClause .= " AND (id_user = $data->idUserConnected" .
                          " OR id_user_commerciale = $data->idUserConnected )";
      }
      else
      {
          $whereClause .= " WHERE (id_user = $data->idUserConnected" .
                          " OR id_user_commerciale = $data->idUserConnected )";
      }
  }
  // filtrage par username de idUserCommerciale
  if(isset($data->username) && isset($data->username->value) && strlen($data->username->value)>0)
  {
    $where = " id_user_commerciale in ( select id from user ".
              getWhere(array("username" => $data->username))  .");" ;
    if(strlen($whereClause)>0)
    {
      $whereClause .= " AND " . $where ;
    }
    else
    {
        $whereClause .= " WHERE " . $where;
    }
  }
  $sql .= $whereClause;
  if($setLimit === true)
  {
    $sql .= " LIMIT " . $data->pager->limit . " , " . $data->pager->size;
  }
  
  $listDocumentResponse = getData($sql,false);
  if (!empty($listDocumentResponse))
  {
    $ids = array();
    for($i=0; $i<count($listDocumentResponse);$i++)
    {
      if (isset($listDocumentResponse[$i]['idUserCommerciale']))
      {
        $ids[] = $listDocumentResponse[$i]['idUserCommerciale'];
      }
    }
    // recherche instagrameurse
    $sql = "select * from user " .
            getWhere(array("id"=> $ids));
    $listeCommerciale = getData($sql,false);
    for($i=0; $i<count($listDocumentResponse);$i++)
    {
      $listDocumentResponse[$i]["userCommerciale"] = (find($listeCommerciale,
                                                      "id",
                                                      $listDocumentResponse[$i]["idUserCommerciale"]));
    }
    $listDocumentResponse = affcterDetialDocument($listDocumentResponse);
    $response = array(  'listDocumentResponse' => $listDocumentResponse );
    if($setLimit === true)
    {
      $sql = "SELECT COUNT(*) AS count FROM document " . $whereClause;
      $data->pager->count = getData($sql,false)[0]["count"];
    }
    else
    {
      $data->pager->count = count($listDocumentResponse);
    }
    $response['pager'] = $data->pager;
  }
  return $response;
}
function affcterDetialDocument($listDocumentResponse)
{
  $ids = array();
  foreach ($listDocumentResponse as $item)
  {
    if (isset($item['id']))
    {
        $ids[] = $item['id'];
    }
  }
  $listeDetailDocument = getListDetailDocument(implode(',', $ids));
  for($i=0; $i<count($listDocumentResponse);$i++)
  {
    $listDocumentResponse[$i]["listDetailDocument"] = filter($listeDetailDocument,
                                                                                  "idDocument",
                                                                                  $listDocumentResponse[$i]["id"]);
  }
  return $listDocumentResponse;
}
function getListDetailDocument($listIdDocument)
{
  $sql = "SELECT * FROM detail_document where id_document in ( $listIdDocument )";
  return getData($sql,false);
}
function saveDocument($data)
{
  $data = json_decode(json_encode($data), true);
  $resultCheckData=checkData($data["idParametre"],$data);
  $resultCheckData2 = array();
  for($i=0; $i<count($data["listDetailDocument"]);$i++)
  {
    $error = checkData($data["idParametre2"],$data["listDetailDocument"][$i]);
    array_push($resultCheckData2,$error["error"]);
    if($error["error"] === false)
    {
      $resultCheckData["error"]->haveError = true;
    }
  }
  $documentResponseError=$resultCheckData["error"];
  $detailDocumentResponseError=$resultCheckData2;
  if($documentResponseError->haveError === false )
  {
    if(empty($data["referenceLivreur"]) && checkRequiredDataForBestDelivery($data))
    {
      $data = createPickup($data);
    }
    // mode update
    if( isset($data["id"]) && $data["id"]>0)
    {
      updateDocument($data);
    }
    // mode add
    else
    {
      $data = addDocument($data);
    }
    return array( "documentResponse"=>$data,
                "documentResponseError"=>$documentResponseError,
                "detailDocumentResponseError" => $detailDocumentResponseError );
  }
  else
  {
    $documentResponse = array(  'id' => null );
    return array( "documentResponse" => $documentResponse,
                  "documentResponseError" => $documentResponseError,
                  "detailDocumentResponseError" => $detailDocumentResponseError );
  }
}
function updateDocument($data)
{
  $sql = "update document set " . getUpdateSql(convertInstance($data,"DocumentFilter"));
  getData($sql,false);
  // recherche encienne detail_document
  $sql = "select * from  detail_document where id_document = ".$data['id'];
  $listEncienneDetailDocument = getData($sql,false);
  if(!empty($data["listDetailDocument"]) && count($data["listDetailDocument"])>0)
  {
    deleteRemovedDetailDocument($data, $listEncienneDetailDocument);
    updateAndAddDetailDocument($data, $listEncienneDetailDocument);
    
  }
}
function addDocument($data)
{
  $sql = "insert into document " . getInsertSql(convertInstance($data,"DocumentFilter"));
  $data["id"] = getData($sql,true)["id"];

  for($i=0; $i<count($data["listDetailDocument"]);$i++)
  {
    $data["listDetailDocument"][$i]["idDocument"] = $data["id"];
    $sql ="insert into detail_document ".
            getInsertSql(convertInstance($data["listDetailDocument"][$i],"DetailDocumentFilter"));
    $data["listDetailDocument"][$i]["id"] = getData($sql,true)["id"];
  }
  return $data;
}
function  deleteRemovedDetailDocument($data, $listEncienneDetailDocument)
{
  if(!empty($listEncienneDetailDocument))
  {
    for($i=0; $i<count($listEncienneDetailDocument);$i++)
    {
      if(find($data["listDetailDocument"], "id", $listEncienneDetailDocument[$i]["id"]) == null)
      {
        $sql = "delete from detail_document where id = " .$listEncienneDetailDocument[$i]["id"];
        getData($sql,false);
      }
    }
  }
}
function updateAndAddDetailDocument($data, $listEncienneDetailDocument)
{
  for($i=0; $i<count($data["listDetailDocument"]);$i++)
  {
    if(find($listEncienneDetailDocument, "id", $data["listDetailDocument"][$i]["id"]) == null)
    {
      $sql ="insert into detail_document  ".
            getInsertSql(convertInstance($data["listDetailDocument"][$i],"DetailDocumentFilter"));
      $data["listDetailDocument"][$i]["id"] = getData($sql,true)["id"];
    }
    else
    {
      $sql =  "update detail_document set".
              getUpdateSql(convertInstance($data["listDetailDocument"][$i],"DetailDocumentFilter"));
              getData($sql,false);
    }
  }
}
function getListeTypeUser($data)
{
  $response = array('listTypeUserResponse' => array());
  $data->pager->count = 0;
  $response['pager'] = $data->pager;

  $typeUserFilter = convertInstance($data,"TypeUserFilter");
  $sql = "SELECT * FROM type_user ";
  $whereClause = getWhere($typeUserFilter);
  $sql .= $whereClause;
  $listeTypeUser = getData($sql,false);
  if (!empty($listeTypeUser))
  {
    $response = array(  'listTypeUserResponse' => $listeTypeUser );
    
    $data->pager->count = count($listeTypeUser);
    $response['pager'] = $data->pager;
  }
  return $response;
}
// get user type
function getTypeUser($id)
{
  $sql = "SELECT * FROM type_user where id = $id";
  $data =  getData($sql,false);
  if(empty($data))
  {
    return  array(  'id' => null );
  }
  else
  {
    return $data[0];
  }
}
// get user
function getUser($id)
{
  $sql = "SELECT * FROM user where id = $id";
  $data =  getData($sql,false);
  if(empty($data))
  {
    return  array(  'id' => null );
  }
  else
  {
    $res = $data[0];
    if(!empty($res["idPersonne"]))
    {
      $personne = getPersonne($res["idPersonne"]);
      if(!empty($personne))
      {
         $res["personne"] = ($personne);
      }
    }
    else
    {
      $res["personne"] = array("id" => null);
    }
    return $res;
  }
}
function getListeUser($data)
{
  $response = array('listUserResponse' => array());
  $data->pager->count = 0;
  $response['pager'] = $data->pager;



  $userFilter = convertInstance($data,"UserFilter");
  $userConnected = getUser($data->idUserConnected);
  if(!empty($userConnected) && !empty($userConnected["idTypeUser"]))
  {
    $typeUser = getTypeUser($userConnected["idTypeUser"]);
    if(!empty($typeUser))
    {
      $sql = "SELECT * FROM user ";
      $whereClause = getWhere($userFilter);
      $whereClause = getConditionOnlyMyData($data->idUserConnected, 49, $whereClause);
      $sql .= $whereClause . " LIMIT " . $data->pager->limit . " , " . $data->pager->size;
      $listUser = getData($sql,false);
      if (!empty($listUser))
      {
        // get list type user
        $typeUserFilter  = new stdClass();
        $typeUserFilter->pager = new stdClass();
        $typeUserFilter->pager->count = 0;
        $listeTypeUser = getListeTypeUser($typeUserFilter);

        for($i=0; $i<count($listUser);$i++)
        {
          if(!empty($listeTypeUser) && !empty($listeTypeUser["listTypeUserResponse"]))
          {$listUser[$i]["typeUser"] = find($listeTypeUser["listTypeUserResponse"], "id", $listUser[$i]["idTypeUser"]);}
        }
        $response = array(  'listUserResponse' => $listUser );
        $sql = "SELECT COUNT(*) AS count FROM user " . $whereClause;
        $data->pager->count = getData($sql,false)[0]["count"];
        $response['pager'] = $data->pager;
        return $response;
      }
    }
  }
  return $response;
}
function saveUser($data)
{
  $resultCheckData=checkData(21,$data);
  $userResponseError=$resultCheckData["error"];
  if($userResponseError->haveError === false)
  {
    // mode update
    if( isset($data["id"]) && $data["id"]>0)
    {
      if(isset($data["personne"]) && !empty($data["personne"]))
      {
        savePersonne(json_decode(json_encode($data["personne"]),true));
      }
      $sql = "update user set " . getUpdateSql(convertInstance($data,"UserFilter"));
      getData($sql,false);
      $userResponse = getUser($data["id"]);
      return array( "userResponse" => $userResponse, "userResponseError" => $userResponseError);
    }
    // mode add
    else
    {
      $array = json_decode(json_encode($data), true);
      $array["password"] = password_hash($array["password"], PASSWORD_BCRYPT);
      $stdClass = json_decode(json_encode($array));
      $stdClass->personne->isDeleted = 0;
      $personne = savePersonne(json_decode(json_encode($stdClass->personne),true));
      $stdClass->idPersonne = $personne["id"];
      $sql = "insert into user " . getInsertSql(convertInstance($stdClass,"UserFilter"));
      $data = getData($sql,true);
      $userResponse = getUser($data["id"]);
      return array( "userResponse" => $userResponse, "userResponseError" => $userResponseError);
    }
  }
  else
  {
    $userResponse = array(  'id' => null, );
    return array(  "userResponse" => $userResponse, "userResponseError" => $userResponseError );
  }
}
function savePassword($data)
{
  $error = new stdClass();
  $error->haveError = false;
  $data = json_decode(json_encode($data));
  if(isset($data->password) && isset($data->confirmPassword) && $data->password == $data->confirmPassword)
  {
    $data->password = password_hash($data->password, PASSWORD_BCRYPT);
    $sql = "update user set " . getUpdateSql(convertInstance($data,"UserFilter"));
    getData($sql,false);
  }
  else
  {
    $error->haveError = true;
  }
  return array( "userResponse" => $data, "userResponseError" => $error);
}
function deleteUser($id)
{
  $sql = "SELECT * FROM user where id = $id"; 
  $value = getData($sql,false)[0]["isDeleted"];
  $value = ($value == 1? 0 : 1);
  $sql = "UPDATE user SET is_deleted = $value where id = $id"; 
  return getData($sql,false);
}
function getSignin($data)
{
  $sql = "SELECT * FROM `user`  WHERE username='" . $data->username . "' AND is_deleted=0" ;
  $rows = executeSql($sql,false);
  if (!empty($rows))
  {
    $user = $rows[0];
    if(password_verify($data->password, $user["password"]))
    {
      createSessionByCookie("idUserConnected", $user["id"]);
      
      $user["jwt"] = generateRandomAlphanumeric(60);
      if(!empty($user["idPersonne"]))
      {
        $sql = "SELECT * FROM `personne`  WHERE id=" . $user["idPersonne"] . " AND is_deleted=0" ;
        $rows = executeSql($sql,false);
        if (!empty($rows))
        {
          $user["personne"] =$rows[0];
        }
      }
      if(!empty($user["idTypeUser"]))
      {
        $sql = "SELECT * FROM `detail_type_user`  WHERE id_type_user=" . $user["idTypeUser"]  ;
        $rows = executeSql($sql,false);
        if (!empty($rows))
        {
          $sql = "SELECT * FROM `type_user_colonne`  WHERE id_type_user=" . $user["idTypeUser"]  ;
          $typeUser = executeSql($sql,false);
          
          $user["typeUser"]=array("id"=>$user["idTypeUser"],
                                  "listDetailTypeUser"=>$rows,
                                  "listTypeUserColonne"=>$typeUser);
        }
      }
      return $user ;
    }
  }
  else
  {return $rows ;}
}
function savePersonne($data)
{
  // mode update
  if(isset($data["id"]) && $data["id"]>0)
  {
    $sql = "update personne set " . getUpdateSql($data);
    getData($sql,false);
    return getPersonne($data["id"]);
  }
  // mode add
  else
  {
    $sql = "insert into personne " . getInsertSql($data);
    $data = getData($sql,true);
    return getPersonne($data["id"]);
  }
}
function getPersonne($id)
{
  $sql = "SELECT * from personne where id = $id";
  $data =  getData($sql,false);
  if(empty($data))
  {
    return  array(  'id' => null );
  }
  else
  {
    return $data[0] ;
  }
}
function deleteCategorie($data)
{
  $sql = "UPDATE categorie SET is_deleted = 1";
  $sql .= getWhere(convertInstance($data, "CategorieFilter"));
  return getData($sql,false);
}
function getCategorieByModelAffichage($id_model_affichage=3)
{
  $sql = "select * from categorie where id in (select id_categorie from article_categorie where id_article " .
         "in (select id from article where id_model_affichage =$id_model_affichage))";
  $rows = getData($sql,false);
  for($i=0;$i<count($rows);$i++)
  {
    $sql = "select count(id) as count from article where id_model_affichage = $id_model_affichage " .
            "and id in (select id_article from article_categorie where id_categorie = " .
             $rows[$i]['id'] . ")";
    $count = getData($sql,false);
    $rows[$i]['count'] = $count[0]["count"];
  }
  return $rows;
}
function getListeCategorie($data, $getArticleCategorie=false)
{
  $filter = convertInstance($data,"CategorieFilter");
  $sql = "select * from categorie " . getWhere($filter) . "   order by ordre";
  $data = getData($sql,false);
  if($getArticleCategorie === true)
  {
    $sql = "select * from article_categorie" ;
    $listeArticleCategorie = getData($sql,false);
    
    $sql = "SELECT * FROM categorie_contenu_web" ;
    $listeCategorieContenuWeb = getData($sql,false);
    
    for($i=0;$i< count($data);$i++)
    {
      $data[$i]["listeArticleCategorie"]= filter($listeArticleCategorie,"idCategorie", $data[$i]["id"]);
      $data[$i]["listeCategorieContenuWeb"]= filter($listeCategorieContenuWeb,"idCategorie", $data[$i]["id"]);
    }
  }
  return array("listCategorieResponse"=> $data, "pager"=> array("count" => count($data)) ) ;
}
function getCategorie($id)
{
  $sql = "SELECT * FROM categorie where id = $id";
  return getData($sql,false)[0];
}
function saveCategorie($data)
{
  $resultCheckData=checkData($data["idParametre"],$data);
  if($resultCheckData["error"]->haveError === false)
  {
    // mode update
    if(isset($data["id"]) && $data["id"]>0)
    {
      $sql = "update categorie set " . getUpdateSql(convertInstance($data,"CategorieFilter"));
      getData($sql,false);
    }
    // mode add
    else
    {
      $sql = "insert into categorie " . getInsertSql(convertInstance($data,"CategorieFilter"));
      $data["id"] = getData($sql,true)["id"];
    }
    return array("categorieResponse"=>$data, "categorieResponseError"=>$resultCheckData["error"]);
  }
  else
  {
    return array("categorieResponse"=>array("id"=>-1), "categorieResponseError"=>$resultCheckData["error"]);
  }
}
function saveListeCategorieContenuWeb($data)
{
  for($i=0; $i<count($data); $i++)
  {
    $catWeb = convertInstance($data[$i],"CategorieContenuWebFilter");
    $sql = "insert into categorie_contenu_web " . getInsertSql($catWeb);
    getData($sql,true);
  }
}
function saveListeArticleCategorie($data)
{
  for($i=0; $i<count($data); $i++)
  {
    $sql = "insert into article_categorie " . getInsertSql($data[$i]);
    getData($sql,true);
  }
}
function saveArticleCategorie($data)
{
  $sql = "insert into article_categorie " . getInsertSql($data);
  $data = getData($sql,true);
  return getCategorie($data["id"]);
}
function deleteListeArticleCategorie($data)
{
  for($i=0; $i<count($data); $i++)
  {
    $sql = "delete from article_categorie " . getWhere(convertInstance($data[$i],"ArticleCategorieFilter"));
    getData($sql,true);
  }
}
function deleteListeCategorieContenuWeb($data)
{
  for($i=0; $i<count($data); $i++)
  {
    $catContenWeb = convertInstance($data[$i],"CategorieContenuWebFilter");
    $sql = "delete from categorie_contenu_web " . getWhere($catContenWeb);
    getData($sql,true);
  }
}
// verification admin connecter (existance de session)
// fin verification admin connecter