<?php
require_once('setting/db.php');

class Administrateur
{

    public function __construct()
    {
        $this->db = new Db_connect();
        $this->db = $this->db->return_connect();
    }

    public function get_User()
    {
        $req = 'SELECT * FROM utilisateurs';
        $query = $this->db->query($req);
        $fetch = $query->fetch();
        return $fetch;
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

    public function upgrade_Droits()
    {
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
