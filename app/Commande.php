
<?php 

require_once 'setting/db.php';
require 'setting/data.php';

class Commande {

    public function __construct()
    {
        
        $this->db = new Db_connect();
        $this->db = $this->db->return_connect();
    }

    // public function valide(){


    //     if(isset($_POST['submit'])){

    //         $req = $this->db->preapre('INSERT INTO ')

    //     }
    // }


}