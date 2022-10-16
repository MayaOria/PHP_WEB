<header class='header'>
    <nav>
        <a href="./index.php?p=home"><i class="fa-solid fa-paw fa-3x my-10 icon"></i></a>
        <ul>
            
            <li><a href="./index.php?p=home">Accueil</a></li>
            <li><a href="./index.php?p=pets">Animaux</a></li>
            <li><a href="./index.php?p=insert">Ajouter un animal</a></li>
            <li><a href="./index.php?p=search">Rechercher un animal</a></li>
        </ul>
        <?php
                if (isset($_SESSION['loginConnecte'])){
                    // $_SESSION['loginConnecte'] 
                    echo "<a class='nav-link' href='./logout.php'>Se deconnecter</a>";
                }
                else {
                    header ("location: ./login.php");
                }
            ?>

        
    </nav>
</header>