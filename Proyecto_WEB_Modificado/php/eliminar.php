<?php
    $enlace = mysqli_connect("localhost", "root", "", "mydb");
    
    if(!empty($_GET["boleta"])){
        $boleta=$_GET["boleta"];
    }

    $resultado = $enlace->query("delete FROM alumno where boleta=$boleta");
    if($resultado==1){
        echo '<div>Persona eliminada correctamente</div>';
        header("refresh:2;url=prueba.php");
    } else {
        echo '<div>Error al eliminar</div>';
    }
?>