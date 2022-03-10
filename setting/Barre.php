<?php

session_start();
require_once'../app/Barre_recherche.php';


$barre = New Barre_recherche();

$barre->recherche();

var_dump($barre);

// if(isset($_GET['q']) AND !empty($_GET['q'])) {
//     $q = htmlspecialchars($_GET['q']);

//     $articles = $bdd ->query('SELECT titre FROM produits WHERE CONCAT(titre, contenu)LIKE "%'.$q.'%" ORDER BY id DESC');
//         if($articles->rowCount() ==  0) {
//             $articles = $bdd->query('SELECT titre FROM produits WHERE CONCAT(titre, contenu) LIKE "%'.$q.'%" ORDER BY id DESC');
//         }
    
//     }

?>

<form method="GET">
    <input type="search" name="q" placeholder="Recherche..." />
    <input type="submit" value="Valider" />
</form>

<?php if($articles->rowCount() > 0) { ?>
    <ul>
        <?php while($a = $articles->fetch()) { ?>
            <li><?= $a['titre'] ?></li>
        <?php } ?>
    </ul>
<?php } else { ?>
    Aucun résultat pour: <?= $q ?>...

<?php } ?>





