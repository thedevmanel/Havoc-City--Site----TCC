/// @description Inserir descrição aqui
// Você pode escrever seu código neste editor

global.points += 200;
instance_create_layer(x,y, "Instances", obj_explosion);
instance_destroy();
instance_destroy(other);


