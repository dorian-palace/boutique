<?php
// require_once("../setting/db.php") ;

include(dirname(__DIR__).'/setting/db.php');


class Search
{

    public function __construct()
    {
        $this->db = new Db_connect();
        $this->db = $this->db->return_connect();
    }

  

    public function startSearch($search)
    {
        $req = "SELECT * from produits WHERE titre like '$search%'";
        $req = $this->db->query($req);
        $stmt = $req->fetchAll();
        return $stmt;
    }

    public function searchReq($search)
    {
        $req = "SELECT id, titre from produits WHERE titre LIKE '%$search%'";
        $req = $this->db->query($req);
        $stmt = $req->fetchAll();

        return $stmt;
    }

    public function getAll()
    {
        $id = $_GET['id'];
        $req = "SELECT * from produits WHERE id = ?";
        $req = $this->db->prepare($req);
        $req->execute(array(
            $id
        ));
        $stmt = $req->fetchAll();
        return $stmt;
    }
}
