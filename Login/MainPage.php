<?php 
	// Comprobar si la cookie de nombre de usuario existe y mostrar el nombre de usuario en la página
	if (isset($_COOKIE["username"])) {
		echo "<h1>Bienvenido " . $_COOKIE["username"] . "!</h1>";
	} else {
		echo "<h1>Error: no se ha iniciado sesión.</h1>";
	}
	?>