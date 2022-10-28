document.getElementById("name").addEventListener("keyup", (event)=>{

    let value = event.target.value;
    let formulaire = new FormData (document.getElementById("formHTML"));
    // console.log(formulaire);
    let xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = (event) =>{
        if(xhr.readyState === 4){
            if(xhr.status == 200 || xhr.status == 304){

                
                let result = JSON.parse(xhr.responseText);
                if (result != "error"){
                    
                    let div = document.getElementById("resultat");
                    div.innerHTML = "";
                    let ul = document.createElement("ul");
                    result.forEach((element) => {
                        
                        let li = document.createElement("li");
                        let a = document.createElement('a')
                        a.href = 'index.php?p=searchGoogleTraitementResult&id='+element.id;
                        a.innerHTML= element.name + ", " + element.gender + ", " + element.birthdate;
                        console.log(a)
                        li.appendChild(a);
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