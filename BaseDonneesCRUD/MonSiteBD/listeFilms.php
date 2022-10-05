<?php
//1. Créer une connexion à la BD
//on fait un try/catch au cas où la connexion ne fonctionne pas

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

//2. Créer une nouvelle requete
$sq1 = "SELECT * FROM film";

//3. Préparer la requête
$stmt = $cnx ->prepare($sq1);
//3bis Execute

$stmt->execute();

//4. Récupérer les données dans un array
//Pour récupérer uniquement un tableau associatif on met la constante PDO::FETCH_ASSOC
$arrayResults = $stmt->fetchAll(PDO::FETCH_ASSOC); 


//5. Afficher les donnees selon nos besoins

foreach($arrayResults as $film){
        echo "<br>";
        foreach ($film as $key => $value){
                echo $key. " : ". $value. "<br>";
        }
        echo "<a href ='./effacerFilm.php?id=".$film['id']."'>Supprimer</a>";
        
}

