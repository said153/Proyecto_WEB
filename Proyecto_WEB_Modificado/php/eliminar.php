
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminando</title>
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style_CRUD.css">
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a href="Inicio.html">
                <img src="../Img/Logo_IPN3.PNG" alt="" width="70px" height="70px" class="d-inline-block align-text-top">
            </a>
            <a href="Inicio.html">
                <img src="../Img/Encabezado2.PNG" alt="" height="120px" width="200px">
            </a>
            <a href="Inicio.html">
                <img src="../Img/Logo_Escom2.PNG" alt="" width="70px" height="70px">
            </a>
        </div>
    </nav>

    <?php
        $enlace = mysqli_connect("localhost", "root", "", "mydb");
        
        if(!empty($_GET["boleta"])){
            $boleta=$_GET["boleta"];
        }

        $resultado = $enlace->query("delete FROM alumno where boleta=$boleta");
        if($resultado==1){
            echo '<div  class="centerText">Persona eliminada correctamente</div> ';
            header("refresh:2;url=prueba.php");
        } else {
            echo '<div class="centerText">Error al eliminar</div>';
        }
    ?>

  
 


                <footer>
                    <div class="content">
                        <img src="../Img/Logo_Escom2.PNG" alt="Logo Image">
                        <div class="text-container">
                        <p>
                        INSTITUTO POLITECNICO NACIONAL
                        </p>
                            <p>
                                ESCUELA SUPERIOR DE COMPUTO
                                <br>
                                REDES SOCIALES EN LA DERECHA
                            </p>
                        </div>
                    </div> <!-- Agrega esta línea para cerrar la clase 'content' -->
                    <div class="content2">
                        <div class="image-container4 menu-button" >
                            <a href="https://www.facebook.com/groups/164168577040524" >
                                <img src="../Img/facebookLogo.webp" alt="Facebook" class="imagefoot">
                            </a>
                        </div>
                        <div class="image-container4 menu-button">
                            <a href="https://twitter.com/escomunidad">
                                <img src="../Img/x.avif" alt="X" class="imagefoot">
                            </a>
                        </div>
                        <div class="image-container4 menu-button" >
                            <a href="https://www.instagram.com/explore/locations/118110418347552/escom-ipn-mx/">
                                <img src="../Img/instagramLogo.webp" alt="Instagram" class="imagefoot">
                            </a>
                        </div>
                    </div>
                </footer>


            <script src="../js/scripts.js"></script>
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script src="../bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>

</body>
</html>