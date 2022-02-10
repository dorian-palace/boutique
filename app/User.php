<?php 

require 'setting/db.php';


class User{


    
    private $login;
    private $password;


    public function __construct(){

        $this->db = New Db_connect();
        $this->db = $this->db->return_connect();
        $login = $this->login;
        $password = $this->password;

    }

    public function signup($email){

        $insert = $this->db->prepare('INSERT INTO utilisateurs(login,email,password,id_droit,id_adresse)VALUES(?,?,?,?,?)');

        $hashed_password = password_hash($this->password, PASSWORD_BCRYPT);

      

        if($insert->execute(array($this->login,$email,$hashed_password,1,1))) {
            
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){


                return $insert;
            }
        }


    }
    




}