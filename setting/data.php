<?php


function secuData($data)
{
    $data = trim($data);//trim — Supprime les espaces (ou d'autres caractères) en début et fin de chaîne
    $data = stripslashes($data);//supprime tous les antislashs
    $data = htmlspecialchars($data);//htmlspecialchars — Convertit les caractères spéciaux en entités HTML
    $data = htmlentities($data);//htmlentities — Convertit tous les caractères éligibles en entités HTML

    return $data;
}
