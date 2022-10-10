
    <?php
    session_start();

//1. récupérer le login & password avec $_POST

$login = $_POST["login"];
$password = $_POST["password"];

//2. Chercher le login dans la BD et obtenir son password
//FAKE vu qu'on ne fait pas appel à une BD pour le moment

// $fakeUserLogin = "wad";
// $fakeUserPassword = "wad";

// chercher le login/password dans la BD

try{
    $cnx = new PDO(DBDRIVER.':host='.DBHOST.';port='.DBPORT.
    ';dbname='.DBNAME.';charset='.DBCHARSET,DBUSER,DBPASS);
    }
    
    catch(Exception $e){
            //ne jamais faire ça en production car ça montre les infos sensibles
            echo $e->getMessage();
    
            die();
    }

$sql="SELECT * FROM utilisateur WHERE login=:login";
$stmt = $cnx->prepare($sql);
$stmt ->bindValue(":login", $login);
$stmt -> execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC);
$loginBD = $result['login'];
$passwordBD = $result['password'];

//3. Comparer le password reçu dans le form avec le password du user obtenu via la bd

// if($password ==  $fakeUserPassword && $login == $fakeUserLogin){

    if(password_verify($password, $passwordBD)){
    //4. Si ok => rediriger vers l'accueil
    // Si non => aller vers la page de login en envoyant un message dans l'URL
    $_SESSION['login'] = $login;
    header('location: ./index.php');
}
else{
    header('location: ./login.php?error=badPass');
}



