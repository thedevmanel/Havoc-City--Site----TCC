/// @description Inserir descrição aqui
// Você pode escrever seu código neste editor

randomize()

var _choice_special_atacks = choose(1,2,3,4,5,6,7);

if _choice_special_atacks == 1 or _choice_special_atacks == 2 or _choice_special_atacks == 3 {
	global.mana += 10;
	instance_destroy()
} else if _choice_special_atacks == 4 {
	global.mana += 20;
	instance_destroy()
} else {
	instance_destroy()	
}

