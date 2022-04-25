<?php session_start();
require('app/search/Search.php');
$searchBar = new Search();

// var_dump($getSearch);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
</body>

</html>

<?php

$getSearch =  $searchBar->Search();
$resultS = $getSearch->fetch();
//Si il y'a du text de rentrer dans la barre de recherche     
$resultS;
$produitId = $resultS['id'];
var_dump($resultS['id']);

// cherche le mot rentré en db
if (isset($resultS['id'])) {

    header("Location: produits.php?produits=$produitId");
?>
    <!--Si il y'a un résultat trouver en base de donner vas sur la page du produits associer a l'id-->
    <!-- <a class="" href="produits.php?produits=<?= $resultS['id'] ?>"><?= $resultS['titre']; ?></a> -->
<?php

} else {
    //msg d'erreur pas de produits trouver
}


// if (isset($msg)) {
//     echo $msg;
// }
?>