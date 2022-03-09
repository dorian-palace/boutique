<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <form action="payment.php" method="post">
            <input type="text" name="name" required placeholder="votre nom">
            <input type="email" name="email" required placeholder="votre email">
            <input type="text" placeholder="votre code de carte bleu">
            <input type="month">
            <input type="text" placeholder="CVC">
            <button type="submit ">Acheter</button>
        </form>
    </main>
    
    <script src="https://js.stripe.com/v3/"></script>

    
</body>
</html>