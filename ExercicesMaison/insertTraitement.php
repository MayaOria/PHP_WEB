
<?php

var_dump($_POST);
var_dump($_FILES);

$uploadDossier = "./images";

$idUnique = uniqid().date("Y-m-d-H-i-s");
$nomFichier = $idUnique.basename($_FILES['image']['name']);

if(!move_uploaded_file($_FILES['image']['tmp_name'], $uploadDossier."/".$nomFichier)){
        throw new Exception("Le fichier n'a pas pu être téléchargé");
}




include "./connexion/db.php";

try {
        $cnx = new PDO(DBDRIVER . ':host=' . DBHOST . ';port=' . DBPORT . ';dbname=' . DBNAME . ';charset=' . DBCHARSET, DBUSER, DBPASS);
} catch (Exception $e) {
        // jamais en production car ça montre des infos
        // sensibles
        echo $e->getMessage();
        
        die();
}


$sql ="INSERT INTO animal (id, name, gender, birthdate, image)";
$sql .= "VALUES (NULL, :name, :gender, :birthdate, :image)";




$stmt = $cnx->prepare($sql);
$stmt -> bindValue(":name",$_POST['name']);
$stmt -> bindValue(":gender", $_POST['gender']);
$stmt -> bindValue(":birthdate", $_POST['birthdate']);
$stmt -> bindValue(":image", $nomFichier);

$stmt->execute();

header('location: ./index.php?p=pets');