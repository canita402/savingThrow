<!DOCTYPE html>
<html>
<head>
  <title>Aceptar Invitación</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="aceptarInvitaciones.css">
  <script>
    // Función para ocultar el mensaje después de un tiempo determinado
    function hideMessage() {
      var messageElement = document.getElementById('message');
      if (messageElement) {
        messageElement.style.display = 'none';
      }
    }
  </script>
</head>
<body>
  <h1>Aceptar Invitación de Juego</h1>

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

  // Obtener el valor de la cookie "username"
  $username = $_COOKIE["username"];

  // Verificar si se envió un formulario y se presionó el botón "Aceptar Invitación"
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["invitacion"])) {
    $invitacionId = $_POST["invitacion"];

    // Eliminar la invitación de la base de datos
    $deleteSql = "DELETE FROM invitaciones WHERE id = '$invitacionId'";
    if (mysqli_query($conn, $deleteSql)) {
      // Insertar datos en la tabla "campanasInvitadas"
      $campanaNombre = $_POST["campana"];

      // Verificar si la campaña ya existe en la tabla "campanasInvitadas" para evitar duplicados
      $checkSql = "SELECT * FROM campanasInvitadas WHERE nombre = '$campanaNombre' AND usuario = '$username'";
      $checkResult = mysqli_query($conn, $checkSql);
      if (mysqli_num_rows($checkResult) > 0) {
        $message = "Ya has aceptado la invitación a esta campaña.";
      } else {
        // Insertar datos en la tabla "campanasInvitadas"
        $insertSql = "INSERT INTO campanasInvitadas (nombre, usuario) VALUES ('$campanaNombre', '$username')";
        if (mysqli_query($conn, $insertSql)) {
          $message = "Invitación aceptada y campaña agregada correctamente.";
        } else {
          $message = "Error al agregar la campaña: " . mysqli_error($conn);
        }
      }
    } else {
      $message = "Error al aceptar la invitación: " . mysqli_error($conn);
    }
  }

  
  // Obtener las invitaciones de la base de datos para el usuario de la cookie
  $sql = "SELECT id, mensaje FROM invitaciones WHERE usuario = '$username'";
  $result = mysqli_query($conn, $sql);
  
  // Verificar si hay invitaciones
  if (mysqli_num_rows($result) > 0) {
    // Mostrar las invitaciones en divs separados
    while ($row = mysqli_fetch_assoc($result)) {
      echo '<div class="invitacion">';
      echo '<p>Mensaje: ' . $row['mensaje'] . '</p>';
      echo '<form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">';
      echo '<input type="hidden" name="invitacion" value="' . $row['id'] . '">';
  
      // Agregar el párrafo para mostrar la campaña
      $campanasSql = "SELECT nombre FROM invitaciones WHERE usuario = '$username'";
      $campanasResult = mysqli_query($conn, $campanasSql);
      $campanaNames = array();
      while ($campanaRow = mysqli_fetch_assoc($campanasResult)) {
        $campanaNames[] = $campanaRow['nombre'];
      }
      echo '<p>Campaña: ' . implode(', ', $campanaNames) . '</p>';
  
      echo '<button type="submit" style="text-align: center;">Aceptar Invitación</button>';
      echo '</form>';
      echo '</div>';
    }
  } else {
    // Mostrar el mensaje de que no hay invitaciones
    echo '<p>No tienes invitaciones pendientes.</p>';
  }
 
  

  // Cerrar la conexión
  mysqli_close($conn);
  ?>

  <!-- Mostrar el mensaje y llamar a la función para ocultarlo después de 3 segundos -->
  <div id="message">
    <?php
    if (isset($message)) {
      echo $message;
      echo '<script>setTimeout(hideMessage, 3000);</script>';
    }
    ?>
  </div>
  
 

<form action="../../Login/mainPage.php" style="text-align: center;">
  <button type="submit">Volver a la página principal</button>
</form>

</body>
</html>
