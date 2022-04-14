<?php
session_start()
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

        $panier = new Panier();
        $result = $produits->getProduits();


        $req_categories = $db->query("SELECT * FROM categories");




        foreach ($req_categories as $req_categorie) {


        ?>
            <div class="categorie">
                <a href="produits.php?categorie=<?= $req_categorie['id'] ?>"><?= $req_categorie['nom_categorie'] ?></a>

            </div>
        <?php  }



        if (isset($_GET['produits'])) {

            $get_produits = $_GET['produits'];

            $produits_id = $db->query("SELECT * FROM produits WHERE id = '$get_produits'");


        ?>
            
                <?php foreach ($produits_id as $produit) {

                ?>

                            <div class="container">
                            <?php echo "<img src='file/" .  $produit['image'] . " ' height=480 width=610 class='image-produit '/>" ?>
                            <div class="info-produit">
                                <div class="titre-produit"><?= $produit['titre']?></div>
                                <div class="prix-produit"> <?=$produit['prix']?>€

                                <div class="description"><?=$produit['description']?></div>
                                
                            </div>
                            <div class="add-painer"><a class="btn btn-light mt-2" href="produits.php?id=<?= $req_categorie['id'] ?>">Ajouter au panier</a></div>
                            <div class="avis"></div>
                            </div>
                <?php } ?>
            
        <?php
        } elseif (isset($_GET['categorie'])) {

            $get_categorie = $_GET['categorie'];


            $req_categories = $db->query("SELECT *, produits.id AS id_produits FROM produits INNER JOIN categories ON produits.id_categorie = categories.id WHERE id_categorie = '$get_categorie'");

        ?><a href="produits.php">Retour aux produits</a>

            <div class="container row text-center offset-md-2 gap-3">
                <?php

                foreach ($req_categories as $req_categorie) {

                ?>

                    <div class="card col-md-3 mr-3 mb-4">
                        <?php echo "<img src='file/" .  $req_categorie['image'] . " ' height=150 width=170 class='img-fluid '/>" ?>
                        <div class="card-body ">
                            <h5 class="card-title text-center"><?= $req_categorie['titre'] ?></h5>
                            <h5 class="prix"><?= number_format($req_categorie['prix'], 2, ',', ' ') ?>€</h5>


                            <a href="produits.php?produits=<?= $req_categorie['id_produits'] ?>" class="btn btn-succes">voir le produits</a>

                            <a class="btn btn-light mt-2" href="produits.php?id=<?= $req_categorie['id'] ?>">Ajouter au panier</a>

                            <?php require_once 'addpanier.php' ?>

                        </div>

                    </div>


                <?php } ?>
            </div>
        <?php
        } else {
        ?> <div class="container row text-center offset-md-2 gap-3">

                <?php while ($res = $result->fetch()) {

                ?>
                    <div class="card col-md-3 mr-3 mb-4">
                        <?php echo "<img src='file/" . $res['image'] . " ' height=150 width=170 class='img-fluid '/>" ?>
                        <div class="card-body ">
                            <h5 class="card-title text-center"><?= $res['titre'] ?></h5>
                            <h5 class="prix"><?= number_format($res['prix'], 2, ',', ' ') ?>€</h5>


                            <a href="produits.php?produits=<?= $res['id'] ?>" class="btn btn-succes">voir le produits</a>

                            <a class="btn btn-light mt-2" href="produits.php?id=<?= $res['id'] ?>">Ajouter au panier</a>

                            <?php require_once 'addpanier.php' ?>



                        </div>

                    </div>


                <?php } ?>
            </div>

        <?php }
        ?>







    </main>
</body>

</html>