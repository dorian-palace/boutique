<?php
session_start();
if (isset($_GET['page']) && !empty($_GET['page'])) {
    $page = (int) strip_tags($_GET['page']); //strip_tags — Supprime les balises HTML et PHP d'une chaîne
} else {

    $page = 1;
}
require_once('setting/db.php');
require('app/client/Client_info.php');
$client_info = new Client_info();
$id_utilisateur = $_SESSION['id'];
$clientInfos = $client_info->clientInfos($id_utilisateur);
$resultInfos = $clientInfos->fetch();
$client_info->clientCommande();
$clientCommande = $client_info->clientCommande($id_utilisateur);
$resultCommande = $clientCommande->fetchAll();
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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

            foreach ($resultCommande as $resultCommandes) {
                // echo "<pre>";
                // var_dump($resultCommandes);
                // echo "</pre>"; 
        ?>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Adresse de facturation: <?= $resultCommandes['adr_facturation']; ?></td>
                            <td>Adresse de livraison: <?= $resultCommandes['adr_livraison']; ?></td>
                            <td>Date de commande: <?= $resultCommandes['date_commande']; ?></td><br>
                        </tr>
                    </tbody>

                </table>
        <?php
            }
        } ?>

    </fieldset>
    <?php
    $debut = $client_info->pagicommande();
    $nb_elements = $debut->fetchColumn();
    $limite = 6;
    $nb_page = ceil($nb_elements / $limite); ?>
    <nav aria-label="Page navigation example">

        <ul class="pagination ">
            <li class="page-item"><?php if ($page > 1) { ?> <a href="?page=<?= $page - 1  ?>" class="page-link ">
                        < </a> <?php } ?></li>

            <li class="page-item"><?php for ($i = 1; $i <= $nb_page; $i++) {
                                    ?><a href="?page=<?= $i; ?>"><?= $i; ?></a>
                <?php } ?></li>
            <li class="page-item"> <?php if ($page < $nb_page) { ?>
                    <a href="?page=<?= $page + 1; ?>" class="page-link">></a>
                <?php } ?>
            </li>
        </ul>
    </nav>
    </div>
    <footer>
        <?php require 'elements/footer.html'; ?>
    </footer>

</body>

</html>