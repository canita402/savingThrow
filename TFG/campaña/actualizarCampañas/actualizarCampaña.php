<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Formulario de Campaña de D&D</title>
    <link rel="stylesheet" href="actualizarCampaña.css">
  </head>
  <body>
    <h1>Datos de la campaña</h1>
    <form action="actualizarDatos.php" method="post">
      <fieldset>
        <legend>Actualizar los datos de la campaña</legend>
        <div>
          <label for="nombre-campana">Nombre de la Campaña:</label>
          <input type="text" id="nombre-campana" name="nombre-campana" value="<?php echo $_GET['nombre'] ?? ''; ?>" required>
        </div>
        <div>
          <label for="descripcion-campana">Descripción de la Campaña:</label>
          <textarea id="descripcion-campana" name="descripcion-campana" required><?php echo $_GET['descripcion'] ?? ''; ?></textarea>
        </div>
        <div>
          <label for="fecha-inicio">Fecha de Inicio:</label>
          <input type="date" id="fecha-inicio" name="fecha-inicio" value="<?php echo $_GET['fecha_inicio'] ?? ''; ?>" required>
        </div>
        <div>
          <label for="num-jugadores">Número de Jugadores:</label>
          <input type="number" id="num-jugadores" name="num-jugadores" min="1" value="<?php echo $_GET['num_jugadores'] ?? ''; ?>" required>
        </div>
        <div class="button-container">
          <input type="submit" value="Guardar" class="button" name="guardar">
          <button onclick="window.location.href='campañaPagina.php';" class="button" name="volver">Volver</button>
        </div>
      </fieldset>
    </form>
  </body>
</html>