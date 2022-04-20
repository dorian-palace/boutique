<?php
require_once('setting/db.php');

//Instancier la class dans produits.php
//recupere l'ID produit depuis la vue GET ID
//id user = $_session
//



class avisProduit
{

    public $id_produits;
    public $userId;

    public function __construct()
    {
        $this->db = new Db_connect();
        $this->db = $this->db->return_connect();

        if (isset($_GET['page']) && !empty($_GET['page'])) {
            $this->page = (int) strip_tags($_GET['page']); //strip_tags — Supprime les balises HTML et PHP d'une chaîne
        } else {
            $this->page = 1;
        }

        $this->limite = 5;
        $this->debut = ($this->page - 1) * $this->limite;
    }

    public function newAvis()
    {

         $get_id = $_GET['produits'];
        //SELECT * PRODUITS POUR L'ID DES PRODUITS
        $produits = $this->db->prepare('SELECT * FROM produits WHERE = ? ');
        $produits->execute(array($get_id));
        $resProduits = $produits->fetchAll();
        $id_produit = $resProduits['id'];
        $user_id = $_SESSION['id'];
        
        return $resProduits;

        // $commentaire = $_POST['//////'];




        // $req = $this->db->prepare("INSERT INTO avis (commentaire, date, id_produit, id_utilisateur) VALUES ($commentaire,now(),$id_produit,$user_id)"); //INSERT INTO avis (commentaire, date, id_produit, id_utilisateur) VALUES (1,now(),2,1) marche sur SQL
        // $req->execute();



    }
}
