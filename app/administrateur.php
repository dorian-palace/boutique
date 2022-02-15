<?php
require_once('setting/db.php');
require_once('User.php');
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

    public function getUser()
    {
        //récupère les infos des utilisateurs
        $req = 'SELECT * FROM utilisateurs';
        $query = $this->db->query($req);
        return $query;
    }

    public function updateUser()
    {
        // Modifie les informations et droit de l'utilisateurs
        if (isset($_POST['update'])) {
            $new_id_droits = $_POST['new_droits'];
            $new_login = $_POST['new_login'];
            $new_email = $_POST['new_email'];
            $id_user = $_POST['update'];
            $req = 'UPDATE utilisateurs SET id_droits = ?, login = ?, email = ? WHERE id = ?';
            $prepare = $this->db->prepare($req);
            $prepare->execute(array(
                $new_id_droits, $new_login, $new_email, $id_user
            ));
        }
    }

    public function deleteUser($delete)
    {
        // supprime l'utilisateurs
        $req = 'DELETE FROM utilisateurs WHERE id = ?';
        $prepare = $this->db->prepare($req);
        $prepare->execute(array(
            $delete
        ));
        return $prepare;
        $msg = 'Utilisateurs supprimer';
    }

    public function gestionStock()
    {
        $req = ('SELECT * FROM produits ');
    }

    public function newCategorie()
    {
    }
}
