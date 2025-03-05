document.addEventListener("DOMContentLoaded", function() {
    const fileInput = document.getElementById("fileInput");
    const confirmationDiv = document.getElementById("confirmationDiv");

    fileInput.addEventListener("change", function(event) {
        const selectedFile = event.target.files[0];

        if (selectedFile) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const fileText = e.target.result;

                const regex =
                    /(?:seconds|minutes|hours|pontuation)="(\d+\.\d+)"/g;
                let match;

                while ((match = regex.exec(fileText)) !== null) {
                    const fieldName = match[0].split("=")[0];
                    const value = match[1];

                    const inputField = document.getElementById(fieldName);
                    if (inputField) {
                        inputField.value = value;
                    }
                }

                confirmationDiv.style.display = "block";
            };

            reader.readAsText(selectedFile);
        }
    });
});

function showMessageAlert(inputs) {
    const titleAlert = inputs === "btnEdit" ?  "Confirme a Senha" : "Voce tem certeza?";
    const textAlert = inputs === "btnEdit" ? "Para editar dados da conta, digite sua senha" : "Ao desativar a conta, você não poderá recuperá-la !!";

    Swal.fire({
        title: titleAlert,
        text: '',
        html: `
            <p class="text-desative-account"> ${textAlert} </p>
            <div class="input-container-delete">
                <input type="password" id="password-delete" class="swal2-input" placeholder="Digite sua senha">
                <img src="Imagens/hide_pass.png" alt="mostrar/ocultar senha" class="show-password-delete" id="show-password" />
            </div>
        `,
        showCancelButton: true,
        preConfirm: () => {
            const password = document.getElementById('password-delete').value;
            if (!password) {
                Swal.showValidationMessage('O campo está vazio, para continuar digite sua senha');
            }
            return password;
        },
        customClass: {
            title: 'title-desative-account',
            confirmButton: 'desative-account-confirm-btn',
            cancelButton: 'desative-account-cancel-btn',
            validationMessage: 'message-validate-desative-account'
        }
    }).then((result) => {
        if (inputs != "btnEdit") {
            if (result.isConfirmed) {
                // Set the value of the hidden input field
                document.getElementById('inputDeleteUser').value = result.value;
                // Submit the form
                document.getElementById('formInputDelete').submit();
            }
        } else {
            if (result.isConfirmed) {
                // Set the value of the hidden input field
                document.getElementById('inputEditUser').value = result.value;
                // Submit the form
                document.getElementById('formInputEdit').submit();
            }
        }
    });
    
    const passwordDelete = document.getElementById('password-delete');
    const showPassword = document.getElementById('show-password');

    showPassword.addEventListener('click', () => { 
        const type = passwordDelete.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordDelete.setAttribute('type', type);
    
        showPassword.src = type === 'password' ? 'Imagens/hide_pass.png' : 'Imagens/show_pass.png';     
    });
} 
