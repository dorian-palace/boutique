<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/css/header.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <link rel="stylesheet" href="style/css/User.css">
    <title>Connexion</title>
</head>

<body>
    <header>
        <?php require_once 'elements/header.php'; ?>
    </header>

    <main classe="user-main">

    

    <div class="container-form">
        <?php
        require_once('app/User.php');

        // if (isset($_SESSION['id'])) {
        //     header('Location: index.php');
        // }
        
        if(isset($_POST['valider'])){

            
            if (isset($_POST['login'],$_POST['password'],$_POST['email'])) {
                
                $login = $_POST['login'];
                $password = $_POST['password'];
                $email = $_POST['email'];


                $log = new User($login, $password, $email);

                $log->ConfirmConnect();
                
            }
        
        }
            ?>

         

        

            <h1 id="h1-inscription">Connexion</h1>
            <form action="#" e method="post">


                <label for="login" class="'labelForm" placeholder="Votre nom d'utilisateur">nom d'utilisateur :</label>
                <input type="text" class="inputForm" name="login">

                <label for="email" class="'labelForm" placeholder="Votre email"> Email </label>
                <input type="email" class="inputForm" name="email">

                <label for="password" class="'labelForm" placeholder="Votre mot de pass">mot de passe :</label>
                <input type="password" class="inputForm" name="password">


                <div class="text-center">
                    <button ton type="submit" name="valider" class='btn btn-dark text-center w-50'>valider</button>

                </div>

            </form>
        </div>

            
                <?php if(isset($_SESSION['login'])){
                
                ?> <h4 id='bienvenue'>Bienvenu <?=$_SESSION['login']?></h4>

               <?php } ?>
           
    </main>

    <footer>

    </footer>

</body>

</html>