<?php
session_start();
require('app/administrateur.php');
$user = new Administrateur();

$var = $user->get_User();
var_dump($var);
$user->get_User();

if (isset($_GET['delete']) && !empty($_GET['delete'])) {
    $delete = (int)$_GET['delete'];
    $user->delete_User($delete);
}

$user->get_User();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body>
    <!--- HEADER --->
    <main>
        <ul>
            <li>
                <!--- $azd = $user->get_User puis while .... ---->
                login : <?= $user->get_User()['login']; ?>
            </li>
            <li> email: <?= $user->get_User()['email'] ?></li>
            <li> password :<?= $user->get_User()['password'] ?></li>
            <li> id : <?= $user->get_User()['id'] ?></li>
            <li> id_droits :<?= $user->get_User()['id_droits'] ?></li>
            <li> id_adresse :<?= $user->get_User()['id_adresse'] ?></li>

        </ul>

        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum, voluptatibus libero magnam iusto quam repudiandae enim, sequi totam omnis, doloremque molestiae inventore modi nisi. Ut et doloremque provident ab est.

        <form action="admin.php" method="post">
            <fieldset>
                <legend>suppression utilisateur</legend>
                <input type="text" value="<?= $user->get_User()['login']; ?>">
                <input type="email" value="<?= $user->get_User()['email']; ?>">
                <input type="password" value="<?= $user->get_User()['password']; ?>">
                <input type="submit" value="suppression">
                <a class="a_admin" href="admin.php?delete=<?= $user->get_User()['id'] ?>">Supprimer</a>
            </fieldset>
        </form>

        <aside>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Velit hic dolor esse veniam consequuntur expedita veritatis natus accusamus corporis, dignissimos aliquam repudiandae qui neque unde sed recusandae eaque itaque commodi.</p>
        </aside>
    </main>
    <!--- FOOTER --->

</body>

</html>