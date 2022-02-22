<?php 

require_once 'setting/db.php';
class Panier{

    public function __construct()
    {
        
        $this->db = new Db_connect();
        $this->db = $this->db->return_connect();
    }
    
    public function getProduits(){

        $select = $this->db->prepare('SELECT * FROM produits');
        $select->execute();
        $res = $select->fetch();
    }

}