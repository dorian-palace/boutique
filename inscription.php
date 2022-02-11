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

        require 'app/User.php';
        require_once 'app/Form.php';
        $singup = new User($login,$password);
        

    
        
        $form = new User;
        
        $form->createForm();


        ?>





    </main>



    <footer>

    </footer>

</body>

</html>