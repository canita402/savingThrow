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

    // Construir la consulta SQL para obtener la información de las campañas del usuario
    $sql = "SELECT nombre, descripcion, fecha_inicio, num_jugadores FROM campanas WHERE usuario = '$username'";

    // Ejecutar la consulta SQL
    $result = mysqli_query($conn, $sql);

    ?>

    <!DOCTYPE html>
    <html>
    <head>
      <title>Información de Campañas</title>
      <link rel="stylesheet" href="campañaPagina.css">
      <meta charset="UTF-8">
    </head>
    <body>
    <?php
    // Verificar si se obtuvieron resultados
    if (mysqli_num_rows($result) > 0) {
        // Mostrar los datos de cada campaña
        while ($row = mysqli_fetch_assoc($result)) {
            // Obtener los valores de cada columna
            $nombre = $row['nombre'];
            $descripcion = $row['descripcion'];
            $fecha_inicio = $row['fecha_inicio'];
            $num_jugadores = $row['num_jugadores'];

            // Mostrar el div "post-it" con los datos de la campaña
            echo '<div class="post-it">';
            echo '<h2>' . $nombre . '</h2>';
            echo '<p>' . $descripcion . '</p>';
            echo '<p>Fecha de inicio: ' . $fecha_inicio . '</p>';
            echo '<p>Número de jugadores: ' . $num_jugadores . '</p>';
            echo '</div>';
        }
    } else {
        // No se encontraron campañas
        echo "No tienes campañas disponibles";
    }

    // Liberar memoria del resultado
    mysqli_free_result($result);
} else {
    echo "La cookie 'username' no está definida.";
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>
</body>
</html>
