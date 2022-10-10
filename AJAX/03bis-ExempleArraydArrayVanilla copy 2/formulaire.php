<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<!-- Créer un bouton. Lorsque l'on clickera dessus : le serveur nous renverra de l'HTML (un texte)
Le client n'envoie rien. Le serveur ne reçoit rien -->
    <button id="afficher">Afficher</button>
    Réponse du serveur :

    <div id="contenuReponse">Ici:</div>
    <div id="jauge"></div>

    <script src="./main.js"></script>
</body>
</html>