<?php
session_start();
include '../Conexiones_BD/Conexiones.php';

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Acudiente</title>
    <link rel="stylesheet" href="perfil_ac.css">
    <link rel="shortcut icon" href="Logos/Nelumbo logo.png" type="image/x-icon">
</head>

<body>
    <div class="main-container">
        <div class="top-bar">
            <div class="top-bar-1">
                <div class="logo">
                    <img src="./Logos/Nelumbo logo.png" alt="">
                </div>
                <div class="logo-menu">
                    <span class="logo-texto">NELUMBO</span>
                </div>
            </div>
            <div class=" top-bar-2">
                <div class="regis-menu">
                    <a href="../Tipo_De_Usuario/Index.php" class="regis-text">Menú</a>
                </div>
            </div>
        </div>
    </div>

    <main>
        <section class="profile-section">
            <h3 class="texto1">Mi Perfil</h3>
            <div class="avatar">
                <img src="Logos/icons8-male-user-96.png" alt="">
            </div>

            <div class="profile-card">
                <div class="profile-info">

                    <h2>Acudiente: <span><?php echo $_SESSION['nombre'] ?></span></h2>
                    <div class="profile-actions">
                        <div class="columna1">
                            <a  class="registro" href="../Registrarse/registro.php">Registrar estudiante</a>
                            <a href="editar_registro.php" class="registro">Editar Registro</a>
                        </div>
                        <div class="columna1">
                            <button class="eliminar">Eliminar Registro</button>
                        </div>
                    </div>

                </div>
        </section>
        </div>
        <div class="logo_g">
            <img src="Logos/Nelumbo logo.png" alt="Nelumbo Flower">
        </div>
    </main>
</body>
</html>