
<nav class='header-nav'>
  <div class="dropdown">
    <button><a href="index.php" class="home">Accueil</a></button>
    <div class="projects">
      <button>Produits</button>
      <ul>
        <li><a href="produits.php">Produits</a></li>
        <li><a href="#">cat2</a></li>
        <li><a href="#">cat3</a></li>
        <li><a href="#">cat4</a></li>
      </ul>
    </div>
    <div class="products">
    <?php  if(isset($_SESSION['id'])){

?>
      <button>Mon compte</button>
      <ul>
        <li><a href="profil.php">Modifier mon profil</a></li>
        <li><a href="#">test</a></li>
        <li><a href="#">test</a></li>
      </ul>
<?php } ?>
    </div>
    
    <?php  if(!isset($_SESSION['id'])){

    ?>
      <div class="btn-container">
      
      <button class="connexion-btn"><a href="connexion.php">Se connecter</a></button>
      </div>
      <div class="btn-container">
      
      <button class="connexion-btn"><a href="inscription.php">S'inscrire</a></button>
      </div>
      </div>
    <?php } ?>


    <div class="btn-container">
      
      <button class="connexion-btn"><a href="panier.php">Panier</a></button>
      </div>



  <?php if(isset($_SESSION)){

  ?>  <div class="btn-container">
  
  <button class="connexion-btn"><a href="setting/deconnexion.php">Deconnexion</a></button>
  <?php } ?>


    </div>
  </div>

</nav>