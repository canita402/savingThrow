<!DOCTYPE html>
<html>
<head>
  <title>Enviar Invitación</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="invitarUsuarios.css">
</head>
<body>
  <h1>Enviar Invitación de Juego</h1>
  
  <div>
    <form method="post" action="enviarInvitacion.php">
      <label for="usuario">Usuario:</label>
      <select name="usuario" id="usuario">
        <!-- Aquí puedes obtener los usuarios de tu base de datos y generar las opciones -->
        <?php
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

        // Obtener los usuarios de la base de datos
        $sql = "SELECT usuario FROM usuarios";
        $result = mysqli_query($conn, $sql);

        // Generar las opciones del select con los usuarios
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['usuario'] . '">' . $row['usuario'] . '</option>';
        }

        // Cerrar la conexión
        mysqli_close($conn);
        ?>
      </select>
      
      <label for="mensaje">Mensaje:</label>
      <textarea name="mensaje" id="mensaje" rows="5" cols="30"></textarea>
      
      <input type="submit" value="Enviar Invitación">
    </form>
  </div>
</body>
</html>
