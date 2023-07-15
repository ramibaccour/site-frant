<?php
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
    function generateMenu($items, $parentId = 0, $cetActive = false) 
    {
        usort($items, function($a, $b) 
        {
            return $a['ordre'] - $b['ordre'];
        });
        $html = count(filter($items, "id_parent",$parentId))>0 ? '<ul>' : "";
        foreach ($items as $item) 
        {
            if ($item['id_parent'] == $parentId) 
            {
                $html .= '<li';
                // Vérifier si le menu a des sous-menus
                $hasChildren = false;
                foreach ($items as $childItem) 
                {
                    if ($childItem['id_parent'] == $item['id']) 
                    {
                        $hasChildren = true;
                        break;
                    }
                }
                if ($hasChildren) 
                {
                    $html .=  " class='dropdown ' ";
                }
                
                $html .= '><a ' .    ($cetActive == true? " class=' active' " :"")   .   'href="index.php">' . $item['name'];
                $cetActive = false;
                if ($hasChildren) 
                {
                    $html .= ' <i class="bi bi-chevron-down dropdown-indicator"></i>';
                }
                $html .= '</a>';
                // Appel récursif pour générer les sous-menus
                $html .= generateMenu($items, $item['id']);
                $html .= '</li>';
            }
        }
        $html .=  count(filter($items, "id_parent",$parentId))>0 ? '</ul>' : "";
        return $html;
    }
    function getStaticAccueille($accueille)
    {
        if(!empty($accueille["id_article"]))
        {
            $accueille["name"] = $accueille["article"]["name"];
            $accueille["text"] = $accueille["article"]["text"];
            $accueille["name2"] = $accueille["article"]["name2"];
            $accueille["text2"] = $accueille["article"]["text2"];
            $accueille["date1"] = $accueille["article"]["date1"];
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
            // $accueille["image"] = $accueille["categorie"]["image"];
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
                if(!empty($ligneAccueil["id_article"]))
                {
                    $ligneAccueil["name"] = $ligneAccueil["article"]["name"];
                    $ligneAccueil["text"] = $ligneAccueil["article"]["description"] ;

                    $ligneAccueil["name2"] = $ligneAccueil["article"]["name2"];
                    $ligneAccueil["text2"] = $ligneAccueil["article"]["full_description"];
                    $ligneAccueil["date1"] = $ligneAccueil["article"]["date1"];

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
                }
                $accueille["listeLigneAccueil"][$i] = $ligneAccueil ;
                $compte +=1;
            }
        }
        return $accueille;
    }
?>