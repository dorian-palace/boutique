<?php 
// require_once 'app/Produits.php';
require_once('setting/db.php');
require_once('setting/data.php');
$db = new Db_connect();
// $produits = new Produits();
// $result = $produits->getProduits();
$req_categories = $db->query("SELECT * FROM categories");
require('app/search/Search.php');
$searchBar = new Search();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../style/css/header.css">
  <script src="https://kit.fontawesome.com/db53e44f28.js" crossorigin="anonymous"></script>

  <title>Document</title>
</head>

<body>

  <nav class="navbar position:sticky navbar-expand-lg navbar-light bg-light ">
    <div class="container-fluid  pb-5 ">
      <a class="navbar-brand " href="#">Pasta di Giovanni</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="produits.php">Produits</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Produits
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="produits.php">Touts les produits</a></li>
              <?php foreach ($req_categories as $req_categorie) {
              ?>
                <li><a class="dropdown-item" href="produits.php?categorie=<?= $req_categorie['id'] ?>"><?= $req_categorie['nom_categorie'] ?></a></li> <?php } ?>
              <!-- <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li> -->
            </ul>
          </li>

        </ul>

        <?php

        if (isset($_SESSION['id'])) {

        ?>
          <li class="nav-item">
            <a class="nav-link " href="profil.php">Profil</a>
          </li>

          <a href="setting/deconnexion.php">déconnexion</a>
        <?php
        }
        ?>
        <a href="panier.php"><i class="fa-solid fa-basket-shopping-simple"></i></a>
        <a href="panier.php"><i class=""></i>


          <i class="fas fa-shopping-cart"></i></a>
        <?php if (!isset($_SESSION['id'])) {

        ?>
          <li class="nav-item">
            <a class="nav-link " href="inscription.php">Inscription</a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="connexion.php">Connexion</a>
          </li>

        <?php  } ?>




        <?php
        if (isset($_POST['submit'])) {

          unset($_SESSION['recherche']);

          $recherche = secuData($_POST['search']);
          $_SESSION['recherche'] = $recherche;

          header('Location: searchBar.php');
          die;
        }

        if (isset($msg)) {
          echo $msg;
        }
        ?>
        <form class="d-flex" method="POST">

          <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
          <input class="btn btn-outline-success" type="submit" name="submit">
        </form>
      </div>

    </div>

  </nav>