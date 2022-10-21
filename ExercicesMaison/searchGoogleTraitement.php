<?php

include "./connexion/db.php";
   
try {
            $cnx = new PDO(DBDRIVER . ':host=' . DBHOST . ';port=' . DBPORT . ';dbname=' . DBNAME . ';charset=' . DBCHARSET, DBUSER, DBPASS);
    } catch (Exception $e) {
            // jamais en production car ça montre des infos
            // sensibles
            echo "error";
            
            die();
    }
    
    $name = "%".$_POST['name']."%";
    
    $sql = "SELECT * FROM animal WHERE name LIKE :name";
    
    $stmt = $cnx->prepare($sql);
    $stmt -> bindValue(":name", $name);
    
    $stmt -> execute();
    
    $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);