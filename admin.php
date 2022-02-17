<?php
session_start();
require('app/administrateur.php');

$admin = new Administrateur();
$admin->getUser();
$get_user = $admin->getUser();
$admin->updateUser();
$admin->newCategorie();
$get_categorie = $admin->getCategorie();

if (isset($_POST['submit3'])) {
    echo 'salut';
    if (isset($_POST['categorie'])) {
        echo 'sandstorm';
        echo $_POST['categorie'];
    }
}

if (isset($_POST['supprimer'])) {
    echo $_POST['categorie'];
    $id = $_POST['categorie'];
    $admin->deleteCategorie($id);
}

if (isset($_GET['delete']) && !empty($_GET['delete'])) {
    //delete admin
    $delete = (int)$_GET['delete'];
    $admin->deleteCategorie($delete);
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
    <!--- HEADER --->
    <main>


        <!--- Création produit --->
        <form action="" method="post">
            <fieldset>
                <legend>Ajout Produit</legend>
                <input type="text">
                <input type="text">
                <input type="text">
                <input type="text">
                <input type="text">

                <select name="categorie">Catégorie nouveau produit
                    <?php while ($result_categorie = $get_categorie->fetch()) { ?>
                        <option value="<?= $result_categorie['id']; ?>">
                            <?= $result_categorie['nom_categorie']; ?>
                        </option>
                    <?php  } ?>
                </select>
                <button name="supprimer">supprimer</button>
                <input type="submit" name="submit3">
            </fieldset>
        </form>

        <!--- Création catégorie --->
        <form action="" method="post">
            <fieldset>
                <legend>Création de catégorie</legend>
                <input type="text" name="name_categorie">
                <input type="submit" name="new_categorie">
            </fieldset>
        </form>

        <?php while ($result = $get_user->fetch()) { ?>
            <!--- UPDATE & MODIFICATION utilisateurs --->
            <form action="admin.php" method="post">
                <fieldset>
                    <legend>Modification et suppression utilisateur</legend>
                    <input type="text" value="<?= $result['login']; ?>" name="new_login">
                    <input type="email" value="<?= $result['email']; ?>" name="new_email">
                    <input type="text" value="<?= $result['id_droits']; ?>" name="new_droits">
                    <button type="submit" value=" <?= $result['id'] ?>" name="update">Update</button>
                    <a class="a_admin" href="admin.php?delete=<?= $result['id'] ?>">Supprimer</a>

                </fieldset>
            </form>
        <?php }
        ?>

        <aside>
        </aside>
    </main>
    <!--- FOOTER --->

</body>

</html>