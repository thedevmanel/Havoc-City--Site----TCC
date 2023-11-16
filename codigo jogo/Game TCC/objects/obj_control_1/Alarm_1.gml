/// @description Inserir descrição aqui
// Você pode escrever seu código neste editor

if instance_exists(obj_player) {
	if room == rm_room1 {
		if game_time > 0 {
			game_time -= 1;
		}
		global.seconds += 1;


		if global.seconds >= 60 {
		    global.seconds = 0;
		    global.minutes += 1;
			global.minutes = global.minutes

		    if global.minutes >= 60 {
		        global.minutes = 0;
		        global.hours += 1;
				global.hours = global.hours
		    }
		}

		alarm[1] = room_speed;

	}
}
