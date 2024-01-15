<?php
session_start();

$conexion = mysqli_connect("localhost", "root", "", "mydb");

// Verificar la conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

$boleta = $_POST['boleta'];
$contraseña = $_POST['pass'];

// Utilizar consultas preparadas para evitar inyección de SQL
$consulta = "SELECT * FROM alumno WHERE boleta = ? AND contraAlu = ?";
$stmt = mysqli_prepare($conexion, $consulta);
mysqli_stmt_bind_param($stmt, "ss", $boleta, $contraseña);
mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);

if ($resultado->num_rows > 0) {

    $_SESSION['boleta'] = $boleta;
    // Aquí puedes redirigir al usuario a la página deseada
    header("Location: sesion_usuario.php");
    exit(); // Es importante salir después de redirigir para evitar ejecución adicional
} else {
    // Usuario o clave incorrectos
    echo "Usuario o clave incorrectos. Por favor, intenta de nuevo.";
}

mysqli_close($conexion); // Cerrar la conexión después de usarla
?>
