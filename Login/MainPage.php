<?php
if (isset($_COOKIE["username"])) {
  $username = $_COOKIE["username"];
  echo "Bienvenido, " . $username;
} else {
  echo "Usuario desconocido";
}
?>
