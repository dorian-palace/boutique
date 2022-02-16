<?php


require  'setting/db.php';




class User
{



    private $login;
    private $password;
    private $email;

    public function __construct($login, $password, $email, $confpassword)
    {

        $this->db = new Db_connect();
        $this->db = $this->db->return_connect();

        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
        $this->confpassword = $confpassword;
    }

    public function sigup()
    {

        $insert = $this->db->prepare('INSERT INTO utilisateurs(login,email,password,id_droits,id_adresse)VALUES(?,?,?,1,1)');

        $insert->execute(array($this->login, $this->email, $this->password));



        return $insert;
    }

    public function signup()
    {



        $insert = $this->db->prepare('INSERT INTO utilisateurs(login,email,password,id_droits,id_adresse)VALUES(?,?,?,"1","1")');

        $hashed_password = password_hash($this->password, PASSWORD_BCRYPT);

        if ($insert->execute(array($this->login, $this->email, $hashed_password))) {

            return $insert;
        }
    }



    public function confPassword()
    {

        if ($this->password == $this->confpassword) {

            return true;
        }

        return false;
    }

    public function valideEmail()
    {

        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {

            return true;
        }

        return false;
    }

    public function checkUserSignup()
    {

        $stmt = $this->db->prepare("SELECT * FROM utilisateurs");
        $stmt->execute();

        $row = $stmt->rowcount();

        if ($row < 0) {

            return false;
        }

        return true;
    }

    public function confirmSingup()
    {

        if ($this->emptyInput()) {

            if ($this->confPassword()) {

                if ($this->valideEmail()) {

                    if ($this->checkUserSignup()) {


                        $this->signup();

                        $this->displayMessage('inscription validée');
                    } else {

                        $this->displayMessage('utilisateur déjà pris');
                    }
                } else {

                    $this->displayMessage('email non valide');
                }
            } else {

                $this->displayMessage('les mot de passe ne correspondent pas');
            }
        } else {

            $this->displayMessage('Veuillez remplir tous les champs');
        }
    }

    public function connect()
    {

        $stmt = $this->db->prepare("SELECT * FROM Utilisateurs WHERE login = ?");
        $stmt->execute(array($this->login));
        $row = $stmt->rowCount();

        if ($row == 1) {

            $userinfo = $stmt->fetch();

            $_SESSION['login'] = $userinfo['login'];
            $_SESSION['id'] = $userinfo['login'];
            $_SESSION['email'] = $userinfo['email'];


            password_verify($this->password, $userinfo['password']);

            return true;
        }



        return false;
    }

    public function checkUserLogin()
    {

        $stmt = $this->db->prepare("SELECT * FROM utilisateurs WHERE login = ?");
        $stmt->execute(array($this->login));

        $row = $stmt->rowcount();

        if ($row == 1) {

            return true;
        }

        return false;
    }

    public function ConfirmConnect()
    {

        if ($this->emptyInput()) {

            if ($this->confPassword()) {

                if ($this->valideEmail()) {

                    if ($this->checkUserLogin()) {

                        $this->connect();

                        $this->displayMessage('vous êtes connecté');
                    } else {

                        $this->displayMessage('L\'utilisateur n\'existe pas, veuillez vous inscrire');
                    }
                } else {

                    $this->displayMessage('email non valide');
                }
            } else {

                $this->displayMessage('les mot de passe ne correspondent pas');
            }
        } else {

            $this->displayMessage('Veuillez remplir tout les champs');
        }
    }

    public function emptyInput()
    {

        if (!empty($this->login) || !empty($this->password) || !empty($this->email) || !empty($this->confpassword)) {

            return true;
        }

        return false;
    }


    public function displayMessage($msg)
    {

        if (isset($msg)) {

            echo $msg;
        }
    }

    public function update($id_utilisateur){

        $stmt = $this->db->prepare("UPDATE login,password,email FROM utilisateurs SET login=?,password=?, email=? WHERE id=?");

        $id_utilisateur = $_SESSION['id'];
        $hashed_password = password_hash($this->password, PASSWORD_BCRYPT);

        $stmt->execute(array($this->login, $hashed_password,$this->email,$id_utilisateur));
        
       

       

            
        
    }

    public function confirmUpdate($id_utilisateur){

        $id_utilisateur = $_SESSION['id'];
        if ($this->checkUserSignup()) {

            if ($this->valideEmail()) {

                $this->update($id_utilisateur);
                $this->login = $_SESSION['login'];
                

                $this->displayMessage('modfication effectué');
            } else {
                $this->displayMessage('email non valide');
            }
        } else {

            $this->displayMessage('utilisateur déjà pris');
        }
    // } else {
        
    //     $this->displayMessage('les mot de passes de sont pas identiques');
    // }
    }

    public function userInfo($id_utilisateur){

        $select = $this->db->prepare("SELECT * FROM  utilisateurs where id = ? ");
        $select->execute(array($id_utilisateur));
        $res = $select->fetch();

        return $res;
    }
}
