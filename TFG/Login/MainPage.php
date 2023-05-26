<!DOCTYPE html>
<html>
<head>
  <title>Bienvenido</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="MainPage.css">
  <!-- Librería de jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>
  <div id="welcome-message">
    <h1>Bienvenido, <?php echo isset($_COOKIE['username']) ? $_COOKIE['username'] : ''; ?></h1>
    <div id="profile-link">
      <a href="Login.html">Cerrar Sesión</a>
    </div>
  </div>

  <div id="campaigns-characters">
    <button class="menu-button">&#9776;</button>
    <h2>Campañas</h2>
    <ul>
      <li><a href="../campaña/campaña.html">Añadir campaña</a></li>
      <br>
      <li><a href="../campaña/campañaPagina.php">Ver mis campañas</a></li>
      <br>
      <li><a href="../campaña/invitarJugadores/invitarUsuarios.php">Invitar a tus campañas </a></li>
      <br>
      <li><a href="../campaña/aceptarInvitaciones/aceptarInvitaciones.php">Invitaciones a campañas</a></li>
    </ul>
    <h2>Personajes</h2>
    <ul>
      <li><a href="../Personaje/fichaPersonaje.html">Añadir Personaje</a></li>
      <br>
      <li><a href="../Personaje/verPersonaje.php">Ver mis personajes</a></li>
    </ul>
  </div>

  <div id="right-div">
    <p>Podeis contactarme por:</p>
    <div class="contact-info">
      <a href="mailto:alvaromaker402@gmail.com">Correo electrónico</a>
    </div>
    <br>
    <br>
    <div class="contact-info">
      <a href="https://www.linkedin.com/in/alvarocaña/">LinkedIn</a>
    </div>
    <br>
    <br>
    <div class="contact-info">
      <a href="https://github.com/canita402">GitHub</a>
    </div>
  </div>

  
  <div style="text-align:center;">
    <p>Saving Throw es una herramienta de gestión de recursos diseñada específicamente para juegos de rol. Con esta herramienta, los jugadores pueden llevar un registro preciso de sus puntos de vida, magia y otros recursos importantes durante las partidas. Además, Saving Throw ofrece una amplia variedad de funciones personalizables que te permiten adaptarla a las necesidades de tu partida.</p>
    <p>Con Saving Throw, podrás hacer un seguimiento de tus personajes y sus estadísticas, como habilidades y atributos, así como permitir crear campañas y añadir a otros jugadores a sus campañas.</p>
    <p>Para futuras sugenerencias, podeis contactarme en la pestañita de contacto, en el que encontrareis mi correo, mi lindedin y mi github</p>
    <p>Saving Throw es un proyecto de final de grado del curso de Desarrollo de Aplicaciones Multiplataforma, hecho por Alvaro Caña, un alumno del IES El Cañaveral</p>
  </div>
  <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
  <div id="footer">
    <p>&copy; 2023 Todos los derechos reservados.</p>
  </div>

  <script>
    $(document).ready(function() {
      $('.menu-button').click(function() {
        $(this).siblings('ul').slideToggle();
      });
    });
  </script>
</body>
</html>
