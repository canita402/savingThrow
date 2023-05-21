<?php
// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tfg_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión
if (!$conn) {
    die("La conexión ha fallado: " . mysqli_connect_error());
}

// Obtener el valor de la cookie "username"
if (isset($_COOKIE['username'])) {
    $username = $_COOKIE['username'];

    // Construir la consulta SQL para obtener los datos de los personajes del usuario
    $sql = "SELECT nombre, raza, clase, nivel FROM personaje WHERE usuario = '$username'";

    // Ejecutar la consulta SQL
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Mostrar los datos de cada personaje
        while ($row = mysqli_fetch_assoc($result)) {
            // Asignar los valores a las variables
            $nombre = $row['nombre'];
            $raza = $row['raza'];
            $clase = $row['clase'];
            $nivel = $row['nivel'];

            // Mostrar el div con los datos del personaje
            echo '<div class="post-it">';
            echo '<h2 class="nombre">' . $nombre . '</h2>';
            echo '<p class="raza">' . $raza . '</p>';
            echo '<p class="clase">' . $clase . '</p>';
            echo '<p class="nivel">Nivel: ' . $nivel . '</p>';
            echo '</div>';
        }
    } else {
        // No se encontraron registros para el usuario
        echo "No tienes ningun personaje creado";
    }

    // Liberar memoria del resultado
    mysqli_free_result($result);
} else {
    echo "La cookie 'username' no está definida.";
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Información de Personajes</title>
  <link rel="stylesheet" href="verPersonaje.css">
  <meta charset="UTF-8">
</head>
<body>
</body>
</html>