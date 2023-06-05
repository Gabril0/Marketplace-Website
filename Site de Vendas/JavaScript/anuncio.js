window.onload = function() {
    const form = document.querySelector(".novoAnuncio")
    form.onsubmit = function() {
        cadastraAnuncio(form)
        e.preventDefault();
    }
}

async function cadastraAnuncio(form) {
    let formData = new FormData(form)
    let option = {
        method: "post",
        body: formData
    }

    let response = await fetch("php/anuncio.php", option)
    window.location = response;
}