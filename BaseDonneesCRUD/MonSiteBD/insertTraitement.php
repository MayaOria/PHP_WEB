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

$sql = "INSERT INTO film (id, titre, duree, description, dateSortie, image) ";
$sql .= "VALUES (NULL, :titre, :duree, :description, :dateSortie, :image)";


$stmt = $cnx -> prepare($sql);
$stmt-> bindValue(":titre", $_POST['titre']);
$stmt-> bindValue(":duree", $_POST['duree'], PDO:: PARAM_INT);
$stmt-> bindValue(":description", $_POST['description']);
$stmt-> bindValue(":dateSortie", $_POST['dateSortie']);
$stmt-> bindValue(":image", "");

$stmt -> execute();
 

// avantage de faire binParam : on peut envoyer un troisième paramètre pour donner le TYPE ! & filtre les résultats reçus (sécurité pour éviter que quelqu'un injecte du code SQL via la formulaire)



// => c'est exactement le même message qui s'affiche quand on crée un insert dans php myadmin !



// echo "<h3>Bonjour</h3>";

// $titre = $_POST['titre'];
// $duree = $_POST['duree'];
// $description = $_POST['description'];
// $dateSortie = $_POST['date'];
// // $image = $_POST['image'];