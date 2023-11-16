// Os recursos de script mudaram para a v2.3.0; veja
// https://help.yoyogames.com/hc/en-us/articles/360005277377 para obter mais informações
function scr_moviments_enemy(){
	if place_meeting(x, y, obj_enemy_wall) {
	if direc == 0 {
		direc = 1;
		image_xscale = -1
	} else if direc == 1 {
		direc = 0;
		image_xscale = 1
	}
}


if direc == 0{
	x += veloc;
} else if direc == 1{
	x -= veloc;
} 
}