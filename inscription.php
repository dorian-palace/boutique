<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/css/inscription.cssx">
    <title>Document</title>
</head>

<body>

    <header>

    </header>

    <main>

        <h1>Inscription</h1>


        <?php

        require'app/User.php';
        $singup = new User($login,$password);

        if(isset($_POST['envoyer'])){

            $login = _P

        }

        ?>








        <form action="" method="post">
            <label>Nom d'utilisateur</label>

            <input type="text" name="login" placeholder="Nom d'utilisateur">

            <label>Adresse Email</label>
            <input type="email" name="email" placeholder="Email">

            <label for="">ConMot de passe</label>
            <input type="password" name="password" placeholder="Mot de passe">

            <label for=""> Confirmer le Mot de passe</label>
            <input type="password" name="password" placeholder="Confirmer le Mot de passe">


            <input type="submit" name="valider">

        </form>
    </main>



    <footer>

    </footer>

</body>

</html>