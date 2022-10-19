document.getElementById("name").addEventListener("keyup", (event)=>{

    let value = event.target.value;
    let formulaire = new FormData (document.getElementById("formHTML"));
    // console.log(formulaire);
    let xhr = new XMLHttpRequest();

    xhr.onreadystatechange = (event) =>{
        if(xhr.readyState === 4){
            if(xhr.status == 200 || xhr.status == 304){

                // console.log("ok");
                let result = JSON.parse(xhr.responseText);
                if (result != "error"){
                    
                    let div = document.getElementById("resultat");
                    div.innerHTML = "";
                    let ul = document.createElement("ul");
                    result.forEach((element) => {
                        
                        let li = document.createElement("li");
                        li.innerHTML= element.name + ", " + element.gender + ", " + element.birthdate;
                        ul.appendChild(li);
                    });

                    div.appendChild(ul);
                }
            }

            else console.log("error : " + xhr.status);
        }
    
    }

    xhr.open("POST", "./searchGoogleTraitement.php");
    xhr.send(formulaire);
})