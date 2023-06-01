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

  // Si el login ha tenido éxito
  if ($result->num_rows > 0) {
    // Inicio de sesión exitoso, establecer variable de sesión para el nombre de usuario
  // Después de verificar el inicio de sesión exitoso y antes de redirigir
  setcookie('username', $username, time() + 36000, '/'); //1h de vida de la cookie
  header("Location: MainPage.php");

    exit(); 
  } else {
    $message = "Contraseña incorrecta";

    echo "<script>alert('$message'); window.location.href = 'Login.html';</script>";
  }
}// Usuario no encontrado
 else {
  $message = "Este usuario no está registrado";
  
  echo "<script>alert('$message'); window.location.href = 'Login.html';</script>";
}

$conn->close();
?>
