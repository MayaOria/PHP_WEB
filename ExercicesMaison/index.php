<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pets database | Zouzou world</title>
    <meta name="description" content="My first web site including a data base of all my pets">
    <script src="https://kit.fontawesome.com/dfcf8bdd46.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&family=Poppins:wght@200;300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    
<?php include_once "./includes/header.php" ?>

<main>

    <?php 

        if(isset ($_GET['p'])){
            include_once "./".$_GET['p'].".php";
        }
        else include_once "./home.php";
    ?>

</main>

<?php include_once "./includes/footer.php" ?>
    
</body>
</html>