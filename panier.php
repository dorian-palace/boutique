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
<<<<<<< HEAD
    <link href='https://css.gg/trash.css' rel='stylesheet'>
=======
>>>>>>> inscription

    

    <link rel="stylesheet" href="style/css/header.css">
    <link rel="stylesheet" href="style/css/panier.css">
    <title>panier</title>
</head>
<body >
    <?php require_once 'elements/header.php';
     require_once 'app/Panier.php';
<<<<<<< HEAD
     require_once 'app/produits.php';
=======
>>>>>>> inscription
    
    ?>

<div class="panier">

    <?php


    $panier = new panier ;
<<<<<<< HEAD
    $info_produits =  $info = new Produits;


    
    
=======

 
>>>>>>> inscription


    $produits = $panier->getPanier();

<<<<<<< HEAD

=======
>>>>>>> inscription
    ?>


        <form action="panier.php" method="post" class="form-panier">
        <div class="row">

            
        <?php
            
            if(empty($produits)){

<<<<<<< HEAD
                ?>
                <div class="empty-panier">
                    
                    <h1 id="empty-panier">Le panier est vide  </h1>

                    <h4>Ajouter des articles maintenant </h4>

                    <a href="produits.php" class="btn btn-success">Touts les produits</a>

                </div>

                <h1>

            <?php }else{
    
               
             

 ?>
             
<div class="cart_section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cart_container">
                    <div class="cart_title"><small> <?= ($panier->count())?> articles dans le panier </small></div>
                    <div class="cart_items">
                        
                    <?php  while($res = $produits->fetch()){  ?>
                        <ul class="cart_list">
                            <li class="cart_item clearfix">
                                <div class="cart_item_image"><?php echo "<img src='file/" . $res['image'] . " ' class='img-fluid '/>" ?> </div>
                                <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                    <div class="cart_item_name cart_info_col">
                                        <div class="cart_item_title">Nom</div>
                                        <div class="cart_item_text"><?=$res['titre']?></div>
                                    </div>
                                    
                                    <div class="cart_item_quantity cart_info_col">
                                        <div class="cart_item_title">Quantité</div>
                                        <div class="cart_item_text"><input type="number" name="panier[quantity][<?=$res['id'];?>]" value="<?=$_SESSION['panier'][$res['id']]?>" class="form-control w-25 p-3"></div>
                                    </div>
                                    <div class="cart_item_price cart_info_col">
                                        <div class="cart_item_title">Prix</div>
                                        <div class="cart_item_text"><?=number_format($res['prix'],2,',',' ')?>€</div>
                                    </div>
                                    <div class="cart_item_total cart_info_col">
                                        
                                        <div class="cart_item_text"><a href="panier.php?delpanier=<?=$res['id'];?>"><i class="gg-trash"></i></a></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <?php } ?>
                    </div>
                    <div class="order_total">
                        <div class="order_total_content text-md-right">
                            <div class="order_total_title"> Total:</div>
                            <div class="order_total_amount"><?=number_format($panier->total(),2,',',' ');?>€</div></div>
                        </div>
                    </div>

                       
                            <div class="cart_buttons"> <a href="produits.php"> <button type="button"  name="continuer" class="button cart_button_clear">Continuer vos achats</button></a> <a href="commande.php"><button type="button" class="button cart_button_checkout">Proceder au paiement</button> </a></div>
                      
             
            <?php } ?>
=======
                echo 'panier vide';

            }else{
    
                while($res = $produits->fetch()){  ?>
             
             <div class="name"><?=$res['titre']?></div>
             <div class="price">prix : <?=number_format($res['prix'],2,',',' ')?>€</div>
             <div class="quantity"><input type="number" name="panier[quantity][<?=$res['id'];?>]" value="<?=$_SESSION['panier'][$res['id']]?>"</div>
             <a href="panier.php?delpanier=<?=$res['id'];?>">Supprimer</a>
             
             <?php }
            }
>>>>>>> inscription


          
            
<<<<<<< HEAD
           

            
                
                
              
                
            </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
        
            
            
=======
            if(!empty($produits)){ ?>

            
                <div class="count">Nombre d'articles : <?= ($panier->count())?></div>
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
        
   
>>>>>>> inscription
   

</body>
</html>