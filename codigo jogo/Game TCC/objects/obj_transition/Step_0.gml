/// @description Inserir descrição aqui
// Você pode escrever seu código neste editor

// Atualizar a transparência gradualmente em direção ao alvo
if (alpha != target_alpha) {
    if (alpha < target_alpha) {
        alpha += speed;
        if (alpha > target_alpha) alpha = target_alpha;
    } else {
        alpha -= speed;
        if (alpha < target_alpha) alpha = target_alpha;
    }
}





