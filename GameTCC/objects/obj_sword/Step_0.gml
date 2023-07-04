/// @description Inserir descrição aqui
// Você pode escrever seu código neste editor

if (obj_player.image_xscale == -1) {
	x = obj_player.x-32
	y = obj_player.y	
	image_xscale = -1
} else {
	x = obj_player.x+32
	y = obj_player.y
	image_xscale = 1
}
