<?php
// Obtener los datos del formulario
$usuario = $_POST["usuario"];
$mensaje = $_POST["mensaje"];

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

// Insertar la invitación en la base de datos
$sql = "INSERT INTO invitaciones (usuario, mensaje) 
        VALUES ('$usuario', '$mensaje')";

if (mysqli_query($conn, $sql)) {
    echo "Invitación enviada correctamente.";
} else {
    echo "Error al enviar la invitación: " . mysqli_error($conn);
}

// Cerrar la conexión
mysqli_close($conn);
?>
