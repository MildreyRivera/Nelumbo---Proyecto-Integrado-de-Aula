<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recupera tu Contraseña</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="Imagenes/Nelumbo logo.png">
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
            <div class="top-bar-2">
                <div class="regis-menu">
                    <a href="index.php" class="regis-text">VOLVER</a>
                </div>
            </div>
        </div>
    </div>

    <section class="container">
        <div class="content">
            <div class="cuenta">
                <h2>Recupera tu cuenta</h2>
            </div>
            <div class="info_card">
                <p>Ingresa tu correo electrónico y te mostraremos tu contraseña actual si está registrada.</p>
            </div>

            <form action="" method="POST" class="info_card2">
                <input type="email" name="email" class="correo" id="email" placeholder="Correo Electrónico" autocomplete="off" required />
                <button   class="s-button" type="submit" name="send_link">Mostrar contraseña</button>
            </form>

             <?php
            if (isset($_POST['send_link'])) {
                $email = $_POST["email"];
                include '../Conexiones_BD/Conexiones.php';

                
                $sql = "SELECT * FROM tbl_registro WHERE Correo_Electronico = ?";
                $stmt = $conexion->prepare($sql);
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    
                    $user = $result->fetch_assoc();
                    $password = $user['Contrasena'];  

                    
                    header("Location: mostrar_contrasena.php?email=$email&contrasena=$password");
                    exit();
                } else {
                    echo "<p>El correo ingresado no está registrado.</p>";
                }

                $stmt->close();
                $conexion->close();
            }
            ?> 
        </div>
    </section>
</body>

</html>
