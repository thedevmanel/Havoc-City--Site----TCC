/// @description Inserir descrição aqui
// Você pode escrever seu código neste editor

if instance_exists(obj_interactive_button) {
	if escolha == 1 { 
		escolha = 3;
		obj_interactive_button.y = 352;
	/*} else if escolha == 2 {
		escolha = 3;
		obj_interactive_button.y = 384;*/
	} else if escolha == 3 {
		escolha = 1;	
		obj_interactive_button.y = 288;
	}
}


