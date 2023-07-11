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
            if(isset($accueille["article"]["listeImage"]) && count($accueille["article"]["listeImage"])>0)
            {
                $image = find($accueille["article"]["listeImage"],"id_resolution", $accueille["accueilType"]["id_resolution"]);
                $accueille["image"] = $image ;

            }
        }
        else if(!empty($accueille["id_categorie"]))
        {
            $accueille["name"] = $accueille["categorie"]["name"];
            $accueille["text"] = $accueille["categorie"]["description"];
            // $accueille["image"] = $accueille["categorie"]["image"];
            if(isset($accueille["categorie"]["listeImage"]) && count($accueille["categorie"]["listeImage"])>0)
            {
                $image = find($accueille["categorie"]["listeImage"],"id_resolution", $accueille["accueilType"]["id_resolution"]);
                $accueille["image"] = $image ;

            }
        }
        if(isset($accueille["listeLigneAccueil"]) && count($accueille["listeLigneAccueil"])>0)
        {      
            for($i=0; $i<count($accueille["listeLigneAccueil"]); $i++)
            {
                $ligneAccueil = $accueille["listeLigneAccueil"][$i];
                if(!empty($ligneAccueil["id_article"]))
                {
                    $ligneAccueil["name"] = $ligneAccueil["article"]["name"];
                    $ligneAccueil["text"] = (!empty($ligneAccueil["article"]["full_description"])? $ligneAccueil["article"]["full_description"]: $ligneAccueil["article"]["description"] );
                    if(isset($accueille["accueilType"]) && isset($accueille["accueilType"]["listeResolution"]))
                    {
                        if(count($accueille["accueilType"]["listeResolution"])>0)
                        {
                            $id_resolution = $accueille["accueilType"]["listeResolution"][0]["id_resolution"];
                            $image = find($ligneAccueil["article"]["listeImage"],"id_resolution", $id_resolution);
                            $ligneAccueil["image"] = $image;
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
                            $id_resolution = $accueille["accueilType"]["listeResolution"][0]["id_resolution"];
                            $image = find($ligneAccueil["categorie"]["listeImage"],"id_resolution", $id_resolution);
                            $ligneAccueil["image"] = $image;
                        }
                    }
                }
                $accueille["listeLigneAccueil"][$i] = $ligneAccueil ;
            }
        }
        return $accueille;
    }
?>