function showPassword() {
    var password = document.getElementById("password")
    var img = document.getElementById("show-password");

    if (password.type === 'password') {
        password.type = 'text';
        img.src = 'Imagens/show_pass.png'; 
    } else {
        password.type = 'password';
        img.src = 'Imagens/hide_pass.png'; 
    }
}

