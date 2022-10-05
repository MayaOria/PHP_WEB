<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="./loginTraitement.php" method="POST">
    <label for="login">Login : </label>    
    <input type="text" name="login" id="login">
    <label for="password">Password : </label>    
    <input type="password" name="password" id="password">
    <input type="submit" value="valider">
    </form>
    <?php

//on vérifie si on est sur la page login.php OU sur la page login.php?error=badPass
    if(isset($_GET['error'])){
        switch ($_GET['error']){
            case "badPass":
                echo "<h5>Password incorrect</h5>";
        }
    }

?>
    
</body>
</html>


