<?php

session_start();
require_once'db.php';
<<<<<<< HEAD

=======
>>>>>>> produits


if (isset($_GET['q']) and !empty($_GET['q'])) {

    /*  Le code commence par vérifier si l'utilisateur a saisi une requête.
 Si c'est le cas, il utilise cette requête pour obtenir tous les articles dont le titre contient "q".
 La ligne suivante est celle où nous commençons à analyser ce qui se passe dans ce code.
 La première chose que nous voyons est qu'il y a deux variables : $bdd et $_GET['q'].
 Ces variables sont utilisées à différentes fins dans le script.
 $_GET['q'] est défini comme étant ce qui a été tapé dans le champ de saisie lorsque vous avez cliqué sur "Get Articles" sur notre site Web, qui contient un titre d'article comme "How To Make A Sandwich".
 Cette variable peut être utilisée plus tard dans notre script pour vérifier si un certain titre d'article existe ou non.
 $bdd est définie comme une instance de PDOStatement, qui nous permet d'exécuter des requêtes SQL contre des bases de données en utilisant la syntaxe PHP.
 Nous utilisons ensuite $articles->rowCount() pour compter le nombre de lignes renvoyées par notre requête SQL (qui serait égal à 0 car aucun article n'existe).
 Ce code est une partie du code d'un exemple d'utilisation de la méthode $bdd->query().
 Le code commence par vérifier s'il existe une variable $_GET['q'] dans la chaîne de requête.
 Si c'est le cas, il lui attribue la valeur htmlspecialchars($_GET['q']) et poursuit avec le reste du code.
 La ligne suivante définit une variable appelée $articles qui sera utilisée plus tard dans ce script, ainsi qu'une autre appelée $bdd dont nous parlerons plus tard.
 Ensuite, il vérifie si des articles ont été trouvés jusqu'à présent et si ce n'est pas le cas, il recommence le même processus jusqu'à ce que tous les articles aient été trouvés ou qu'il n'y ait plus d'articles. */

<<<<<<< HEAD
    $q = htmlspecialchars($_GET['q']);

    $articles = $bdd->query('SELECT titre FROM articles WHERE CONCAT(titre, contenu)LIKE "%' . $q . '%" ORDER BY id DESC');
    if ($articles->rowCount() ==  0) {
        $articles = $bdd->query('SELECT titre FROM articles WHERE CONCAT(titre, contenu) LIKE "%' . $q . '%" ORDER BY id DESC');
=======

if(isset($_GET['q']) AND !empty($_GET['q'])) {

   

    $q = htmlspecialchars($_GET['q']);

    $articles = $db->('SELECT titre FROM articles WHERE CONCAT(titre, contenu)LIKE "%'.$q.'%" ORDER BY id DESC');

        if($articles->rowCount() ==  0) {

            $articles = $bdd->query('SELECT titre FROM articles WHERE CONCAT(titre, contenu) LIKE "%'.$q.'%" ORDER BY id DESC');
        }
    
>>>>>>> 7f5217d74aa3b208312eec03e430d121ce204712
    }
}

?>

<form method="GET">
    <input type="search" name="q" placeholder="Recherche..." />
    <input type="submit" value="Valider" />
</form>

<?php if ($articles->rowCount() > 0) { ?>
    <ul>
        <?php while ($a = $articles->fetch()) { ?>
            <li><?= $a['titre'] ?></li>
        <?php } ?>
    </ul>
<?php } else { ?>
    Aucun résultat pour: <?= $q ?>...

<?php } ?>