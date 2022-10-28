
<?php

// var_dump($_POST);

// var_dump ($stmt->errorInfo());
// header ("location: ./index.php?p=pets");

include "./connexion/db.php";

try {
    $cnx = new PDO(DBDRIVER . ':host=' . DBHOST . ';port=' . DBPORT . ';dbname=' . DBNAME . ';charset=' . DBCHARSET, DBUSER, DBPASS);
} catch (Exception $e) {
    // jamais en production car ça montre des infos
    // sensibles
    echo $e->getMessage();

    die();
}

$uploadDossier = "./images";
$idUnique = uniqid().date("Y-m-d-H-i-s");
$nomFichier = $idUnique.basename ($_FILES['image']['name']);

if(!move_uploaded_file($_FILES['image']['tmp_name'], $uploadDossier."/". $nomFichier)){
    throw new Exception("Une erreur s'est produite lors du téléchargement");
}



$sql = "UPDATE animal SET name=:name, gender=:gender, birthdate=:birthdate, image=:image WHERE id =:id";

$stmt = $cnx->prepare($sql);
$stmt->bindValue(":name", $_POST['name']);
$stmt->bindValue(":gender", $_POST['gender']);
$stmt->bindValue(":birthdate", $_POST['birthdate']);
$stmt->bindValue(":id", $_POST['id']);
$stmt->bindValue(":image", $nomFichier);

$stmt->execute();

// var_dump ($stmt->errorInfo());
header ("location: ./index.php?p=pets");