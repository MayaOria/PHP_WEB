<?php

// var_dump($_POST); permet de vérifier que le form fonctionne avant d'aller plus loin


//1. Obtenir les données du formulaire

// $nom= $_POST['nom'];
// $login= $_POST['login'];
// $password= $_POST['password'];
// $repassword= $_POST['repassword'];

//Pour vérifier les données envoyées : fonction filter_input :

    //3 param : type de input qu'on envoie, variable qu'on veut filtrer, filtre qu'on veut utiliser

$nom= $_POST['nom'];
$login= filter_input(INPUT_POST, $_POST['login'], FILTER_VALIDATE_EMAIL);

if (!$login){
    //header()...
    //die();

    //=> si la réponse du filter_input est false, décider ce que l'on veut faire
}

$password= $_POST['password'];
$repassword= $_POST['repassword'];
    

//Filtrer les données



//Connecter à la BD
include "./connexion/db.php"; //dans l'idéal, il faut placer l'include au sommet de la page


try{
$cnx = new PDO(DBDRIVER.':host='.DBHOST.';port='.DBPORT.
';dbname='.DBNAME.';charset='.DBCHARSET,DBUSER,DBPASS);
}

catch(Exception $e){
        //ne jamais faire ça en production car ça montre les infos sensibles
        echo $e->getMessage();

        die();
}

//Rechercher si le login n'existe pas déjà dans la BD pour éviter les doublons

//lancer l'insertion de l'utilisateur dans le tableau user
//d'abord : créer le tableau

$sql = "INSERT INTO utilisateur (id, nom, login, password) VALUES (NULL, :nom, :login, :password)";

$stmt = $cnx->prepare($sql);
$stmt ->bindValue(":nom", $nom);
$stmt ->bindValue(":login", $login);

$passxord= password_hash($password, PASSWORD_DEFAULT, ['cost'=>12]);
$stmt ->bindValue(":password", $password);

$stmt->execute();

//Si tout ok, on va vers l'accueil après avoir stocké le login dans la session