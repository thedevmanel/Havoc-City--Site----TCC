document.addEventListener("DOMContentLoaded", function() {
    const fileInput = document.getElementById("fileInput");
    const fileContents = document.getElementById("fileContents");

    fileInput.addEventListener("change", function(event) {
        const selectedFile = event.target.files[0];
        
        if (selectedFile) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const fileText = e.target.result;
                fileContents.textContent = fileText;
            };

            reader.readAsText(selectedFile);
        } else {
            fileContents.textContent = "Nenhum arquivo selecionado";
        }
    });
});
