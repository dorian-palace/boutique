<?php
session_start();
require_once('setting/db.php');
require_once('app/login.php');

if (isset($_SESSION['id'])) {
    header('Location: index.php');
}

if (isset($_POST['login']) && isset($_POST['password'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $log = new Login($login, $password);
    $log->Connexion($login, $password);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>

<body>
    <!--- HEADER --->
    <main>
        <form action="" method="post">
            <input type="text" name="login" placeholder="login">
            <input type="password" name="password" placeholder="password">
            <input type="submit" name="submit">
        </form>
    </main>


    <!--- FOOTER --->


</body>

</html>