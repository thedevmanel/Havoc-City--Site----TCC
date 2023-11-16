/// @description Inserir descrição aqui
// Você pode escrever seu código neste editor
direita = 0;
esquerda = 0;
cima = 0;

direc = 0;

hveloc = 0 ;
vveloc = 0;
veloc = 1.62;

gravidade = 0.12;

global.life_bar = 10;
trasparencia = 0;

alarm[0] = 0;

estado = scr_moviments_player;

enemy = 0;

if room == rm_room1 {
	ini_open("save.sav");
		global.points = ini_read_real("Game", "pontuation", 0);
		global.mana = ini_read_real("Player", "mana", 0);

	ini_close()
}