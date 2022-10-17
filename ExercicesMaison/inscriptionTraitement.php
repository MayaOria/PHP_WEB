<?php
session_start();
include "./connexion/db.php";

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$login = filter_input (INPUT_POST, 'login', FILTER_VALIDATE_EMAIL);

if(!$login){

    die();
    
}

$password = $_POST['password'];
$password2 = $_POST['password2'];

// var_dump($_POST);

try {
    $cnx = new PDO(DBDRIVER . ':host=' . DBHOST . ';port=' . DBPORT . ';dbname=' . DBNAME . ';charset=' . DBCHARSET, DBUSER, DBPASS);
} catch (Exception $e) {
    // jamais en production car ça montre des infos
    // sensibles
    echo $e->getMessage();

    die();
}

$password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);
// $password2 = password_hash($password2, PASSWORD_DEFAULT, ['cost' =>12]); 

// if(password_verify($password, $password2) === true){


$sql = "INSERT INTO utilisateur (id, lastname, firstname, login, password) VALUES " . "(null, :lastname, :firstname, :login, :password)";
$stmt = $cnx->prepare($sql);
$stmt->bindValue(":lastname", $lastname);
$stmt->bindValue(":firstname", $firstname);
$stmt->bindValue(":login", $login);
$stmt->bindValue(":password", $password);
$stmt->execute();

// var_dump($stmt->errorInfo());
$_SESSION ['loginConnecte'] = $login;
header('location: ./index.php');






