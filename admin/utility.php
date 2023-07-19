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
        return array_filter($liste, function ($object) use ($property, $value)
        {
            $test = !empty($property) && $object[$property] == $value;
            return $test;
        });
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
                    $html .= '><a ' . ($cetActive == true? " class=' active' " :"") . 'href="' . $GLOBALS['myHoste'] . '/index/categorie/' . $categorie['id'] . '/' . $categorie['name'] . '">' . $categorie['name'];
                else if(count($categorie["listeArticleCategorie"])>0 || $hasChildren == false)
                    $html .= '><a ' . ($cetActive == true? " class=' active' " :"") . 'href="' . $GLOBALS['myHoste'] . '/liste/article/' . $categorie['id'] . '/' . $categorie['name'] . '">' . $categorie['name'];
                else
                    $html .= '><a ' . ($cetActive == true? " class=' active' " :"") . 'href="' . $GLOBALS['myHoste'] . '/liste/categorie/' . $categorie['id'] . '/' . $categorie['name'] . '">' . $categorie['name'];
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
        $html .=  count(filter($listeCategorie, "id_parent",$parentId))>0 ? '</ul>' : "";
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
                $accueille["url"] =  $GLOBALS['myHoste'] . "/blog/" . $accueille["article"]["id"] ."/" . $accueille["article"]["name"];
            if($accueille["article"]["id_model_affichage"] == 2)
                $accueille["url"] =  $GLOBALS['myHoste'] . "/service/" . $accueille["article"]["id"] ."/" . $accueille["article"]["name"];
            if($accueille["article"]["id_model_affichage"] == 1)
                $accueille["url"] =  $GLOBALS['myHoste'] . "/projet/" . $accueille["article"]["id"] ."/" . $accueille["article"]["name"];
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
                $accueille["url"] = $GLOBALS['myHoste'] ."/categorie/" . $accueille["categorie"]["id"] ."/" . $accueille["categorie"]["name"];
            else if(isset($accueille["categorie"]["listeArticleCategorie"]))
                $accueille["url"] = $GLOBALS['myHoste'] ."/liste/article/" . $accueille["categorie"]["id"] ."/" . $accueille["categorie"]["name"];
            else
                $accueille["url"] = $GLOBALS['myHoste'] ."/liste/categorie/". $accueille["categorie"]["id"] ."/" . $accueille["categorie"]["name"];
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
                    $ligneAccueil["url"] = $GLOBALS['myHoste'] ."/article/" . $ligneAccueil["article"]["id"] ."/" . $ligneAccueil["article"]["name"];
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
                        $ligneAccueil["url"] = $GLOBALS['myHoste'] ."/categorie/" . $ligneAccueil["categorie"]["id"] ."/" . $ligneAccueil["categorie"]["name"];
                    else if(isset($ligneAccueil["categorie"]["listeArticleCategorie"]))
                        $ligneAccueil["url"] = $GLOBALS['myHoste'] ."/liste/article/" . $ligneAccueil["categorie"]["id"] ."/" . $ligneAccueil["categorie"]["name"];
                    else
                        $ligneAccueil["url"] = $GLOBALS['myHoste'] ."/liste/categorie/". $ligneAccueil["categorie"]["id"] ."/" . $ligneAccueil["categorie"]["name"];
                }
                $accueille["listeLigneAccueil"][$i] = $ligneAccueil ;
                $compte +=1;
            }
        }
        return $accueille;
    }
?>