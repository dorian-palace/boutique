<?php
require_once('setting/db.php');
class AdminRegion
{

    public $new_login;
    public $new_email;
    public $new_id_droits;
    public $limite;
    // public $debut = 1;

    public function __construct()
    {
        $this->db = new Db_connect();
        $this->db = $this->db->return_connect();

        // $this->limite = 5;
        // $this->de    but = $debut;
        if (isset($_GET['page']) && !empty($_GET['page'])) {
            $this->page = (int) strip_tags($_GET['page']); //strip_tags — Supprime les balises HTML et PHP d'une chaîne
        } else {
            $this->page = 1;
        }

        $this->limite = 5;
        $this->debut = ($this->page - 1) * $this->limite;
    }

    public function newRegions()
    {
        if (isset($_POST['new_regions'])) {

            $name_regions = $_POST['regions'];

            $req_exist = "SELECT nom_region FROM regions WHERE nom_region = ? LIMIT :limite OFFSET :debut ";
            $stmt = $this->db->prepare($req_exist);
            $stmt->bindValue('limite', $this->limite, PDO::PARAM_INT);
            $stmt->bindValue('debut', $this->debut, PDO::PARAM_INT);
            $stmt->execute(array(
                $name_regions
            ));
            $count = $stmt->rowCount();

            if ($count == 0) {

                $req = "INSERT INTO regions (nom_region) VALUES ('$name_regions')";
                $query = $this->db->query($req);
            } else {
                $msg = 'categories éxiste déjà';
            }
        }
    }

    public function getRegions()
    {
        $req = 'SELECT * FROM regions LIMIT :limite OFFSET :debut';
        $stmt = $this->db->prepare($req);
        $stmt->bindValue('limite', $this->limite, PDO::PARAM_INT);
        $stmt->bindValue('debut', $this->debut, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }

    public function deleteRegions($id)
    {
        $req = 'DELETE FROM regions WHERE id = ?';
        $prepare = $this->db->prepare($req);
        $prepare->execute(array(
            $id
        ));
        return $prepare;
    }
}
