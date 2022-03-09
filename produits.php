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
           
            $panier = New Panier();
           
    
            
           


            var_dump($result);
            
            var_dump($produits);

              $result = $produits->getProduits(); 
             

             var_dump($produits);
          
           while($res = $result->fetch()){ ?>

               <?php var_dump($res) ?>
                <div class = col-md-4>
                 
                <form action="#" method="post">

               
                    
                <h4 class="text-info"><?= $res['titre']?></h4>
                <h4 class="text-danger"><?=number_format($res['prix'],2,',',' ')?>€</h4>
                

                <label for="quantitie">Quantité</label>

                <select name="quantite" id="">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                </select>

                <a class = "add" href="addpanier.php?id=<?=$res['id']?>">Ajouter au panier</a>

                

                </form>
                
                 </div>
                 
                 
                 <?php } ?>

    
     </main>
</body>
</html>
