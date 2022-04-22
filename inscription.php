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

        <?php require 'elements/header.php';
        require_once 'app/Form.php'; ?>

    </header>

    <main class="user-main">




        <?php require 'app/User.php'; ?>



        <div class="container-form">

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
            


        </div>







    </main>



    <footer>

    </footer>

</body>

</html>