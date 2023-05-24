document.addEventListener("DOMContentLoaded",()=>{
  let botaoBusca = document.getElementsByClassName("botaoBusca")
  //botaoBusca.innerChild.addEventListener("click", search);

  isLoggedIn();
  buttonChange();
})

function buttonChange(){
  let img1 = document.querySelector(".imagem1");
  let img2 = document.querySelector(".imagem2");
  let botaoDir = document.querySelector(".rightButton");
  let botaoEsq = document.querySelector(".leftButton");
  botaoDir.addEventListener("click",()=>{
    img1.style.display = "none";
    img2.style.display = "inline-block";
  })
  botaoEsq.addEventListener("click",()=>{
    img2.style.display = "none";
    img1.style.display = "inline-block";
  })
}

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

  fetch("php/getproduct.php", options);
  window.location = "busca.html"
}

function isLoggedIn() {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "../php/isLogged.php", true)
  let headerIcons = document.getElementsByClassName("headerA");

  for (let i = 0; i < headerIcons.length; i++) {
    headerIcons[i].onclick = function (){
      this.href = "html/loginPage.html"
      xhr.send();
    }
  }
}