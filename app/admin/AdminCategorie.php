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

        // if (isset($_GET['page']) && !empty($_GET['page'])) {
        //     $this->page = (int) strip_tags($_GET['page']); //strip_tags — Supprime les balises HTML et PHP d'une chaîne
        // } else {
        //     $this->page = 1;
        // }

        // $this->limite = 5;
        // $this->debut = ($this->page - 1) * $this->limite;
    }

    public function newCategorie()
    {

        if (isset($_POST['new_categorie'])) {

            $name_categorie = $_POST['name_categorie'];

            $req_exist = 'SELECT nom_categorie FROM categories WHERE nom_categorie = ? ';
            $stmt = $this->db->prepare($req_exist);
            // $stmt->bindValue('limite', $this->limite, PDO::PARAM_INT);
            // $stmt->bindValue('debut', $this->debut, PDO::PARAM_INT);
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
        // $stmt->bindValue('limite', $this->limite, PDO::PARAM_INT);
        // $stmt->bindValue('debut', $this->debut, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }
}
