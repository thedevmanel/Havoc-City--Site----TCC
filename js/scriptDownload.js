/*
function messageAlert() {
    Swal.fire({
        position: "center",
        html: '<img src="Imagens/alert-message.png" alt="image alert" class="image-alert" /><p class="custom-content-class"> Você precisa entrar/criar uma sessão para realizar o download.</p>',
        title: "Atenção",
        showConfirmButton: true,
        customClass: {
            title: 'custom-title-class',
            text: 'custom-content-class',
            confirmButton: 'custom-confirm-button-class',
            popup: 'custom-popup-class'         
        }
  });
}
*/
if ((window.innerWidth < 600) || (window.innerHeight < 600)) {
    alert("A página ainda não está finalizada :(");
    window.location.href="http://localhost:3000/index.php";
}