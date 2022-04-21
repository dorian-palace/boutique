<?php session_start();
require('../app/search/Search.php');
$searchBar = new Search();
$getSearch =  $searchBar->Search();
$resultS = $getSearch->fetch();
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
    <form action="" method="post" name="">
        <table>
            <tr>
                <td>
                    <input type="text" name="search" value="<?= $msg; ?>">
                    <input type="submit" value="recherche">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>

<?php
if (isset($_POST['search'])) {
    //Si il y'a du text de rentrer dans la barre de recherche     
    $resultS;
    // cherche le mot rentré en db
    if (isset($resultS['id'])) { ?>
        <!--Si il y'a un résultat trouver en base de donner vas sur la page du produits associer a l'id-->
        <a class="" href="../produits.php?produits=<?= $resultS['id'] ?>">$result</a>
<?php
    } else {
        $msg = 'Aucun résultat';
    }
}

if (isset($msg)) {
    echo $msg;
}
?>