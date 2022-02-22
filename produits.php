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


            $produit = New Produits();
            $result = $produit->getProduits();

            var_dump($resutl);

            while($res = $result->fetch()){ ?>

            
                <div class = col-md-4>
                 
                <form action="produits.php?action=id<?php echo $res['id'];?>" method="post">

                <h4 class="text-info"><?php echo $res['titre']?></h4>
                <h4 class="text-danger"><?php echo $res['prix']?></h4>
                <input type="submit"  name="add" class="btn btn-succes" value="Ajouter au panier">


                </form>
                
                 </div>
                 
                 <?php } ?>









    
     </main>
</body>
</html>
