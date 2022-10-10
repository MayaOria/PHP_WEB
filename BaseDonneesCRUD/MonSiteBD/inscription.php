<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
</head>
<body>

    <form action="./inscriptionTraitement.php" method="POST">
    <label for="nom">Nom : </label>    
    <input type="text" name="nom" id="nom">
    <label for="login">Login : </label>    
    <input type="email" name="login" id="login">
    <label for="password">Password : </label>    
    <input type="password" name="password" id="password">
    <label for="repassword">Retapez le password : </label>    
    <input type="password" name="repassword" id="repassword">
    <input type="submit" value="Envoyer">
    </form>
    
    
</body>
</html>


