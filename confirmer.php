<?php
session_start();
require_once('setting/db.php');
require('app/client/Client_info.php');

$client = new Client_info();
$infosUser = $client->clientInfos();
$resultUser = $infosUser->fetch();
$adrUser = $client->clientCommande();
$resultAdr = $adrUser->fetch();

unset($_SESSION['panier']);
// echo "<pre>";
// var_dump($_SESSION['panier']);
// echo "</pre>";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style/css/confirmer.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card p-4 mt-3">
            <div class="first d-flex justify-content-between align-items-center mb-3">
                <div class="info"> <span class="d-block name"> Merci <?= $_SESSION['login']; ?></span></div> <img src="https://i.imgur.com/NiAVkEw.png" width="40" />
            </div>
            <div class="detail"> <span class="d-block summery">Votre commande a été validé avec succèes</span> </div>
            <hr>
            <div class="text"> <span class="d-block new mb-1"><?= $resultUser['prenom'] . ' ' . $resultUser['nom']; ?></span> </div> <span class="d-block address mb-3">Adresse de facturation: <?= $resultAdr['adr_facturation']; ?> Adresse de livraison: <?= $resultAdr['adr_livraison']; ?> </span>
        </div>
    </div>
    <footer>
        <?php require 'elements/footer.html'; ?>
    </footer>
</body>

</html>