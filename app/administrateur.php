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

        if (isset($_POST['new_categorie'])) {

            $name_categorie = $_POST['name_categorie'];
            $req_exist = 'SELECT nom_categorie FROM categories WHERE nom_categorie = ?';
            $stmt = $this->db->prepare($req_exist);
            $stmt->execute(array(
                $name_categorie
            ));
            $count = $stmt->rowCount();

            if ($count == 0) {
                $req = "INSERT INTO categories (nom_categorie) VALUES ('$name_categorie')";
                $query = $this->db->query($req);
            } else {
                $msg = 'categories éxiste déjà';
            }
        }
    }

    public function deleteCategorie($delete)
    {
        $req = 'DELETE FROM categories WHERE id = ?';
        $prepare = $this->db->prepare($req);
        $prepare->execute(array(
            $delete
        ));
        return $prepare;
        $msg = 'categorie supprimer';
    }

    public function getCategorie()
    {
        $req = 'SELECT * FROM categories';
        $query = $this->db->query($req);
        
        //$fetch = $query->fetch();
        return $query;
    }

    public function newProduits()
    {
        $select = 'SELECT * from categories';
        $query = $this->db->query($select);
        $fetch = $query->fetch();
        
        return $fetch;
    }
}
