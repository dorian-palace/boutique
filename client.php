<?php
session_start();
require_once('setting/db.php');
require('app/client/Client_info.php');
$client_info = new Client_info();
$id_utilisateur = $_SESSION['id'];
$clientInfos = $client_info->clientInfos($id_utilisateur);
$resultInfos = $clientInfos->fetch();
$client_info->clientCommande();
$clientCommande = $client_info->clientCommande();
$resultCommande = $clientCommande->fetch();
print_r($resultCommande);

// print_r($clientCommande);
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
    <fieldset>
        <h2 for="">Information utilisateur</h2>
        <table>
            <tr>
                <th>Login</th>
                <th>Email</th>
                <th>Prenom</th>
                <th>Nom</th>
            </tr>
            <tr>
                <td><?= $resultInfos['login']; ?></td>
                <td><?= $resultInfos['email']; ?></td>
                <td><?= $resultInfos['prenom']; ?></td>
                <td><?= $resultInfos['nom']; ?></td>
            </tr>
        </table>
    </fieldset>

    <fieldset>
        <h2>Information de commande</h2>
        <?php foreach ($resultCommande as $key => $value) {
        ?>
            <table>


                <tr>
                    <th><?= $key ?></th>
                    <!-- <th>Adresse de livraison</th>
                <th>Date de commande</th>
                <th>Statut</th> -->
                </tr>
                <tr>
                    <td><?= $value ?></td>
                    <!-- <td></td>
                    <td</td>
                    <td</td>
                </tr> -->
            </table>
        <?php } ?>

    </fieldset>



</body>

</html>