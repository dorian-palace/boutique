<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="style/css/header.css">
    
    <link rel="stylesheet" href="style/css/User.css">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js">
    
</script>


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
                if(isset($msg)){

                echo $msg;
                } ?>
        
 
        <?php



             if(isset($_POST['valider'])){

                
                
                 if(isset($_POST['login'],$_POST['password'],$_POST['email'],$_POST['confpassword'])){

                    $login = $_POST['login'];
                    $password = $_POST['password'];
                    $email = $_POST['email'];
                    $confpassword = $_POST['confpassword'];

                    // $user = new User($login,$password, $email);
                    $user = new User($login,$password,$email,$confpassword);

                     $user->confirmSingup();
                    
             }
        }
         

      
?>                     

  
        <form action="#"e method="post">
            

                    <label for="login" class="'labelForm" placeholder="Votre nom d'utilisateur">nom d'utilisateur :</label>
                    <input type="text" class="inputForm"  name="login" >

                    <label for="email" class="'labelForm" placeholder="Votre email"> Email </label>
                    <input type="email" class="inputForm"  name="email">

                    <label for="password" class="'labelForm" placeholder="Votre mot de pass">mot de passe  :</label>
                    <input type="password"  class="inputForm" name="password">

                    <label for="email" class="'labelForm" placeholder="confirmation">confirmez le mot de passe  </label>
                    <input type="password" class="inputForm"   name="confpassword">


                    <button type="submit"  name="valider" classe='btnFrom'>valider</button>
                    

             
            </form> 
                
        </div>
        






    </main>



    <footer>

    </footer>

</body>

</html>