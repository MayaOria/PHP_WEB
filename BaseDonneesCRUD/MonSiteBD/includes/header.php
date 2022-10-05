<?php
session_start();
?>
<header>
    <nav class="nav">
        <a class ="nav-link" href="./index.php?p=accueil">Accueil</a>
        <a class ="nav-link"href="./index.php?p=listeFilms">Films</a>
        <a class ="nav-link"href="./index.php?p=pageInsert">Insérer un film</a>
        <a class ="nav-link"href="./index.php?p=chercher">Chercher un film</a>
        
        
        
            <?php
            if (isset($_SESSION['login'])){

                
                echo "<a class ='nav-link' href='logout.php'>Se deconnecter</a>";
            }

            else{
                header ("location: ./login.php");
            }
            ?>
        
        
        
        
    </nav>
</header>
