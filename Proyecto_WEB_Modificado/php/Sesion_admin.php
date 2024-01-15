<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style_sesionA.css">
    <title>Administrador</title>
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

    <div class="imgS">
        <img src="../Img/ShaFoot.PNG" class="sha" alt="tiburón">
    </div>
    
    <div class="adminText">
        <h1>
            <br>
            BIENVENIDO
            <br> ADMINISTRADOR
        </h1>
    </div>

    <div class="images">
        <div class="shortImg tooltip2 miniBox" data-tooltip2="CREATE" onclick="realizarAccion('CREATE')"> 
            <img src="../Img/WRITE.jpg" class="circleImg menu-button clickable" >
        </div>
    
        <div class="shortImg tooltip2 miniBox" data-tooltip2="READ" onclick="realizarAccion('READ')"> 
            <img src="../Img/READ.jpg" class="circleImg menu-button clickable" >
        </div>
    
        <div class="shortImg tooltip2 miniBox" data-tooltip2="UPDATE" onclick="realizarAccion('UPDATE')"> 
            <img src="../Img/UPDATE.jpg" class="circleImg menu-button clickable" >
        </div>       
    
        <div class="shortImg tooltip2 miniBox" data-tooltip2="DELETE" onclick="realizarAccion('DELETE')"> 
            <img src="../Img/TRASH.jpg" class="circleImg menu-button clickable" >
        </div>     
    </div>
    
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