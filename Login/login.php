<?php
// Conexión a la base de datos
$host = "localhost"; 
$dbname = "tfg_db"; 

$conn = new mysqli($host, "root", "", $dbname);
if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

// Procesamiento de datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];

// Verificación de usuario y contraseña en la base de datos
$sql = "SELECT * FROM usuarios WHERE usuario = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Usuario encontrado, se puede continuar con el proceso de login
  // Verificación de usuario y contraseña en la base de datos
  $sql = "SELECT * FROM usuarios WHERE usuario = '$username' AND contraseña = '$password'";
  $result = $conn->query($sql);

  // Si el login ha tenido exito
  if ($result->num_rows > 0) {
    // Inicio de sesión exitoso, establecer cookie para el nombre de usuario
  setcookie("username", $username, time() + 3600); // vida útil de la cookie: 1 hora
  } else {
    echo "Contraseña incorrecta";
  }
} else {
  // Usuario no encontrado
  echo "El nombre de usuario no existe";
}

$conn->close();

?>
