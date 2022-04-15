<?php 

require_once 'app/Panier.php';


$db = new Db_connect;

if(isset($_GET['id']) || isset($_GET['produits']) || isset($_GET['categorie'])){

   
    $panier = new Panier;
    
    if(!isset($_GET['produits'])){

      $get_id = $_GET['id'];

    }elseif(!isset($_GET['id'])){

      $get_id = $_GET['produits'];
    }

     $produits = $db->query("SELECT id FROM produits WHERE id = '$get_id'");

    
        if(empty($produits)){

        die("le produits n'est pas disponible");
    }

         $panier->add($produits[0]['id']);
         
    ?> 
    
    


    <?php 

    



}
