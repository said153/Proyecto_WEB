<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style_sesionU.css">
    <title>Usuario</title>
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <!-- Para regresar a encabezado, logo ipn y logo escom a como estaba , solo quitar el numero 2 o 3
               y en vez de ".PNG" debera ser ".png" -->
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
    
    <div >
        <img src="../Img/ImagenSesion4.jpeg" class="TopImg" alt="...">
    </div>
    <div>
        <h1 class="text2">
            INFORMACION DEL ALUMNO   
        </h1>
        <p class="text3">(da click para ver cada seccion de tu informacion)</p>
    </div>

    <div class>
        <nav>
            <ul>    
                <li onclick="mostrarSeccion('seccion1')" class="cell menu-button3 clickable miniBox tooltip3" data-tooltip3="Identidad">
                    <img src="../Img/iddad.jpg" class="infoImg " >
                </li>

                <li onclick="mostrarSeccion('seccion2')" class="cell menu-button3 clickable miniBox tooltip3" data-tooltip3="Contacto">
                    <img src="../Img/contacto.jpg" class="infoImg  " >
                </li>
                <li onclick="mostrarSeccion('seccion3')" class="cell menu-button3 clickable miniBox tooltip3" data-tooltip3="Procedencia">
                    <img src="../Img/procedencia.jpg" class="infoImg" >
                </li>
                <li onclick="mostrarSeccion('seccion4')" class="cell menu-button3 clickable miniBox tooltip3" data-tooltip3="Cerrar Ventana">
                    <img src="../Img/bloq.jpg" class="infoImg" >
                </li>
            </ul>
        </nav>          
    </div>
    <div id="seccion1" class="seccion">
        <?php
            session_start();
            $boleta = $_SESSION['boleta'];
            $enlace = mysqli_connect("localhost", "root", "", "mydb");

            if (!$enlace) {
                die("No se conectó" . mysqli_error());
            }

            // Consulta para obtener todos los nombres y boletas de la tabla 'alumno'
            $resultado = mysqli_query($enlace, "SELECT boleta, nombreAlu, apePatAlu, apeMatAlu, fechaNacAlu, curpAlu, generoAlu, contacto_idcontacto FROM alumno WHERE boleta = '$boleta'");

            echo "<form class='formBlock'>";
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<label for='boleta" . $fila['boleta'] . "'>Boleta: " . $fila['boleta'] . "</label><br>";
                echo "<label for='nombres" . $fila['nombreAlu'] . "'>Nombre(s): " . $fila['nombreAlu'] . "</label><br>";
                echo "<label for='apellidoPaterno" . $fila['apePatAlu'] . "'>Apellido Paterno: " . $fila['apePatAlu'] . "</label><br>";
                echo "<label for='apellidoMaterno" . $fila['apeMatAlu'] . "'>Apellido Materno: " . $fila['apeMatAlu'] . "</label><br>";
                echo "<label for='fechaNacimiento" . $fila['fechaNacAlu'] . "'>Fecha de Nacimiento: " . $fila['fechaNacAlu'] . "</label><br>";
                echo "<label for='curp" . $fila['curpAlu'] . "'>Curp: " . $fila['curpAlu'] . "</label><br>";
                echo "<label for='genero" . $fila['generoAlu'] . "'>Genero: " . $fila['generoAlu'] . "</label><br>";
            }
            echo "</form>";

            mysqli_close($enlace);
        ?>
    </div>

    <div id="seccion2" class="seccion">
        <?php
            $boleta = $_SESSION['boleta'];
            $enlace = mysqli_connect("localhost", "root", "", "mydb");

            if (!$enlace) {
                die("No se conectó" . mysqli_error());
            }

            // Consulta para obtener todos los nombres y boletas de la tabla 'alumno'
            $resultado = mysqli_query($enlace, "SELECT calleCon,numCon,coloniaCon,alcaldiaCon,codPosCon,telCon,correoCon FROM alumno JOIN contacto ON alumno.contacto_idcontacto = contacto.idcontacto WHERE alumno.boleta = '$boleta'");

            echo "<form class='formBlock'>";
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<label for='calle" . $fila['calleCon'] . "'>Calle: " . $fila['calleCon'] . "</label><br>";
                echo "<label for='numero" . $fila['numCon'] . "'>Número: " . $fila['numCon'] . "</label><br>";
                echo "<label for='colonia" . $fila['coloniaCon'] . "'>Colonia: " . $fila['coloniaCon'] . "</label><br>";
                echo "<label for='alcaldia" . $fila['alcaldiaCon'] . "'>Alcaldía: " . $fila['alcaldiaCon'] . "</label><br>";
                echo "<label for='codigoPostal" . $fila['codPosCon'] . "'>Código Postal: " . $fila['codPosCon'] . "</label><br>";
                echo "<label for='telefono" . $fila['telCon'] . "'>Teléfono: " . $fila['telCon'] . "</label><br>";
                echo "<label for='correoElectronico" . $fila['correoCon'] . "'>Correo electrónico: " . $fila['correoCon'] . "</label><br>";
            }
            echo "</form>";

            mysqli_close($enlace);
        ?>
    </div>

    <div id="seccion3" class="seccion">
        <?php
            $boleta = $_SESSION['boleta'];
            $enlace = mysqli_connect("localhost", "root", "", "mydb");

            if (!$enlace) {
                die("No se conectó" . mysqli_error());
            }

            // Consulta para obtener todos los nombres y boletas de la tabla 'alumno'
            $resultado = mysqli_query($enlace, "SELECT escProc, entFedProc,promedioProc,opcionProc FROM alumno JOIN procedencia ON alumno.procedencia_idprocedencia = procedencia.idprocedencia WHERE alumno.boleta = '$boleta'");

            echo "<form class='formBlock'>";
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<label for='escuelaProcedencia" . $fila['escProc'] . "'>Escuela de procedencia: " . $fila['escProc'] . "</label><br>";
                echo "<label for='entidadProcedencia" . $fila['entFedProc'] . "'>Entidad Federativa de Procedencia: " . $fila['entFedProc'] . "</label><br>";
                echo "<label for='promedio" . $fila['promedioProc'] . "'>Promedio: " . $fila['promedioProc'] . "</label><br>";
                echo "<label" . $fila['opcionProc'] . "'>ESCOM fue tu: " . $fila['opcionProc'] . "</label><br>";
            }
            echo "</form>";

            mysqli_close($enlace);
        ?>
    </div>


    <div class="images">
        <h1 class="text2"> 
            ¿COMO ES PERTENECER A ESCOM?
        </h1>    
        <div class="shortImg tooltip2 miniBox" data-tooltip2="Trabajo En Equipo"> 
            <img src="../Img/teamwork.jpeg" class="circleImg menu-button clickable" >
        </div>
        
        <div class="shortImg tooltip2 miniBox" data-tooltip2="Buenas Instalaciones">         
            <img src="../Img/build.jpeg" class="circleImg menu-button clickable" >
        </div>

        <div class="shortImg tooltip2 miniBox" data-tooltip2="Clubs">       
            <img src="../Img/clubs.jpeg" class="circleImg menu-button clickable" >
        </div>

        <div class="shortImg tooltip2 miniBox" data-tooltip2="Autodidacta"> 
            <img src="../Img/Knowledge.jpeg" class="circleImg menu-button clickable" >
        </div>
        
        <div class="shortImg tooltip2 miniBox" data-tooltip2="Oportunidades">      
            <img src="../Img/oport.jpeg" class="circleImg menu-button clickable" >
        </div>
    </div>

    <div class="flex-container">
        <img src="../Img/ipn.jpeg" class="schImg menu-button2 clickable" alt="...">
        <div class="text-container">
            <h4 class="text">
                ¿Qué es el IPN?
            </h4>
            <p class="text">
                El Instituto Politécnico Nacional (IPN) es una institución pública mexicana de educación superior
                y posgrado, con una amplia oferta académica en áreas científicas, tecnológicas, humanísticas y artísticas. 
                Es una de las instituciones educativas más importantes de México y de América Latina, y ha formado a generaciones 
                de profesionistas que han contribuido al desarrollo del país.
                <br>
                <br>
                <a href="https://www.ipn.mx/dae/"  class="btn btn-primary">Visita IPN</a>
            </p>
            
        </div>
    </div>

    <div class="flex-container">
        <div class="text-container">
            <h4 class="text">
                ¿Qué es el ESCOM?
            </h4>
            <p class="text">
                La Escuela Superior de Cómputo (ESCOM) es una institución pública mexicana de educación superior,
                perteneciente al Instituto Politécnico Nacional (IPN). Fue fundada en 1993 con el objetivo de formar 
                ingenieros en sistemas computacionales de excelencia, comprometidos con el desarrollo científico y 
                tecnológico del país.
                <br>
                <br>
                <a href="https://www.escom.ipn.mx/"  class="btn btn-primary">Visita ESCOM</a>
            </p>
        </div>
        <img src="../Img/Escom2.jpeg" class="schImg menu-button2 clickable" alt="...">
    </div>

    <div class="flex-container">
        <img src="../Img/ESCOM3.jpeg" class="schImg menu-button2 clickable " alt="...">
        <div class="text-container">
            <h4 class="text">
                ¿Qué es el ESCOMunidad?
            </h4>
            <p class="text">
                ESCOMunidad es una comunidad digital que reúne a la comunidad de la Escuela Superior de Cómputo (ESCOM) 
                del Instituto Politécnico Nacional (IPN). Es un espacio en línea donde los estudiantes, exalumnos, profesores
                y personal de ESCOM pueden conectarse, compartir información y experiencias, y colaborar en proyectos.
                <br>
                <br>
                <a href="https://twitter.com/escomunidad"  class="btn btn-primary">Conocela</a>
            </p>
        </div>
    </div>
    
    <div class="images">
        <h1 class="text2"> 
            OFERTA EDUCATIVA
        </h1>
            
        <div class="shortImg tooltip2 miniBox" data-tooltip2="Educacion Continua"> 
            <a href="https://www.cec.escom.ipn.mx/">
                <img src="../Img/alumnos.jpeg" class="articles menu-button2 clickable" alt="...">
            </a>
        </div>

        <div class="shortImg tooltip2 miniBox" data-tooltip2="CELEX"> 
            <a href=https://celex.escom.ipn.mx/convocatorias.html>
                <img src="../Img/idiomas.jpeg" class="articles menu-button2 clickable" alt="...">
            </a>
        </div>


        <div class="shortImg tooltip2 miniBox" data-tooltip2="Laboratorio de Innovacion "> 
            <a href="https://www.escom.ipn.mx/SSEIS/vinculacion/servicios/proyectos.php">
                <img src="../Img/proyectos.avif" class="articles menu-button2 clickable" alt="...">
            </a>
        </div>
    </div>

    <footer>
        <div class="content">
            <img src="../Img/Logo_Escom2.PNG" alt="Logo Image">
            <div class="text-container">
                <p>
                    ESCUELA SUPERIOR DE COMPUTO
                </p>
                <p>
                    &copy;2023 <br>
                    SIGUENOS EN NUESTRAS REDES
                </p>
            </div>
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
        </div>
    </footer>
    <script src="../js/scripts.js"></script>
    <script src="../bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
</body>
</html>