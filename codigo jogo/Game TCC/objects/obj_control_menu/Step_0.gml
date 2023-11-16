/// @description Inserir descrição aqui
// Você pode escrever seu código neste editor

if global.enter_game > 0 and global.enter_game < 2 {
	instance_create_layer(320, 288, "Instances", obj_interactive_button);
	layer_sprite_create("Buttons", 320, 288, spr_letter_play);
/*  layer_sprite_create("Buttons", 320, 320, spr_letter_options);*/
	layer_sprite_create("Buttons", 320, 352, spr_letter_exit);
	
	global.enter_game = 2;
}


