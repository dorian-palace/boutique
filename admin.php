<?php
session_start();
require('app/administrateur.php');

$admin = new Administrateur();
$admin->getUser();
$get_user = $admin->getUser();
$admin->updateUser();
$admin->newCategorie();
$get_categorie = $admin->getCategorie();
$nb_categorie = $admin->getCategorie();
$admin->newRegions();
$get_regions = $admin->getRegions();
$nb_regions = $admin->getRegions();
$get_produits = $admin->getProduits();
$admin->updateProduits();


if (isset($_POST['supprimer'])) {
    $id = $_POST['supprimer'];
    $admin->deleteCategorie($id);
    $admin->deleteRegions($id);
}


if (isset($_GET['delete']) && !empty($_GET['delete'])) {
    //delete admin
    $delete = (int)$_GET['delete'];
    $admin->deleteUser($delete);
    $admin->deleteProduits($delete);
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
        <?php $admin->newProduits(); ?>
        <form action="" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Ajout Produit</legend>
                <input type="text" placeholder="titre" name="titre_produit" required>
                <input type="text" placeholder="description" name="description_produit" required>
                <input type="text" placeholder="stock" name="stock_produit" required>
                <select name="region_produit" required>
                    <?php while ($result_regions = $get_regions->fetch()) {  ?>
                        <option value="<?= $result_regions['id']; ?>">
                            <?= $result_regions['nom_region']; ?>
                        </option>
                    <?php } ?>
                </select>

                <select name="categorie_produit" required>Catégorie nouveau produit
                    <?php while ($result_categorie = $get_categorie->fetch()) { ?>
                        <option value="<?= $result_categorie['id']; ?>" required>
                            <?= $result_categorie['nom_categorie']; ?>
                        </option>
                    <?php  } ?>
                </select>
                <input type="number" step="0.01" placeholder="prix_produit" name="prix_produit" required>
                <input type="file" name="file" id="">
                <input type="submit" name="submit_produit">
            </fieldset>
        </form>



        <?php while ($result_produits = $get_produits->fetch()) { ?>

            <form action="" method="post">
                <fieldset>
                    <legend>Modification et suppréssion produits</legend>
                    <input type="text" value="<?= $result_produits['titre']; ?>" name="update_titre">
                    <input type="text" value="<?= $result_produits['description']; ?>" name="update_description">
                    <input type="text" value="<?= $result_produits['stock']; ?>" name="update_stock">

                    <select name="update_region" id="">
                        <!---region produits-->
                        <option value="<?= $result_produits['id_regions']; ?>" name="">
                            <?= $result_produits['nom_region']; ?>
                        </option>

                    </select>

                    <select name="update_categorie" id="">
                        <!----categorie produits---->
                        <option value="<?= $result_produits['id_categorie']; ?>" name="">
                            <?= $result_produits['nom_categorie']; ?>
                        </option>
                    </select>
                    <input type="number" step="0.01" value="<?= $result_produits['prix']; ?>" name="update_prix">

                    <a class="a_admin" href="admin.php?delete=<?= $result_produits['id_produits'] ?>">Supprimer</a>

                    <button type="submit" value="<?= $result_produits['id_produits']; ?>" name="submit_update">update</button>

                </fieldset>
            </form>
        <?php  } ?>

        <!--- Création catégorie --->
        <form action="" method="post">
            <fieldset>
                <legend>Création et suppréssion de catégorie </legend>
                <input type="text" name="name_categorie" placeholder="catégorie">
                <input type="submit" name="new_categorie">

                <?php while ($result_cat = $nb_categorie->fetch()) {  ?>
                    <select name="" id="">
                        <option value="<?= $result_cat['id']; ?>">
                            <?= $result_cat['nom_categorie']; ?>
                        </option>
                    </select>
                    <button type="submit" name="supprimer" value="<?= $result_cat['id'] ?>">delete</button>
                <?php } ?>


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

        <form action="" method="post">
            <fieldset>
                <legend>Ajout et suppréssion de régions</legend>
                <input type="text" name="regions" placeholder="régions">
                <input type="submit" name="new_regions">

                <?php while ($delete_regions = $nb_regions->fetch()) {  ?>

                    <select name="" id="">
                        <option value="<?= $delete_regions['id']; ?>">
                            <?= $delete_regions['nom_region']; ?>
                        </option>
                    </select>
                    <button type="submit" name="supprimer" value="<?= $delete_regions['id'] ?>">delete</button>
                <?php } ?>

            </fieldset>
        </form>


        <aside>
        </aside>
    </main>
    <!--- FOOTER --->
</body>

</html>