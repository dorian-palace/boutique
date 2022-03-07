<?php
require_once('setting/db.php');
class AdminRegion
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

    public function newRegions()
    {
        if (isset($_POST['new_regions'])) {

            $name_regions = $_POST['regions'];

            $req_exist = 'SELECT nom_region FROM regions WHERE nom_region = ?';
            $stmt = $this->db->prepare($req_exist);
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
        $req = 'SELECT * FROM regions';
        $query = $this->db->query($req);
        return $query;
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
