function toggleMenu() {
    let menu = document.getElementById("side-menu");
  
    if ((window.innerWidth < window.innerHeight) || (window.innerHeight < 599)) { // Garante que só funcione no modo retrato
      menu.classList.toggle("show-menu");
    }
  }
  