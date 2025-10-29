<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inicio De Sesión</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="shortcut icon" href="./imagen/Nelumbo_logo.png">
</head>

<body>
  <div class="main-container">
    <div class="top-bar">
      <div class="top-bar-1">
        <div class="logo">
          <img src="./imagen/Nelumbo_logo.png" alt="">
        </div>
        <div class="logo-menu">
          <span class="logo-texto">NELUMBO</span>
        </div>
      </div>
      <div class="top-bar-2">
        <div class="ini-menu">
          <a href="../Inicio/index.html" class="sesion-text">Inicio</a>
        </div>
      </div>
    </div>
  </div>
  
  <section>
  
    <div class="inicio-contenedor">
      <div class="contenedor">
        <p class="texto1">Inicio-sesión</p>
      <div class="barra-separadora"></div>
      <hr>
        <img class="imag" src="imagen/icons8-male-user-96.png" alt=""/>
        
        <h2>BIENVENIDOS</h2>
        <form method="POST" action="">
          <input type="text" name="usuario" placeholder="Identificacion"   class="inp"  autocomplete="off"/>
          <input type="password" name="contra" placeholder="Contraseña"  class="inp" autocomplete="off"/>
          <button type="submit" class="boton" name="boton">Iniciar sesión</button>
        </form>
        <a class="olvido" href="../Recuperar_contraseña/Index.php">¿Olvidaste tu contraseña?</a>
        <div class="barra-separadora"></div>
      </div>
    </div>
    <?php 
session_start();

if (isset($_POST['boton'])) {
    $usuario = $_POST['usuario'];
    $password = $_POST['contra'];
    // $password = hash('sha512', $password); 

    include '../Conexiones_BD/Conexiones.php';

    $validar_acudiente = mysqli_query($conexion, 
        "SELECT * FROM tbl_registro WHERE ID_Persona='$usuario' AND Contrasena='$password'");

    if (mysqli_num_rows($validar_acudiente) > 0) {
        $row = mysqli_fetch_row($validar_acudiente);

        
        $_SESSION['ID_Persona'] = $row[0];  
        $_SESSION['nombre'] = $row[1];

        $rol = $row[5];

        if ($rol == 1) {
            header("Location: ../inicio_registrado/inicio_regis_acu.html");
        } else if ($rol == 2) {
            header("Location: ../inicio_registrado/inicio_regis_psi.html");
        } else if ($rol == 437239106) {
            header("Location: ../inicio_registrado/inicio_regis_doc.html");
        }
        else if ($rol == 437239106) {
          header("Location: ../inicio_registrado/inicio_regis_doc.html");
        } else if ($rol == 1091885037) {
          header("Location: ../inicio_registrado/inicio_regis_doc.html");
        } 

        exit();
    } else {
        echo '<script>
            alert("Este usuario no existe, verifique los datos introducidos");
            window.location="Inicio_sesion_ac.php";
        </script>';
        exit();
}
}
?>
  
</section>
</body>

</html>

