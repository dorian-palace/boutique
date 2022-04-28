<?php
session_start();
require_once('setting/db.php');
require('app/client/Client_info.php');
$client_info = new Client_info();
$id_utilisateur = $_SESSION['id'];
$clientInfos = $client_info->clientInfos($id_utilisateur);
$resultInfos = $clientInfos->fetch();
$client_info->clientCommande();
$clientCommande = $client_info->clientCommande($id_utilisateur);
$resultCommande = $clientCommande->fetch();

// echo "<pre>";
// var_dump($resultCommande);
// echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/css/client.css">
    <title>Client</title>
</head>

<body>
    <header>
        <?php include_once 'elements/header.php'; ?>
    </header>
    <div class="container_infos_user">
        <fieldset>
            <!-- <legend>Information utilisateur</legend> -->
            <table class="table table-bordered">
                <h2 class="h2_table">Information utilisateur</h2>
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Login</th>
                        <th scope="col">Email</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Nom</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        
                        <td><?= $resultInfos['login']; ?></td>
                        <td><?= $resultInfos['email']; ?></td>
                        <td><?= $resultInfos['prenom']; ?></td>
                        <td><?= $resultInfos['nom']; ?></td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
    </div>
    <!--Information de commande de l'utilisateur-->
    <fieldset>
        <legend>Information de commande</legend>
        <?php if (isset($resultCommande)) {
            foreach ($resultCommande as $key => $value) { ?>
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th><?= $key; ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            
                            <td><?= $value; ?></td>
                        </tr>
                    </tbody>

                </table>
        <?php
            }
        } ?>

    </fieldset>
    <footer>
        <?php require 'elements/footer.html'; ?>
    </footer>

</body>

</html>