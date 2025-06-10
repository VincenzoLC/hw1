function mostraInformativa()
{
    document.querySelector("#informativa").style.display="flex";
}
function verificaEmail() 
{
    const email = document.querySelector('#bottoneEmail').value;
    const url = 'https://www.disify.com/api/email/' + email;
    fetch(url).then(onResponse).then(onJsonEmail);
}
function onJsonEmail(json)
{
    const ris = document.querySelector("#esitoEmail");
    if (json.format && json.dns && !json.disposable)
    {
        ris.innerHTML = 'Email valida!';
        ris.style.color="green";
        ris.display='block';       
    } 
    else 
    {
        ris.innerHTML = 'Email NON valida!';
        ris.style.color="red";
        ris.display='block';
    }
}
function onResponse(response)
{
    return response.json();
}
function aggiungiCarrello() {
    let bottone = document.querySelector("#add");
    let nome = bottone.dataset.name;
    
    let dato = {
        nome: nome
    };

    
    fetch("carrello.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(dato)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error("Errore dal server");
        }
        return response.json();
    })
    .then(data => {
        console.log("Risposta dal server:", data);
 
        alert(data.message || "Articolo aggiunto");
    })
    .catch(error => {
        console.error("Errore:", error);
        alert("Errore nell’aggiunta al carrello");
    });
}


document.querySelector("#bottoneEmail").addEventListener("click",mostraInformativa);
document.querySelector("#bottoneEmailFreccia").addEventListener("click",verificaEmail);
document.querySelector("#add").addEventListener("click",aggiungiCarrello);