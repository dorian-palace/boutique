<?php
require_once('setting/db.php');
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
    }

    public function getUser()
    {
        //récupère les infos des utilisateurs
        $req = 'SELECT * FROM utilisateurs LIMIT :limite OFFSET :debut';
        $stmt = $this->db->prepare($req);
        $stmt->bindValue('limite', $this->limite, PDO::PARAM_INT);
        $stmt->bindValue('debut', $this->debut, PDO::PARAM_INT);
        return $stmt;
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

}