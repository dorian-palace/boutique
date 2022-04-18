<?php require_once 'app/Produits.php';





$produits = new Produits();

$avis = $produits->avis();



if (isset($_SESSION['id'])) {

  $id_utilisateur = $_SESSION['login'];


  if (isset($_POST['poster'])) {

    


      
      $avis = $_POST['avis'];
      $res = $avis->fetch();
      
      $id_utilisateur = $_SESSION['id'];
      $id_produits =  $res['id_produits'];
      $id_categorie = $res['id_categorie'];

      $produits->addAvis($id_utilisateur,$id_produits, $id_categorie );
      
    
    

  }
}else{

  echo 'veuillez vous connecter';
}

?> <h3> Avis des clients :</h3>
    

  <?php 

while( $res = $avis->fetch()){

  
  ?>

<div class="container mt-5">
  <div class="row d-flex justify-content-center">
    <div class="col-md-8">
      <div class="headings d-flex justify-content-between align-items-center mb-3">
               
        
        </div>
        <div class="card p-3">
          <div class="d-flex justify-content-between align-items-center">
            <div class="user d-flex flex-row align-items-center"> Posté par <span> <small class="font-weight-bold text-primary"><?=$res['login']?></small> </span> </div> <small><?=$res['date']?></small>
          </div>
          <div class="action d-flex justify-content-between mt-2 align-items-center">
            <div class="reply px-4"> <span class="dots"></span>  <span class="dots"></span> <small><?=$res['commentaire']?></small> </div>
            <div class="icons align-items-center"> <i class="fa fa-star text-warning"></i> <i class="fa fa-check-circle-o check-icon"></i> </div>
          </div>
        </div>
        
      </div>
      
                </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    <?php
  };


?>




<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rediger votre avis</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="produits.php?produits=<?=$res['id']?>" method="post" >

          <textarea name="avis_produit" id="avis" cols="40" rows="10" class="container-fluid">

          </textarea>

         <a href="produits.php?produits=<?=$res['id']?>"> <button type="button" class="btn btn-primary" name="poster" data-bs-toggle="Modal">Valider</button></a>

        </form>
      </div>
      <div class="modal-footer">

          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        </form>
      </div>
    </div>
  </div>
</div>