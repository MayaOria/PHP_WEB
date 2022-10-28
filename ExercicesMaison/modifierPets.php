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

$id = "%".$_GET['id']."%";

$sql = "SELECT * FROM animal WHERE id LIKE :id";

$stmt = $cnx->prepare($sql);
$stmt -> bindValue(":id", $id);

$stmt -> execute();

$result = $stmt -> fetch(PDO::FETCH_ASSOC);

?>

<div class="container">
    <h2>Modifier les informations</h2>
    <form enctype="multipart/form-data" action="./modifierPetsTraitement.php" method="POST">
   
    <input type="hidden"  name= "id" id="id" value= <?=$result['id']?>>
    <label class = 'my-10' for="name">Nom : </label>
    <input class = 'input' type="text" name= "name" id="name" value= <?=$result['name']?>>
    <label class = 'my-10 gender' for="gender">Genre : </label>
    <select class = 'input' name= "gender" id="gender" value= <?=$result['gender']?>>
        
        <?php switch ($result['gender']){

            case 'M':
                echo "<option value='M' selected>M</option>
                <option value='F'>F</option>
                <option value='A'>Non-binaire</option>
            </select>";
            break;

            case 'F':
                echo "<option value='M'>M</option>
                <option value='F'selected>F</option>
                <option value='A'>Non-binaire</option>
            </select>";
            break;
            case 'A':
                echo "<option value='M'>M</option>
                <option value='F'>F</option>
                <option value='A' selected>Non-binaire</option>
                </select>";
                break;
                
        }
        ?>
    <label class = 'my-10' for="birthdate">Date de naissance : </label>
    <input class = 'input' type="date" name= "birthdate" id="birthdate" value= <?= $result['birthdate'] ?>>
    <label class = 'btn btn-envoyer' for="image">MODIFIER LA PHOTO<input class="file" type='file' name="image" id="image"></label>
    <br><br>
    <input class = 'btn btn-envoyer' type="submit" value="SAUVEGARDER">
    
</form>
</div>