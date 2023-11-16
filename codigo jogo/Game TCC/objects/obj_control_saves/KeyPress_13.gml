/// @description Inserir descrição aqui
// Você pode escrever seu código neste editor

if file_exists("save.sav") {
	/* parte do load game */
	/* escolhendo o continue */
	if escolha_load == 1 {
		if display_rm > 1 {
			display_rm -= 1;
			room_goto(display_rm);

		} else {
			room_goto(display_rm);
		}
	} else if escolha_load == 2 {
		room_goto(rm_edit)	
	/* escolhendo o delete */
	} else if escolha_load == 3 {
		escolha_load = 4;
		instance_destroy(obj_interactive_button)
		instance_create_layer(416, 69, "Instances", obj_interactive_button_delete);
		text_delete_title = "You sure?";
		text_delete_yes = "Yes";
		text_delete_no = "No";
	
	}

} else {
	/* parte do do new game */
	/* escolhendo new game */
	if escolha_save == 1 {
		keyboard_string = "";
		instance_destroy(obj_interactive_button)
		instance_create_layer(0, 0, "Instances", obj_text_box);
		
		
		
		text_insert_name = "Type your Name:";
	} else {
		room_goto(rm_menu)
	}
}