<?php
session_start();
require('app/commande/Commande.php');
$commande = new Commande();
$id_user = $_SESSION['id'];
echo "<pre>";
var_dump($_SESSION);
echo "</pre>";

if (isset($_POST['submit'])) {
    $commande->validationCommande($id_user);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande</title>
</head>

<body>
    <form action="" method="post" name="commandeForm">
        <input type="text" placeholder="adresse de facturation" name="adr_fact">
        <input type="text" placeholder="adresse de livraison" name="adr_liv">
        <input type="submit" name="submit">
    </form>
</body>

</html>