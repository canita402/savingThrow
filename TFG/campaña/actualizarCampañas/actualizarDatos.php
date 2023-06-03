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

// Verificar si se ha enviado el formulario
if (isset($_POST['guardar'])) {
    // Obtener los datos del formulario
    $nombre_nuevo = $_POST['nombre-campana'];
    $descripcion = $_POST['descripcion-campana'];
    $fecha_inicio = $_POST['fecha-inicio'];
    $num_jugadores = $_POST['num-jugadores'];

    // Construir la consulta SQL para actualizar los campos en la tabla "campanas"
    $sql = "UPDATE campanas SET nombre = '$nombre_nuevo', descripcion = '$descripcion', fecha_inicio = '$fecha_inicio', num_jugadores = '$num_jugadores' WHERE nombre = '$nombre_nuevo'";

    // Ejecutar la consulta SQL
    if (mysqli_query($conn, $sql)) {
        // Mostrar mensaje emergente con JavaScript
        echo "<script>alert('Los datos de la campaña se han actualizado correctamente.');</script>";
        // Redireccionar al usuario a la página anterior
        echo "<script>window.history.go(-1);</script>";
    } else {
        // Mostrar mensaje emergente con JavaScript
        echo "<script>alert('Error al actualizar los datos de la campaña: " . mysqli_error($conn) . "');</script>";
    }
} elseif (isset($_POST['volver'])) {
    header("Location: ../campañaPagina.php");
    exit;
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>