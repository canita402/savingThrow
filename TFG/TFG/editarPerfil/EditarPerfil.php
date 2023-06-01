<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Obtener la información del archivo de imagen
  $nombreImagen = $_FILES['imagen']['name'];
  $tipoImagen = $_FILES['imagen']['type'];
  $tamanoImagen = $_FILES['imagen']['size'];
  $rutaImagenTmp = $_FILES['imagen']['tmp_name'];
  
  // Directorio donde se guardará la imagen
  $directorioDestino = "uploads/";

  // Comprobar si se seleccionó una imagen
  if (!empty($nombreImagen)) {
    // Verificar el tipo de archivo
    $permitidos = array("image/jpeg", "image/png");
    if (in_array($tipoImagen, $permitidos)) {
      // Verificar el tamaño del archivo (máximo 5MB)
      $tamanoMaximo = 5 * 1024 * 1024; // 5MB
      if ($tamanoImagen <= $tamanoMaximo) {
        // Generar un nombre único para la imagen
        $nombreArchivo = uniqid() . "_" . $nombreImagen;
        
        // Mover la imagen al directorio de destino
        $rutaImagenDestino = $directorioDestino . $nombreArchivo;
        if (move_uploaded_file($rutaImagenTmp, $rutaImagenDestino)) {
          // La imagen se ha subido correctamente, puedes guardar el nombre de archivo en la base de datos u otro almacenamiento
          echo "La imagen se ha subido correctamente.";
        } else {
          echo "Ha ocurrido un error al subir la imagen.";
        }
      } else {
        echo "El tamaño de la imagen es demasiado grande.";
      }
    } else {
      echo "El tipo de archivo no es válido. Solo se permiten imágenes JPEG o PNG.";
    }
  } else {
    echo "No se ha seleccionado una imagen.";
  }
}
?>
