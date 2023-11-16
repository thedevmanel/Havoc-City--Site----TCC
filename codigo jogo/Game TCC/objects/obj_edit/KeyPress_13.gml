/// @description Inserir descrição aqui
// Você pode escrever seu código neste editor

ini_open("save.sav");
	ini_write_string("Player", "name", global.name_player);
ini_close();

room_goto(rm_menu)