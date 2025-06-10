function chiudiCarrello()
{
    let spazio = document.querySelector('#spazioCarrello');
    spazio.classList.remove("aperto");
    setTimeout(() => spazio.style.display="none",100)
    document.body.classList.remove("no-scroll");
}
function apriCarrello()
{
    let spazio = document.querySelector('#spazioCarrello');
    spazio.style.display="flex";
    setTimeout(() => spazio.classList.add("aperto"),1)
    document.body.classList.add("no-scroll");
}
function caricaCarrello() {
    fetch('mostraCarrello.php')
    .then(response => response.json())
    .then(data => {
        const prodottiDiv = document.getElementById('prodotti');
        if (data.success) {
            if (data.carrello.length === 0) {
                prodottiDiv.innerHTML = '<span>CARRELLO VUOTO</span>';
                return;
            }

            let html = '<table border="1" cellpadding="5" cellspacing="0">';
            html += '<tr><th>Articolo</th><th>Quantità</th></tr>';

            for (let i = 0; i < data.carrello.length; i++) {
                const item = data.carrello[i];
                html += '<tr><td>' + item.nome + '</td><td>' + item.quantita + '</td></tr>';
            }

            html += '</table>';
            prodottiDiv.innerHTML = html;
        } else {
            prodottiDiv.innerHTML = '<span>Devi essere loggato per accedere al carrello</span>';
        }
    })
    .catch(err => {
        console.error('Errore fetch:', err);
        const prodottiDiv = document.getElementById('prodotti');
        prodottiDiv.innerHTML = '<span>Errore di rete</span>';
    });
}

document.addEventListener('DOMContentLoaded', caricaCarrello);

document.querySelector("#bottoneCHIUSO").addEventListener("click",  chiudiCarrello);
document.querySelector("#carrelloIMG").addEventListener("click", apriCarrello);


