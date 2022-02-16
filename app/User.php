<?php 


require  'setting/db.php';



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

    public function checkUserSignup(){

        $stmt = $this->db->prepare("SELECT * FROM utilisateurs");
        $stmt->execute();

        $row = $stmt->rowcount();

        if($row < 0){

            return false;
        }

        return true;

        
    }

    public function confirmSingup(){

    if($this->emptyInput()){

        if($this->confPassword()){
            
            if($this->valideEmail()){
                
                if($this->checkUserSignup()){
                    
                    
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
    }else{

        $this->displayMessage('Veuillez remplir tous les champs');
    }

    }

    public function connect(){

        $stmt = $this->db->prepare("SELECT * FROM Utilisateurs WHERE login = ?");
        $stmt->execute(array($this->login));
        $row = $stmt->rowCount();

        if($row == 1 ){

            $userinfo = $stmt->fetch();

            $_SESSION['login'] = $userinfo['login'];
            $_SESSION['id'] = $userinfo['id']; 


            password_verify($this->password, $userinfo['password']);

            return true;
        }


        
        return false;
    }

    public function checkUserLogin(){

        $stmt = $this->db->prepare("SELECT * FROM utilisateurs WHERE login = ?");
        $stmt->execute(array($this->login));

        $row = $stmt->rowcount();

        if($row == 1){

            return true;
        }
        
        return false;

        
    }

    public function ConfirmConnect(){

    if($this->emptyInput()){

        if($this->confPassword()){
            
            if($this->valideEmail()){
                
                if($this->checkUserLogin()){
                    
                    $this->connect();
                    
                    $this->displayMessage('vous êtes connecté');    
                }else{
                    
                    $this->displayMessage('L\'utilisateur n\'existe pas, veuillez vous inscrire'); 
                }
            }else{
                
                $this->displayMessage('email non valide');
            }
        }else{
            
            $this->displayMessage('les mot de passe ne correspondent pas');
        }
    }else{

        $this->displayMessage('Veuillez remplir tout les champs');
    }
        
    }

public function emptyInput(){

    if(!empty($this->login)|| !empty($this->password) ||!empty($this->email) || !empty($this->confpassword)){

        return true;
    }

    return false;
}


    public function displayMessage($msg){

        if(isset($msg)){

            echo $msg;
        }
    }

    





}
