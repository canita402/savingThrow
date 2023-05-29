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

// Obtener los datos del formulario
$nombre = $_POST['nombre-campana'];
$descripcion = $_POST['descripcion-campana'];
$fecha_inicio = $_POST['fecha-inicio'];
$num_jugadores = $_POST['num-jugadores'];

// Construir la consulta SQL para actualizar los campos en la tabla "campanas"
$sql = "UPDATE campanas SET descripcion = '$descripcion', fecha_inicio = '$fecha_inicio', num_jugadores = '$num_jugadores' WHERE nombre = '$nombre'";

// Ejecutar la consulta SQL
if (mysqli_query($conn, $sql)) {
    echo "Los datos de la campaña se han actualizado correctamente.";
} else {
    echo "Error al actualizar los datos de la campaña: " . mysqli_error($conn);
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>
