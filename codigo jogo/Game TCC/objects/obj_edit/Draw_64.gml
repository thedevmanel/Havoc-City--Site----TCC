/// @description Inserir descrição aqui
// Você pode escrever seu código neste editor

draw_set_color(#ffeeff);
draw_set_font(fnt_arcadeclassic_title)
draw_set_halign(fa_left);
draw_text(128, 130, "Edition")

draw_set_font(fnt_arcadeclassic_score)
draw_text(70, 212, "Insert Your Name: ");	
draw_text(70, 245, global.name_player); // Desenha o texto digitado	

draw_set_halign(fa_center)
draw_text(160, 380, "Press ENTER")
draw_text(480, 380, "Press ESC")
