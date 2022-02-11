<?php
require_once('setting/db.php');

class Administrateur
{

    public $new_login;
    public $new_email;
    public $new_id_droits;


    public function __construct()
    {
        $this->db = new Db_connect();
        $this->db = $this->db->return_connect();
        $new_login = $this->new_login;
        $new_email = $this->new_email;
        $new_id_droits = $this->new_id_droits;
    }

    public function get_User()
    {
        $req = 'SELECT * FROM utilisateurs';
        $query = $this->db->query($req);
        $fetch = $query->fetch();
        return $fetch;
    }

    public function upgrade_Droits()
    {
        // $new_id_droits = $_POST['new_droits'];
        // $new_login = $_POST['new_login'];
        // $new_email = $_POST['new_email'];
        // $id_user = $_POST['']
        // $req = 'UPDATE utilisateurs SET id_droits = ?, login = ?, email = ? WHERE id = ?';
        // $prepare = $this->db->prepare($req);
        // $prepare->execute(array(
        //     $new_id_droits, $new_login, $new_email, $id_user
        // ));
    }

    public function delete_User($delete)
    {

        $req = 'DELETE FROM utilisateurs WHERE id = ?';
        $prepare = $this->db->prepare($req);
        $prepare->execute(array(
            $delete
        ));
        return $prepare;
        $msg = 'Utilisateurs supprimer';
    }



    public function gestion_Stock()
    {
        $req = ('SELECT * FROM produits ');
    }

    public function new_Categorie()
    {
    }

    public function upgrade_Categorie()
    {
    }
}
