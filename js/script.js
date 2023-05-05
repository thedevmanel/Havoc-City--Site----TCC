const senha = document.getElementById("senha")
const caixaSenha = document.querySelector(".caixa-mostrar-senha")

caixaSenha.addEventListener("click", () => {
    if (senha.type === 'password') {
        senha.type = 'text'
    } else {
        senha.type = 'password'
    }
})

const emailRegex = /^[\w-.]+@([\w-]+.)+[\w-]{2,4}$/g
const email = document.getElementById("email")

function verifyEmail() {
    if (email.value.match(emailRegex)) {
        return true
    } else {
        alert("Email inválido")
        return false
    }
}

function handleSubmit(e) {
    e.preventDefault()
    verifyEmail() 
    window.location.replace("https://gutodev.vercel.app")
}

document.addEventListener("submit", handleSubmit)