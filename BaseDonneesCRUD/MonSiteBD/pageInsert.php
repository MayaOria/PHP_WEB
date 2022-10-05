
    <form action="./index.php?p=insertTraitement" method="POST">
        
        <input type="text" maxlength="100" name="titre" placeholder="Titre"><br><br>
        <input type="number" name="duree" placeholder="Durée"><br><br>
        <label for="description">Description du film :</label><br>
        <textarea name="description" id="description" cols="30" rows="10"></textarea><br><br>
        <label for="date">Date de sortie : </label>
        <input type="date" name="dateSortie" id="dateSortie"><br><br>
        <!-- <input type="text" maxlength="100" name="image" placeholder="Description de l'image"><br><br> -->
        <input type="submit" value="Insérer dans la BD"><br>
    </form>
