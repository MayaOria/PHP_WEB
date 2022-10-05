<?php


include "./connexion/db.php";


try{
$cnx = new PDO(DBDRIVER.':host='.DBHOST.';port='.DBPORT.
';dbname='.DBNAME.';charset='.DBCHARSET,DBUSER,DBPASS);
}

catch(Exception $e){
        //ne jamais faire ça en production car ça montre les infos sensibles
        echo $e->getMessage();

        die();
}

$titre = "%" . $_POST['titre'] . "%";

$sql = "SELECT * FROM film WHERE titre LIKE :titre";
$stmt = $cnx -> prepare ($sql);
$stmt ->bindValue(":titre", $titre);

$stmt ->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count ($result) >0){
foreach ($result as $film){
    echo "<br>";
    foreach($film as $cle => $val){
        echo $cle. ":" . $val. "<br>";
    }
}
}

else{
    echo "<h5>Pas de film trouvé</h5>";
}


// var_dump ($stmt ->errorInfo());

