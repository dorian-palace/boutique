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



}