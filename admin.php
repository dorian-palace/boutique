<?php
session_start();
require('app/administrateur.php');

$admin = new Administrateur();
$admin->getUser();
$get_user = $admin->getUser();
$admin->updateUser();
$admin->newCategorie();
$get_categorie = $admin->getCategorie();

var_dump($get_categorie);
if (isset($_GET['delete']) && !empty($_GET['delete'])) {
    //delete admin
    $delete = (int)$_GET['delete'];
    $admin->deleteUser($delete);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body>


    <pre><?php //var_dump(); 
            ?></pre>
    <pre><?php //var_dump(); 
            ?></pre>

    <!--- HEADER --->
    <main>
        <form action="" method="post">
            <fieldset>
                <legend>Création de catégorie</legend>
                <input type="text" name="name_categorie">
                <input type="submit" name="new_categorie">
            </fieldset>
        </form>

        <?php

        ?>
        <form action="" method="post">
            <fieldset>
                <legend>Ajout Produit</legend>
                <input type="text">
                <input type="text">
                <input type="text">
                <input type="text">
                <input type="text">

                <select name="categorie" id="">Catégorie nouveau produit
                    <?php while ($result_categorie = $get_categorie->fetch()) { ?>
                        <option value=""><?= $result_categorie['nom_categorie'];
                                        } ?></option>
                </select>
                <input type="submit">
            </fieldset>
        </form>
        <?php   ?>

        <?php while ($result = $get_user->fetch()) { ?>
            <!--- UPDATE & MODIFICATION utilisateurs --->
            <form action="admin.php" method="post">
                <fieldset>
                    <legend>Modification et suppression utilisateur</legend>
                    <input type="text" value="<?= $result['login']; ?>" name="new_login">
                    <input type="email" value="<?= $result['email']; ?>" name="new_email">
                    <input type="text" value="<?= $result['id_droits']; ?>" name="new_droits">
                    <button type="submit" value=" <?= $result['id'] ?>" name="update">Update</button>
                    <a class="a_admin" href="admin.php?delete?=<?= $result['id'] ?>">Supprimer</a>

                </fieldset>
            </form>
        <?php }
        ?>
        <pre><?php var_dump($result_categorie); ?></pre>
        <aside>
        </aside>
    </main>
    <!--- FOOTER --->

</body>

</html>