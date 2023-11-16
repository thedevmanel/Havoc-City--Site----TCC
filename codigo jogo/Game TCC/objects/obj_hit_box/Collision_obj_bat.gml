/// @description Inserir descrição aqui
// Você pode escrever seu código neste editor

with other {
	instance_destroy()	
	instance_create_layer(x, y-10, "Instances", obj_explosion)
	instance_create_layer(x, y-10, "Instances", obj_show_points)
	global.points += 200;
}
