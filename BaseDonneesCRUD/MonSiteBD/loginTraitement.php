
    <?php
    session_start();

//1. récupérer le login & password avec $_POST

$login = $_POST["login"];
$password = $_POST["password"];

//2. Chercher le login dans la BD et obtenir son password
//FAKE vu qu'on ne fait pas appel à une BD pour le moment

$fakeUserLogin = "wad";
$fakeUserPassword = "wad";

//3. Comparer le password reçu dans le form avec le password du user obtenu via la bd

if($password ==  $fakeUserPassword && $login == $fakeUserLogin){

    //4. Si ok => rediriger vers l'accueil
    // Si non => aller vers la page de login en envoyant un message dans l'URL
    $_SESSION['login'] = $login;
    header('location: ./index.php');
}
else{
    header('location: ./login.php?error=badPass');
}



