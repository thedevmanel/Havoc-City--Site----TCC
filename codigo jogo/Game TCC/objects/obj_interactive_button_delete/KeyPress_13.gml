/// @description Inserir descrição aqui
// Você pode escrever seu código neste editor

if choice_delete == 0 {
	file_delete("save.sav");
	room_goto(rm_menu); 
	
} else if choice_delete == 1 {
	instance_destroy();
	instance_create_layer(128, 352, "Instances", obj_interactive_button);
}


