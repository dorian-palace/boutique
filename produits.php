<?php
session_start();

if (isset($_GET['page']) && !empty($_GET['page'])) {
    $page = (int) strip_tags($_GET['page']); //strip_tags — Supprime les balises HTML et PHP d'une chaîne
} else {

    $page = 1;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/css/header.css">
    <link rel="stylesheet" href="style/css/produits.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <title>Document</title>
</head>

<body>
    <header>
        <?php require_once 'elements/header.php'; ?>
    </header>

    <main>
        <?php require_once 'app/Produits.php';
        require_once 'app/Panier.php';



        $produits = new Produits();
        $result = $produits->getProduits();
        $db = new Db_connect();
        $debut = $produits->pagiProduits();



        $req_categories = $db->query("SELECT * FROM categories");


        ?>
        <div class="categorie">

            <?php
            if (isset($_GET['produits'], $_GET['categorie'])) { ?>

                <div class="retour">

                    <a href="produits.php" id="retour"><button class="btn btn-dark mb-3"">Retour aux produits</button></a>

                </div>

            <?php }


            foreach ($req_categories as $req_categorie) {


            ?>
                <a href=" produits.php?categorie=<?= $req_categorie['id'] ?>"><?= $req_categorie['nom_categorie'] ?></a>


                <?php  }


                ?>
                </div>
                <?php
                if (isset($_GET['produits'])) {

                    $get_produits = $_GET['produits'];

                    $produits_id = $db->query("SELECT * FROM produits WHERE id = '$get_produits'");


                ?>

                    <?php foreach ($produits_id as $produit) {

                    ?> <div class="retour">
                            <a href="produits.php" id="retour"><button class="btn btn-dark mb-3">Retour aux produits</button></a>

                        </div>

                        <div class="container-produits">
                            <?php echo "<img src='file/" . $produit['image'] . " 'class='image-produit '/>" ?>

                            <div class="info-produit">
                                <div class="titre-produit"><?= $produit['titre'] ?></div>
                                <div class="prix-produit"> <a href="#" id='prix'><?= $produit['prix'] ?>€</a>

                                    <div class="description"><?= $produit['description'] ?></div>

                                </div>


                                <form action="#" method="post" class="add-panier">


                                    <a href="produits.php?categorie=<?= $req_categorie['id'] ?>"><input type="submit" name='submit' value='Ajouter au panier' class="btn btn-success"></a>



                                </form>



                                <?php
                                if (isset($_POST['submit'])) {

                                    require_once 'addpanier.php'; ?>

                                    <div class="alert alert-success">

                                        <strong> Produit ajouté au panier</strong>

                                    </div>





                                <?php } ?>

                                <form action="" method="post" class="avis_form">

                                    <button type="button" name="btn_avis" class="btn btn-secondary text-left" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Poster un avis
                                    </button>

                                    <!-- <input type="submit" name="btn_avis" value="Poster un avis" class='btn btn-primary"'> -->

                                </form>


                            </div>


                        </div>

                        <div class="avis-produits">
                            <?php require_once 'elements/avis.php' ?>
                        </div>








                    <?php } ?>

                <?php
                } elseif (isset($_GET['categorie'])) {

                    $get_categorie = $_GET['categorie'];


                    $req_categories = $db->query("SELECT *, produits.id AS id_produits FROM produits INNER JOIN categories ON produits.id_categorie = categories.id WHERE id_categorie = '$get_categorie'");

                ?>
                    <div class="retour">

                        <a href="produits.php" "><button class=" btn btn-dark mb-3">Retour aux produits</button></a>
                    </div>

                    <div class="container row text-center offset-md-2 gap-3">
                        <?php





                        foreach ($req_categories as $req_categorie) {

                        ?>

                                    <div class="card col-md-3 mr-3 mb-4">
                                        <?php echo "<img src='file/" . $req_categorie['image'] . " ' class='img-fluid '/>" ?>
                                        <div class="card-body ">
                                            <h5 class="card-title text-center"><?= $req_categorie['titre'] ?></h5>
                                            <h5 class="prix"><?= number_format($req_categorie['prix'], 2, ',', ' ') ?>€</h5>



                                            <a href="produits.php?produits=<?= $req_categorie['id_produits'] ?>" class="btn btn-danger mb-2">voir le produits</a>

                                            <form action="produits.php?categorie=<?= $req_categorie['id_categorie'] ?>&id=<?= $req_categorie['id_produits'] ?>" method="POST">


                                                <input type="submit" name='submit' value='ajouter au panier' class="btn btn-success">

                                            </form>

                                            <?php
                                            if (isset($_POST['submit'])) {



                                                if ($req_categorie['id_produits'] == $_GET['id']) {
                                            ?>
                                                    <?php require_once 'addpanier.php'; ?>

                                                    <div class="alert alert-success mt-3">

                                                        <strong> Produit ajouté au panier</strong>

                                                    </div>

                                            <?php }
                                            }
                                            ?>


                                        </div>
                                    </div>
                                    <?php } //fin du foreach ICI
                                //ICI PAGINATION
                                //l
                                $produits2 = new Produits(); //
                                $pagiCat = $produits2->pagiCategorie(); 
                                $nb_elementsCat = $debut->fetchColumn();
                                $limite = 6;
                                var_dump($pagiCat);

                                $nb_pageCat = ceil($nb_elementsCat / $limite);
                                @$pagiCat = intval($pagiCat);
                                $nb_pageCat = intval($nb_pageCat);
                                // echo"zeezaeazeazezaeazea";
                                    ?>

                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">

                                            <li class="page-item">

                                                <?php if ($pagiCat > 1) { ?> <a href="produits?categorie=<?= $req_categorie['id_categorie'] ?>&page=<?= $pagiCat - 1  ?>" class="page-link ">
                                            </li class="page-item">
                                            </a> <?php } ?>

                                        <li class="page-item">
                                            <?php for ($i = 1; $i <= $nb_pageCat; $i++) {
                                            ?><a href="produits?categorie=<?= $req_categorie['id_categorie'] ?>&page=<?= $i; ?>"><?= $i; ?></a>
                                            <?php } ?>
                                        </li>

                                        <li class="page-item">
                                            <?php if ($pagiCat < $nb_pageCat) { ?>
                                                <a href="produits?categorie=<?= $req_categorie['id_categorie'] ?>&page=<?= $pagiCat + 1; ?>" class="page-link">></a>
                                            <?php } ?>
                                        </li>

                                        </ul>
                                    </nav>
                                    </div>



                                </div>
                            <?php
                        } else {
                            ?> <div class="container row text-center offset-md-2 gap-3  ">

                                    <?php while ($res = $result->fetch()) {

                                    ?>
                                        <div class="card col-md-3 mr-3 mb-4  ">
                                            <?php echo "<img src='file/" . $res['image'] . " ' class='img-fluid '/>" ?>
                                            <div class="card-body ">
                                                <h5 class="card-title text-center"><?= $res['titre'] ?></h5>
                                                <h5 class="prix"><?= number_format($res['prix'], 2, ',', ' ') ?>€</h5>


                                                <a href="produits.php?produits=<?= $res['id'] ?>" class="btn btn-danger mb-2">voir le produits</a>

                                                <form action="produits.php?id=<?= $res['id'] ?>" method="post">


                                                    <a href="produits.php?produits=<?= $res['id'] ?>"><input type="submit" name='submit' value='ajouter au panier' class="btn btn-success"></a>

                                                </form>

                                                <?php
                                                if (isset($_POST['submit'])) {

                                                    require_once 'addpanier.php';

                                                    if ($res['id'] == $_GET['id']) {
                                                ?>
                                                        <div class="alert alert-success mt-3">

                                                            <strong> Produit ajouté au panier</strong>

                                                        </div>

                                                <?php }
                                                }
                                                ?>

                                            </div>

                                        </div>


                                    <?php }
                                    $nb_elements = $debut->fetchColumn();
                                    $limite = 6;
                                    $nb_page = ceil($nb_elements / $limite); ?>
                                    <nav aria-label="Page navigation example  ">

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

                            <?php }
                            ?>







    </main>
    <footer>
        <?php require 'elements/footer.html'; ?>
    </footer>
</body>

</html>