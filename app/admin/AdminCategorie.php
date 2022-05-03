<?php
require_once('setting/db.php');
require_once('setting/data.php');

class AdminCategorie
{

    public $new_login;
    public $new_email;
    public $new_id_droits;
    public $limite;
    public $debut;

    public function __construct()
    {
        $this->db = new Db_connect();
        $this->db = $this->db->return_connect();
    }

    public function newCategorie()
    {

        if (isset($_POST['new_categorie'])) {

            $name_categorie = secuData($_POST['name_categorie']);

            $req_exist = 'SELECT nom_categorie FROM categories WHERE nom_categorie = ? ';
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

    public function deleteCategorie($id)
    {
        $req = 'DELETE FROM categories WHERE id = ?';
        $prepare = $this->db->prepare($req);
        $prepare->execute(array(
            $id
        ));
        return $prepare;
        $msg = 'categorie supprimer';
    }

    public function getCategorie()
    {
        $req = 'SELECT * FROM categories ';
        $stmt = $this->db->prepare($req);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    public function newSousCat()
    {

        if (isset($_POST['new_sousCat'])) {

            $name_sousCat = secuData($_POST['name_sousCat']);
            $id_categorie = secuData($_POST['selectCat']);
            var_dump($id_categorie);
            var_dump($name_sousCat);

            $req_exist = "SELECT nom_sous_categorie FROM sous_categorie WHERE nom_sous_categorie = ?";
            $stmt = $this->db->prepare($req_exist);
            $stmt->execute(array(
                $name_sousCat
            ));
            $count = $stmt->rowCount();

            if ($count === 0) {

                $req = "INSERT INTO sous_categorie (id_categorie, nom_sous_categorie) VALUES (?,?) ";
                $stmt = $this->db->prepare($req);
                $stmt->execute(array(
                    $id_categorie, $name_sousCat
                ));

            }
        }
    }

    public function getSousCat(){

        $req = 'SELECT * FROM sous_categorie';
        $query = $this->db->query($req);
        $data = $query->fetchAll();
        return $data;
    }

    public function deleteSousCat($id){

        $req = 'DELETE FROM sous_categorie WHERE id = ?';
        $stmt = $this->db->prepare($req);
        $stmt->execute(array(
            $id
        ));
        return $stmt;
    }
}
