<?php 


require  'setting/db.php';
require 'form.php';




class User extends Form {


    
    private $login;
    private $password;
    private $mail;

    public function __construct(){

        $this->db = New Db_connect();
        $this->db = $this->db->return_connect();
         // si isset prend a valeur de POST['login']  sinnon null
        $this->login = isset($_POST['login']) ? $_POST['login'] : null;;
        $this->password = isset($_POST['password']) ? $_POST['login'] : null;
        $this->mail = isset($_POST['email']) ? $_POST['email'] : null;

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

    public function start(){

        if(!isset($this->login,$this->password,$this->mail) || empty($this->login) || empty($this->password) || empty($this->email)){

            $msg = 'veuillez remplir tout les champs';
            
        }else{

            $insert = $this->db->prepare('INSERT INTO utilisateurs(login,email,password,id_droit,id_adresse)VALUES(?,?,?,?,?)');

            $hashed_password = password_hash($this->password, PASSWORD_BCRYPT);

            if($insert->execute(array($this->login,$this->mail,$hashed_password,1,1))) {
            
                if(filter_var($this->mail, FILTER_VALIDATE_EMAIL)){
    
                    
                    return $insert;
                    $msg = 'incription validé';
                }

            }

            
        }
    }



    public function displayMessage(){

        if(isset($msg)){

            return $msg;
        }
    }

    public function createForm(){

        $form = new Form;

        $form->debutForm('post','#',['class'=>'formUser'])
                ->ajoutLabelFor('email', 'E-mail :',['class' => 'labelForm'])
                ->ajoutinput('email', 'email', 'votre email', ['class'=> 'inputForm','require'=>true])
                ->ajoutLabelFor('login', 'Nom d\'utilisateur :',['class'=> 'labelForm'])
                ->ajoutInput('text','login','votre login',['require' => true, 'class'=> 'inputForm'])
                ->ajoutLabelFor('pass','Mot de passe :',['class' => 'LabelForm'])
                ->ajoutInput('password','password','Entrez votre mot de passe ',['class' => 'inputForm', 'require' => true])
                ->ajoutLabelFor('pass','Confirmez le mode de passe :',['class'=> 'labelForm'])
                ->ajoutInput('password', 'conf_password','Confirmez le mot de passe',['class' => 'inputForm'])
                ->ajoutBoutton('valider', ['class' => 'btnForm'])
                
                ->finForm();

                echo $form->create();
                
    }







}