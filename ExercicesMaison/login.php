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
    <div class="border border1">
    <form action="./loginTraitement.php" method ="POST">
    <label class = 'my-10' for="login">Login ?</label>    
    <input class = 'input' type="email" name="login" id="login">
    <label class = 'my-10' for="password">Password ?</label>
    <input class = 'input' type="password" name="password" id="password">
    <input class = "btn btn-envoyer" type="submit" value="CONNEXION">
    </form>
    </div>
    <br>
    <div class='border'>
    <h2>Pas encore inscrit ?</h2>
    <br>
    <p><a class = "btn btn-envoyer" href="./inscription.php">Créer un compte</a></p>
    </div>
    <?php
        if (isset ($_GET['error'])){
            // traiter les différents types d'erreur
            switch ($_GET['error']){
                case "badPass":
                    echo "<br><br><h3 class = 'border' style = 'color: red;'>Le password est incorrect</h5>";
                    break;
            }
        }
    ?>
</body>
</html>
                                        