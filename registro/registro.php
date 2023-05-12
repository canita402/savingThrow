<?php
// Conexión a la base de datos
$host = "localhost"; // Cambiar si es necesario
$dbname = "tfg_db"; // Cambiar a tu nombre de base de datos

$conn = new mysqli($host, "root", "", $dbname);
if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

// Procesamiento de datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];

// Inserción de datos en la base de datos
$sql = "INSERT INTO usuarios (usuario, contraseña) VALUES ('$username', '$password')";

if ($conn->query($sql) === TRUE) {
  echo "Datos insertados correctamente en la base de datos";
} else {
  echo "Error al insertar datos: " . $conn->error;
}

$conn->close();
?>
 