
script_execute(estado);

//combate
if alarm[0] > 0 {
	if image_alpha >= 1 {
		trasparencia = -1;
	} else if image_alpha <= 0 {
		trasparencia = 0.5;
	}	
	image_alpha += trasparencia;
} else {
	image_alpha = 1;
}

if alarm[1] > 0 {
	
	estado = scr_hit_player;
	if !place_meeting(x, y, obj_ground) {
		if enemy == 2 {
			if instance_exists(obj_bat) {
				if x < obj_bat.x {
					x -= 2.5;
					y -= 1.5;
					image_xscale = 1;
			
				} else {
					x += 2.5;
					y -= 1.5;
					image_xscale = -1;
				}
			 }
		} else if enemy == 1 {
			if instance_exists(obj_enemy1) {
				if x < obj_enemy1.x {
					x -= 2.5;
					y -= 1.5;
					image_xscale = 1;
			
				} else {
					x += 2.5;
					y -= 1.5;
					image_xscale = -1;
				}
			}
		}

	} else {
		x += 0;
		y += gravidade
	}
} else {
}
