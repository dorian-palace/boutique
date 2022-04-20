<?php 
require_once 'setting/db.php';

class Produits{



    public function __construct()
    {
        $this->db = new Db_connect();
        $this->db = $this->db->return_connect();

        
    }

    public function  getProduits(){

        $produits = $this->db->prepare('SELECT * FROM produits');

        $produits->execute();

    


        return $produits;




    }

    public function getProduitsId(){
        

        $produits_id = $_GET['produits'];
        
        $produits = $this->db->prepare('SELECT * FROM produits WHERE id = ?');

        $produits->execute($produits_id);

       $res =  $produits->fetch();

        return $res;
    }

    public function categorie(){

        $req_categories = $this->db->prepare("SELECT * FROM categories");
        $req_categories->execute();
        $res = $req_categories->fetch();

        return $res;
            

        
    }
    
    public function avis(){

            if(isset($_GET['produits'])){

               
                $get_produits = $_GET['produits'];
                
                $select = $this->db->prepare('SELECT * FROM avis INNER JOIN produits on produits.id = avis.id_produit INNER JOIN utilisateurs ON avis.id_utilisateur = utilisateurs.id  WHERE produits.id = ?  ');
                $select->execute(array($get_produits));
                
                $res = $select;
                
                return $res;
            }


    



    }
       
    
    public function addAvis($commentaire, $id_produit,$id_utilisateur){

        

       $insert = $this->db->prepare('INSERT INTO avis (commentaire,date,id_produit,id_utilisateur)VALUES(?,now(),?,?)');

       $insert->execute(array($commentaire, $id_produit,$id_utilisateur,));
        

        return $insert;

    }


}

