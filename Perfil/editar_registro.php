<?php
session_start();
include '../Conexiones_BD/Conexiones.php';

// Obtener el ID de la sesión
$idPersona = $_SESSION['ID_Persona'];

// Verificar si se ha enviado un término de búsqueda
$sql = "SELECT * FROM tbl_registro WHERE ID_Persona = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $idPersona);
$stmt->execute();
$result = $stmt->get_result();

// Comprobar si se encontró el usuario
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
}

// Actualizar el registro si se envía el formulario
if (isset($_POST['update_user'])) {
    // Obtener los datos del formulario
    $nombreCompleto = $_POST['nombre_completo'];
    $correoElectronico = $_POST['correo_electronico'];
    $edad = $_POST['edad'];
    $contrasena = $_POST['contrasena'];

    // Actualizar el registro
    $updateSql = "UPDATE tbl_registro SET Nombre_Completo=?, Correo_Electronico=?, Edad=?, Contrasena=? WHERE ID_Persona=?";
    $updateStmt = $conexion->prepare($updateSql);
    $updateStmt->bind_param("ssisi", $nombreCompleto, $correoElectronico, $edad, $contrasena, $idPersona);
    $updateStmt->execute();

    if ($updateStmt->affected_rows > 0) {
        echo "<script>setTimeout(function(){ location.reload(); }, 1000);</script>"; // Recarga la página después de 1 segundo
    } 
    $updateStmt->close();
}

$conexion->close();
?> 

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Registro</title>
    <link rel="stylesheet" href="editar_registro.css">
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

    <?php if (isset($user)): ?>

    <form method="POST" action="">
        <div class="t_cont">
            <h3 class="titulo">Editar Registro</h3>
        </div>
        <input type="hidden" name="id_persona" value="<?php echo $user['ID_Persona']; ?>">
        <label for="nombre_completo">Nombre Completo:</label>
        <input type="text" name="nombre_completo" value="<?php echo $user['Nombre_Completo']; ?>" required>

        <label for="correo_electronico">Correo Electrónico:</label>
        <input type="email" name="correo_electronico" value="<?php echo $user['Correo_Electronico']; ?>" required>

        <label for="edad">Edad:</label>
        <input type="number" name="edad" value="<?php echo $user['Edad']; ?>" required>

        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" value="<?php echo $user['Contrasena']; ?>" required>
        <button type="button" id="togglePassword">Mostrar</button> <!-- Botón para mostrar/ocultar la contraseña -->

        <button type="submit" name="update_user">Actualizar Registro</button>
    </form>
    <?php else: ?>
        <p>No se encontraron datos para el usuario.</p>
    <?php endif; ?>

    <script>
        
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('contrasena');

        togglePassword.addEventListener('click', function () {
            
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            
            this.textContent = type === 'password' ? 'Mostrar' : 'Ocultar';
        });
    </script>
</body>

</html>