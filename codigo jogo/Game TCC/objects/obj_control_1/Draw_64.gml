/// @description Inserir descrição aqui
// Você pode escrever seu código neste editor

draw_sprite(spr_square_points,0, 0, 0)
var _sprl = sprite_get_width(spr_life);
var _life_bar = global.life_bar;

if _life_bar > 0 {
	
	for (var _i = 0; _i < _life_bar; _i++) {
		draw_sprite_ext(spr_life, 0, ((display_get_width()/20)- 54) + (_sprl * _i) - 4, 45, 2, 2, 0, c_white, 1);
		
	}
} else {
	instance_destroy(obj_player);
}

if room == rm_room1 ||  room == rm_room0{
	draw_set_color(#ffeeff);
	draw_set_halign(fa_left);
	draw_set_font(fnt_arcadeclassic_score)
	draw_text(display_get_width()/20 - 50, 15, global.name_player)
	draw_text(display_get_width()/8, 15, "Mana");
	draw_text(display_get_width()/8 + 10, 50, string(global.mana));
	draw_text(display_get_width()/5 + 20, 15, "Live")
	draw_text(display_get_width()/5 + 35, 50, string(global.life_number))
	draw_text(display_get_width()/3 - 45, 15, "Time")
	draw_text(display_get_width()/3 - 42, 50, game_time)
	draw_text(display_get_width()/3 + 55, 15, "Pontuation");
	draw_text(display_get_width()/3 + 55, 50, string(global.points));
}
