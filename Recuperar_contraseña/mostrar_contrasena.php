 <?php
if (isset($_GET['email']) && isset($_GET['contrasena'])) {
    $email = $_GET['email'];
    $contrasena = $_GET['contrasena'];
    ?> 

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mostrar Contraseña</title>
        <link rel="shortcut icon" href="Imagenes/Nelumbo logo.png" type="image/x-icon">
        <link rel="stylesheet" href="mostrar_contrasena.css">
    </head>

    <body>
        <div class="main-container">
            <div class="top-bar">
                <div class="top-bar-1">
                    <div class="logo">
                        <img src="Imagenes/Nelumbo logo.png" alt="">
                    </div>
                    <div class="logo-menu">
                        <span class="logo-texto">NELUMBO</span>
                    </div>
                </div>
            </div>
        </div>


        <div class="main-container">
            <div class="mini-container">
            <div class="texto">
            <h2 class="titulo">Contraseña recuperada</h2>
            <p class="parrafo">La contraseña para el correo <strong><?php echo htmlspecialchars($email); ?></strong> es:</p>
            <p class="parrafo2"><strong><?php echo htmlspecialchars($contrasena); ?></strong></p>
            <a  class="regis-text" href="../Inicio_sesion/Inicio_sesion_ac.php">Volver a iniciar sesión</a>
        </div>
        </div>
        </div>
    <div class="logo_g">
        <img src="Imagenes/Nelumbo logo.png" alt="">
    </div>
    </body>

    </html>

     <?php
} else {
    echo "Solicitud no válida.";
}
?> 
