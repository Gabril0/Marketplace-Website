window.onload = function (){
    option = localStorage.getItem("option")
    alert(option.body);

    getProducts();
}

function renderSearch(newProducts) {
    const prodClass = document.getElementsByClassName("productTd")
    const template = document.getElementsByClassName("template")
  
    for (let product of newProducts) {
        let productCard = template.innerHTML
            .replace("{{nome-prod}}", product.nome)
            .replace("{{preco-original}}", product.precoOriginal)
            .replace("{{preco-desconto}}", product.precoDesconto)
  
          console.log(product.nome, product.precoOriginal,  product.precoDesconto)
        prodClass.insertAdjacentHTML("beforend", productCard);
    }
  }
  
  async function getProducts() {
  
    try {
  
        let response = await fetch("php/getProducts.php", option);
  
        if (!response.ok)
             throw new Error(response.statusText);
  
        var products = await response.json();
    }
    catch (e) {
        console.error(e);
        return;
    }
  
    renderSearch(products);
  }