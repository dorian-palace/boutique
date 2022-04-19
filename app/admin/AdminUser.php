<?php
require_once('setting/db.php');
// require('../../setting/data.php');
class AdminUser
{
    public function __construct()
    {
        $this->db = new Db_connect();
        $this->db = $this->db->return_connect();

        if (isset($_GET['page']) && !empty($_GET['page'])) {
            $this->page = (int) strip_tags($_GET['page']); //strip_tags — Supprime les balises HTML et PHP d'une chaîne
        } else {
            $this->page = 1;
        }

        $this->limite = 5;
        $this->debut = ($this->page - 1) * $this->limite;

        // $data = secuData();
    }

    // public function idAdmin(){
    //     $req = 'SELECT id FROM droits';
    //     $query = $this->db->query($req);
    //ID ADMIN A RECUPERER POUR ACCES PAGE ADMIN

    // }

    public function getUser()
    {
        //récupère les infos des utilisateurs
        $req = "SELECT * FROM utilisateurs LIMIT $this->limite OFFSET $this->debut";
        $stmt = $this->db->prepare($req);
        // $stmt->bindValue('limite', $this->limite, PDO::PARAM_INT);
        // $stmt->bindValue('debut', $this->debut, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }

    public function updateUser()
    {
        // Modifie les informations et droit de l'utilisateurs
        if (isset($_POST['update'])) {

            $new_id_droits = secuData($_POST['new_droits']);
            $new_login =  secuData($_POST['new_login']);
            $new_email = secuData($_POST['new_email']);
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
}
