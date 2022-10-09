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

$id = $_GET['id'];
$sql ="DELETE FROM animal WHERE :id = id";
$stmt = $cnx->prepare($sql);
$stmt -> bindValue(":id",$id,PDO::PARAM_INT);
$stmt->execute();

header('location: ./index.php?p=pets');