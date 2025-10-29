<?php
session_start();

// Destruir todas las variables de sesión
$_SESSION = array();

// Destruir la sesión completamente
session_destroy();

// Redirigir a la página de inicio
header("Location: ../Inicio/index.html");
exit();
?>