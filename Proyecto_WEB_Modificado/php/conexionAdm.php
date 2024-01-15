<?php
session_start();

$conexion = mysqli_connect("localhost", "root", "", "mydb");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

$clave = $_POST['clave'];
$contraseña = $_POST['pass'];

$consulta = "SELECT clave,contraAd FROM administrador WHERE clave = ? AND contraAd = ?";
$stmt = mysqli_prepare($conexion, $consulta);
mysqli_stmt_bind_param($stmt, "ss", $clave, $contraseña);
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);

if ($resultado->num_rows > 0) {
    header("Location: prueba.php");
    exit();

} else {
    // Usuario inexistente
    echo "Usuario o clave incorrectos. Por favor, intenta de nuevo.";
}

mysqli_close($conexion);
?>
