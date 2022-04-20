<?php 


require_once 'setting/db.php';




class User {


    
    private $login;
    private $password;
    private $confpassword;
    private $email;

    public function __construct($login,$password,$confpassword,$email){

        $this->db = new Db_connect();
        $this->db = $this->db->return_connect();
    
        $this->login =  $login;
        $this->password = $password;
        $this->email = $email;
        $this->confpassword = $confpassword;

    }

    public function signup(){

        $insert = $this->db->preapre("INSERT INTO utilisateur(id_adresse,id_droits,login,password,email)VALUES(1,1,?,?,?");


        if($insert->execute(array($this->login,$this->password,$this->email))){

            return $insert;
            
        };

    }

}