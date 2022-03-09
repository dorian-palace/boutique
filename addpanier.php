<?php 

require_once 'app/Panier.php';
require_once 'setting/db.php';

$db = new Db_connect;

if(isset($_GET['id'])){


    $panier = new Panier;

    $get_id = $_GET['id'];

     $produits = $db->query("SELECT id FROM produits WHERE id = '$get_id'");

     var_dump($produits);
    
    if(empty($produits)){

        die("le produits n'est pas disponible");
    }

   

    $panier->add($produits[0]['id']);

    
    die('le produit a été ajouté au panier');

}else{

    die("vous n'avez pas ajoutez de produits au panier");
}



$panier->addProduits();
