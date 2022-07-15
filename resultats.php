<?php require_once('app/Search.php');



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/css/produits.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>

</head>
<?php require_once('elements/header.php')?>
<body>
    <h1 id="search">Resultats de la recherche</h1>

    <?php
        $search = new Search();

        $res = $search->startSearch($_GET['search']);
        ?>
        
        <div class="container row text-center offset-md-2 gap-3  ">
        <?php
        foreach ($res as $result) {

            // echo "<pre>";
            // var_dump($result);
            ?>

            <div class="card col-md-3 mr-3 mb-4  ">
            <?php echo "<img src='file/" . $result['image'] . " ' class='img-fluid '/>" ?>
            <div class="card-body ">
                <h5 class="card-title text-center"><?= $result['titre'] ?></h5>
                <h5 class="prix"><?= number_format($result['prix'], 2, ',', ' ') ?>€</h5>


                <a href="produits.php?produits=<?= $result['id'] ?>" class="btn btn-danger mb-2">voir le produits</a>

                <form action="produits.php?id=<?= $result['id'] ?>" method="post">


             
                </form>
           
            </div>
            </div>
        <?php } ?>
           
</body>
</html>

<?php

