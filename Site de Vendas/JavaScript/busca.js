
function renderSearch(newProducts) {
  const prodClass = document.querySelector(".productTd")
  const template = document.querySelector(".template")

  for (let product of newProducts) {
    let productCard = template.innerHTML
      .replace("{{nome-prod}}", product.nome)
      .replace("{{preco-original}}", product.precoOriginal)
      .replace("{{preco-desconto}}", product.precoDesconto)

    console.log(product.nome, product.precoOriginal, product.precoDesconto)
    prodClass.insertAdjacentHTML("beforend", productCard);
  }
}

async function getProducts() {

  try {
    const array = localStorage.getItem("array");

    alert(array);

    const response = await fetch("php/getProduct.php", {method: 'post', 
                                                        headers: {'Content-Type': 'application/json'},
                                                        body: JSON.stringify(array)});//ESSA BOMBA (option) PRECISA SER UM OBJECT
    if (response.ok){
      const result = await response.json();
      renderSearch(result);
    }else{
      console.log("else da requisição");
    }
  }
  catch (e) {
    console.log("falha no catch buscar", e)
    return;
  }

}

window.onload = function(){
  getProducts();
}
// window.onload = function () {
//   const botaoBusca = document.querySelector(".botaoBusca");
//   botaoBusca.addEventListener("click", function (e) {
//     e.preventDefault();
//     getProducts();
//   })