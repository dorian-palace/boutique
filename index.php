<?php
session_start();
require_once 'app/Produits.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/css/header.css">
    <link rel="stylesheet" href="style/css/index.css">
    <link rel="icon" type="image/png" sizes="50x50" href="pexel/PastadiGiovanni1.png">
    <title>Accueil</title>
</head>

<body>
    

    
        <header>
            <?php require 'elements/header.php'; ?>
        </header>

        <main>
            <!--- MAIN --->
            <title>
                Pasta di Giovanni
            </title>

        </main>

    <div class="h1index">
        <h1 id="h1index">
            Pasta di Giovanni
        </h1>
        <h2 id="h2index">
            Pâtes fraîches, fromage et spécialités Italiennes
        </h2>
    </div> 

    <div id="caroussel">
        <div class="images">
            <img src="pexel/caroussel1.png" alt="">
            <img src="pexel/caroussel2.png" alt="">
            <img src="pexel/caroussel3.png" alt="">
            <img src="pexel/caroussel4.png" alt="">

        </div>
    </div>

    <br>

    <section class="box">
        
        <div class="divimgindex1">
            <h1 class="h1img">
                Pâtes
            </h1>
            <img src="pexel/pates.png" alt="" class="img-cat"> 
            <p class="paraimg">
                Rotelle, Fusili, Penne rigate, Gnocchetti sardi, Malfadine, Bucatini, Spaghetti, Zitone, Orecchiette, Puntalette, Filini, Gnocchi, Risotto aspèrges, poireaux et cèpes. Gamme de la marque "Pasta di Giovanni".
            </p>
        </div>
            
        <div class="divimgindex1">
            <h1 class="h1img">
                Huiles
            </h1>
            <img src="pexel/huile.png" alt=""class="img-cat"> 
            <p class="paraimg">
                Pasta di Giovanni vous propose une large sélection d'excellentes huiles d'olive extra vierge et d'olives provenant de presque toutes les régions d'Italie. Savez-vous ce qui signifie "extra vierge"? Lisez notre Guide a l'huile d'olive extra vierge pour tout apprendre sur la meilleure huile d'olive italienne !
            </p>
        </div>
                
        <div class="divimgindex1">
            <h1 class="h1img">
                Antipasti
            </h1>
            <img src="pexel/antipasti.png" alt="" class="img-cat"> 
            <p class="paraimg">
                Jambon de parme, jambon à l'os supérieur, mortadelle, saucisson toscane, spianata, mignon, scudetto, coralini, saucisse italienne.
            </p>
        </div>
            
        <div class="divimgindex1">
            <h1 class="h1img">
                Fromage
            </h1>
            <img src="pexel/fromage.png" alt="" class="img-cat">
            <p class="paraimg">
                Mozzarella, Gorgonzola, Pecorino, Parmezan, Brousse, Crottin de chavignole, Emental, Comté, Fromage de chèvre, Roquefort, Saint-marcelin, Saint-félicien, Tome de savoie, Yaourt, Tiramisu, Fiadone.
            </p>
        </div>
           
    </section>    
    
    
    <div class="produit-recent">

  

    

    

    </div>
                   

    <h1 id="presentation">
        Notre histoire:
    </h1>
       
    <div id="articleindex">
        <article id="articleindex">
            <!--- ARTICLE --->
            Pasta di Giovanni fabrique artisanalement des pâtes fraîches et farcies est surtout connue pour ses différentes spécialités de gnocchis et raviolis frais, dont la plus ancienne remonte à 1990.

            Nous avons su garder un caractère artisanal (multiplicité des formats et farces), et évoluer en acquérant des outils de production moderne.

            Ambassadeur de choix de la gastronomie locale, la marque “Pasta di Giovanni” fleurie sur les cartes des grands restaurants et également dans les grands noms d’épicerie fine. Cette grande marque a su s’imposer comme la référence en pâtes fraîches originales et de qualité.

            Tant les raviolis que les pâtes fraîches sont composés : de pâtes à base de farine de blé et de semoule extra fine ainsi que des différentes farces conçues par nous-même. Cette composition lui donne une particularité qui réside de la rapidité de cuisson : 3 minutes dans l’eau bouillante, feu doux.

            La fabrication est effectuée chaque jour sauf le lundi (jour de fermeture de notre fabrique artisanale) afin de conserver la fraîcheur des produits, nous vous assurons une date limite de consommation de nos produits de 6 jours, car nous n’utilisons pas de produit conservateur.

            Nous vous laissons découvrir nos spécialités et produits de tradition et vous attendons dans notre magasin pour vous présenter les produits régionaux et de saison.

            Traitez vos papilles comme il se doit…
        </article>
     </div>

        <!--- FOOTER --->
        <footer>
            <?php require 'elements/footer.html'; ?>
        </footer>
    
</body>

</html>