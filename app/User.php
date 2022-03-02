<?php
require_once  'setting/db.php';
require 'form.php';

class User
{

    private $login;
    private $password;

    public function __construct()
    {

        $this->db = new Db_connect();
        $this->db = $this->db->return_connect();
        $login = $this->login;
        $password = $this->password;
    }

    public function signup($email)
    {

        $insert = $this->db->prepare('INSERT INTO utilisateurs(login,email,password,id_droit,id_adresse)VALUES(?,?,?,?,?)');
        $hashed_password = password_hash($this->password, PASSWORD_BCRYPT);

        if ($insert->execute(array($this->login, $email, $hashed_password, 1, 1))) {

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                return $insert;
            }
        }
    }

    public function createForm()
    {

        $form = new Form;
        $form->debutForm()
            ->ajoutLabelFor('email', 'E-mail :')
            ->ajoutinput('email', 'email', 'votre email', ['class => form-control'])
            ->ajoutLabelFor('login', 'nom d\'utilisateur:')
            ->ajoutInput('text', 'login', 'votre login', ['require' => true, 'class' => 'form-control'])
            ->ajoutLabelFor('pass', 'Mot de passe',)
            ->ajoutInput('password', 'password', '', ['class' => 'from-control', 'require' => true])
            ->ajoutLabelFor('pass', 'Confirmer le mode de passe')
            ->ajoutInput('password', 'conf_password', '')
            ->ajoutBoutton('valider', ['class' => 'btn btn-primary'])
            ->finForm();

        echo $form->create();
    }
}
