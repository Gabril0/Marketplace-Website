document.addEventListener("DOMContentLoaded", () => {
    let loginForm = document.getElementsByClassName("login-box")
    let registerForm = document.getElementsByClassName("register-box")

    loginForm.onsubmit = function (e) {
        sendCadastro(loginForm, "signIp.php")
        e.preventDefault();
    };

    registerForm.onsubmit = function (e) {
        sendCadastro(registerForm, "signUn.php")
        e.preventDefault();
    };

})

async function sendCadastro(form, redirect) {

    try {
        let options = {
            method: 'post',
            body: new FormData(form)
        }

        let response = await fetch(redirect, options);
        if (!response.ok)
            throw new Error(response.statusText);

        let json = await response.json();

        if (json.success) {
            window.location = result.detail;
        } else {
            form.senha.value = ''
            form.senha.focus();
        }
    } catch (error) {
        console.error(error);
    }
}
