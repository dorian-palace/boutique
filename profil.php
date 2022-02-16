<?php session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/css/User.css">
    <link rel="stylesheet" href="style/css/header.css">
    <title>Document</title>
</head>

<body>
    <header>
        <?php require_once 'elements/header.php' ?>
    </header>
    
    <main class="class-user">

        <div class="container-form">

            <h1 id="h1-inscription">Modifier votre profil</h1>
        
        <?php



        if (isset($_POST['valider'])) {

        if (isset($_POST['new_login'], $_POST['new_password'], $_POST['new_email'], $_POST['conf_new_password'])) {

            require_once 'app/User.php';

            $new_login= $_POST['new_login'];
            $new_password = $_POST['new_password'];
            $conf_new_password = $_POST['conf_new_password'];
            $new_email = $_POST['new_email'];
            $id_utilisateur = $_SESSION['id'];

            $user = new User($new_login,$new_password,$conf_new_password,$new_email);

            $user->confirmUpdate($id_utilisateur);

            $userinfo = $user->userInfo($id_utilisateur);
            
        
            

           
            

        }
    } 

    
        ?>
            <form action="#" e method="post">


                <label for="new_login" class="'labelForm" placeholder="Votre nom d'utilisateur">nom d'utilisateur :</label>
                <input type="text" class="inputForm" name="new_login" value="<?=$_SESSION['login']?>">

                <label for="email" class="'labelForm" placeholder="Votre email"> Email </label>
                <input type="email" class="inputForm" name="new_email" value="<?=$_SESSION['email']?>">

                <label for="password" class="'labelForm" placeholder="Votre mot de pass">mot de passe :</label>
                <input type="password" class="inputForm" name="new_password">

                <label for="email" class="'labelForm" placeholder="confirmation">confirmez le mot de passe </label>
                <input type="password" class="inputForm" name="conf_new_password">


                <button type="submit" name="valider" classe='btnFrom'>valider</button>

            </form>


        </div>
    </main>

</body>

</html>