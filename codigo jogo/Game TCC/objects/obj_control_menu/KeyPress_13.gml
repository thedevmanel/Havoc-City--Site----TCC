/// @description Inserir descrição aqui
// Você pode escrever seu código neste editor

if instance_exists(obj_interactive_button) {
	if escolha == 1 { 
		room_goto(rm_saves)
	} else if escolha == 2 {
		show_message("options")
	} else if escolha == 3 {
		game_end()
	}
}


