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
    
    

<<<<<<< HEAD
   
=======
    <div class="alert alert-success">
    <strong> Produit ajouté au panier</strong>
  </div>

      <strong> Produit ajouté au panier</strong>
      
  </div>

>>>>>>> inscription


    <?php 

    



}
