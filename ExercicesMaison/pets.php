<h1 class='titre-pr'>Ils sont déjà parmi nous :</h1>

<?php
include_once './connexion/db.php';

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
$sq1 = "SELECT * FROM animal";

//3. Préparer la requête
$stmt = $cnx ->prepare($sq1);
//3bis Execute

$stmt->execute();

//4. Récupérer les données dans un array
//Pour récupérer uniquement un tableau associatif on met la constante PDO::FETCH_ASSOC
$arrayResults = $stmt->fetchAll(PDO::FETCH_ASSOC); 


//5. Afficher les donnees selon nos besoins

foreach($arrayResults as $animal){
        echo "<br><br>";
        foreach ($animal as $key => $value){
                echo $key. " : ". $value. "<br>";
        }
        echo "<br><a class='btn' href ='./effacerPets.php?id=".$animal['id']."'>Effacer</a>";
        echo "&nbsp; <a class='btn' href='./index.php?p=modifierPets&id=".$animal['id']."'>Modifier</a>";
        
}

?>