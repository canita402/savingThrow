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

// Comprobación de existencia del usuario
$sql = "SELECT * FROM usuarios WHERE usuario = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $message = "El usuario ya existe en la base de datos";
  echo "<script>alert('$message'); window.location.href = 'registro.html';</script>";
  exit(); // Terminar la ejecución del script
} else {
  // Inserción de datos en la base de datos
  $insertSql = "INSERT INTO usuarios (usuario, contraseña) VALUES ('$username', '$password')";

  if ($conn->query($insertSql) === TRUE) {
    $message = "Usuario registrado con éxito";
    // Redireccionar al usuario a la página login.html después de mostrar el mensaje
    echo "<script>alert('$message'); window.location.href = '../Login/Login.html';</script>";
    exit(); // Terminar la ejecución del script
  } else {
    $message = "Error al insertar datos: " . $conn->error;
  }
}

$conn->close();
?>
