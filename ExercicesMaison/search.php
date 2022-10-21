
<h1 class='insert'>Suis-je dans la maison ?</h1>
<form action="" method="POST" id ="formHTML">
    <label class = 'my-10' for="name">Quel est mon nom ? (googleStyleSearch) </label>
    <input class = 'input' type="text" name="name" id="name">
</form>

<br>
<form action="./index.php?p=searchTraitement" method = "POST">
    <label class = 'my-10' for="name">Quel est mon nom ? </label>
    <input class = 'input' type="text" name= "name">
    <input class = "btn btn-envoyer" type="submit" value="&#128269;">
</form>



<br>
<br>
<br>

<h2>Résultat(s) :</h2>

<div id="resultat"></div>

<script src="./main.js"></script>

