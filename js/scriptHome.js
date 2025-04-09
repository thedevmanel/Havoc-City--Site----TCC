// Função para atualizar o estilo de fundo com base na posição de rolagem
function atualizarBackground() {
  const menuH = document.getElementById('menu-h');
  const imgBack = document.querySelector('.box-image-home'); // Seleciona o elemento pela classe

  if (menuH && imgBack) {
    // Calcula a posição inferior dos elementos
    const menuHBottom = menuH.getBoundingClientRect().bottom + window.scrollY + 2;
    const imgBackBottom = imgBack.getBoundingClientRect().bottom + window.scrollY;

    // Verifica se o final de menuH está encostando no final de imgBack
    if (menuHBottom >= imgBackBottom) {
      menuH.style.backgroundColor = '#000'; // Define a cor de fundo desejada
    } else {
      menuH.style.backgroundColor = 'transparent'; // Volte ao fundo transparente se não estiver rolando até encostar
    }
  }
}

// Adicione um ouvinte de evento ao evento de rolagem
window.addEventListener('scroll', atualizarBackground);

// Chame a função uma vez para verificar a posição de rolagem inicial
document.addEventListener('DOMContentLoaded', atualizarBackground);

// animação de divs
const allAnimationsContent = document.querySelectorAll('[data-animationH]')
const animationTitle = document.querySelectorAll('[data-title]')

function scrollAnimation() {
  if (window.innerWidth <= 600) {
    return;
  }
  const windowTop = window.pageYOffset + ((window.innerHeight * 3) / 4)

  allAnimationsContent.forEach((e) => {
    if (windowTop > e.offsetTop) {
      e.classList.add('iniciated-animation')
    }

    animationTitle.forEach((e) => {
      if (windowTop > e.offsetTop) {
        // setTimeout(()=> {
          e.classList.add('iniciated-animation')
        // }, 300)
      }
    })
  })
}

window.addEventListener('scroll', () => {
  scrollAnimation()
})