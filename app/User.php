<?php 


require  'setting/db.php';
require 'form.php';




class User  {


    
    private $login;
    private $password;
    private $email;

    public function __construct($login,$password,$email,$confpassword){

        $this->db = New Db_connect();
        $this->db = $this->db->return_connect();
         // si isset prend a valeur de POST['login']  sinnon null
        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
        $this->confpassword = $confpassword;

    }

    public function sigup(){

        $insert = $this->db->prepare('INSERT INTO utilisateurs(login,email,password,id_droits,id_adresse)VALUES(?,?,?,1,1)');

        $insert->execute(array($this->login,$this->email,$this->password));
    
        

        return $insert;
            
            

            
    


    }
    
    public function signup (){

    

        $insert = $this->db->prepare('INSERT INTO utilisateurs(login,email,password,id_droits,id_adresse)VALUES(?,?,?,"1","1")');
        
        $hashed_password = password_hash($this->password, PASSWORD_BCRYPT);
        
        if($insert->execute(array( $this->login, $this->email, $hashed_password))){
            
            return $insert;
            
        }
        
    }

    public function start(){

        if(!isset($this->login,$this->password,$this->mail) || empty($this->login) || empty($this->password) || empty($this->email)){

            $msg = 'veuillez remplir tout les champs';
            
        }else{

            $insert = $this->db->prepare('INSERT INTO utilisateurs(login,email,password,id_droit,id_adresse)VALUES(?,?,?,"1","1")');

            $hashed_password = password_hash($this->password, PASSWORD_BCRYPT);

            if($insert->execute(array($this->login,$this->email,$hashed_password))) {
            
                if(filter_var($this->email, FILTER_VALIDATE_EMAIL)){
    
                    
                    return $insert;
                    $msg = 'incription validée';
                }

            }

            
        }
    }

    public function confPassword(){

            if($this->password == $this->confpassword){

                return true;
            }

            return false;
    }

    public function valideEmail(){

        if(filter_var($this->email, FILTER_VALIDATE_EMAIL)){

            return true;
        }

        return false;
    }

    public function userExist(){

        $stmt = $this->db->prepare("SELECT * FROM utilisateurs");
        $stmt->execute();

        $row = $stmt->rowcount();

        if($row < 0){

            return false;

        }
        return true;

        
    }

    public function confirmSingup(){


        if($this->confPassword()){

            if($this->valideEmail()){

                if($this->userExist()){

                    
                    $this->signup();
                    
                    $this->displayMessage('inscription validée');
                }else{

                    $this->displayMessage('utilisateur déjà pris');
                    
                }
            }else{

                $this->displayMessage('email non valide');
            }
       }else{

        $this->displayMessage('les mot de passe ne correspondent pas');
       }

    }


    public function displayMessage($msg){

        if(isset($msg)){

            echo  $msg;
        }
    }

    





}