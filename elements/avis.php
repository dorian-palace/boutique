<?php require_once 'app/Produits.php';





$produits = new Produits();



$avis = $produits->avis();



if (isset($_SESSION['id'])) {

  $id_utilisateur = $_SESSION['login'];

  
      if (isset($_POST['poster'])) {

    
        if(!empty($_POST['avis_produit'])){

          
          
          $id_utilisateur = $_SESSION['id'];
          $id_produits =  $_GET['produits'];
          $commentaire = $_POST['avis_produit'];
          
          $produits->addAvis($commentaire,$id_produits,$id_utilisateur);
          echo "<meta http-equiv='refresh' content='0'>";
        }
      

    

  }
}

// else{

//   echo 'veuillez vous connecter';
// }

?> <h3 id='avis-clients'> Avis des clients :</h3>
    
    <?php 
    $res = $avis->fetchALL();

foreach($res as $result){
  
  // var_dump($result);

  
  ?>

<div class="container mt-2 ">
  <div class="row d-flex justify-content-center">
    <div class="col-md-8">
      <div class="headings d-flex justify-content-between align-items-center mb-3">
        
        </div>
        <div class="card p-3 ">
          <div class="d-flex justify-content-between align-items-center">
            <div class="user d-flex flex-row align-items-center"> Posté par <span> <small class="font-weight-bold text-primary"><?=$result['login']?></small> </span> </div> <small><?=$result['date']?></small>
          </div>
          <div class="action d-flex justify-content-between mt-2 align-items-center">
            <div class="reply px-4"> <span class="dots"></span>  <span class="dots"></span> <small><?=$result['commentaire']?></small> </div>
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



}

 
if(empty($res)){

  echo '<div id="avis-message"> pas encore d\'avis, ajouter en un !   </div>
  ' ;
 
   }



?>  




<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rediger votre avis</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="#" method="post" >

          <textarea name="avis_produit" id="avis" cols="40" rows="10" class="container-fluid">

          </textarea>

          <input type="submit" data-toggle="modal" class="btn btn-secondary" data-target="exampleModalLabel" name="poster">
          
        </form>
      </div>
      <div class="modal-footer">

       
      </div>
    </div>
  </div>
</div>