<?php
// Conectar a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "tfg_db");

// Verificar la conexión
if (!$conexion) {
    die("La conexión ha fallado: " . mysqli_connect_error());
}

// Obtener los valores de las variables enviadas desde el formulario
$nombre = $_POST["nombre"];
$raza = $_POST["raza"];
$clase = $_POST["clase"];
$nivel = $_POST["nivel"];
$trasfondo = $_POST["trasfondo"];
$alineamiento = $_POST["alineamiento"];
$fuerza = $_POST["fuerza"];
$destreza = $_POST["destreza"];
$constitucion = $_POST["constitucion"];
$inteligencia = $_POST["inteligencia"];
$sabiduria = $_POST["sabiduria"];
$carisma = $_POST["carisma"];

// Obtener el valor de la cookie "username"
if (isset($_COOKIE['username'])) {
    $username = $_COOKIE['username'];

    // Construir la consulta SQL con una sentencia preparada
    $sql = "INSERT INTO personaje (nombre, usuario, raza, clase, nivel, trasfondo, alineamiento, fuerza, destreza, constitucion, inteligencia, sabiduria, carisma)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Preparar la consulta SQL
    $stmt = mysqli_prepare($conexion, $sql);
    
    // Vincular los parámetros
    mysqli_stmt_bind_param($stmt, "ssssissssssss", $nombre, $username, $raza, $clase, $nivel, $trasfondo, $alineamiento, $fuerza, $destreza, $constitucion, $inteligencia, $sabiduria, $carisma);

    // Ejecutar la consulta SQL
    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Los datos se han guardado correctamente.');</script>";
        echo "<script>window.location.href = '../Login/MainPage.php';</script>";
    } else {
        echo "Ha ocurrido un error al guardar los datos: " . mysqli_error($conexion);
    }

    // Cerrar la sentencia preparada
    mysqli_stmt_close($stmt);
} else {
    echo "La cookie 'username' no está definida.";
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
