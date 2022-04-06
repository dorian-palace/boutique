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
$panierClient = $client_info->clientPanier();

// echo "<pre>";
// var_dump($_SESSION);
// echo "</pre>";
// print_r($clientCommande);
// echo "<pre>";
// print_r($panierClient);
// echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Client</title>
</head>

<body>

    <!-- <fieldset>
        <legend>Information utilisateur</legend> -->
        <table class="table table-bordered">
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
        <!-- </table>
    </fieldset> -->

    <fieldset>
        <legend>Information de commande</legend>
        <?php foreach ($resultCommande as $key => $value) { ?>
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
        <?php } ?>

    </fieldset>

    <fieldset>
        <legend>Contenue panier</legend>
        <?php
        foreach ($panierClient as $key => $value) {
        ?>
            <table class="table table-bordered">
                <thead class="">
                    <tr>
                        <th scope="col"><?= $key; ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="2">
                            <?= $value; ?>
                        </td>
                    </tr>
                </tbody>
            </table>

        <?php } ?>
    </fieldset>

</body>

</html>