var password = document.getElementById("senha")

function showPassword() {
    if (password.type == 'password') {
        password.type = 'text' 
    } else {
        password.type = 'password'
    }
}

