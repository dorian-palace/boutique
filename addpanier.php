<?php 

require_once 'app/Panier.php';


$db = new Db_connect;

if(isset($_GET['id'])){

   
    $panier = new Panier;

    $get_id = $_GET['id'];

     $produits = $db->query("SELECT id FROM produits WHERE id = '$get_id'");

    
        if(empty($produits)){

        die("le produits n'est pas disponible");
    }

         $panier->add($produits[0]['id']);
    ?>
    
    <div class="alert alert-success">

      <strong> Produit ajouté au panier</strong>
      
  </div>


    <?php 

    



}
