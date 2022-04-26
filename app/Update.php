<?php 

require_once 'User.php';

class Update{

    private $new_login;
    private $new_password;
    private $new_email;
    private $conf_new_password;

    public function __construct()
    {
        $this->db = new Db_connect();
        $this->db = $this->db->return_connect();
  
    }

        public function update(){

           if(isset($_POST['valider'])){

            $new_login= $_POST['new_login'];
            $new_password = $_POST['new_password'];
            $conf_new_password = $_POST['conf_new_password'];
            $new_email = $_POST['new_email'];
            $id_utilisateur = $_SESSION['id'];

                

               $stmt = $this->db->prepare(" UPDATE utilisateurs SET login= ? , password = ? ,email =? WHERE id= ? ");
               
                
               
               $new_password = password_hash($new_password, PASSWORD_BCRYPT);

              
                 $stmt->execute(array($new_login, $new_password, $new_email ,$id_utilisateur ));
// 
                if($stmt){
                    
                    $_SESSION['login'] = $new_login;
                    $_SESSION['email'] = $new_email;
               }
               return false;
            }

                
        
    }


      

}