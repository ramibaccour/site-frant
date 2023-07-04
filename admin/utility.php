<?php
function find($liste, $property, $value)
{
    $i = array_search($value, array_column($liste, $property));
    $element = ($i !== false ? $liste[$i] : null);
    return $element;
}
?>