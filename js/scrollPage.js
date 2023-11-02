// Função para atualizar o estilo de fundo com base na posição de rolagem
function atualizarBackground() {
    const menuH = document.getElementById('menu-h');
    if (window.scrollY >= 770) { // Verifica se a posição Y é maior ou igual a 770
      menuH.style.backgroundColor = '#000'; // Defina a cor de fundo desejada
    } else {
      menuH.style.backgroundColor = 'transparent'; // Volte ao fundo transparente se não estiver rolando até 770
    }
  }

  // Adicione um ouvinte de evento ao evento de rolagem
  window.addEventListener('scroll', atualizarBackground);

  // Chame a função uma vez para verificar a posição de rolagem inicial
  atualizarBackground();