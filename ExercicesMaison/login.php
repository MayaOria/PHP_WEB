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
    <form action="./loginTraitement.php" method ="POST">
    <label class = 'my-10' for="login">Login ?</label>    
    <input class = 'input' type="email" name="login" id="login">
    <label class = 'my-10' for="password">Password ?</label>
    <input class = 'input' type="password" name="password" id="password">
    <input class = "btn btn-envoyer" type="submit" value="CONNEXION">
    </form>
    <p><a href="./inscription.php">Créer un compte</a></p>

    <?php
        if (isset ($_GET['error'])){
            // traiter les différents types d'erreur
            switch ($_GET['error']){
                case "badPass":
                    echo "<h5>Le password est incorrect</h5>";
                    break;
            }
        }
    ?>
</body>
</html>
                                        