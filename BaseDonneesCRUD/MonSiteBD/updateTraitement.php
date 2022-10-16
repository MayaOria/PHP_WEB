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

$sql = "UPDATE film SET titre=:titre, duree=:duree, description=:description, dateSortie=:dateSortie WHERE id=:id";

$stmt = $cnx -> prepare($sql);
$stmt ->bindValue(":titre", $_POST['titre']);
$stmt ->bindValue(":duree", $_POST['duree']);
$stmt ->bindValue(":description", $_POST['description']);
$stmt ->bindValue(":dateSortie", $_POST['dateSortie']);
$stmt ->bindValue(":id", $_POST['id']);

$stmt -> execute();

header("location: ./index=php?p=listeFilms");
