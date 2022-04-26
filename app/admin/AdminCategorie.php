<?php
require_once('setting/db.php');
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
        return $stmt;
    }
}
