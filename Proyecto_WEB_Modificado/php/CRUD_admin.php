<?php
// Conectar a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "mydb");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// CREATE (Insertar datos en la base de datos)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["create"])) {
    // Obtener datos del formulario
    $boleta = $_POST["boleta"];
    $nombre = $_POST["nombre"];
    $apellidoPaterno = $_POST["apellidoPaterno"];
    $apellidoMaterno = $_POST["apellidoMaterno"];
    $fechaNacimiento = $_POST["fechaNacimiento"];
    $curp = $_POST["curp"];
    $genero = $_POST["genero"];
    $discapacidadAuditiva = isset($_POST["discapacidadAuditiva"]) ? $_POST["discapacidadAuditiva"] : "";
    $discapacidadVisual = isset($_POST["discapacidadVisual"]) ? $_POST["discapacidadVisual"] : "";
    $discapacidadMotriz = isset($_POST["discapacidadMotriz"]) ? $_POST["discapacidadMotriz"] : "";
    $otraDiscapacidad = isset($_POST["otraDiscapacidad"]) ? $_POST["otraDiscapacidad"] : "";
    $contrasena = $_POST["contrasena"];

    // Consulta SQL para insertar datos
    $sql = "INSERT INTO tu_tabla (boleta, nombre, apellidoPaterno, apellidoMaterno, fechaNacimiento, curp, genero, 
            discapacidadAuditiva, discapacidadVisual, discapacidadMotriz, otraDiscapacidad, contrasena) 
            VALUES ('$boleta', '$nombre', '$apellidoPaterno', '$apellidoMaterno', '$fechaNacimiento', '$curp',
            '$genero', '$discapacidadAuditiva', '$discapacidadVisual', '$discapacidadMotriz', '$otraDiscapacidad', '$contrasena')";

    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {
        echo "Registro creado con éxito";
    } else {
        echo "Error al crear el registro: " . $conexion->error;
    }
}

// READ (Leer datos de la base de datos)
// Consulta SQL para obtener todos los registros
$sql = "SELECT * FROM tu_tabla";
$resultado = $conexion->query($sql);

// Mostrar los resultados
if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        echo "Boleta: " . $fila["boleta"] . "<br>";
        echo "Nombre: " . $fila["nombre"] . "<br>";
        echo "Apellido Paterno: " . $fila["apellidoPaterno"] . "<br>";
        echo "Apellido Materno: " . $fila["apellidoMaterno"] . "<br>";
        echo "Fecha de Nacimiento: " . $fila["fechaNacimiento"] . "<br>";
        echo "CURP: " . $fila["curp"] . "<br>";
        echo "Género: " . $fila["genero"] . "<br>";

        // Mostrar campos de discapacidad
        if ($fila["discapacidadAuditiva"] == 1) {
            echo "Discapacidad Auditiva: Sí <br>";
        }
        if ($fila["discapacidadVisual"] == 1) {
            echo "Discapacidad Visual: Sí <br>";
        }
        if ($fila["discapacidadMotriz"] == 1) {
            echo "Discapacidad Motriz: Sí <br>";
            echo "Opción de Motriz: " . $fila["discapacidadMotrizOpcion"] . "<br>";
        }
        if ($fila["otraDiscapacidad"] == 1) {
            echo "Otra Discapacidad: " . $fila["otraDiscapacidadText"] . "<br>";
        }

        echo "Contraseña: " . $fila["contrasena"] . "<br>";

        // Mostrar campos de contacto
        echo "Calle: " . $fila["calle"] . "<br>";
        echo "Número: " . $fila["numero"] . "<br>";
        echo "Colonia: " . $fila["colonia"] . "<br>";
        echo "Alcaldía: " . $fila["alcaldia"] . "<br>";
        echo "Código Postal: " . $fila["codigoPostal"] . "<br>";
        echo "Teléfono: " . $fila["telefono"] . "<br>";
        echo "Correo Electrónico: " . $fila["correoElectronico"] . "<br>";

        // Mostrar campos de procedencia
        echo "Escuela de Procedencia: " . $fila["escuelaProcedencia"] . "<br>";
        echo "Entidad Federativa de Procedencia: " . $fila["entidadProcedencia"] . "<br>";
        echo "Promedio: " . $fila["promedio"] . "<br>";
        echo "ESCOM fue tu: " . $fila["opcionESCOM"] . "<br>";

        // Separador entre registros
        echo "-------------------------<br>";
    }
} else {
    echo "No hay registros";
}


// UPDATE (Actualizar datos en la base de datos)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    // Obtener datos del formulario
    $boleta = $_POST["boleta"];
    $nombre = $_POST["nombre"];
    $apellidoPaterno = $_POST["apellidoPaterno"];
    $apellidoMaterno = $_POST["apellidoMaterno"];
    $fechaNacimiento = $_POST["fechaNacimiento"];
    $curp = $_POST["curp"];
    $genero = $_POST["genero"];
    $discapacidadAuditiva = isset($_POST["discapacidadAuditiva"]) ? $_POST["discapacidadAuditiva"] : "";
    $discapacidadVisual = isset($_POST["discapacidadVisual"]) ? $_POST["discapacidadVisual"] : "";
    $discapacidadMotriz = isset($_POST["discapacidadMotriz"]) ? $_POST["discapacidadMotriz"] : "";
    $otraDiscapacidad = isset($_POST["otraDiscapacidad"]) ? $_POST["otraDiscapacidad"] : "";
    $contrasena = $_POST["contrasena"];

    // Consulta SQL para actualizar datos
    $sql = "UPDATE tu_tabla SET nombre='$nombre', apellidoPaterno='$apellidoPaterno', apellidoMaterno='$apellidoMaterno',
     fechaNacimiento='$fechaNacimiento', curp='$curp', genero='$genero', discapacidadAuditiva='$discapacidadAuditiva', 
     discapacidadVisual='$discapacidadVisual', discapacidadMotriz='$discapacidadMotriz', otraDiscapacidad='$otraDiscapacidad', 
     contrasena='$contrasena' WHERE boleta='$boleta'";

    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {
        echo "Registro actualizado con éxito";
    } else {
        echo "Error al actualizar el registro: " . $conexion->error;
    }
}

// DELETE (Eliminar datos de la base de datos)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    // Obtener datos del formulario
    $boleta = $_POST["boleta"];

    // Consulta SQL para eliminar datos
    $sql = "DELETE FROM tu_tabla WHERE boleta='$boleta'";

    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {
        echo "Registro eliminado con éxito";
    } else {
        echo "Error al eliminar el registro: " . $conexion->error;
    }
}

// Cerrar la conexión
$conexion->close();
?>

<!-- El formulario para realizar las operaciones CRUD -->
<form method="post" action="Sesion_admin.php">
    <!-- Campos del formulario para CREATE, UPDATE, DELETE -->
    <input type="text" name="boleta" placeholder="Boleta">
    <input type="text" name="nombre" placeholder="Nombre">
    <input type="text" name="apellidoPaterno" placeholder="Apellido Paterno">
    <input type="text" name="apellidoMaterno" placeholder="Apellido Materno">
    <input type="date" name="fechaNacimiento" placeholder="Fecha de Nacimiento">
    <input type="text" name="curp" placeholder="CURP">
    <label>Selecciona tu Género:</label>
    <input type="radio" name="genero" value="Hombre"> Hombre
    <input type="radio" name="genero" value="Mujer"> Mujer
    <input type="radio" name="genero" value="Otro"> Otro
    <label>A fin de considerar sus necesidades y atenderlas, requerimos saber si usted es una persona con:</label>
    <input type="checkbox" name="discapacidadAuditiva" value="Discapacidad auditiva"> Discapacidad auditiva
    <input type="checkbox" name="discapacidadVisual" value="Discapacidad visual"> Discapacidad visual
    <input type="checkbox" name="discapacidadMotriz" value="Discapacidad motriz"> Discapacidad motriz
    <input type="text" name="otraDiscapacidad" placeholder="Otra discapacidad">
    <input type="password" name="contrasena" placeholder="Contraseña">

    <!-- Botones para realizar las operaciones CRUD -->
    <button type="submit" name="create">Crear</button>
    <button type="submit" name="read">Leer</button>
    <button type="submit" name="update">Actualizar</button>
    <button type="submit" name="delete">Eliminar</button>
</form>
