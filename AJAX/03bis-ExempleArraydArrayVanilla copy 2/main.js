
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

    let arrayobj = JSON.parse (xhr.responseText);

    console.log(arrayobj);
    console.log (typeof(arrayobj));

    //pour parcourir en js : avec foreach...
    // document.getElementById("contenuReponse").innerHTML = obj.nom + " aime bien " + obj.hobby + " et est " + obj.nationalite
    
    
        }

        else {
            document.getElementById("contenuReponse").innerHTML = "Erreur";
        }
    }
}

})