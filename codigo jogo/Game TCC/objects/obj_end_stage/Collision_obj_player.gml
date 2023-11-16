/// @description Inserir descrição aqui
// Você pode escrever seu código neste editor

instance_destroy(other);

obj_transition.target_alpha = 1.0; // Escurecer gradualmente

if alarm[0] == -1 {
		instance_destroy(obj_player)
        alarm[0] = room_speed * 3; 	
	}

if file_exists("save.sav") {
	file_delete("save.sav");
}
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

