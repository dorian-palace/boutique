<?php
session_start();
require_once('setting/db.php');
require('app/client/Client_info.php');
$client_info = new Client_info(); //class infos utilisateurs TEST
$id_utilisateur = $_SESSION['id'];

$adresse_client = $client_info->clientAdresse($id_utilisateur); //TEST INNER JOIN user / adresse

$resultAdresse = $adresse_client->fetchAll(); //

foreach ($resultAdresse as $key) {
    // print_r($key);

    // Information utilisateurs 
    echo
     'login: ' . ' ' . $key['login'] . ' ' . 'email: ' . $key['email'] . ' ' . ' numero de commande' . ' ' . $key['numero_commande'] . ' ' . ' prenom: ' . $key['prenom'] . ' ' . ' nom: ' . $key['nom'] . ' ' . 'adresse: ' . $key['adresse'] . ' ' . 'ville: ' . $key['ville'] . ' ' . 'code postal: ' . $key['code_postal'] . ' ' . 'telephone: ' . $key['telephone'];
}

$infoPanier = $client_info->clientPanier();
$resultPanier = $infoPanier->fetchAll();

foreach($resultPanier as $key){
    print_r($key);
    // DB FK id_produit / ID de la table produit a update 

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client</title>
</head>

<body>

    <?php

    //PAGINATION

    ?>
</body>

</html>