<?php
// Establecer la conexión con la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tfg_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar si la conexión fue exitosa
if (!$conn) {
  die("La conexión falló: " . mysqli_connect_error());
}

// Obtener los datos del formulario
$nombre_campana = $_POST["nombre-campana"];
$descripcion_campana = $_POST["descripcion-campana"];
$fecha_inicio = $_POST["fecha-inicio"];
$num_jugadores = $_POST["num-jugadores"];


// Insertar los datos en la base de datos
$sql = "INSERT INTO campanas (nombre, descripcion, fecha_inicio, num_jugadores) VALUES ('$nombre_campana', '$descripcion_campana', '$fecha_inicio', '$num_jugadores')";

if (mysqli_query($conn, $sql)) {
  echo "Los datos se han insertado correctamente en la base de datos.";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Cerrar la conexión
mysqli_close($conn);
?>
