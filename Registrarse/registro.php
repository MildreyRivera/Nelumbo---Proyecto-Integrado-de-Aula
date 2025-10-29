<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="Imagenes/Nelumbo_logo.png">
</head>

<body>
    <div class="main-container">
        <div class="top-bar">
            <div class="top-bar-1">
                <div class="logo">
                    <img src="Imagenes/Nelumbo_logo.png" alt="">
                </div>
                <div class="logo-menu">
                    <span class="logo-texto">NELUMBO</span>
                </div>
            </div>
            <div class=" top-bar-2">
                <div class="regis-menu">
                    <span class="regis-text">INICIO</span>
                </div>
            </div>
        </div>
    </div>
    <section class=" content">

        
        <form action="registro.php" method="post" class="form">

            <h2 class="form-title">Registro</h2><br>


            <select class="form-input" name="rol" id="">
                
                <option selected value="0">Seleccione su rol</option>
                <option value="1">Acudiente</option>
                <option value="2">Psicólogo</option>
                

            </select>

            <div class="form-inputs">
                <label class="form-label">
                    <input type="text" name="id" id="documento" placeholder=" " autocomplete="off" class="form-input" required>
                    <span class="form-text">Identificación</span>
                </label>
            </div>

            <div class="form-inputs">
                <label class="form-label">
                    <input type="text" name="nombre" id="nombre" placeholder=" "  autocomplete="off"class="form-input" required>
                    <span class="form-text">👤Nombre</span>
                </label>
            </div>

            <div class="form-inputs">
                <label class="form-label">
                    <input type="password" name="contra" id="contra" placeholder=" " autocomplete="off" class="form-input" required>
                    <span class="form-text">🔐Contraseña</span>
                </label>
            </div>



            <div class="form-inputs">
                <label class="form-label">
                    <input type="text" name="edad" id="edad" placeholder=" " autocomplete="off" class="form-input" required>
                    <span class="form-text">Edad</span>
                </label>
            </div>

            <div class="form-inputs">
                <label class="form-label">
                    <input type="email" name="correo" id="correo" placeholder=" "  autocomplete="off" class="form-input" required>
                    <span class="form-text">✉Correo Electrónico</span>
                </label>
            </div>
            <div class="registrar">
                <button class="regis" name="registrarse" type="submit">Registrarse</button>
            </div><br>
            <div class="cubo2">
            <div>
                <p class="texto1">¿Ya tienes una cuenta?<a class="texto2"
                        href="../Inicio_sesion/Inicio_sesion_ac.php">Entrar</a></p>
            </div>
        </div>
        </form>

        <?php
        session_start();

        if (isset($_POST['registrarse'])) {
        
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $edad = $_POST['edad'];
        $password = $_POST['contra'];
        $rol = $_POST['rol'];

        //$password = hash('sha512', $password);
        
        include '../Conexiones_BD/Conexiones.php';

        $sql = "INSERT INTO tbl_registro VALUES('$id','$nombre','$correo','$edad','$password','$rol')";
        $verificar_id = mysqli_query($conexion, "SELECT * FROM tbl_registro WHERE ID_Persona='$id'");

        if (mysqli_num_rows($verificar_id) > 0) {
            echo
            '<script>
            alert("Este Id ya existe, intenta nuevamente");
            window.location="registro.php";
            </script>';
            exit();
        }
        $consulta = mysqli_query($conexion, $sql);
        if ($consulta) {
            echo "
            <script>
            alert('Datos registrados correctamente, Por Favor Inicia Sesión.');
            window.location='../Inicio_sesion/Inicio_sesion_ac.php';  
            </script>
            ";
        } else {
            echo "Error en la consulta " . mysqli_error($conexion);
        }
    }
        ?> 

    </section>
</body>

</html>