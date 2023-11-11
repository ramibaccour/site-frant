<?php
    $myHoste = "https://localhost/site-frant";
    $loginBestDrlivery = "Mirnabyghada";
    $passwordBestDrlivery = "Ghadamirnabio1";
    include_once "entity/Pickup.php";
    function find($liste, $property, $value)
    {
        $i = array_search($value, array_column($liste, $property));
        return $i !== false ? $liste[$i] : null;
    }
    function filter($liste, $property, $value)
    {
        $returnListe = [];
        $myListe =  array_filter($liste, function ($object) use ($property, $value)
        {
            return !empty($property) && $object[$property] == $value;
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
        $html = count(filter($listeCategorie, "idParent",$parentId))>0 ? '<ul class="megamenu-3-column">' : "";
        foreach ($listeCategorie as $categorie)
        {
            if ($categorie['idParent'] == $parentId)
            {
                $html .= '<li';
                // Vérifier si le menu a des sous-menus
                $hasChildren = false;
                foreach ($listeCategorie as $childItem)
                {
                    if ($childItem['idParent'] == $categorie['id'])
                    {
                        $hasChildren = true;
                        break;
                    }
                }
                $html .= '><a href="' . $GLOBALS['myHoste'];
                if(count($categorie["listeCategorieContenuWeb"])>0)
                {
                    $html .=  '/index/categorie/' . $categorie['id'] . '/' ;
                }
                elseif(count($categorie["listeArticleCategorie"])>0 || $hasChildren === false)
                {
                    $html .= '/liste/article/' . $categorie['id'] . '/' ;
                }
                else
                {
                    $html .= '/liste/categorie/' . $categorie['id'] . '/' ;
                }
                
                $html .= urlencode($categorie["nomLng1"]) . '">' . $categorie["nomLng1"];
                $cetActive = false;
                if ($hasChildren)
                {
                    $html .= ' <i class="fa fa-angle-down"></i>';
                }
                $html .= '</a>';
                // Appel récursif pour générer les sous-menus
                $html .= generateMenu($listeCategorie, $categorie['id']);
                $html .= '</li>';
            }
        }
        $contact = '<li><a href="' . $GLOBALS['myHoste'] . '/contact.php">Contact</a></li>';
        $html .=  count(filter($listeCategorie, "idParent",$parentId))>0 ? ($contact . '</ul>') : "";
        return $html;
    }
    function isLastLevel($data,$children)
    {
        foreach ($children as $c)
        {
            $thj = find($data, "idParent", $c["id"]);
            if($thj != null)
            {
                return false;
            }
        }
        return true;
    }
    function sortCategorie($data)
    {
        usort($data, function($a, $b)
        {
            return $a['ordre'] - $b['ordre'];
        });
        return $data;
    }
    function getChildren($data, $parentId)
    {
        return array_filter($data, function ($item) use ($parentId)
        {
            return $item['idParent'] == $parentId;
        });
    }
    function getLi($child, $hasChildren)
    {
        $html = '<li><a href="' . $GLOBALS['myHoste'];
        if(count($child["listeCategorieContenuWeb"])>0)
        {
            $html .=  '/index/categorie/' . $child['id'] . '/' ;
        }
        elseif(count($child["listeArticleCategorie"])>0 || $hasChildren === false)
        {
            $html .= '/liste/article/' . $child['id'] . '/' ;
        }
        else
        {
            $html .= '/liste/categorie/' . $child['id'] . '/' ;
        }
        $html .= urlencode($child["nomLng1"]) . '">' . $child["nomLng1"] ."</a>";
        return $html;
    }
    function generateNestedList($data, $parentId = 0)
    {
        $data  = sortCategorie($data);
        $children = getChildren($data, $parentId);
        $html = isLastLevel($data,$children)? "<ul>"  :"<ul class=\"megamenu-3-column\">";
        foreach ($children as $child)
        {
            $hasChildren = !empty(getChildren($data, $child['id']));
            $html .= getLi($child, $hasChildren);
            $subChildren = generateNestedList($data, $child['id']);
            if ($hasChildren === true)
            {
                $html .= $subChildren;
            }
            $html .= '</li>';
        }
        $html .= '</ul>';
        return $html;
    }
    
    function generateNestedListForMobile($data, $parentId = 0, $firstCall = true)
    {
        $data  = sortCategorie($data);
        $children = getChildren($data, $parentId);
        $html = isLastLevel($data,$children)? "<ul class=\"sub-menu\">" : ($firstCall? "<ul>" : "<ul class=\"mega-sub-menu\">");
        foreach ($children as $child)
        {
            $hasChildren = !empty(getChildren($data, $child['id']));
            $html .= getLi($child, $hasChildren);
            $subChildren = generateNestedListForMobile($data, $child['id'], false);
            if ($hasChildren === true)
            {
                $html .= $subChildren;
            }
            $html .= '</li>';
        }
        $html .= '</ul>';
        return $html;
    }
    function getStaticContenuWeb($contenuWeb)
    {
        $contenuWeb["url"] = "#";
        $contenuWeb["badge"] = "";
        $contenuWeb["newPrice"] = "";
        $contenuWeb["price"] = "";
        if(!empty($contenuWeb["idArticle"]))
        {
            if( empty($contenuWeb["nomLng1"]) &&
                empty($contenuWeb["textLng1"]) &&
                empty($contenuWeb["nom2Lng1"]) &&
                empty($contenuWeb["text2"]) &&
                empty($contenuWeb["date1"]))
            {
                $contenuWeb["nomLng1"] = $contenuWeb["article"]["nomLng1"];
                $contenuWeb["nom2Lng1"] = $contenuWeb["article"]["nom2Lng1"];
                $contenuWeb["badge"] = $contenuWeb["article"]["badge"];
                $contenuWeb["textLng1"] = $contenuWeb["article"]["descriptionLng1"];
                $contenuWeb["text2"] = $contenuWeb["article"]["fullDescriptionLng1"];
                $contenuWeb["date1"] = $contenuWeb["article"]["date1"];
                $contenuWeb["newPrice"] = $contenuWeb["article"]["newPrice"];
                $contenuWeb["price"] = $contenuWeb["article"]["price"];
                if(isset($contenuWeb["article"]["listeImage"]) && count($contenuWeb["article"]["listeImage"])>0)
                {
                    $images = filter(   $contenuWeb["article"]["listeImage"],
                                        "idResolution",
                                        $contenuWeb["contenuWebType"]["idResolution"]);
                    usort($images,function($a, $b){return $a['ordre'] - $b['ordre'];});
                    if(!empty($image))
                    {
                        $contenuWeb["image"] = $image[0]["nomLng1"];
                    }
                }
            }
            if($contenuWeb["article"]["idModelAffichage"] == 3)
            {
                $contenuWeb["url"] =  $GLOBALS['myHoste'] .
                                "/blog/" . $contenuWeb["article"]["id"] .
                                "/" . urlencode($contenuWeb["article"]["nomLng1"]);
            }
            if($contenuWeb["article"]["idModelAffichage"] == 2)
            {
                $contenuWeb["url"] =    $GLOBALS['myHoste'] .
                                    "/service/" . $contenuWeb["article"]["id"] ."/" .
                                    urlencode($contenuWeb["article"]["nomLng1"]);
            }
            if($contenuWeb["article"]["idModelAffichage"] == 1)
                $contenuWeb["url"] =    $GLOBALS['myHoste'] .
                                        "/projet/" . $contenuWeb["article"]["id"] ."/" .
                                        urlencode($contenuWeb["article"]["nomLng1"]);
        }
        elseif(!empty($contenuWeb["idCategorie"]))
        {
            if( empty($contenuWeb["nomLng1"]) &&
                empty($contenuWeb["textLng1"]) &&
                empty($contenuWeb["nom2Lng1"]) &&
                empty($contenuWeb["text2"]) &&
                empty($contenuWeb["date1"]))
            {
                $contenuWeb["nomLng1"] = $contenuWeb["categorie"]["nomLng1"];
                $contenuWeb["text"] = $contenuWeb["categorie"]["descriptionLng1"];
                if(isset($contenuWeb["categorie"]["listeImage"]) && count($contenuWeb["categorie"]["listeImage"])>0)
                {
                    $images = filter($contenuWeb["categorie"]["listeImage"],
                                    "idResolution",
                                    $contenuWeb["contenuWebType"]["idResolution"]);
                    usort($images,function($a, $b){return $a['ordre'] - $b['ordre'];});
                    if(!empty($image))
                    {
                        $contenuWeb["image"] = $image[0]["nom"];
                    }
                }
            }
            if(isset(  $contenuWeb["categorie"]["listeCategorieContenuWeb"]) &&
                       count($contenuWeb["categorie"]["listeCategorieContenuWeb"])>0)
            {
                $contenuWeb["url"] = $GLOBALS['myHoste'] ."/categorie/" .
                                    $contenuWeb["categorie"]["id"] ."/" .
                                    urlencode($contenuWeb["categorie"]["nomLng1"]);
            }
            elseif(isset($contenuWeb["categorie"]["listeArticleCategorie"]))
            {
                $contenuWeb["url"] = $GLOBALS['myHoste'] .
                                    "/liste/article/" . $contenuWeb["categorie"]["id"] ."/" .
                                    urlencode($contenuWeb["categorie"]["nomLng1"]);
            }
            else
            {
                $contenuWeb["url"] = $GLOBALS['myHoste'] ."/liste/categorie/".
                                    $contenuWeb["categorie"]["id"] ."/" .
                                    urlencode($contenuWeb["categorie"]["nomLng1"]);
            }
        }
        if(isset($contenuWeb["listDetailContenuWeb"]) && count($contenuWeb["listDetailContenuWeb"])>0)
        {
            $compte = 0;
            for($i=0; $i<count($contenuWeb["listDetailContenuWeb"]); $i++)
            {
                if($compte >= (count($contenuWeb["contenuWebType"]["listeResolution"])))
                {
                    $compte = 0;
                }
                $ligneContenuWeb = $contenuWeb["listDetailContenuWeb"][$i];
                $ligneContenuWeb["url"] = "#";
                $ligneContenuWeb["badge"] = "";
                $ligneContenuWeb["newPrice"] = "";
                $ligneContenuWeb["price"] = "";
                if(!empty($ligneContenuWeb["idArticle"]))
                {
                    if( empty($ligneContenuWeb["nomLng1"]) &&
                        empty($ligneContenuWeb["textLng1"]) &&
                        empty($ligneContenuWeb["nom2Lng1"]) &&
                        empty($ligneContenuWeb["text2Lng1"]) &&
                        empty($ligneContenuWeb["date1"]))
                    {
                        $ligneContenuWeb["nomLng1"] = $ligneContenuWeb["article"]["nomLng1"];
                        $ligneContenuWeb["nom2Lng1"] = $ligneContenuWeb["article"]["nom2Lng1"];
                        $ligneContenuWeb["badge"] = $ligneContenuWeb["article"]["badge"];
                        $ligneContenuWeb["textLng1"] = $ligneContenuWeb["article"]["descriptionLng1"] ;
                        $ligneContenuWeb["text2Lng1"] = $ligneContenuWeb["article"]["fullDescriptionLng1"];
                        $ligneContenuWeb["date1"] = $ligneContenuWeb["article"]["date1"];
                        $ligneContenuWeb["newPrice"] = $ligneContenuWeb["article"]["newPrice"];
                        $ligneContenuWeb["price"] = $ligneContenuWeb["article"]["price"];
                        if( isset($contenuWeb["contenuWebType"]) &&
                        isset($contenuWeb["contenuWebType"]["listeResolution"]) &&
                        count($contenuWeb["contenuWebType"]["listeResolution"])>0)
                        {
                            $idResolution = $contenuWeb["contenuWebType"]["listeResolution"][$compte]["idResolution"];
                            $images = filter($ligneContenuWeb["article"]["listeImage"],"idResolution", $idResolution);
                            usort($images,function($a, $b){return $a['ordre'] - $b['ordre'];});
                            if(!empty($images))
                            {
                                $ligneContenuWeb["image"] = $images[0]["nom"];
                            }
                            
                        }
                    }
                    if($ligneContenuWeb["article"]["idModelAffichage"] == 3)
                    {
                        $ligneContenuWeb["url"] =  $GLOBALS['myHoste'] .
                                                "/blog/" . $ligneContenuWeb["article"]["id"] ."/" .
                                                urlencode($ligneContenuWeb["article"]["nomLng1"]);
                    }
                    if($ligneContenuWeb["article"]["idModelAffichage"] == 2)
                    {
                        $ligneContenuWeb["url"] =  $GLOBALS['myHoste'] .
                                                "/service/" . $ligneContenuWeb["article"]["id"] ."/" .
                                                urlencode($ligneContenuWeb["article"]["nomLng1"]);
                    }
                    if($ligneContenuWeb["article"]["idModelAffichage"] == 1)
                    {
                        $ligneContenuWeb["url"] =  $GLOBALS['myHoste'] .
                                                "/projet/" . $ligneContenuWeb["article"]["id"] ."/" .
                                                urlencode($ligneContenuWeb["article"]["nomLng1"]);
                    }
                }
                elseif(!empty($ligneContenuWeb["idCategorie"]))
                {
                    if( empty($ligneContenuWeb["nomLng1"]) &&
                        empty($ligneContenuWeb["textLng1"]))
                    {
                        $ligneContenuWeb["nomLng1"] = $ligneContenuWeb["categorie"]["nomLng1"];
                        $ligneContenuWeb["textLng1"] = $ligneContenuWeb["categorie"]["descriptionLng1"];
                        if( isset($contenuWeb["contenuWebType"]) &&
                            isset($contenuWeb["contenuWebType"]["listeResolution"]))
                        {
                            if(count($contenuWeb["contenuWebType"]["listeResolution"])>0)
                            {
                                $idResolution = $contenuWeb["contenuWebType"]["listeResolution"][$compte]["idResolution"];
                                $images = filter($ligneContenuWeb["categorie"]["listeImage"],
                                                "idResolution",
                                                $idResolution);
                                usort($images,function($a, $b){return $a['ordre'] - $b['ordre'];});
                                if(!empty($image))
                                {
                                    $ligneContenuWeb["image"] = $images[0]["nom"];
                                }
                            }
                        }
                    }
                    if( isset($ligneContenuWeb["categorie"]["listeCategorieContenuWeb"]) &&
                        count($ligneContenuWeb["categorie"]["listeCategorieContenuWeb"])>0)
                    {
                        $ligneContenuWeb["url"] =   $GLOBALS['myHoste'] ."/categorie/" .
                                                    $ligneContenuWeb["categorie"]["id"] ."/" .
                                                    urlencode($ligneContenuWeb["categorie"]["nomLng1"]);
                    }
                    elseif(isset($ligneContenuWeb["categorie"]["listeArticleCategorie"]))
                    {
                        $ligneContenuWeb["url"] =   $GLOBALS['myHoste'] ."/liste/article/" .
                                                    $ligneContenuWeb["categorie"]["id"] ."/" .
                                                    urlencode($ligneContenuWeb["categorie"]["nomLng1"]);
                    }
                    else
                    {
                        $ligneContenuWeb["url"] =   $GLOBALS['myHoste'] ."/liste/categorie/".
                                                    $ligneContenuWeb["categorie"]["id"] ."/" .
                                                    urlencode($ligneContenuWeb["categorie"]["nomLng1"]);
                    }
                }
                $contenuWeb["listDetailContenuWeb"][$i] = $ligneContenuWeb ;
                $compte +=1;
            }
        }
        return $contenuWeb;
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
        if(gettype($array) == "object" || gettype($array) == "array")
        {
            foreach ($array as $key => $value)
            {
                $newKey = str_replace('_', '', ucwords($key, '_'));
                $newKey = lcfirst($newKey);
                $convertedArray[$newKey] = $value;
            }
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
        {
            return true;
        }
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
    function strContains($haystack, $needle)
    {
        return $needle !== '' && mb_strpos($haystack, $needle) !== false;
    }
    function createPickup($data)
    {
        $data = json_decode(json_encode($data), true);
        $pickup = new Pickup();
        $pickup->nom = $data["nomLng1"];
        $pickup->gouvernerat = $data["regionLng1"];
        $pickup->ville = $data["villeLng1"];
        $pickup->adresse = $data["adresseLng1"];
        $pickup->tel = $data["mobile1"];
        $listeArticle = implode(', ', array_column($data["listDetailDocument"], 'nomArticle'));
        $pickup->designation = $listeArticle;
        $pickup->prix = $data["totalTtc"];
        $pickup->msg = "";
        $pickup->echange = "0";
        $pickup->login = $GLOBALS['loginBestDrlivery'];
        $pickup->pwd = $GLOBALS['passwordBestDrlivery'];
        // initialize SOAP client and call web service function CreatePickup
        $client = new SoapClient('https://api.best-delivery.net/serviceShipments.php?wsdl',
                                ['trace'=>1,
                                'cache_wsdl'=>WSDL_CACHE_NONE]);
        $resp = $client->CreatePickup($pickup);
        $data["referenceLivreur"] = $resp->CodeBarre;
        $data["urlLivreur"] = $resp->Url;
        return $data;
    }
    function getEtatPickup($codebBarre)
    {
        $pickup->login = $GLOBALS['loginBestDrlivery'];
        $pickup->pwd = $GLOBALS['passwordBestDrlivery'];
        $pickup->tracking_number = $codebBarre;
        $client=new SoapClient('https://www.best-delivery.net/api/serviceShipments.php?wsdl',['trace'=>1,'cache_wsdl'=>WSDL_CACHE_NONE]);
        $resp = $client->TrackShipmentStatus($pickup);
    }
    // enAttente = "",
    // enCoursConfirmation = "",
    // confirmer = "confirmer",
    function checkRequiredDataForBestDelivery($data)
    {
        if( !empty($data["nomLng1"])&&
        !empty($data["regionLng1"])&&
        !empty($data["villeLng1"])&&
        !empty($data["adresseLng1"])&&
        !empty($data["mobile1"])&&
        $data["etat"] == "confirmer")
        {
            return true;
        }
        return false;
    }
    function formatValue($value, $indent = 0) 
    {
        $formattedValue = '';
    
        if (is_array($value) || is_object($value)) 
        {
            foreach ($value as $key => $innerValue) 
            {
                $formattedValue .= str_repeat(' ', $indent * 4) . "$key: " . formatValue($innerValue, $indent + 1);
            }
        } 
        else 
        {
            $formattedValue = $value. " type : " . gettype($value);
        }
    
        return $formattedValue . "\n";
    }
    function write($txt)
    {
        $myfile = fopen("newfile.txt", "a") or die("Unable to open file!");
        if(is_array($txt) || is_object($txt))
        {
            foreach ($txt as $key => $value) 
            {
              $formattedValue = formatValue($value);
              fwrite($myfile, " $key : $formattedValue \n");
            }
        }
        else
            fwrite($myfile, $txt."\n");
        fclose($myfile);
    }
    function getUpdateSql($data)
    {
        $sql = "";
        $id = 0;
        foreach ($data as $key => $value) 
        {
            $value= clean($value);
            if($key != "id")
            {
                $key = convertKeysFormatSql($key);
                if(!strContains($key, "id_") || (strContains($key, "id_") && $value != -1 ))
                {
                    $date = false;
                    if (estDateValide($value))
                    {
                        $date = strtotime($value);
                    }
                    if( (gettype($value) == "integer" ||
                        gettype($value) == "double") &&
                        (!empty($value) || $value == "0" || $value == "1"))
                        {
                        $sql .= " $key = $value , ";
                        }
                
                    elseif ($date !== false)
                    {
                        $formattedDate = date("Y-m-d H:i:s", $date);
                        $sql .= " $key = '$formattedDate' , ";
                    }
                    elseif (gettype($value) == "string" && !empty($value))
                    {
                        $sql .= " $key = '$value' , ";
                    }
                    elseif (gettype($value) == "string" && empty($value))
                    {
                        $sql .= " $key = NULL , ";
                    }
                }
                
            }
            else
            {
                $id =  $value;
            }
        }
        $sql = rtrim($sql, " , ");
        $sql .= " where id = $id";
        return $sql;
    }
    function getInsertSql($data)
    {
        $sql = " ( ";
        foreach ($data as $key => $value)
        {
            if($key != "id" )
            {
                $key = convertKeysFormatSql($key);
                if( (gettype($value) == "string" ||
                    gettype($value) == "integer" ||
                    gettype($value) == "double") &&
                    (!empty($value) || $value == "0" ||  $value == "1") && 
                    (!strContains($key, "id_") || (strContains($key, "id_") && $value != -1 )))
                {
                    $sql .= " $key , ";
                }
            
            }
        }
        $sql = rtrim($sql, " , ");
        $sql .= ") VALUES (";
        foreach ($data as $key => $value)
        {
            $value= clean($value);
            if($key != "id")
            {
            $key = convertKeysFormatSql($key);
            if(!strContains($key, "id_") || (strContains($key, "id_") && $value != -1 ))
            {
                if( (gettype($value) == "integer" ||
                gettype($value) == "double") &&
                (!empty($value) || $value == "0" || $value == "1") )
                {
                $sql .= " $value , ";
                }
                elseif (!empty($value) && gettype($value) == "string")
                {
                $sql .= " '$value' , ";
                }
            }
            
            }
        }
        $sql = rtrim($sql, " , ");
        $sql .= ")";
        return $sql;
    }
    function getWhere($filter)
    {
        $whereClause = "";

        if(!empty($filter))
        {
            foreach ($filter as $key => $value)
            {
            $key = convertKeysFormatSql($key);
            $value = json_decode(json_encode($value), true);
            if(!strContains($key, "id_") || (strContains($key, "id_") && $value != -1 ))
            {
                if(isset($value["value"]))
                {
                $value["value"] = clean($value["value"]);
                if(!empty($value["value"]) && gettype($value["value"]) == "string")
                {
                    $value["value"] = str_replace(";", '', $value["value"]);
                }
                if(!empty($value["value"]) || $value["value"] == "0" || $value["value"] == "1")
                {
                    if((gettype($value["value"]) == "string" ||
                        gettype($value["value"]) == "integer" ||
                        gettype($value["value"]) == "double" ||
                        gettype($value["value"]) == "boolean") &&
                        (!isset($value["type"]) || $value["type"] !="date") )
                    {
                    if(gettype($value["value"]) == "string")
                    {
                        $whereClause .= (strlen($whereClause)>0? "  and " :" ") .
                        $key . (($value["operator"] != '%' && $value["operator"] != '%%')? $value["operator"] : " LIKE ") .
                        " '" . ($value["operator"] == '%%'? "%" : "") . ((string) $value["value"]) .
                        ($value["operator"] == "%" || $value["operator"] == "%%"? "%" : "") . "' ";
                    }
                    else
                    {
                        if($value["operator"]  != "<= <=")
                        {
                        $whereClause .= (strlen($whereClause)>0? " and  " :" ") .
                                        $key . $value["operator"] . ((string)$value["value"]);

                        }
                        else
                        {
                        if(isset($value["value2"]) && !empty($value["value2"]))
                        {
                            $whereClause .= (strlen($whereClause)>0? " and " :" ") .
                                        $key . " >=  '" . $value["value"] . "'  and " .
                                        $key . " <= '" . $value["value2"] . "' ";

                        }
                        }
                    }
                    }
                    elseif( isset($value["value"]) &&
                            !empty($value["value"]) &&
                            isset($value["value2"]) &&
                            !empty($value["value2"]))
                    {
                    $property = str_replace("Filter", "", $key);
                    $whereClause .= (strlen($whereClause)>0? " and " :" ") .
                                    $property . " >=  '" . $value["value"] . "'  and " .
                                    $property . " <= '" . $value["value2"] . "' ";
                    }
                }
                }
                elseif(gettype($value) == "array" && !empty($value))
                {
                $property = strtolower(str_replace("list_", "", $key));
                $string = implode(',', $value);
                $whereClause .= (strlen($whereClause)>0? " AND " :"") .  "  $property in ( $string ) ";
                }
            }
            }
        }
        return (strlen($whereClause)>0? " WHERE " : "") .$whereClause;
    }
    function checkData($idParametre, $sourceInstance)
    {
        $sourceInstance = json_decode(json_encode($sourceInstance), true);
        $error = new stdClass();
        $error->haveError = false;
        $parametre = getParametre($idParametre);
        if(!empty($parametre))
        {
            $listeConfigData = json_decode($parametre["value"]);
            // Récupérer les propriétés publiques de l'instance source
            $sourceProperties = get_object_vars(json_decode(json_encode($sourceInstance)));
            // Parcourir les propriétés de l'instance cible
            foreach ($sourceProperties as $propertyName => $propertyValue)
            {
                // recherche configuration dans listeConfigData
                $configData = find($listeConfigData->fields, "name", $propertyName);
                if( !empty($configData) &&
                    $configData->required === true &&
                    $configData->active === true &&
                    empty($propertyValue) &&
                    $propertyValue !=0  )
                {
                $error->{$propertyName} = $configData->messageLng1;
                $error->haveError = true;
                }
            }
        }
        return array("error" => $error, "parametre" => $parametre );
    }
    function estDateValide($chaineDate)
    {
        $timestamp = strtotime($chaineDate);
        if ($timestamp === false) 
        {
            return false;
        }
        // Si la chaîne d'origine contient uniquement des chiffres ou des tirets,
        // cela peut être une date valide, sinon, c'est invalide
        return preg_match('/^[\d-]+$/', $chaineDate) === 1;
    }