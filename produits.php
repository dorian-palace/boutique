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
         <?php require_once 'elements/header.php';?>
     </header>

     <main>
        <?php require_once 'app/Produits.php';
                require_once 'app/Panier.php';


            $produits = New Produits();
            $result = $produits->getProduits();
            $db = new Db_connect();
           
            $panier = New Panier();
           
    
            
           


         

              $result = $produits->getProduits(); 
             

           
             if(isset($_GET['produits'])){

                $get_produits = $_GET['produits'];

                $produits_id = $db->query("SELECT * FROM produits WHERE id = '$get_produits'");
              

                foreach($produits_id as $produit){

                    ?>
                <h4 class="text-info"><?= $produit['titre']?></h4>
                <h4 class="text-danger"><?= number_format($produit['prix'],2,',',' ')?>€</h4>
                <a class = "add" href="produits.php?id=<?=$produit['id']?>">Ajouter au panier</a>

                
            <?php }

         }else{

             while($res = $result->fetch()){ ?>
                
                
                
                <form action="#" method="post">
                    
                    <div class = "produits">
               
                    
                <h4 class="text-info"><?= $res['titre']?></h4>
                <h4 class="text-danger"><?=number_format($res['prix'],2,',',' ')?>€</h4>
                <a href="produits.php?produits=<?=$res['id']?>">voir le produit</a>

              
              
                <a class = "add" href="produits.php?id=<?=$res['id']?>">Ajouter au panier</a>
                
                <?php require_once 'addpanier.php' ?>;
                
                </div>
            </form>

                
                
                 
                 <?php } 
                 
                }
                
                ?>

                
                
 

    
     </main>
</body>
</html>
