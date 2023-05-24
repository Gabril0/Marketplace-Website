function log() {
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "php/isLogged", true)
  xhr.responseType = "json"
  
  //verifica se algum header icon foi clicado
  xhr.onload = function () {
    if(xhr.status === 200)
    var isLogged = xhr.response
    
    let headerIcons = document.querySelectorAll(".headerA");
    
    for (let i = 0; i < headerIcons.length; i++) {
      headerIcons[i].addEventListener("click", function () {
        if (isLogged)
          this.href = "../html/loginPage.html"

      });
    }
  }

  xhr.send();
}

document.addEventListener("DOMContentLoaded", function () {
  isLoggedIn();
})