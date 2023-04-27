<?php
$nombre = $_POST["nombre"];
$raza = $_POST["raza"];
$clase = $_POST["clase"];
$nivel = $_POST["nivel"];



$host= "localhost";
$dbname="tfg_db";
$username="root";
$password="";


$conexion= mysqli_connect($host,$username,$password,$dbname);


if(mysqli_connect_errno()){
    die("Error de conexion: ". mysqli_connect_error());
}

echo "Conexion aceptada!";


$sql=" INSERT INTO personaje (Nombre, Raza, Clase, Nivel)
        VALUES ('$nombre','$raza','$clase','$nivel')";


echo "datos introducidos"
?>