/// @description Inserir descrição aqui
// Você pode escrever seu código neste editor

enemy = 2

if alarm[0] <= 0 {
	global.life_bar -= 1;
	alarm[0] = 60;
	
	if alarm[1] <= 0 {
		alarm[1] = 20
	}
}



