<?php
session_start();

if(isset($log)){
      header( "refresh:2;url=index.php" );
}



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
            

            if(!isset($_SESSION['id'])){

             ?>   

            <h1 id="h1-inscription">Connexion</h1>  
            <form action="#" e method="post">
    
    
    <label for="login" class="'labelForm" placeholder="Votre nom d'utilisateur">nom d'utilisateur :</label>
    <input type="text" class="inputForm" name="login" required" value="tony">
    
    <label for="email" class="'labelForm" placeholder="Votre email"> Email </label>
    <input type="email" class="inputForm" name="email" required value="tonyguillot84@gmail.com">
    
    <label for="password" class="'labelForm" placeholder="Votre mot de pass">mot de passe :</label>
    <input type="password" class="inputForm" name="password" required value="toto199800912">
    
    
    
        <button  type="submit" name="valider" class='btn btn-dark ml-20 w-50'>valider</button>
        
    
    
</form>
</div>

            

        <?php } ?> 
            
                <?php if(isset($_SESSION['login'])){
                
                ?> <h4 id='bienvenue'>Bienvenu <?=$_SESSION['login']?></h4>

                <a href="produits.php" class="btn btn-success   ">Voir Touts les produits</a>


               <?php
                
             
            }
            
            
            
            ?>

           
    </main>

    <footer>
            <?php require 'elements/footer.html'; ?>
        </footer>

</body>

</html>