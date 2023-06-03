<?php
// Obtener los datos del formulario
$usuario = $_POST["usuario"];
$mensaje = $_POST["mensaje"];
$campana = $_POST["campana"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tfg_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar si la conexión fue exitosa
if (!$conn) {
    die("La conexión falló: " . mysqli_connect_error());
}

// Construir la consulta SQL con una sentencia preparada
$sql = "INSERT INTO invitaciones (usuario, mensaje, nombre) 
        VALUES (?, ?, ?)";

// Preparar la consulta SQL
$stmt = mysqli_prepare($conn, $sql);

// Vincular los parámetros
mysqli_stmt_bind_param($stmt, "sss", $usuario, $mensaje, $campana);

// Ejecutar la consulta SQL
if (mysqli_stmt_execute($stmt)) {
    // Mostrar un mensaje emergente utilizando JavaScript
    echo '<script>alert("Invitación enviada correctamente.");';
    // Redirigir al usuario a la página invitarUsuarios.php
    echo 'window.location.href = "invitarUsuarios.php";</script>';
} else {
    // Mostrar un mensaje emergente utilizando JavaScript
    echo '<script>alert("Error al enviar la invitación: ' . mysqli_error($conn) . '");';
    // Redirigir al usuario a la página invitarUsuarios.php
    echo 'window.location.href = "invitarUsuarios.php";</script>';
}

// Cerrar la sentencia preparada
mysqli_stmt_close($stmt);

// Cerrar la conexión
mysqli_close($conn);
?>
