<?php
// Obtener los datos del formulario
$usuario = $_POST["usuario"];
$mensaje = $_POST["mensaje"];
$campana = $_POST["campana"];

// Aquí puedes agregar la lógica para enviar la invitación al usuario seleccionado
// Puedes utilizar la información de $usuario y $mensaje para personalizar el mensaje de la invitación

// Ejemplo: Guardar la invitación en la base de datos
// Conexión a la base de datos
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
    echo "Invitación enviada correctamente.";
} else {
    echo "Error al enviar la invitación: " . mysqli_error($conn);
}

// Cerrar la sentencia preparada
mysqli_stmt_close($stmt);

// Cerrar la conexión
mysqli_close($conn);
?>
