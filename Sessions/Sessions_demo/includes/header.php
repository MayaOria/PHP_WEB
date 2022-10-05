<?php
session_start();
?>
<header>
    <nav>
        <a href="./index.php?p=accueil">Accueil</a>
        <a href="./index.php?p=page1">Page 1</a>
        <a href="./index.php?p=page2">Page 2</a>
        <a href="./index.php?p=page3">Page 3 (formulaire)</a>
        <h5>
            <?php
            echo $_SESSION['login'];
            echo "<a href='logout.php'>Se deconnecter</a>";
            ?>
        
        </h5>
        
        
    </nav>
</header>
