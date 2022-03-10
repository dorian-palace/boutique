<?php
session_start();
require('app/admin/AdminUser.php');
require('app/admin/AdminProduit.php');
require('app/admin/AdminRegion.php');
require('app/admin/AdminCategorie.php');
$adminProduit = new AdminProduit();
$adminCategorie = new AdminCategorie();
$adminRegion = new AdminRegion();
$adminUser = new AdminUser();

if (isset($_GET['page']) && !empty($_GET['page'])) {
    $page = (int) strip_tags($_GET['page']); //strip_tags — Supprime les balises HTML et PHP d'une chaîne
} else {
    $page = 1;
}

if (isset($_POST['supprimer'])) {
    $id = $_POST['supprimer'];
    $adminCategorie->deleteCategorie($id);
    $adminRegion->deleteRegions($id);
}

if (isset($_GET['delete']) && !empty($_GET['delete'])) {
    //delete admin
    $delete = (int)$_GET['delete'];
    $adminUser->deleteUser($delete);
    $adminProduit->deleteProduits($delete);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Admin</title>
</head>

<body>
    <!--- HEADER --->
    <main>
        <!--- Création produit --->
        <?php $adminProduit->newProduits(); ?>
        <?php $get_regions = $adminRegion->getRegions(); ?>
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

                <?php $get_categorie = $adminCategorie->getCategorie(); ?>

                <select name="categorie_produit" required>Catégorie nouveau produit
                    <?php while ($result_categorie = $get_categorie->fetch()) { ?>
                        <option value="<?= $result_categorie['id']; ?>">
                            <?= $result_categorie['nom_categorie']; ?>
                        </option>
                    <?php  }; ?>
                </select>
                <input type="number" step="0.01" placeholder="prix_produit" name="prix_produit" required>
                <input type="file" name="file" id="">
                <input type="submit" name="submit_produit">
            </fieldset>
        </form>

        <?php $adminProduit->updateProduits(); ?>
        <?php $get_produits = $adminProduit->getProduits(); ?>
        <?php while ($result_produits = $get_produits->fetch()) { ?>

            <form action="" method="post" enctype="multipart/form-data">
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

                    <input type="file" name="update_file">
                    <!--  //$result_produits['image']; ?> -->
                    <?= '<img src="file/' . $result_produits['image'] . '" height=250 width=400 />' ?></br>

                    <a class="a_admin" href="admin.php?delete=<?= $result_produits['id_produits'] ?>">Supprimer</a>

                    <button type="submit" value="<?= $result_produits['id_produits']; ?>" name="submit_update">update</button>

                </fieldset>
            </form>
        <?php  } ?>

        <!--- Création catégorie --->
        <?php $adminCategorie->newCategorie(); ?>
        <?php $nb_categorie = $adminCategorie->getCategorie(); ?>
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

        <?php $adminUser->getUser(); ?>
        <?php $adminUser->updateUser(); ?>
        <?php $get_user = $adminUser->getUser(); ?>
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
        <?php } ?>

        <?php $adminRegion->newRegions(); ?>
        <?php $nb_regions = $adminRegion->getRegions(); ?>

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

    <?php
    //pagination 
    $debut = $adminProduit->page_Produit();
    $nb_elements = $debut->fetchColumn();
    $limite = 5;
    $nb_page = ceil($nb_elements / $limite);
    ?>

    <nav>
        <ul class="pagination">

            <li class="page-item">

                <?php if ($page > 1) { ?> <a href="?page=<?= $page - 1  ?>" class="page-link ">
                        < </a> <?php } ?>
            </li class="page-item">

            <li class="page-item">
                <?php for ($i = 1; $i <= $nb_page; $i++) {
                ?><a href="?page=<?= $i; ?>"><?= $i; ?></a>
                <?php } ?>
            </li>

            <li class="page-item">
                <?php if ($page < $nb_page) { ?>
                    <a href="?page=<?= $page + 1; ?>"class="page-link">></a>
                <?php } ?>
            </li>

        </ul>
    </nav>
    <!--- FOOTER --->
</body>

</html>