<?php
require_once('./setting/db.php');

class Commande
{

    public function __construct()
    {
        $this->db = new Db_connect();
        $this->db = $this->db->return_connect();
    }

    
}
