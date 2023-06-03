document.addEventListener("DOMContentLoaded",()=>{
  //botaoBusca.innerChild.addEventListener("click", search);
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