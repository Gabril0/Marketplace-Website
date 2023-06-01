document.addEventListener("DOMContentLoaded", () => {
  //let botaoBusca = document.getElementsByClassName("botaoBusca")
  //botaoBusca.innerChild.addEventListener("click", search);

})

function search() {
  let input = document.getElementsByClassName("caixaBusca");

  let string = input.value;
  let array = string.split(" ");
  let sendArray;

  for (let i = 0; i < 5; i++) {
    sendArray[i] = array[i]
  }

  let options = {
    method: post,
    body: sendArray
  }

  fetch("../php/getProduct.php", options);
  window.location = "busca.html"
}

function verifyLogin () {
  let headerIcons = document.querySelectorAll(".headerA");

  for (let i = 0; i < headerIcons.length; i++) {
    headerIcons[i].addEventListener("click", function () {
        let response = fetch("../php/isLogged.php")
        window.location = response.detail;
    });
  }
}