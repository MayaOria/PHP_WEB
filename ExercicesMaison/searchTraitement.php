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
    
    $name = "%".$_GET['name']."%";
    
    $sql = "SELECT * FROM animal WHERE name LIKE :name";
    
    $stmt = $cnx->prepare($sql);
    $stmt -> bindValue(":name", $name);
    
    $stmt -> execute();
    
    $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    
    if(count($result)>0){
        foreach($result as $animal){
            echo "<br>";
            foreach($animal as $key => $value){
                echo "<h3>$key : $value</h3> <br>";
            }
    
        }
    }
    

    else { echo "<h3>Malheureusement cet animal ne fait pas partie de la maison</h3>";}
 
    




