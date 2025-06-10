let errore = [true,true,true,true,true];
function checkName(event)
{
    const input = event.currentTarget;
    if (input.value.length >= 3) 
    {
        input.parentNode.classList.remove('errorj');
        errore[0] = false;
    } 
    else 
    {
        input.parentNode.classList.add('errorj');
        errore[0]=true;
    }
}

function checkSurname(event)
{
    const input = event.currentTarget;
    if (input.value.length >= 3) 
    {
        input.parentNode.classList.remove('errorj');
        errore[1] = false;
    } 
    else 
    {
        input.parentNode.classList.add('errorj');
        errore[1] = true;
    }
}
function onResponse(response)
{
    return response.json();
}
function jsonCheckEmail(json) 
{
    const ris = document.querySelector("#spanEmail");
    if (json.exists) 
    {  
        errore[2]=true;
        ris.textContent = "Email già utilizzata";
        ris.parentNode.classList.add("errorj");
    } 
    else 
    {
        errore[2]=false;
        ris.textContent = "Devi inserire un email valida";
        ris.parentNode.classList.remove("errorj");
    }
}
function JsonEmail(json)
{
    const ris = document.querySelector("#spanEmail");
    const email = document.querySelector(".email input");
    if (json.format && json.dns && !json.disposable)
    {
        fetch("check_Email_db.php?email="+encodeURIComponent(String(email.value).toLowerCase())).then(onResponse).then(jsonCheckEmail);
    } 
    else 
    {
        ris.textContent = "Devi inserire un email valida";
        ris.parentNode.classList.add("errorj");
        errore[2] = true;
    }
}
function checkPassword(event) 
{
    const passwordInput = document.querySelector('.password input');
    if (passwordInput.value.length >= 8) 
    {
        document.querySelector('.password').classList.remove('errorj');
        errore[3] = false;
    } 
    else 
    {
        document.querySelector('.password').classList.add('errorj');
        errore[3] = true;
    }

}
function checkConfirmPassword()
{
    const pass = document.querySelector('.password input');
    const pass2 = document.querySelector('.checkpassword input');
    if(pass.value === pass2.value)
    {
        pass2.parentNode.classList.remove("errorj");
        errore[4] = false;
    }
    else
    {
        pass2.parentNode.classList.add("errorj");
        errore[4] = true;
    }
}

function checkSignup(event)
{
    const input = event.currentTarget;
    for(let i=0;i<5;i++)
    {
        if(errore[i]===true)
        {
            event.preventDefault();
            input.parentNode.classList.add('errorj');
            break;
        }
    }
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

function checkEmail() 
{
    let email = document.querySelector('.email input').value;
    email = email.replace(/\s+/g, "");
    const url = 'https://www.disify.com/api/email/' + email;
    fetch(url).then(onResponse).then(JsonEmail);
}
function verificaEmail() 
{
    const email = document.querySelector('#bottoneEmail').value;
    const url = 'https://www.disify.com/api/email/' + email;
    fetch(url).then(onResponse).then(onJsonEmail);
}
function mostraInformativa()
{
    document.querySelector("#informativa").style.display="flex";
}


document.querySelector('.name input').addEventListener('blur', checkName);
document.querySelector('.surname input').addEventListener('blur', checkSurname);
document.querySelector('.email input').addEventListener('blur', checkEmail);
document.querySelector('.password input').addEventListener('blur', checkPassword);
document.querySelector('.password input').addEventListener('blur', checkConfirmPassword);
document.querySelector('.checkpassword input').addEventListener('blur', checkConfirmPassword);
document.querySelector('.submit #submit').addEventListener('click', checkSignup);


document.querySelector("#bottoneEmail").addEventListener("click", () => mostraInformativa());
document.querySelector("#bottoneEmailFreccia").addEventListener("click",verificaEmail);