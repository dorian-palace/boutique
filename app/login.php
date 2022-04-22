<?php
<<<<<<< HEAD
require_once('setting/db.php');
=======

>>>>>>> inscription

class Login
{
    private $login;
    private $password;

    function __construct($login, $password)
    {
        $this->db = new Db_connect();
        $this->db = $this->db->return_connect();
        $this->login = $login;
        $this->password = $password;
    }

    public static function Connexion($login, $password)
    {
        $login = $_POST['login'];
        $req = "SELECT * FROM utilisateurs WHERE login = :login";
        $prepare = $this->db->prepare($req);
        $prepare->execute(array(
            ":login" => "$login"
        ));
        $result = $prepare->fetch();

        return $result;
    }
}
