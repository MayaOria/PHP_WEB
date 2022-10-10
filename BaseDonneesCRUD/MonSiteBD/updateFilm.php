
<?php
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

$id = "%" . $_GET['id'] . "%";

$sql = "SELECT * FROM film WHERE id LIKE :id";
$stmt = $cnx -> prepare ($sql);
$stmt ->bindValue(":id", $id);

$stmt ->execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<form action="./updateTraitement.php" method="POST">

<input type="hidden" value="<?=$result['id']?>" name="id">
<input type="text" value="<?=$result['titre']?>" maxlength="100" name="titre" placeholder="Titre"><br><br>
<input type="number" value="<?=$result['duree']?>" name="duree"><br><br>
<label for="description">Description du film :</label><br>
<textarea name="description" id="description" cols="30" rows="10"><?=$result['description']?></textarea><br><br>
<label for="date">Date de sortie : </label>
<input type="date" value="<?=$result['dateSortie']?>" name="dateSortie" id="dateSortie"><br><br>
<!-- <input type="text" maxlength="100" name="image" placeholder="Description de l'image"><br><br> -->
<input type="submit" value="Insérer dans la BD"><br>
</form>



