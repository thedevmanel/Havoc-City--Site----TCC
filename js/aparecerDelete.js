var buttonDelete = document.getElementById("button-delete") 
var boxDelete = document.getElementById("box-info-delete")
var buttonYes = document.getElementById("delete")
var buttonNo = document.getElementById("cancel")

function showMessage() {
    boxDelete.style.display = "block"
} 

function hideMessage() {
    boxDelete.style.display = "none"
}

buttonDelete.addEventListener("click", showMessage())
buttonNo.addEventListener("click", hideMessage())