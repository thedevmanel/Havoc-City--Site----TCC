/// @description Inserir descrição aqui
// Você pode escrever seu código neste editor

script_execute(estado)
y += y_speed;

// Verifique se a posição Y está além do limite superior (+10) ou inferior (-10)
if (y > y_start + 10) {
	y_speed -= 0.1;
} else if y < y_start - 10{
	y_speed += 0.1;
}


