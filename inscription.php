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
    <?php require 'elements/header.php';?>

    </header>

    <main class="user-main">

        


        <?php

        require 'app/User.php';
        
        
        
        
    
        ?> <div class="container-form">
            
            <h1 id="h1-inscription">Inscription</h1>
        
        <?php

            $user = new User;


           $from =  $user->createForm();

            // if(isset($_POST['valider'])){

            //     if(isset($_POST['login'],$_POST['password'],$_POST['mail'])){

                    
                $user->validate($user['login'],$user['password']);{

                    
                    if($user->start()){
                        
                        $user->displayMessage();
                        
                    }
                }
                var_dump($user->start());
                    
            // }
               
                
                ?>
        </div>
        






    </main>



    <footer>

    </footer>

</body>

</html>