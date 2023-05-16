function sendForm(form) {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'signIn.php')
}

xhr.onload = function(){

  if(xhr.status === 200 || xhr.response === null) {
    console.log("Resposta não foi obtida", xhr.status);
    return; 
  }

  let loginResponse = xhr.response;

  if(loginResponse) 
    window.location = "perfilPage.html";
  else{
    alert("Senha incorreta!");
    form.senha.value = ""
    form.senha.focus()
  }
  
}

document.addEventListener("DOMContentLoaded", function () {
  this.forms.onsubmit = function (e) {
    sendForm(form)
    e.preventDefault();
  }
})

function isLoggedIn() {
  let xhr = new XMLHttpRequest();
  xhr.open('GET', "isLoggedIn.php", true);
  
  document.addEventListener("DOMContentLoaded", function () {
    let headerIcons = document.querySelectorAll(".headerA");

    for (let i = 0; i < headerIcons.length; i++) {
      headerIcons[i].addEventListener("click", function () {
        if (!xhr.response)
          this.href = "loginPage.html";
      });
    }

    xhr.send();
  });
}