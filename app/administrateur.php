<?php
require_once('../setting/db.php');

class Admin
{

    public function __construct()
    {
        $this->db = new Db_connect();
        $this->db = $this->db->return_connect();
    }

    public function gestion_stock()
    {
        $req = ('SELECT * FROM produits ');
    }
}
