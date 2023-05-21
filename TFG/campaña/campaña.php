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

// Obtener el valor de la cookie "username"
if (isset($_COOKIE['username'])) {
    $username = $_COOKIE['username'];

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO campanas (nombre, descripcion, fecha_inicio, num_jugadores, usuario) 
            VALUES ('$nombre_campana', '$descripcion_campana', '$fecha_inicio', '$num_jugadores', '$username')";

    if (mysqli_query($conn, $sql)) {
        $message = "Se han guardado los datos";
        // Redireccionar al usuario a la página login.html después de mostrar el mensaje
        echo "<script>alert('$message'); window.location.href = 'campaña.html';</script>";
        exit(); 
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "La cookie 'username' no está definida.";
}

// Cerrar la conexión
mysqli_close($conn);
?>
