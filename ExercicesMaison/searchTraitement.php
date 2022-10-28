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
    
    $name = "%". $_POST['name']."%";
    
    $sql = "SELECT * FROM animal WHERE name LIKE :name";
    
    $stmt = $cnx->prepare($sql);
    $stmt -> bindValue(":name", $name);
    
    $stmt -> execute();
    
    $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    
    if(count($result)>0){
        foreach($result as $pet){
            echo'<div class = "card auto" style = "width:18rem;">;';
            echo "<h2>Carte d'identité de ".$pet['name']."</h2>";
            echo "<img src = './images/".$pet['image']."'>" ;
            echo 'Nom : '.$pet['name'] . '<br>';
            echo 'Genre : '.$pet['gender'] . '<br>';
            echo 'Date de naissance : '.$pet['birthdate'] . '<br>';
            echo '</div>';
            }
    
        }
    
    

    else { echo "<h3>Malheureusement cet animal ne fait pas partie de la maison</h3>";}
 
    

   

