<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style/css/header.css">

    <link rel="stylesheet" href="style/css/User.css">





    <title>Inscription</title>
</head>

<body>

    <header>
<<<<<<< HEAD

        <?php require 'elements/header.php';
        require_once 'app/Form.php'; ?>

=======
        <?php require 'elements/header.php'; ?>
>>>>>>> 9ee9b53be1f4617c5b3aecf1035f36271763c592
    </header>

    <main class="user-main">




        <?php require 'app/User.php'; ?>



        <div class="container-form">

<<<<<<< HEAD
        require 'app/User.php';





        ?> <div class="container-form">

            <h1 id="h1-inscription">Inscription</h1>

            <?php


    






           

            

            if (isset($_POST['valider'])) {



                if (isset($_POST['login'], $_POST['password'], $_POST['ConfirmPassword'],$_POST['email']) && !empty($_POST['login']) && !empty($_POST['password'])  && !empty($_POST['ConfirmPassword'])) {
    
    
    
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $confpassword = $_POST['confpassword'];
                    $login = $_POST['login'];
    
                    $user = new User($login,$password,$confpassword,$email);
    
                   $user->signup();
            }

        }
          

            if(isset($msg)){

                echo $msg;
            }
            ?>
            <form action="#" method="post">
   
                   
                    <input type="text"  name="login">
                    <input type="email"  name="email">
                    <input type="password"  name="password">
                    <input type="password"  name="confpassword">
                   
                   <input type="submit" name="valider">
                    
             
            </form>
            


=======
        


        <?php

        if (isset($_POST['valider'])) {

            if (isset($_POST['login'], $_POST['password'], $_POST['email'], $_POST['confpassword'])) {

                $login = $_POST['login'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $confpassword = $_POST['confpassword'];
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];


                // $user = new User($login,$password, $email);
                $user = new User($login, $password, $email,$confpassword,$nom,$prenom);

                $user->confirmSingup();
            }
        }



        ?>

       

            <h1 id="h1-inscription">Inscription</h1>

            <form action="#" e method="post">


                  <label for="login" class="'labelForm" placeholder="Votre nom d'utilisateur">nom d'utilisateur :</label>
                <input type="text" class="inputForm" name="login">

                <label for="email" class="'labelForm" placeholder="Votre email"> Email </label>
                <input type="email" class="inputForm" name="email"> 

                <label for="prenom" class="'labelForm" placeholder="Votre prénom"> Prénom </label>
                <input type="prenom" class="inputForm" name="prenom">

                
                <label for="nom"class="'labelForm" placeholder="Votre nom">nom</label>
                <input type="prenom" class="inputForm" name="nom">

                <label for="password" class="'labelForm" placeholder="Votre mot de pass">mot de passe :</label>
                <input type="password" class="inputForm" name="password">

                <label for="email" class="'labelForm" placeholder="confirmation">confirmez le mot de passe </label>
                <input type="password" class="inputForm" name="confpassword">


                <button type="submit" name="valider" classe='btnFrom'>valider</button>


            </form>

>>>>>>> 9ee9b53be1f4617c5b3aecf1035f36271763c592
        </div>







    </main>



    <footer>

    </footer>

</body>

</html>