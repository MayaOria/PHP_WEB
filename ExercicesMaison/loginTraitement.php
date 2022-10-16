<?php
session_start();
include "./connexion/db.php";


// 1. Récuperer le login $_POST['login'] et le mot de pass

$login = $_POST['login'];
$password = $POST['password'];

// 2. Chercher le login dans la BD et obtenir son password
try {
    $cnx = new PDO(DBDRIVER . ':host=' . DBHOST . ';port=' . DBPORT . ';dbname=' . DBNAME . ';charset=' . DBCHARSET, DBUSER, DBPASS);
} catch (Exception $e) {
    // jamais en production car ça montre des infos
    // sensibles
    echo $e->getMessage();
    die();
}

// Chercher le login/pass dans la BD

$sql = "SELECT * FROM utilisateur WHERE login=:login";
$stmt = $cnx->prepare($sql);
$stmt -> bindValue(":login", $login);
$stmt -> execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC);
$loginBD = $result['login'];
$passwordBD = $result['password'];


// 3. Comparer le password reçu du formulaire avec le password de l'user obtenu de la BD

if(password_verify($password, $passwordBD) === true){

    $_SESSION['loginConnecte'] = $login;
    header('location: ./index.php');
}

else {
    // 5. Si pas ok, aller vers la page de login en envoyant un message dans la URL
    header('location: ./login.php?error=badPass');
}
?>