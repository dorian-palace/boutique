<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/css/header.css">
    <link rel="stylesheet" href="style/css/index.css">
    <title>Document</title>
</head>

<body>
    <header>
        <?php require 'elements/header.php'; ?>
    </header>

    <main>
        <!--- MAIN --->

        <h1 class="titre">
            Pasta di Giovanni 
        </h1>

    </main>

    <article class="presentation">
        <!--- ARTICLE --->
        <div class="textpresentation"></div>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo soluta consectetur voluptates tempora dolore, tenetur repudiandae cupiditate rerum reprehenderit maiores beatae fuga, quos id sapiente fugit debitis. Amet, quia consectetur!Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo soluta consectetur voluptates tempora dolore, tenetur repudiandae cupiditate rerum reprehenderit maiores beatae fuga, quos id sapiente fugit debitis. Amet, quia consectetur!Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo soluta consectetur voluptates tempora dolore, tenetur repudiandae cupiditate rerum reprehenderit maiores beatae fuga, quos id sapiente fugit debitis. Amet, quia consectetur!Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo soluta consectetur voluptates tempora dolore, tenetur repudiandae cupiditate rerum reprehenderit maiores beatae fuga, quos id sapiente fugit debitis. Amet, quia consectetur!Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo soluta consectetur voluptates tempora dolore, tenetur repudiandae cupiditate rerum reprehenderit maiores beatae fuga, quos id sapiente fugit debitis. Amet, quia consectetur!Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo soluta consectetur voluptates tempora dolore, tenetur repudiandae cupiditate rerum reprehenderit maiores beatae fuga, quos id sapiente fugit debitis. Amet, quia consectetur!Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo soluta consectetur voluptates tempora dolore, tenetur repudiandae cupiditate rerum reprehenderit maiores beatae fuga, quos id sapiente fugit debitis. Amet, quia consectetur!Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo soluta consectetur voluptates tempora dolore, tenetur repudiandae cupiditate rerum reprehenderit maiores beatae fuga, quos id sapiente fugit debitis. Amet, quia consectetur!Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo soluta consectetur voluptates tempora dolore, tenetur repudiandae cupiditate rerum reprehenderit maiores beatae fuga, quos id sapiente fugit debitis. Amet, quia consectetur!Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo soluta consectetur voluptates tempora dolore, tenetur repudiandae cupiditate rerum reprehenderit maiores beatae fuga, quos id sapiente fugit debitis. Amet, quia consectetur!Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo soluta consectetur voluptates tempora dolore, tenetur repudiandae cupiditate rerum reprehenderit maiores beatae fuga, quos id sapiente fugit debitis. Amet, quia consectetur!Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo soluta consectetur voluptates tempora dolore, tenetur repudiandae cupiditate rerum reprehenderit maiores beatae fuga, quos id sapiente fugit debitis. Amet, quia consectetur!Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo soluta consectetur voluptates tempora dolore, tenetur repudiandae cupiditate rerum reprehenderit maiores beatae fuga, quos id sapiente fugit debitis. Amet, quia consectetur!Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo soluta consectetur voluptates tempora dolore, tenetur repudiandae cupiditate rerum reprehenderit maiores beatae fuga, quos id sapiente fugit debitis. Amet, quia consectetur!Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo soluta consectetur voluptates tempora dolore, tenetur repudiandae cupiditate rerum reprehenderit maiores beatae fuga, quos id sapiente fugit debitis. Amet, quia consectetur!Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo soluta consectetur voluptates tempora dolore, tenetur repudiandae cupiditate rerum reprehenderit maiores beatae fuga, quos id sapiente fugit debitis. Amet, quia consectetur!
        </div>

        

    </article>

    

    <div class="produitaccueil">

        <?php
           $req =  "SELECT * FROM produits ORDER BY DESC LIMIT 5 ";
        ?>


    </div>


    <!--- FOOTER --->
    <footer>
        <?php require 'elements/footer.html'; ?>
    </footer>
</body>

</html>