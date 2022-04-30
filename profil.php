<?php session_start();
require_once 'app/Update.php';
require_once 'app/User.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/css/User.css">
    <link rel="stylesheet" href="style/css/header.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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


            // if (isset($_POST['valider'])) {


            if (isset($_POST['new_login'], $_POST['new_password'], $_POST['new_email'], $_POST['conf_new_password'])) {



                $update = new Update();

                $user = new User($_POST['new_login'], $_POST['new_password'], $_POST['new_email'], $_POST['conf_new_password']);

                if ($_POST['new_password'] == $_POST['conf_new_password']) {

                    if ($user->checkUserSignup()) {

                        $update->update();
                        $user->displayMessage('modification effectuée');
                    } else {

                        $user->displayMessage('utilisateur déjà pris');
                    }
                } else {

                    $user->displayMessage('les mot de passe ne sont pas idntiques');
                }
            }

            //}

            if (isset($msg)) {

                echo $msg;
            }
            ?>
            <form action="#" e method="post">


                <label for="new_login" class="'labelForm" placeholder="Votre nom d'utilisateur">nom d'utilisateur :</label>
                <input type="text" class="inputForm" name="new_login" value="<?= $_SESSION['login'] ?>">

                <label for="email" class="'labelForm" placeholder="Votre email"> Email </label>
                <input type="email" class="inputForm" name="new_email" value="<?= $_SESSION['email'] ?>">

                <label for="password" class="'labelForm" placeholder="Votre mot de pass">mot de passe :</label>
                <input type="password" class="inputForm" name="new_password">

                <label for="email" class="'labelForm" placeholder="confirmation">confirmez le mot de passe </label>
                <input type="password" class="inputForm" name="conf_new_password">


                <button  type="submit" name="valider" class='btn btn-dark ml-20 w-50'>valider</button>

            </form>


        </div>
    </main>

    <footer>
        <?php require 'elements/footer.html'; ?>
    </footer>
</body>

</html>