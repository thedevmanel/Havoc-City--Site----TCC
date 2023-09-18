const registerButton = document.getElementById("registerButton");
const loginButton = document.getElementById("loginButton");
const navButtons = document.getElementById("navButtons");

// Função para substituir os botões de cadastro/login pelo botão "Minha Conta"
function showAccountButton() {
    navButtons.innerHTML = '<button id="accountButton">Minha Conta</button>';
    const accountButton = document.getElementById("accountButton");
    accountButton.addEventListener("click", () => {
        // Aqui você pode adicionar a lógica para a página de conta do usuário
    });
}

// Event listener para o botão de Cadastro
registerButton.addEventListener("click", () => {
    // Lógica de cadastro
    showAccountButton();
});

// Event listener para o botão de Login
loginButton.addEventListener("click", () => {
    // Lógica de login
    showAccountButton();
});
