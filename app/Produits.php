<?php
require_once 'setting/db.php';

class Produits
{



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

    public function  getProduits()
    {

        $produits = $this->db->prepare("SELECT * FROM produits LIMIT $this->limite OFFSET $this->debut");

        $produits->execute();




        return $produits;
    }

    public function getProduitsId()
    {


        $produits_id = $_GET['produits'];

        $produits = $this->db->prepare("SELECT * FROM produits WHERE id = ? LIMIT $this->limite OFFSET $this->debut ");

        $produits->execute($produits_id);

        $res =  $produits->fetch();
    }




    public function categorie()
    {

        $req_categories = $this->db->prepare("SELECT * FROM categories LIMIT $this->limite OFFSET $this->debut");


        $req_categories = $this->db->prepare("SELECT * FROM categories");
        $req_categories->execute();
        $res = $req_categories->fetch();

        return $res;
    }

    public function sous_categorie(){

            
         
            $req = $this->db->prepare("SELECT titre, description, prix,image,id_sous_categorie,produits.id AS id_produits
            , categories.nom_categorie , categories.id AS categId , sous_categorie.nom_sous_categorie
            FROM Produits 
            INNER JOIN sous_categorie on produits.id_sous_categorie = sous_categorie.id 
            INNER JOIN categories ON sous_categorie.id_categorie = categories.id 
            ");
            $req->execute();
            $data = $req->fetchAll();
            return $data;

    }

    public function avis()
    {

        if (isset($_GET['produits'])) {


            $get_produits = $_GET['produits'];

            $select = $this->db->prepare('SELECT * FROM avis INNER JOIN produits on produits.id = avis.id_produit INNER JOIN utilisateurs ON avis.id_utilisateur = utilisateurs.id  WHERE produits.id = ?  ');
            $select->execute(array($get_produits));

            $res = $select;

            return $res;
        }
    }


    public function addAvis($commentaire, $id_produit, $id_utilisateur)
    {



        $insert = $this->db->prepare('INSERT INTO avis (commentaire,date,id_produit,id_utilisateur)VALUES(?,now(),?,?)');

        $insert->execute(array($commentaire, $id_produit, $id_utilisateur,));


        return $insert;
    }

    public function pagiProduits()
    {
        $req = "SELECT count(*) FROM produits";
        $stmt = $this->db->query($req);
        return $stmt;
    }

    public function pagiCategorie()
    {

        $req = "SELECT count(*) FROM categories";
        $stmt = $this->db->query($req);
        return $stmt;
    }


}
