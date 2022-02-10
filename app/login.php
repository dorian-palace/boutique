<?php
require_once('../setting/db.php');

class Login
{
    private $login;
    private $password;
    private $bdd;

    public function __construct($login, $password)
    {
        $this->bdd = Database::connexion_db();
        $this->login = $login;
        $this->password = $password;
    }

    public static function Connexion($login, $password, $bdd)
    {
        $login = $_POST['login'];
        $req = "SELECT * FROM utilisateurs WHERE login = :login";
        $prepare = $bdd->prepare($req);

    }
}
