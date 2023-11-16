/// @description Inserir descrição aqui
// Você pode escrever seu código neste editor

if game_time <= 0 {
	if alarm[0] == -1 {
		instance_destroy(obj_player)
        alarm[0] = room_speed * 3; 
		
	}
}

if global.life_bar <= 0 {
	if alarm[0] == -1 {
        alarm[0] = room_speed * 3; 
		
	}
}

if global.life_number < 0 {
	room_goto(rm_game_over);
}

