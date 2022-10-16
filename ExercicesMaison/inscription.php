<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Connectez vous</title>
</head>
<body>

    <h2>Formulaire d'inscription</h2>

    <form action="./inscriptionTraitement.php" method ="POST">
    <label class = 'my-10' for="lastname">Nom :</label>    
    <input class = 'input' type="text" name="lastname" id="lastname"><br><br>
    <label class = 'my-10' for="firstname">Prénom :</label>    
    <input class = 'input' type="text" name="firstname" id="firstname"><br><br>  
    <label class = 'my-10' for="login">Login :</label>    
    <input class = 'input' type="email" name="login" id="login"><br><br>
    <label class = 'my-10' for="password">Mot de passe :</label>
    <input class = 'input' type="password" name="password" id="password"><br><br>
    <label class = 'my-10' for="password2">Vérification du mot de passe :</label>
    <input class = 'input' type="password" name="password2" id="password2"><br><br>
    <input type="submit" value="enregistrer">
    </form>

</body>
</html>