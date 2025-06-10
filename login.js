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

document.querySelector("#bottoneEmail").addEventListener("click", () => mostraInformativa());
document.querySelector("#bottoneEmailFreccia").addEventListener("click",verificaEmail);