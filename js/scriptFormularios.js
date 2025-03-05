document.addEventListener("DOMContentLoaded", function() {
    const boxMessage = document.querySelector('.container-alert');

    // Ao carregar a página, faz a div aparecer instantaneamente
    boxMessage.classList.add('appear');

    // Após 5 segundos, faz a div desaparecer
    setTimeout(() => {
        boxMessage.classList.add('disappear');
    }, 5000);
});

document.getElementById("forgot-pass").addEventListener("click", () =>{
    Swal.fire({
        title: 'Digite seu email',
        html: `
            <p class="text-desative-account"> Para que você possa escrever uma nova senha, enviaremos um link para seu email </p>
            <div class="input-box-forgot-pass">
                <input type="text" id="forgot-pass-input" class="swal2-input" placeholder="Digite seu email">
            </div>
        `,
        showCancelButton: true,
        preConfirm: () => {
            const email = document.getElementById('forgot-pass-input').value;
            if (!email) {
                Swal.showValidationMessage('O campo está vazio, para continuar digite seu email');
            }
            return email;
        },
        customClass: {
            title: 'title-send-email',
            confirmButton: 'send-email-confirm-btn',
            cancelButton: 'send-email-cancel-btn',
            validationMessage: 'message-validate-send-email'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('input-for-forgot-pass').value = result.value;
            document.getElementById('form-input-forgot-pass').submit();
        }
    });
});
