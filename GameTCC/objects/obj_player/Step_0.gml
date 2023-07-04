if (isJumping) {
	vspeed += 1
	
	if (vspeed > 7) {
		vspeed -= 0
	}
	
	if (place_meeting(x, y+1, obj_ground)) {
		isJumping = false
	}
}