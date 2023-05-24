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

    // Obtener los nombres de las campañas invitadas para el usuario actual
    $invitadasSql = "SELECT nombre FROM campanasInvitadas WHERE usuario = '$username'";
    $invitadasResult = mysqli_query($conn, $invitadasSql);

    // Verificar si hay campañas invitadas
    if (mysqli_num_rows($invitadasResult) > 0) {
        // Mostrar los nombres de las campañas invitadas
        echo "<h3>Campañas Invitadas:</h3>";
        while ($invitadaRow = mysqli_fetch_assoc($invitadasResult)) {
            $nombreInvitada = $invitadaRow['nombre'];
            echo "<p>$nombreInvitada</p>";
        }
    } else {
        // No hay campañas invitadas
        echo "No tienes campañas invitadas";
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
