/// @description Inserir descrição aqui
// Você pode escrever seu código neste editor

if file_exists("save.sav") {
	if instance_exists(obj_interactive_button) {
		if escolha_load == 1 {
			obj_interactive_button.x = 320;
			escolha_load = 2;
		} else if escolha_load == 2 {
			obj_interactive_button.x = 519;
			escolha_load = 3;
		} else if escolha_load == 3 {
			obj_interactive_button.x = 128;
			escolha_load = 1;
		}
	
		if escolha_save == 1 {
			escolha_save = 2;
		} else if escolha_save == 2 {
			escolha_save = 1;	
		}
	}
} else {
	if instance_exists(obj_interactive_button) {
		if escolha_save == 1 {
			escolha_save = 2;
		} else if escolha_save == 2 {
			escolha_save = 1;	
		}
	}
}
