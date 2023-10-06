<?php
    $myHoste = "https://localhost/site-frant";
    function find($liste, $property, $value)
    {
        $i = array_search($value, array_column($liste, $property));
        $element = ($i !== false ? $liste[$i] : null);
        return $element;
    }
    function filter($liste, $property, $value)
    {
        $returnListe = [];
        $myListe =  array_filter($liste, function ($object) use ($property, $value)
        {
            $test = !empty($property) && $object[$property] == $value;
            return $test;
        });
        foreach($myListe as $lst)
        {
            array_push($returnListe,$lst);
        }
        return $returnListe;
    }
    function generateMenu($listeCategorie, $parentId = 0, $cetActive = false) 
    {
        usort($listeCategorie, function($a, $b) 
        {
            return $a['ordre'] - $b['ordre'];
        });
        $html = count(filter($listeCategorie, "id_parent",$parentId))>0 ? '<ul>' : "";
        foreach ($listeCategorie as $categorie) 
        {
            if ($categorie['id_parent'] == $parentId) 
            {
                $html .= '<li';
                // Vérifier si le menu a des sous-menus
                $hasChildren = false;
                foreach ($listeCategorie as $childItem) 
                {
                    if ($childItem['id_parent'] == $categorie['id']) 
                    {
                        $hasChildren = true;
                        break;
                    }
                }
                if ($hasChildren) 
                {
                    $html .=  " class='dropdown ' ";
                }
                if(count($categorie["listeCategorieAccueil"])>0)
                    $html .= '><a ' . ($cetActive == true? " class=' active' " :"") . 'href="' . $GLOBALS['myHoste'] . '/index/categorie/' . $categorie['id'] . '/' . urlencode($categorie['name']) . '">' . $categorie['name'];
                else if(count($categorie["listeArticleCategorie"])>0 || $hasChildren == false)
                    $html .= '><a ' . ($cetActive == true? " class=' active' " :"") . 'href="' . $GLOBALS['myHoste'] . '/liste/article/' . $categorie['id'] . '/' . urlencode($categorie['name']) . '">' . $categorie['name'];
                else
                    $html .= '><a ' . ($cetActive == true? " class=' active' " :"") . 'href="' . $GLOBALS['myHoste'] . '/liste/categorie/' . $categorie['id'] . '/' . urlencode($categorie['name']) . '">' . $categorie['name'];
                $cetActive = false;
                if ($hasChildren) 
                {
                    $html .= ' <i class="bi bi-chevron-down dropdown-indicator"></i>';
                }
                $html .= '</a>';
                // Appel récursif pour générer les sous-menus
                $html .= generateMenu($listeCategorie, $categorie['id']);
                $html .= '</li>';
            }
        }
        $contact = '<li><a href="' . $GLOBALS['myHoste'] . '/contact.php">Contact</a></li>';
        $html .=  count(filter($listeCategorie, "id_parent",$parentId))>0 ? ($contact . '</ul>') : "";
        return $html;
    }
    function getStaticAccueille($accueille)
    {
        $accueille["url"] = "#";
        if(!empty($accueille["id_article"]))
        {
            $accueille["name"] = $accueille["article"]["name"];
            $accueille["text"] = $accueille["article"]["text"];
            $accueille["name2"] = $accueille["article"]["name2"];
            $accueille["text2"] = $accueille["article"]["text2"];
            $accueille["date1"] = $accueille["article"]["date1"];
            if($accueille["article"]["id_model_affichage"] == 3)
                $accueille["url"] =  $GLOBALS['myHoste'] . "/blog/" . $accueille["article"]["id"] ."/" . urlencode($accueille["article"]["name"]);
            if($accueille["article"]["id_model_affichage"] == 2)
                $accueille["url"] =  $GLOBALS['myHoste'] . "/service/" . $accueille["article"]["id"] ."/" . urlencode($accueille["article"]["name"]);
            if($accueille["article"]["id_model_affichage"] == 1)
                $accueille["url"] =  $GLOBALS['myHoste'] . "/projet/" . $accueille["article"]["id"] ."/" . urlencode($accueille["article"]["name"]);
            if(isset($accueille["article"]["listeImage"]) && count($accueille["article"]["listeImage"])>0)
            {
                $images = filter($accueille["article"]["listeImage"],"id_resolution", $accueille["accueilType"]["id_resolution"]);
                usort($images,function($a, $b){return $a['ordre'] - $b['ordre'];});
                if(count($image )>0)
                    $accueille["image"] = $image[0]["name"];
            }
        }
        else if(!empty($accueille["id_categorie"]))
        {
            $accueille["name"] = $accueille["categorie"]["name"];
            $accueille["text"] = $accueille["categorie"]["description"];
            if(isset($accueille["categorie"]["listeCategorieAccueil"]) && count($accueille["categorie"]["listeCategorieAccueil"])>0)
                $accueille["url"] = $GLOBALS['myHoste'] ."/categorie/" . $accueille["categorie"]["id"] ."/" . urlencode($accueille["categorie"]["name"]);
            else if(isset($accueille["categorie"]["listeArticleCategorie"]))
                $accueille["url"] = $GLOBALS['myHoste'] ."/liste/article/" . $accueille["categorie"]["id"] ."/" . urlencode($accueille["categorie"]["name"]);
            else
                $accueille["url"] = $GLOBALS['myHoste'] ."/liste/categorie/". $accueille["categorie"]["id"] ."/" . urlencode($accueille["categorie"]["name"]);
            if(isset($accueille["categorie"]["listeImage"]) && count($accueille["categorie"]["listeImage"])>0)
            {
                $images = filter($accueille["categorie"]["listeImage"],"id_resolution", $accueille["accueilType"]["id_resolution"]);
                usort($images,function($a, $b){return $a['ordre'] - $b['ordre'];});
                if(count($image )>0)
                    $accueille["image"] = $image[0]["name"];
            }
        }
        if(isset($accueille["listeLigneAccueil"]) && count($accueille["listeLigneAccueil"])>0)
        {    
            $compte = 0;  
            for($i=0; $i<count($accueille["listeLigneAccueil"]); $i++)
            {
                if($compte >= (count($accueille["accueilType"]["listeResolution"])))
                    $compte = 0;
                $ligneAccueil = $accueille["listeLigneAccueil"][$i];
                $ligneAccueil["url"] = "#";
                if(!empty($ligneAccueil["id_article"]))
                {
                    $ligneAccueil["name"] = $ligneAccueil["article"]["name"];
                    $ligneAccueil["text"] = $ligneAccueil["article"]["description"] ;

                    $ligneAccueil["name2"] = $ligneAccueil["article"]["name2"];
                    $ligneAccueil["text2"] = $ligneAccueil["article"]["full_description"];
                    $ligneAccueil["date1"] = $ligneAccueil["article"]["date1"];
                    if($ligneAccueil["article"]["id_model_affichage"] == 3)
                        $ligneAccueil["url"] =  $GLOBALS['myHoste'] . "/blog/" . $ligneAccueil["article"]["id"] ."/" . urlencode($ligneAccueil["article"]["name"]);
                    if($ligneAccueil["article"]["id_model_affichage"] == 2)
                        $ligneAccueil["url"] =  $GLOBALS['myHoste'] . "/service/" . $ligneAccueil["article"]["id"] ."/" . urlencode($ligneAccueil["article"]["name"]);
                    if($ligneAccueil["article"]["id_model_affichage"] == 1)
                        $ligneAccueil["url"] =  $GLOBALS['myHoste'] . "/projet/" . $ligneAccueil["article"]["id"] ."/" . urlencode($ligneAccueil["article"]["name"]);
                    if(isset($accueille["accueilType"]) && isset($accueille["accueilType"]["listeResolution"]))
                    {
                        if(count($accueille["accueilType"]["listeResolution"])>0)
                        {
                            $id_resolution = $accueille["accueilType"]["listeResolution"][$compte]["id_resolution"];
                            $images = filter($ligneAccueil["article"]["listeImage"],"id_resolution", $id_resolution);
                            usort($images,function($a, $b){return $a['ordre'] - $b['ordre'];});
                            if(count($images )>0)
                                $ligneAccueil["image"] = $images[0]["name"];
                        }
                    }
                }
                else if(!empty($ligneAccueil["id_categorie"]))
                {
                    $ligneAccueil["name"] = $ligneAccueil["categorie"]["name"];
                    $ligneAccueil["text"] = $ligneAccueil["categorie"]["description"];
                    if(isset($accueille["accueilType"]) && isset($accueille["accueilType"]["listeResolution"]))
                    {
                        if(count($accueille["accueilType"]["listeResolution"])>0)
                        {
                            $id_resolution = $accueille["accueilType"]["listeResolution"][$compte]["id_resolution"];
                            $images = filter($ligneAccueil["categorie"]["listeImage"],"id_resolution", $id_resolution);
                            usort($images,function($a, $b){return $a['ordre'] - $b['ordre'];});
                            if(count($images )>0)
                                $ligneAccueil["image"] = $images[0]["name"];
                        }
                    }
                    if(isset($ligneAccueil["categorie"]["listeCategorieAccueil"]) && count($ligneAccueil["categorie"]["listeCategorieAccueil"])>0)
                        $ligneAccueil["url"] = $GLOBALS['myHoste'] ."/categorie/" . $ligneAccueil["categorie"]["id"] ."/" . urlencode($ligneAccueil["categorie"]["name"]);
                    else if(isset($ligneAccueil["categorie"]["listeArticleCategorie"]))
                        $ligneAccueil["url"] = $GLOBALS['myHoste'] ."/liste/article/" . $ligneAccueil["categorie"]["id"] ."/" . urlencode($ligneAccueil["categorie"]["name"]);
                    else
                        $ligneAccueil["url"] = $GLOBALS['myHoste'] ."/liste/categorie/". $ligneAccueil["categorie"]["id"] ."/" . urlencode($ligneAccueil["categorie"]["name"]);
                }
                $accueille["listeLigneAccueil"][$i] = $ligneAccueil ;
                $compte +=1;
            }
        }
        return $accueille;
    }


    function generateRandomAlphanumeric($length = 5)
    {
        // Caractères alphanumériques possibles
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        // Générer la chaîne aléatoire
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }
    function convertKeys($array) 
    {
        $convertedArray = array();
        
        foreach ($array as $key => $value) 
        {
            $newKey = str_replace('_', '', ucwords($key, '_'));
            $newKey = lcfirst($newKey);
            $convertedArray[$newKey] = $value;
        }
        return $convertedArray;
    }
    function convertKeysFormatSql($chaine) 
    {
        // Remplacer la lettre majuscule par la lettre minuscule précédée par '_'
        $chaine = str_replace(range('A', 'Z'), array_map(function ($char) 
        {
            return '_' . strtolower($char);
        }, range('A', 'Z')), $chaine);

        return $chaine;
    }
    function convertInstance($sourceInstance, $targetClass) 
    {
        if(!empty($sourceInstance))
            $sourceInstance = (object) $sourceInstance;
        $myClass =  !class_exists($targetClass);
        $myObject = !is_object($sourceInstance);
        if ( $myClass  || $myObject) 
        {
            return null;
        }
        $targetInstance = new $targetClass();
        // Récupérer les propriétés publiques de l'instance source
        $sourceProperties = get_object_vars($sourceInstance);
        // Parcourir les propriétés de l'instance cible
        foreach ($sourceProperties as $propertyName => $propertyValue) 
        {
            // Vérifier si la propriété existe dans l'instance cible
            if (property_exists($targetInstance, $propertyName)) 
            {
                // Affecter la valeur de la propriété de l'instance source à l'instance cible
                $targetInstance->{$propertyName} = $propertyValue;
            }
        }
        return $targetInstance;
    }
    function createSessionByCookie($nomCookie, $valeurCookie)
    {
        $dureeVie = time() + 30 * 24 * 60 * 60; 
        // Définir le chemin du cookie (ici, le chemin racine '/')
        $cheminCookie = "/";

        // Créer le cookie
        setcookie($nomCookie, $valeurCookie, $dureeVie, $cheminCookie);
    }
    function verificationUserConnecter()
    {
        return true;
        if(isset($_COOKIE['idUserConnected'])) 
            return true;
        return false;
    }
    function clean($value)
    {
        if(!empty($value) && gettype($value) == "string")
        {
            $value = str_replace("'", "''", $value);
            $value = str_replace(";", '', $value);
        }
        return $value;
    }
    function checkModule($idUser, $idModule)
    {
        $sql = "SELECT * FROM detail_type_user where id_type_user = ".
                "(SELECT id_type_user from user where id = $idUser) and id_module = $idModule;";
        $detailTypeUser = getData($sql,false);
        if(!empty($detailTypeUser))
        {
            $detailTypeUser = convertKeys($detailTypeUser[0]);
            if($detailTypeUser["value"] == 1)
            {
                return true;
            }
        }
        return false;
    }
    function getConditionOnlyMyData($idUser, $idModule, $whereClause)
    {
        if(checkModule($idUser, $idModule) === true)
        {
            if(strlen($whereClause)>0)
            {
                $whereClause .= " AND id_user = $idUser";
            }
            else
            {
                $whereClause .= " WHERE id_user = $idUser";
            }
        }
        return $whereClause;
        
    }
?>