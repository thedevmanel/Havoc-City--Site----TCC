/// @description Inserir descrição aqui
// Você pode escrever seu código neste editor

if file_exists("save.sav"){
	ini_open("save.sav") 
		global.life_number = ini_read_real("Player", "life", 3);
		global.name_player = ini_read_string("Player", "name", "Player");
		global.mana = ini_read_real("Player", "mana", 0);
		global.points = ini_read_real("Game", "pontuation", 0);
		global.seconds = ini_read_real("Game", "seconds", 0)
		global.minutes = ini_read_real("Game", "minutes", 0)
		global.hours = ini_read_real("Game", "hours", 0)


	
	ini_close()
} else {
	global.points = 0;
	global.life_number = 3;
	global.mana = 0;
	global.seconds = 0;
	global.minutes = 0;
	global.hours = 0;

	ini_open("save.sav");
		ini_write_real("Player", "life", global.life_number);
		ini_write_string("Player", "name", global.name_player);
		ini_write_real("Player", "mana", global.mana);
		ini_write_real("Player", "rm_corrent", room);
		
		ini_write_real("Game", "pontuation", global.points);
		ini_write_real("Game", "seconds", global.seconds);
		ini_write_real("Game", "minutes", global.minutes);
		ini_write_real("Game", "hours", global.hours);
	ini_close();
	
}
