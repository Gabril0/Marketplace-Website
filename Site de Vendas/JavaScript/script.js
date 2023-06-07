var option;

document.addEventListener("DOMContentLoaded", function() {  
    verifyLogin();

    let caixaBusca = document.querySelector(".caixaBusca");
    let botaoBusca = document.querySelector(".botaoBusca img"); 
    botaoBusca.addEventListener("click", () => search(caixaBusca.value));
})

window.onscroll = function () {
  if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
    getProducts();
  }
};

function search(string) {
  
  let array = [];
  array = string.split(" ");

  localStorage.setItem("array", JSON.stringify(array));

  window.location = "busca.html"
}

function verifyLogin() {

    var headerIcons = document.querySelectorAll(".headerA");

    for (var botao of headerIcons) {
        botao.addEventListener("click", () => fetch("php/isLogged.php"));
    }
}