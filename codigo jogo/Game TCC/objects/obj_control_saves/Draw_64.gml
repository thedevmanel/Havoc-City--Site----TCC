/// @description Inserir descrição aqui
// Você pode escrever seu código neste editor

if file_exists("save.sav") {
	/* Parte do delete */
	draw_set_color(#ffeeff);
	draw_set_font(fnt_arcadeclassic_normal)
	draw_set_halign(fa_center);
	draw_text(320, 32, text_delete_title);
	draw_set_font(fnt_arcadeclassic_normal)
	draw_text(224, 64, text_delete_yes);
	draw_text(416, 64, text_delete_no);
	
	/* Parte que contém o ultimo save*/
	draw_set_color(#ffeeff);
	draw_set_font(fnt_arcadeclassic_title)
	draw_set_halign(fa_left);
	draw_text(128, 130, "The   last save...")
	
	/* abrindo save */
	ini_open("save.sav");
		display_life = ini_read_real("Player", "life", 3);
		display_name = ini_read_string("Player", "name", "Player");
		display_rm = ini_read_real("Player", "rm_corrent", 0);
		display_mana = ini_read_real("Player", "mana", 0)
		display_points = ini_read_real("Game", "pontuation", 0)
		display_seconds = ini_read_real("Game", "seconds", 0);
		display_minutes = ini_read_real("Game", "minutes", 0);
		display_hours = ini_read_real("Game", "hours", 0);

	ini_close()
	
	display_time = string(display_hours) + ":" + string(display_minutes) + ":" + string(display_seconds);
	
	if display_rm == 2 {
		display_rm -= 1;	
	}
		
	draw_set_font(fnt_arcadeclassic_normal)
	draw_text(70, 212, "Name: " + display_name);	
	draw_text(290, 212, "Lives: " + string(display_life));
	draw_text(70, 244, "Stage: " + string(display_rm));
	draw_text(290, 244, "Mana: " + string(display_mana));		
	draw_text(440, 212, "Pontuation: " + string(display_points));
	draw_text(440, 244, "Time: " + display_time);		

} else {
	draw_set_color(#ffeeff);
	draw_set_font(fnt_arcadeclassic_title)
	draw_set_halign(fa_left);
	draw_text(128, 130, "New Game")
	
	draw_set_font(fnt_arcadeclassic_score)
	draw_text(70, 212, text_insert_name);	

}



