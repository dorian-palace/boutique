
<<<<<<< HEAD
<?php

require_once 'setting/db.php';
require 'setting/data.php';

class Commande
{

    public function __construct()
    {

=======
<?php 

require_once 'setting/db.php';

class Commande {

    public function __construct()
    {
        
>>>>>>> inscription
        $this->db = new Db_connect();
        $this->db = $this->db->return_connect();
    }

<<<<<<< HEAD
    public function valide()
    {
        if (isset($_POST['submit'])) {

            $facturation = secuData($_POST['adr_ftr']);
            $livraison = secuData($_POST['adr_liv']);
            $id_user = $_SESSION['id'];

            $req = 'INSERT INTO commande (adr_facturation, adr_livraison, id_utilisateur, date_commande) VALUES (?,?,?,now())';
            $stmt = $this->db->prepare($req);
            $stmt->execute(array(
                $facturation, $livraison, $id_user
            ));
            if ($stmt) {
                header('Location: confirmer.php');
            }

            // return $stmt;
        }
    }
}
=======
    // public function valide(){


    //     if(isset($_POST['submit'])){

    //         $req = $this->db->preapre('INSERT INTO ')

    //     }
    // }


}
>>>>>>> inscription
