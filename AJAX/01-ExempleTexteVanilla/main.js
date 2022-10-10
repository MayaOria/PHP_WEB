
document.getElementById('afficher').addEventListener ("click", (evenement) => {
    
    let xhr = new XMLHttpRequest();

    // console.log(xhr.readyState);
    xhr.open("GET", "./traitement.php");

    // console.log(xhr.readyState);

    xhr.send (null); //null parce qu'on n'envoie rien au serveur

    document.getElementById('jauge').innerHTML = "<img src='./200w.gif'></img>";
xhr.onreadystatechange = () => {  //La propriété "readyState permet de voir les changements de statut de la requete au serveur"
    
    if(xhr.readyState == 4){
        if(xhr.status == 200 || xhr.status == 304){ //status est relatif l'http ! pas à l'ajax 
    document.getElementById('jauge').innerHTML = ""
    document.getElementById("contenuReponse").innerHTML = xhr.responseText;
    //ne va rien renvoyer pcq le serveur n'a pas encore pu récupérer la réponse les xhr.open et xhr.send vont prendre plus de temps que 
    //le document.getElementById... => il n'y a pas encore de valeur dans xhr à ce stade-là pcq le serveur n'a pas encore eu le temps de le faire!
    //il faut ajouter un gestionnaire d'evenement qui va se baser sur le statut (il y a 4 statuts possible)
        }

        else {
            document.getElementById("contenuReponse").innerHTML = "Erreur";
        }
    }
}

})