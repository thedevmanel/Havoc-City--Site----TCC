// Os recursos de script mudaram para a v2.3.0; veja
// https://help.yoyogames.com/hc/en-us/articles/360005277377 para obter mais informações

function scr_player_colision() {
if !place_meeting(x, y + 1, obj_ground) {
		vveloc += gravidade;	
	} else {
		if cima {
			vveloc = -3.2;	
		}
	}

	if place_meeting(x + hveloc, y, obj_ground) {
		while !place_meeting(x + sign(hveloc), y, obj_ground){ 
			x += sign(hveloc);
		}
	
		hveloc = 0;
	}

	x += hveloc;

	if place_meeting(x, y + vveloc, obj_ground) { 
		while !place_meeting(x, y + sign(vveloc), obj_ground) {
			y += sign(vveloc);
		}
	
		vveloc = 0;
	}

	y += vveloc;
}

function scr_moviments_player(){
	//movimentação
	direita = keyboard_check(ord("D"));
	esquerda = keyboard_check(ord("A"));
	cima = keyboard_check_pressed(ord("W"));

	hveloc = (direita - esquerda) * veloc;
	
		//alteração de sprites
		if direita {
			direc = 0;
			sprite_index = spr_player_run
			image_xscale = 1
		} else if esquerda {
			direc = 1
			sprite_index = spr_player_run
			image_xscale = -1
		} else {
			if direc == 0 {
				sprite_index = spr_player_stopped
				image_xscale = 1
			} else if direc == 1 {
				sprite_index = spr_player_stopped
				image_xscale = -1
			}
		}
	//colisão
	scr_player_colision()
	
	if keyboard_check_pressed(ord("K")) {
		image_index = 0;
		estado = scr_player_attack;
		
			if direc == 0 {
				instance_create_layer(x+20, y-8, "Instances", obj_hit_box);
			} else if direc == 1 {
				instance_create_layer(x-20, y-8, "Instances", obj_hit_box);
			}
		

		
	}
	if keyboard_check_pressed(vk_space) {
		if global.mana >= 20 {
		if !instance_exists(obj_knife) {
			instance_create_layer(obj_player.x, obj_player.y - 12, "Instances", obj_knife)
			obj_knife.alarm[0] = 120
			global.mana -= 20

			if direc == 0 {
				obj_knife.speed = 2;	
			} else if direc == 1 {
				obj_knife.speed = -2	
			}

			estado = scr_moviments_player;
		}
			
		}
	}
	
	
}

function scr_player_attack() {
	sprite_index = spr_player_attack;
	
	if scr_end_animation() {
		estado = scr_moviments_player;
	} 
	
	if !place_meeting(x, y + 1, obj_ground) {
		scr_player_colision()
	}
	
}

function scr_hit_player() {
	sprite_index = spr_player_hits;
	hveloc = 0
	scr_player_colision();
	
	if scr_end_animation(){
		estado = scr_moviments_player;	
	}
}
