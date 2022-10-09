<h1 class='insert'>Ajouter un nouveau compagnon</h1>

<form  action="./insertTraitement.php" method="POST">
    <label class = 'my-10' for="name">Nom : </label>
    <input class = 'input' type="text" name="name" id="name">
    <label class = 'my-10 gender' for="gender">Genre : </label>
    <select class = 'input' name="gender" id="gender">
        <option value="M">M</option>
        <option value="F">F</option>
        <option value="A">Non-binaire</option>
    </select>
    <label class = 'my-10' for="birthdate">Date de naissance : </label>
    <input class = 'input date' type="date" name="birthdate" id="birthdate">
    <input class = 'btn btn-envoyer' type="submit" value="ENVOYER">
</form>