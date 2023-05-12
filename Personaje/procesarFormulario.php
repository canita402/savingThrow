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

// Construir la consulta SQL para insertar los valores en la tabla
$sql = "INSERT INTO personaje (nombre, raza, clase, nivel, trasfondo, alineamiento, fuerza, destreza, constitucion, inteligencia, sabiduria, carisma)
        VALUES ('$nombre', '$raza', '$clase', '$nivel', '$trasfondo', '$alineamiento', '$fuerza', '$destreza', '$constitucion', '$inteligencia', '$sabiduria', '$carisma')";

// Ejecutar la consulta SQL
if (mysqli_query($conexion, $sql)) {
    echo "Los datos se han guardado correctamente.";
} else {
    echo "Ha ocurrido un error al guardar los datos: " . mysqli_error($conexion);
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);

?>
