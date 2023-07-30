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
function getImage($id)
{
  $sql = "SELECT * FROM image where id = $id"; 
  $data =  getData($sql,false)[0];
  return($data);
}
function saveImageFile($image,$name, $id_image)
{
  $targetDirectory = '../assets/images_upload/';
  $targetFile = $targetDirectory . $name;
  // Décoder les données de l'image à partir de la base64
  $imageData = base64_decode(explode(',', $image)[1]);
  
  // Enregistrer l'image sur le serveur
  file_put_contents($targetFile, $imageData);

  if(!empty($id_image))
  {
    $image = getImage($id_image);
    // suppression de l'encienne image
    unlink($targetDirectory . $image["name"]);
    // modification name image par la nouvelle image
    $image["name"] = $name;
    saveImage($image);
  }
}
function saveImage($data)
{
  // converting stdClass -> array
  $data = json_decode(json_encode($data), true);
  // mode update
  if(isset($data["id"]) && $data["id"]>0)
  {
    $sql = "update image set " . getUpdateSql($data); 
    getData($sql,false);
    return getImage($data["id"]);
  }
  // mode add
  else
  {
    $sql = "insert into image " . getInsertSql($data);
    $data = getData($sql,true);
    return getImage($data["id"]);
  }
}
function deleteImage($id)
{
  $sql = "delete from image where id = $id";
  getData($sql,true); 
}
function getListeAccueille($data)
{
  $sql = "SELECT * FROM accueil " .  getWhere($data->filter) . " order by ordre";  
  $listeArt = getData($sql,false);
  return($listeArt);
}
function getAccueille($id)
{
  $sql = "SELECT * FROM accueil where id = $id"; 
  $data =  getData($sql,false)[0];
  if($data["id_article"] > 0)
  {
    $data["article"] = getArticle($data['id_article']);
  }
  if($data["id_categorie"] > 0)
  {
    $data["categorie"] = getCategorie( $data['id_categorie']);
  }
  if($data["id_accueil_type"] > 0)
  {
    $accueilType = getAccueilType( $data['id_accueil_type']);    
    $data["accueilType"] = $accueilType;
  }
  if(!empty($accueilType["id_resolution"]))
    $accueilType["resolution"] = getResolution( $accueilType["id_resolution"]);
  return($data);
}
function deleteAccueille($id)
{
  $sql = "SELECT * FROM accueil where id = $id"; 
  $value = getData($sql,false)[0]["is_deleted"];
  $value = ($value == 1? 0 : 1);
  $sql = "UPDATE accueil SET is_deleted = $value where id = $id"; 
  $rows = getData($sql,false);
  return($rows);
}
function getHeadAccueille()
{
  return getParametre(3);
}
function saveAccueille($data)
{
  // mode update
  if(isset($data["id"]) && $data["id"]>0)
  {
    $sql = "update accueil set " . getUpdateSql($data); 
    getData($sql,false);
    return getAccueille($data["id"]);
  }
  // mode add
  else
  {
    $sql = "insert into accueil " . getInsertSql($data);
    $data = getData($sql,true);
    return getAccueille($data["id"]);
  }
}

function getListeAccueilleByCategorie($id_categorie,$getLigneAcceuille = false)
{
  $sql = "select * from accueil where id in (SELECT id_accueil FROM categorie_accueil where id_categorie =  $id_categorie)  order by ordre"; 
  $listeAccueil = getData($sql,false);
  usort($listeAccueil, function($a, $b) {return $a['ordre'] - $b['ordre'];});
  $idArticle_uniques = (array_column($listeAccueil, 'id_article'));
  $idCategorie_uniques = (array_column($listeAccueil, 'id_categorie'));
  // remplissage des ligneAcceuille
  if($getLigneAcceuille == true)
  {
    // recherche liste accueil Type
    $listeAccueilType = getListeAccueilType();
    // recherche liste accueil Type Resolutio
    $listeAccueilTypeResolution = getAccueilTypeResolution();

    $idAccueil_uniques = array_unique(array_column($listeAccueil, 'id'));
    $idAccueil_uniques =  array_filter($idAccueil_uniques, function ($value) {return !is_null($value); });
    // remplissage  liste accueil Type
    if(count($listeAccueilType)>0)
    {
      for ($i = 0; $i < count($listeAccueil); $i++) 
      {
        $accueilType = find($listeAccueilType, "id", $listeAccueil[$i]["id_accueil_type"]);
        if(!empty($accueilType))
        {
          $listeResolution = filter($listeAccueilTypeResolution, "id_accueil_type", $accueilType["id"]);
          usort($listeResolution, function($a, $b) {return $a['ordre'] - $b['ordre'];});
          $accueilType["listeResolution"] = $listeResolution;
        }
        $listeAccueil[$i]["accueilType"] = $accueilType;
      }
    }
    // recherche liste Ligne Accueil 
    if(count($idAccueil_uniques)>0)
    {
      $idAccueil_concatenes = implode(',', $idAccueil_uniques);
      $listeLigneAccueil = getData("select * from ligne_accueil where id_accueil in ( $idAccueil_concatenes ) and is_deleted = 0   order by ordre",false);
      $idArticle_uniques = array_merge($idArticle_uniques, array_column($listeLigneAccueil, 'id_article'));
      $idCategorie_uniques = array_merge($idCategorie_uniques, array_column($listeLigneAccueil, 'id_categorie'));
      for ($i = 0; $i < count($listeAccueil); $i++) 
      {
        $lst = filter($listeLigneAccueil, "id_accueil", $listeAccueil[$i]["id"]);
        usort($lst, function($a, $b){return $a['ordre'] - $b['ordre'];});
        $listeAccueil[$i]["listeLigneAccueil"] = $lst;
      }
    }
    // remplissage des article au accueille et ligne accueille et les image
    $idArticle_uniques = array_unique($idArticle_uniques);
    $idArticle_uniques =  array_filter($idArticle_uniques, function ($value) {return !is_null($value); });
    $lsiteCategorieArticle = [];
    if(count($idArticle_uniques)>0)
    {      
      $idArticle_concatenes = implode(',', $idArticle_uniques);
      // rechreche categorie article
      $lsiteCategorieArticle = getData("select * from article_categorie where id_article in ( $idArticle_concatenes )",false);
      $listeArticle = getData("select * from article where id in ( $idArticle_concatenes )",false);
      // rechreche des images
      $listeImage = getData("select * from image where id_article in ( $idArticle_concatenes ) order by ordre",false);

      for ($i = 0; $i < count($listeAccueil); $i++) 
      {
        $art = find($listeArticle, "id", $listeAccueil[$i]["id_article"]);
        if(!empty($art))
          $art["listeImage"] = filter($listeImage, "id_article",$art["id"]);
        $listeAccueil[$i]["article"] = $art;
        if(isset($listeAccueil[$i]["listeLigneAccueil"]) && count($listeAccueil[$i]["listeLigneAccueil"])>0)
        {
          $listeLigneAccueil = $listeAccueil[$i]["listeLigneAccueil"];
          // remplissage des ligne accueille
          for($j=0; $j<count($listeLigneAccueil); $j++)
          {
            if(!empty($listeLigneAccueil[$j]["id_article"]))
            {
              $listeLigneAccueil[$j]["article"] =  find($listeArticle, "id", $listeLigneAccueil[$j]["id_article"]);
              // remplissage des image
              $listeLigneAccueil[$j]["article"]["listeImage"] = filter($listeImage, "id_article",$listeLigneAccueil[$j]["article"]["id"]);
            }
          }
          $listeAccueil[$i]["listeLigneAccueil"] = $listeLigneAccueil;
        }
      }
    }
    
    $idCategorie_uniques = array_merge($idCategorie_uniques, array_column($lsiteCategorieArticle, 'id_categorie'));
    // remplissage des categorie au accueille et ligne accueille
    $idCategorie_uniques = array_unique($idCategorie_uniques);
    $idCategorie_uniques =  array_filter($idCategorie_uniques, function ($value) {return !is_null($value); });
    if(count($idCategorie_uniques)>0)
    {
      $idCategorie_concatenes = implode(',', $idCategorie_uniques);
      $listeCategorie = getData("select * from categorie where id in ( $idCategorie_concatenes )  order by ordre",false);
      // recherche les article pour les categorie
      $listeArticleCategorie = getData("select * from article_categorie where id_categorie in ( $idCategorie_concatenes )",false);

      // recherche accueil par categorie
      $listeCategorieAccueil = getData("select * from categorie_accueil where id_categorie in ( $idCategorie_concatenes )",false);
      // rechreche des images
      $listeImage = getData("select * from image where id_categorie in ( $idCategorie_concatenes ) order by ordre",false);

      for ($i = 0; $i < count($listeAccueil); $i++) 
      {
        $cat = find($listeCategorie, "id", $listeAccueil[$i]["id_categorie"]);
        if(!empty($cat))
        {
          $cat["listeImage"] = filter($listeImage, "id_categorie",$cat["id"]);
          $cat["listeCategorieAccueil"] = filter($listeCategorieAccueil, "id_categorie",$cat["id"]);
          $cat["listeArticleCategorie"] = filter($listeArticleCategorie, "id_categorie",$cat["id"]);
        }
        $listeAccueil[$i]["categorie"] = $cat;
        // remplissage  categorie article pour listeAccueil
        if(isset($listeAccueil[$i]["article"]))
        {
          $listeAccueil[$i]["article"]["listeCategorie"] = [];
          $listeCategorieFiltred = filter($lsiteCategorieArticle, "id_article", $listeAccueil[$i]["article"]["id"]);
          foreach($listeCategorieFiltred as $catart)
          {
            array_push($listeAccueil[$i]["article"]["listeCategorie"], find($listeCategorie, "id", $catart["id_categorie"]));
          }
        }
        if(isset($listeAccueil[$i]["listeLigneAccueil"]) && count($listeAccueil[$i]["listeLigneAccueil"])>0)
        {
          $listeLigneAccueil = $listeAccueil[$i]["listeLigneAccueil"];
          // remplissage des ligne accueille
          for($j=0; $j<count($listeLigneAccueil); $j++)
          {
            if(!empty($listeLigneAccueil[$j]["id_categorie"]))
            {
              $listeLigneAccueil[$j]["categorie"] =  find($listeCategorie, "id", $listeLigneAccueil[$j]["id_categorie"]);
              // remplissage des image
              $listeLigneAccueil[$j]["categorie"]["listeImage"] = filter($listeImage, "id_categorie",$listeLigneAccueil[$j]["categorie"]["id"]);
              // remplissage accueil par categorie
              $listeLigneAccueil[$j]["categorie"]["listeCategorieAccueil"] = filter($listeCategorieAccueil, "id_categorie",$listeLigneAccueil[$j]["categorie"]["id"]);
              
              $listeLigneAccueil[$j]["categorie"]["listeArticleCategorie"] = filter($listeArticleCategorie, "id_categorie",$listeLigneAccueil[$j]["categorie"]["id"]);
            }
            // remplissage  categorie article pour listeLigneAccueil
            if(isset($listeLigneAccueil[$j]["article"]))
            {
                $listeLigneAccueil[$j]["article"]["listeCategorie"] = [];
                $listeCategorieFiltred = filter($lsiteCategorieArticle, "id_article", $listeLigneAccueil[$j]["article"]["id"]);
                foreach($listeCategorieFiltred as $catart)
                {
                  array_push($listeLigneAccueil[$j]["article"]["listeCategorie"], find($listeCategorie, "id", $catart["id_categorie"]));
                }
            }
          }
          $listeAccueil[$i]["listeLigneAccueil"] = $listeLigneAccueil;
        }
      }
    }
  }
  
  return($listeAccueil);
}
function getResolutionByIdAccueilType($id)
{
  $sql = "select * from resolution where id in (SELECT id_resolution FROM accueil_type_resolution where id_accueil_type =  $id)"; 
  $rows = getData($sql,false);
  return($rows);
}
function getAccueilTypeResolution()
{
  $sql = "select * from accueil_type_resolution  order by ordre"; 
  $rows = getData($sql,false);
  return($rows);
}
function getResolution($id)
{
  $sql = "SELECT * FROM resolution where id = $id"; 
  $data =  getData($sql,false)[0];
  return($data);
}
function getListeLigneAccueille($data)
{
  $sql = "SELECT * FROM ligne_accueil " .  getWhere($data->filter) . " order by ordre";  
  $listeArt = getData($sql,false);
  $idArticle_uniques = array_unique(array_column($listeArt, 'id_article'));
  $idArticle_uniques =  array_filter($idArticle_uniques, function ($value) {return !is_null($value); });
  if(count($idArticle_uniques)>0)
  {
    $idArticle_concatenes = implode(',', $idArticle_uniques);
    $listeArticle = getData("select * from article where id in ( $idArticle_concatenes )",false);
    for ($i = 0; $i < count($listeArt); $i++) 
    {
      foreach ($listeArticle as $article) 
      {
        if ($article['id'] == $listeArt[$i]["id_article"]) 
        {
          $listeArt[$i]["article"] = $article;
        }
      }
    }
  }
  $idCategorie_uniques = array_unique(array_column($listeArt, 'id_categorie'));
  $idCategorie_uniques =  array_filter($idCategorie_uniques, function ($value) {return !is_null($value); });
  if(count($idCategorie_uniques)>0)
  {
    $idCategorie_concatenes = implode(',', $idCategorie_uniques);
    $listeCategorie = getData("select * from categorie where id in ( $idCategorie_concatenes )  order by ordre",false);
    for ($i = 0; $i < count($listeArt); $i++) 
    {
      foreach ($listeCategorie as $categorie) 
      {
        if ($categorie['id'] == $listeArt[$i]["id_categorie"]) 
        {
          $listeArt[$i]["categorie"] = $categorie;
        }
      }
    }
  }
  return($listeArt);
}
function getLigneAccueille($id)
{
  $sql = "SELECT * FROM ligne_accueil where id = $id"; 
  $data =  getData($sql,false)[0];
  if($data["id_article"] != null && $data["id_article"] !="")
  {
    $data["article"] = getArticle($data["id_article"]);
  }
  if($data["id_categorie"] != null && $data["id_categorie"] !="")
  {
    $data["categorie"] = getCategorie($data["id_categorie"]);
  }
  return($data);
}
function deleteLigneAccueille($data)
{
  $sql = "SELECT * FROM ligne_accueil "; 
  $sql.= getWhere($data);
  $value = getData($sql,false)[0]["is_deleted"];
  $value = ($value == 1? 0 : 1);
  $sql = "UPDATE ligne_accueil SET is_deleted = $value ";
  $sql.= getWhere($data);
  $rows = getData($sql,false);
  return($rows);
}
function getHeadLigneAccueille()
{
  return getParametre(4);
}
function saveLigneAccueille($data)
{
  // mode update
  if(isset($data["id"]) && $data["id"]>0)
  {
    $sql = "update ligne_accueil set " . getUpdateSql($data); 
    getData($sql,false);
    return getLigneAccueille($data["id"]);
  }
  // mode add
  else
  {
    $sql = "insert into ligne_accueil " . getInsertSql($data);
    $data = getData($sql,true);
    return getLigneAccueille($data["id"]);
  }
}

function getListeAccueilType()
{
  $sql = "SELECT * FROM accueil_type"; 
  $rows = getData($sql,false);
  $idResolution_uniques = array_unique(array_column($rows, 'id_resolution'));
  $idResolution_uniques =  array_filter($idResolution_uniques, function ($value){return !is_null($value);});
  if(count($idResolution_uniques)>0 )
  {
    $idResolution_concatenes = implode(',', $idResolution_uniques);
    $listeResolution = getData("select * from resolution where id in ( $idResolution_concatenes )",false);
    for ($i = 0; $i < count($rows); $i++) 
    {
      foreach ($listeResolution as $resolution) 
      {
        if ($resolution['id'] == $rows[$i]["id_resolution"]) 
        {
          $rows[$i]["resolution"] = $resolution;
        }
      }
    }
  }
  return($rows);
}
function getAccueilType($id)
{
  $sql = "SELECT * FROM accueil_type where id = $id"; 
  $data =  getData($sql,false)[0];
  return($data);
}
function getListeImageArticle($id)
{
  $sql = "SELECT * FROM image  where id_article = $id  order by ordre"; 
  $data =  getData($sql,false);
  return($data);
}
function getListeImageCategorie($id)
{
  $sql = "SELECT * FROM image  where id_categorie = $id order by ordre"; 
  $data =  getData($sql,false);
  return($data);
}
function getListeModelAffichage()
{
  $sql = "SELECT * FROM model_affichage"; 
  $data =  getData($sql,false);
  return($data);
}
// get article
function getArticleByCategorie($id_categorie)
{
  $sql = "SELECT * FROM article where id in (select id_article from article_categorie where id_categorie = $id_categorie)"; 
  $listeArt =  getData($sql,false);

  $idart = (array_column($listeArt, 'id'));
  $idart =  array_filter($idart, function ($value) {return !is_null($value); });
  $idart = implode(',', $idart);
  $sql = "SELECT * FROM image  where id_article in ($idart) "; 
  $lstImg = getData($sql,false);
  for($i=0;$i<count($listeArt);$i++)
  {
    $lst_Img = filter($lstImg,"id_article",$listeArt[$i]["id"]);
    usort($lst_Img, function($a, $b) {return $a['ordre'] - $b['ordre'];});
    $listeArt[$i]["listeImage"] = $lst_Img;
  }
  return($listeArt);
}
function getArticle($id)
{
  $sql = "SELECT * FROM article where id = $id"; 
  $data =  getData($sql,false)[0];
  return($data);
}
function getListeCategorieArticle($id)
{
  $sql = "select * from categorie where id in (select id_categorie from article_categorie where id_article =  $id)  order by ordre"; 
  return getData($sql,false);
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
    $id_resolution = $data[$i]["id_resolution"];
    $j = array_search($id_resolution, array_column($allResolution, "id"));
    $data[$i]["resolution"] = ($j !== false ? $allResolution[$j] : null);
  }
  return($data);
}
// delete article
function deleteArticle($id)
{
  $sql = "SELECT * FROM article where id = $id"; 
  $value = getData($sql,false)[0]["is_deleted"];
  $value = ($value == 1? 0 : 1);
  $sql = "UPDATE article SET is_deleted = $value where id = $id"; 
  $rows = getData($sql,false);
  return($rows);
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
    $listeArt[$i]["listeImage"] = filter($lstImg,"id_article",$listeArt[$i]["id"]);
  }
  return($listeArt);
}
// get liste article
function getListeArticle($data)
{
  $sql = "SELECT * FROM article ";  
  $filter = $data->filter ;
  $whereClause = getWhere($filter);
  $sql .= $whereClause . " LIMIT " . $data->pager->limit . " , " . $data->pager->size;
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
  $totalPages = ceil($count / ($data->pager->size+1));
  $response['totalPages'] = $totalPages;
  $response['count'] = $count;
  return($response);
}
function getHeadArticle()
{
  return getParametre(1);
}
function saveArticle($data)
{
  // mode update
  if(isset($data["id"]) && $data["id"]>0)
  {
    $sql = "update article set " . getUpdateSql($data); 
    getData($sql,false);
    return getArticle($data["id"]);
  }
  // mode add
  else
  {
    $sql = "insert into article " . getInsertSql($data);
    $data = getData($sql,true);
    return getArticle($data["id"]);
  }
}
// get parametre
function getParametre($id)
{
  $sql = "SELECT * FROM parametre where id = $id"; 
  $data =  getData($sql,false)[0];
  return($data);
}
// get liste parametre
function getListeParametre($data)
{
  $sql = "SELECT * FROM parametre ";  
  $filter = $data->filter ;
  $whereClause = getWhere($filter);
  $sql .= $whereClause . " LIMIT " . $data->pager->limit . " , " . $data->pager->size;
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
  $totalPages = ceil($count / ($data->pager->size+1));
  $response['totalPages'] = $totalPages;
  $response['count'] = $count;
  return($response);
}
function saveParametre($data)
{
  $sql = "update parametre set " . getUpdateSql($data);
  getData($sql,false);
  return getParametre($data["id"]);
}
function getListeParametreType()
{
  $sql = "SELECT distinct type FROM parametre where type IS NOT NULL";  
  $data = getData($sql,false);
  return($data);
}
function getListeParametreByListeId($data)
{
  $sql = "SELECT * FROM parametre " . getWhere($data);  
  $data = getData($sql,false);
  return($data);
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
    return($rows[0]);  
  }
  else
  return($rows);
}
//-----------fin signin by login et mot de passe

function deleteCategorie($data) 
{
  $sql = "UPDATE categorie SET is_deleted = 1"; 
  $sql .= getWhere($data); 
  $rows = getData($sql,false);
  return($rows);
}
function getCategorieByModelAffichage($id_model_affichage=3)
{
  $sql = "select * from categorie where id in (select id_categorie from article_categorie where id_article in (select id from article where id_model_affichage =$id_model_affichage))"; 
  $rows = getData($sql,false);
  for($i=0;$i<count($rows);$i++)
  {
    $sql = "select count(id) as count from article where id_model_affichage = $id_model_affichage and id in (select id_article from article_categorie where id_categorie = " . $rows[$i]['id'] . ")";
    $count = getData($sql,false);
    $rows[$i]['count'] = $count[0]["count"];
  } 
  return($rows);
  //
}
function getListeCategorie($data, $getArticleCategorie=false)
{
  $sql = "select * from categorie " . getWhere($data->filter) . "   order by ordre";
  $data = getData($sql,false);
  if($getArticleCategorie == true)
  {
    $sql = "select * from article_categorie" ;
    $listeArticleCategorie = getData($sql,false);

     $sql = "SELECT * FROM categorie_accueil" ;
     $listeCategorieAccueil = getData($sql,false);
     
    for($i=0;$i< count($data);$i++)
    {
      $data[$i]["listeArticleCategorie"]= filter($listeArticleCategorie,"id_categorie", $data[$i]["id"]);
      $data[$i]["listeCategorieAccueil"]= filter($listeCategorieAccueil,"id_categorie", $data[$i]["id"]);
    }
  }
  return($data);
}
function getCategorie($id)
{
  $sql = "SELECT * FROM categorie where id = $id"; 
  $data =  getData($sql,false)[0];
  return($data);
}
function saveCategorie($data)
{
  // mode update
  if(isset($data["id"]) && $data["id"]>0)
  {
    $sql = "update categorie set " . getUpdateSql($data); 
    getData($sql,false);
    return getCategorie($data["id"]);
  }
  // mode add
  else
  {
    $sql = "insert into categorie " . getInsertSql($data);
    $data = getData($sql,true);
    return getCategorie($data["id"]);
  }
}

function saveListeCategorieAccueil($data)
{
  for($i=0; $i<count($data); $i++)
  {
    $sql = "insert into categorie_accueil " . getInsertSql($data[$i]);
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
    $sql = "delete from article_categorie " . getWhere($data[$i]->filter,2);
    getData($sql,true);    
  }
}
function deleteListeCategorieAccueil($data) 
{
  for($i=0; $i<count($data); $i++)
  {
    $sql = "delete from categorie_accueil " . getWhere($data[$i],2);
    getData($sql,true);    
  }
}
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
      $date = false;
      if (gettype($value) == "string")
        $date = strtotime($value);
      if( (gettype($value) == "integer" || gettype($value) == "double") &&  (!empty($value) || $value == "0" || $value == "1"))
        $sql .= " $key = $value , ";

      else if ($date !== false) 
      {
          $formattedDate = date("Y-m-d H:i:s", $date);
          $sql .= " $key = '$formattedDate' , ";
      } 
      else if (gettype($value) == "string" && !empty($value))
        $sql .= " $key = '$value' , ";
      else if (gettype($value) == "string" && empty($value))
        $sql .= " $key = NULL , ";
    }
    else 
      $id =  $value;
  }
  $sql = rtrim($sql, " , ");
  $sql .= " where id = $id";
  return $sql;
}
function getInsertSql($data)
{
  $sql = " ( ";
  $id = 0;
  foreach ($data as $key => $value) 
  {
    if($key != "id")
    {
      if( (gettype($value) == "string" || gettype($value) == "integer" || gettype($value) == "double") &&  (!empty($value) || $value == "0" || $value == "1"))
        $sql .= " $key , ";
      
    }
  }
  $sql = rtrim($sql, " , ");
  $sql .= ") VALUES (";
  foreach ($data as $key => $value) 
  {
    if($key != "id")
    {
      if( (gettype($value) == "integer" || gettype($value) == "double") &&  (!empty($value) || $value == "0" || $value == "1"))
        $sql .= " $value , ";
      else if (!empty($value) && gettype($value) == "string")
        $sql .= " '$value' , ";
    }
  }
  $sql = rtrim($sql, " , ");
  $sql .= ")";
  return $sql;
}
function getWhere($filter, $modeLike = 0)
{
  // $modeLike = 0     %xxx%
  // $modeLike = 1     xxx%
  // $modeLike = 2     xxx

  $whereClause = "";

  foreach ($filter as $key => $value) 
  {
    $value = json_decode(json_encode($value), true);
    if((isset($value["value"])))
    {
      if(!empty($value["value"]) || $value["value"] == "0" || $value["value"] == "1")
      {
        if((gettype($value["value"]) == "string" || gettype($value["value"]) == "integer" || gettype($value["value"]) == "double" || gettype($value["value"]) == "boolean" ))
        {
          if(gettype($value["value"]) == "string")
            $whereClause .= (strlen($whereClause)>0? " AND " :" ") .   $key . (($value["operator"] != '%' && $value["operator"] != '%%')? $value["operator"] : " LIKE ") .  " '" . ($value["operator"] == '%%'? "%" : "") . ((string) $value["value"]) . ($value["operator"] == "%" || $value["operator"] == "%%"? "%" : "") . "' ";
          else
            $whereClause .= (strlen($whereClause)>0? " AND " :" ") .  $key . $value["operator"] . ((string)$value["value"]);
        }
        else if(isset($value["start"]) && !empty($value["start"]) && isset($value["end"]) && !empty($value["end"]))
        {
          $property = str_replace("Filter", "", $key);
          $whereClause .= (strlen($whereClause)>0? " AND " :" ") . $property . " >=  '" . $value["start"] . "' AND " . $property . " <= '" . $value["end"] . "' ";
        }
      }
    }
    else if(gettype($value) == "array" && count($value)>0)
    {
      $property = str_replace("List", "", $key);
      $string = implode(',', $value);
      $whereClause .= (strlen($whereClause)>0? " AND " :"") .  "  $property in ( $string ) ";
    }
    
  }
  return ((strlen($whereClause)>0? " WHERE " : "") .$whereClause);
}
function write($txt)
{
  $myfile = fopen("newfile.txt", "a") or die("Unable to open file!");
  fwrite($myfile, $txt."\n");
  fclose($myfile);
}
?>