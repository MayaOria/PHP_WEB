
<?php
include "./connexion/db.php";

try {
        $cnx = new PDO(DBDRIVER . ':host=' . DBHOST . ';port=' . DBPORT . ';dbname=' . DBNAME . ';charset=' . DBCHARSET, DBUSER, DBPASS);
} catch (Exception $e) {
        // jamais en production car ça montre des infos
        // sensibles
        echo $e->getMessage();
        
        die();
}


$sql ="INSERT INTO animal (id, name, gender, birthdate)";
$sql .= "VALUES (NULL, :name, :gender, :birthdate)";




$stmt = $cnx->prepare($sql);
$stmt -> bindValue(":name",$_POST['name']);
$stmt -> bindValue(":gender", $_POST['gender']);
$stmt -> bindValue(":birthdate", $_POST['birthdate']);

$stmt->execute();

header('location: ./index.php?p=pets');