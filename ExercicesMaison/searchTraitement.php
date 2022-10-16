<?php

include "./connexion/db.php";

<<<<<<< HEAD
    
=======
try {
        $cnx = new PDO(DBDRIVER . ':host=' . DBHOST . ';port=' . DBPORT . ';dbname=' . DBNAME . ';charset=' . DBCHARSET, DBUSER, DBPASS);
} catch (Exception $e) {
        // jamais en production car ça montre des infos
        // sensibles
        echo $e->getMessage();
        
        die();
}

$name = "%".$_POST['name']."%";

$sql = "SELECT * FROM animal WHERE name LIKE :name";

$stmt = $cnx->prepare($sql);
$stmt -> bindValue(":name", $name);

$stmt -> execute();

$result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&family=Poppins:wght@200;300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <title>Search</title>
</head>
<body>

<?php
if(count($result)>0){
    foreach($result as $animal){
        echo "<br>";
        foreach($animal as $key => $value){
            echo "<h3 class='color' >$key : $value</h3> <br>";
        }
>>>>>>> 511f0c5de65920f758a844ecf672514f46ad4787

    try {
            $cnx = new PDO(DBDRIVER . ':host=' . DBHOST . ';port=' . DBPORT . ';dbname=' . DBNAME . ';charset=' . DBCHARSET, DBUSER, DBPASS);
    } catch (Exception $e) {
            // jamais en production car ça montre des infos
            // sensibles
            echo $e->getMessage();
            
            die();
    }
    
    $name = "%".$_GET['name']."%";
    
    $sql = "SELECT * FROM animal WHERE name LIKE :name";
    
    $stmt = $cnx->prepare($sql);
    $stmt -> bindValue(":name", $name);
    
    $stmt -> execute();
    
    $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    
    if(count($result)>0){
        foreach($result as $animal){
            echo "<br>";
            foreach($animal as $key => $value){
                echo "<h3>$key : $value</h3> <br>";
            }
    
        }
    }
    

    else { echo "<h3>Malheureusement cet animal ne fait pas partie de la maison</h3>";}
 
    




<<<<<<< HEAD
=======
else { echo "<h3 class='color'>Malheureusement cet animal ne fait pas partie de la maison</h3>";}

?>
</body>
</html>

>>>>>>> 511f0c5de65920f758a844ecf672514f46ad4787
