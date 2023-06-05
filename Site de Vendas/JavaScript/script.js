// // document.addEventListener("DOMContentLoaded", () => {
// //   //let botaoBusca = document.getElementsByClassName("botaoBusca")
// //   //botaoBusca.innerChild.addEventListener("click", search);

// // })
// window.onscroll = function () {
//   if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
//     getProducts();
//   }
// };

// function search() {
//   let input = document.getElementsByClassName("caixaBusca");

//   let string = input.value;
//   let array = string.split(" ");
//   let sendArray;

//   for (let i = 0; i < 5; i++) {
//     sendArray[i] = array[i]
//   }

//   let options = {
//     method: post,
//     body: sendArray
//   }

//   fetch("php/getproduct.php", options);
//   window.location = "busca.html"
// }

// function renderSearch(newProducts) {
//   const prodClass = document.getElementsByClassName("productTd")
//   const template = document.getElementsByClassName("template")

//   for (let product of newProducts) {
//       let productCard = template.innerHTML
//           .replace("{{nome-prod}}", product.nome)
//           .replace("{{preco-original}}", product.precoOriginal)
//           .replace("{{preco-desconto}}", product.precoDesconto)

//           console.log(product.nome, product.precoOriginal,  product.precoDesconto)
//       prodClass.insertAdjacentHTML("beforend", productCard);
//   }
// }

// async function getProducts() {

//   try {

//       let response = await fetch("php/getProducts.php");
      
//       if (!response.ok)
//            throw new Error(response.statusText);

//       var products = await response.json();
//   }
//   catch (e) {
//       console.error(e);
//       return;
//   }
 
//   renderSearch(products);
// }

// function verifyLogin () {
//   let headerIcons = document.querySelectorAll(".headerA");

//   for (let i = 0; i < headerIcons.length; i++) {
//     headerIcons[i].addEventListener("click", function () {
//         let response = fetch("php/isLogged.php")
//         if(!response.success)
//           window.location = response.path
//     });
//   }
// }