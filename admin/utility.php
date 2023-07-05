<?php
    function find($liste, $property, $value)
    {
        $i = array_search($value, array_column($liste, $property));
        $element = ($i !== false ? $liste[$i] : null);
        return $element;
    }
    function generateMenu($items, $parentId = 0) 
    {
        usort($items, function($a, $b) 
        {
            return $a['ordre'] - $b['ordre'];
        });
        $html = '<ul>';
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
                    $html .= ' class="dropdown"';
                }
                $html .= '><a href="#">' . $item['name'];
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
        $html .= '</ul>';
        return $html;
    }
?>