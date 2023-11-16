/// @description Inserir descrição aqui
// Você pode escrever seu código neste editor

layer_sprite_create("letters", 320, 192, spr_border_saves);

if file_exists("save.sav") {		
	layer_sprite_create("letters", 128, 352, spr_continue);
	layer_sprite_create("letters", 320, 352, spr_edit);
	layer_sprite_create("letters", 519, 352, spr_delete);
	
	if instance_exists(obj_interactive_button) {
		if escolha_load == 1 {
			obj_interactive_button.x = 128;
		} else if escolha_load == 2 {
			obj_interactive_button.x = 320;
		} else if escolha_load == 3 {
			obj_interactive_button.x = 519;	
		} else {
			obj_interactive_button.x = 128;
			escolha_load = 1;	
			text_delete_title = "";			
			text_delete_yes = "";
			text_delete_no = "";

		}
	}

} else {
	layer_sprite_create("letters",192 ,352 ,spr_new_game);
	layer_sprite_create("letters",452 ,352 ,spr_cancel);

	if instance_exists(obj_interactive_button) {
		if escolha_save == 1 {
			obj_interactive_button.x = 198;	
		} else if escolha_save == 2 {
			obj_interactive_button.x = 452;	
		}
	}

}


