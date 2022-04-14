<?php
require_once('../setting/db.php');
class Search
{

    public function __construct()
    {
        $this->db = new Db_connect();
        $this->db = $this->db->return_connect();
    }

    public function Search()
    {
        
        $req = 'SELECT * FROM produits WHERE titre LIKE ? OR description LIKE ? ';
        $stmt = $this->db->prepare($req);
        $stmt->execute(["%" . $_POST["search"] . "%", "%" . $_POST["search"] . "%"]);
        // $results = $stmt->fetchAll();
        // var_dump($results);
        // if(isset($results['id'])){

        // }
        return $stmt;
    }
}
