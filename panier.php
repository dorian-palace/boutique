<?php 
session_start();
require_once 'app/Panier.php';







?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    

    <link rel="stylesheet" href="style/css/header.css">
    <link rel="stylesheet" href="style/css/panier.css">
    <title>panier</title>
</head>
<body >
    <?php require_once 'elements/header.php';
     require_once 'app/Panier.php';
    
    ?>

<div class="panier">

    <?php


    $panier = new panier ;

 


    $produits = $panier->getPanier();

    ?>


        <form action="panier.php" method="post">
        <div class="row">

            
        <?php
            
            if(empty($produits)){

                echo 'panier vide';

            }else{
    
                while($res = $produits->fetch()){  ?>
             
             <div class="name"><?=$res['titre']?></div>
             <div class="price">prix : <?=number_format($res['prix'],2,',',' ')?>€</div>
             <div class="quantity"><input type="number" name="panier[quantity][<?=$res['id'];?>]" value="<?=$_SESSION['panier'][$res['id']]?>"</div>
             <a href="panier.php?delpanier=<?=$res['id'];?>">Supprimer</a>
             
             <?php }
            }


          
            
            if(!empty($produits)){ ?>

            
                <div class="count">Nombre d'articles : <?= var_dump($panier->count())?></div>
                <div class="total">total :<?=number_format($panier->total(),2,',',' ');?>€</div>
                
                <input type="submit" value="Valider" name="submit">
                
                <form action="" method="post"></form>
                
            </div>
                </form>
                
             <?php } 
             
            if(isset($_POST['sumbit'])){

               header('location: commande.php ');
            }
             
                 ?>
        
   
   

</body>
</html>