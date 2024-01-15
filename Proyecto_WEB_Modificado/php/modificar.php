<?php
    // Obtener la boleta del formulario POST de manera segura
    $boleta = $_GET["boleta"];
    
    $enlace = mysqli_connect("localhost", "root", "", "mydb");

    $resultado = mysqli_query($enlace, "SELECT * FROM alumno WHERE boleta = $boleta");
    $resultado2 = mysqli_query($enlace, "SELECT calleCon,numCon,coloniaCon,alcaldiaCon,codPosCon,telCon,correoCon FROM alumno JOIN contacto ON alumno.contacto_idcontacto = contacto.idcontacto WHERE alumno.boleta = '$boleta'");
    $resultado3 = mysqli_query($enlace, "SELECT escProc, entFedProc,promedioProc,opcionProc FROM alumno JOIN procedencia ON alumno.procedencia_idprocedencia = procedencia.idprocedencia WHERE alumno.boleta = '$boleta'");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/css/bootstrap.min.css">
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


    <form class="col-8 p-3 m-auto"  id="registroForm" method="GET" onsubmit="return validarFormulario()">
                <h2>Identidad</h2>
                <fieldset class="Identidad"> 
                    <?php

                        while($datos=$resultado->fetch_object()){?>
                            <label for="boleta">Boleta:</label>
                            <input type="text" class="form-control" id="boleta" name="boleta" minlength="10" maxlength="10" value="<?=$datos->boleta?>">
                            <label for="nombre">Nombre(s):</label>  
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?=$datos->nombreAlu?>">
                            <label for="a_paterno">Apellido Paterno:</label>
                            <input type="text" class="form-control" id="a_parterno" name="a_paterno" value="<?=$datos->apePatAlu?>">
                            <label for="a_maternos">Apellido Materno:</label>
                            <input type="text" class="form-control" id="a_materno" name="a_materno" value="<?=$datos->apeMatAlu?>">
                            <label for="nacimiento">Fecha de nacimiento:</label>
                            <input type="date" class="form-control" id="nacimiento" name="nacimiento" value="<?=$datos->fechaNacAlu?>">
                            <label for="curp">CURP:</label>
                            <input type="text" class="form-control" id="curp" name="curp" minlength="18" maxlength="18" value="<?=$datos->curpAlu?>">
                            <!-- Genero con bootstrap -->
                            <div>
                                <p>Selecciona tu Género:</p>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" >
                                <label class="form-check-label" for="inlineRadio1">Hombre</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" >
                                <label class="form-check-label" for="inlineRadio2">Mujer</label>
                            </div>
                            <div class="grupo-formulario">
                                <label>A fin de considerar sus necesidades y atenderlas, requerimos saber si usted es una persona con:</label>
                                <div class="formulario-verificación">
                                    <input class="form-check-input" type="checkbox" id="discapacidadAuditiva" name="discapacidad[]" value="auditiva">
                                    <label class="form-check-label" for="discapacidadAuditiva">Discapacidad auditiva</label>
                                </div>
                                <div class="formulario-verificación">
                                    <input class="form-check-input" type="checkbox" id="discapacidadVisual" name="discapacidad[]" value="visual">
                                    <label class="form-check-label" for="discapacidadVisual">Discapacidad visual</label>
                                </div>
                        
                                <!-- Discapacidad motriz la que agrupe -->
                                <div class="formulario-verificación">
                                    <input class="form-check-input" type="checkbox" id="discapacidadMotriz" name="discapacidad[]" value="motriz">
                                    <label class="form-check-label" for="discapacidadMotriz">Discapacidad motriz</label>
                            
                                    <!-- Opciones específicas de discapacidad motriz -->
                                    <div id="opcionesMotriz" style="display: none;">
                            
                                        <div class="formulario-verificación">
                                            <input class="form-check-input" type="radio" name="discapacidadMotrizOpcion" id="usuariaRuedas" value="ruedas">
                                            <label class="form-check-label" for="usuariaRuedas">Usuaria De Sillas De Ruedas</label>
                                        </div>
                                        <div class="formulario-verificación">
                                            <input class="form-check-input" type="radio" name="discapacidadMotrizOpcion" id="usuariaMuletas" value="muletas">
                                            <label class="form-check-label" for="usuariaMuletas">Usuaria De Muletas</label>
                                        </div>
                                        <div class="formulario-verificación">
                                            <input class="form-check-input" type="radio" name="discapacidadMotrizOpcion" id="usuariaBaston" value="baston">
                                            <label class="form-check-label" for="usuariaBaston">Usuaria De Bastón</label>
                                        </div>
                            
                                    </div>
                                </div>
                        
                                <!-- aquí puse la otra discapacidad -->
                            
                                <div class="formulario-verificación">
                                    <input class="form-check-input" type="checkbox" id="otraDiscapacidad" name="discapacidad[]" value="otra">
                                    <label class="form-check-label" for="otraDiscapacidad">Otra opción</label>
                                    <input type="text" class="form-control" id="otraDiscapacidadText" name="otraDiscapacidad" placeholder="Especifica tu discapacidad" style="display: none;">
                                </div>
                            </div>
                            <label for="pass">Contraseña (Debe contener entre 8 a 10 caracteres con al menos un número, una letra minúscula y una letra mayúscula):</label>
                            <input type="password" class="form-control" id="pass" name="pass" minlength="8" maxlength="10">
                    <?php } 
                    ?>
                    

                </fieldset>

                <h2>Contacto</h2>
                <fieldset>
                    <?php
                    while($datos=$resultado2->fetch_object()){?>
                        <label for="calle">Calle:</label>
                        <input type="text" class="form-control" id="calle" name="calle" value="<?=$datos->calleCon?>">
                        <label for="numero">Número:</label>
                        <input type="number" class="form-control" id="numero" name="numero" maxlength="4" value="<?=$datos->numCon?>">
                        <label for="colonia">Colonia:</label>
                        <input type="text" class="form-control" id="colonia" name="colonia" value="<?=$datos->coloniaCon?>">
                        <label for="">Alcadía:</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Elige una opcion</option>
                            <option value="1">Álvaro Obregón</option>
                            <option value="2">Azcapotzalco</option>
                            <option value="3">Benito Juárez</option>
                            <option value="4">Coyoacán</option>
                            <option value="5">Cuajimalpa de Morelos</option>
                            <option value="6">Cuauhtémoc</option>
                            <option value="7">Gustavo A. Madero</option>
                            <option value="8">Iztacalco</option>
                            <option value="9">Iztapalapa</option>
                            <option value="10">La Magdalena Contreras</option>
                            <option value="11">Miguel Hidalgo</option>
                            <option value="12">Milpa Alta</option>
                            <option value="13">Tláhuac</option>
                            <option value="14">Tlalpan</option>
                            <option value="15">Venustiano Carranza</option>
                            <option value="16">Xochimilco</option>
                        </select>
                        <br>
                        <label for="cp">Código Postal:</label>
                        <input type="text" class="form-control" id="cp" name="cp" minlength="5" maxlength="5"  value="<?=$datos->codPosCon?>">
                        <label for="telefono">Teléfono</label>
                        <input type="tel" class="form-control" name="telefono" id="telefono" minlength="10" maxlength="10" value="<?=$datos->telCon?>">
                        <label for="numero">Correo electrónico:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?=$datos->correoCon?>">
                </fieldset>
                <?php }
                        
                ?>

                <h2>Procedencia</h2>
                <fieldset>
                    <?php
                    while($datos=$resultado3->fetch_object()){?>
                        <label for="escuela">Escuela de procedencia:</label>
                        <select id="escuela" name="escuela" class="form-select" aria-label="Default select example">
                            <option value="" selected>Elige una opcion</option>
                            <option value="CECyT 1 «Gonzalo Vázquez Vela» CDMX">CECyT 1 «Gonzalo Vázquez Vela» CDMX</option>
                            <option value="CECyT 2 «Miguel Bernard» CDMX">CECyT 2 «Miguel Bernard CDMX</option>
                            <option value="CECyT 3 «Estanislao Ramírez Ruiz»  Estado de México">CECyT 3 «Estanislao Ramírez Ruiz»  Estado de México</option>
                            <option value="CECyT 4 «Lázaro Cárdenas» CDMX">CECyT 4 «Lázaro Cárdenas» CDMX</option>
                            <option value="CECyT 5 «Benito Juárez García»  CDMX">CECyT 5 «Benito Juárez García»  CDMX</option>
                            <option value="CECyT 6 «Miguel Othón de Mendizábal» CDMX">CECyT 6 «Miguel Othón de Mendizábal» CDMX</option>
                            <option value="CECyT 7 «Cuauhtémoc»  CDMX">CECyT 7 «Cuauhtémoc» CDMX</option>
                            <option value="CECyT 8 «Narciso Bassols García»  CDMX">CECyT 8 «Narciso Bassols García»  CDMX</option>
                            <option value="CECyT 9 «Juan de Dios Bátiz» CDMX">CECyT 9 «Juan de Dios Bátiz» CDMX</option>
                            <option value="CECyT 10 «Carlos Vallejo Márquez»  CDMX">CECyT 10 «Carlos Vallejo Márquez» CDMX</option>
                            <option value="CECyT 11 «Wilfrido Massieu Pérez»  CDMX">CECyT 11 «Wilfrido Massieu Pérez»  CDMX</option>
                            <option value="CECyT 12 «José María Morelos y Pavón»  CDMX">CECyT 12 «José María Morelos y Pavón»
                            <option value="CECyT 13 «Ricardo Flores Magón»  CDMX">CECyT 13 «Ricardo Flores Magón»  CDMX</option> CDMX</option>
                            <option value="CECyT 14 «Luis Enrique Erro»  CDMX">CECyT 14 «Luis Enrique Erro»  CDMX</option>
                            <option value="CECyT 15 «Diódoro Antúnez Echegaray»  CDMX">CECyT 15 «Diódoro Antúnez Echegaray»  CDMX</option>
                            <option value="CECyT 16 «Hidalgo»  Hidalgo">CECyT 16 «Hidalgo» Hidalgo</option>
                            <option value="CECyT 17 «León Guanajuato»  Guanajuato">CECyT 17 «León Guanajuato» Guanajuato</option>
                            <option value="CECyT 19 «Leona Vicario»  Estado de México">CECyT 19 «Leona Vicario»  Estado de México</option>
                            <option value="CET 1 «Walter Cross Buchanan»  CDMX">CET 1 «Walter Cross Buchanan»  CDMX</option>
                            <option value="Otro">Otro</option>
                        </select>
                        <br><br>
                        <input type="text" class="form-control" id="otro" name="otro" placeholder="Escribe el nombre de la escuela">

                        <label for="entidad">Entidad Federativa de Procedencia:</label>  
                        <select id="entidad" name="entidad" class="form-select" aria-label="Default select example">
                            <option value="" selected>Elige una opcion</option>
                            <option value="Aguascalientes">Aguascalientes</option>
                            <option value="Baja California">Baja California</option>
                            <option value="Baja California Sur">Baja California Sur</option>
                            <option value="Campeche">Campeche</option>
                            <option value="Chiapas">Chiapas</option>
                            <option value="Chihuahua">Chihuahua</option>
                            <option value="Coahuila de Zaragoza">Coahuila de Zaragoza</option>
                            <option value="Colima">Colima</option>
                            <option value="Ciudad de México">Ciudad de México</option>
                            <option value="Durango">Durango</option>
                            <option value="Guanajuato">Guanajuato</option>
                            <option value="Guerrero">Guerrero</option>
                            <option value="Hidalgo">Hidalgo</option>
                            <option value="Jalisco">Jalisco</option>
                            <option value="Estado de México">Estado de México</option>
                            <option value="Michoacán de Ocampo">Michoacán de Ocampo</option>
                            <option value="Morelos">Morelos</option>
                            <option value="Nayarit">Nayarit</option>
                            <option value="Nuevo León">Nuevo León</option>
                            <option value="Oaxaca">Oaxaca</option>
                            <option value="Puebla">Puebla</option>
                            <option value="Querétaro">Querétaro</option>
                            <option value="Quintana Roo">Quintana Roo</option>
                            <option value="San Luis Potosí">San Luis Potosí</option>
                            <option value="Sinaloa">Sinaloa</option>
                            <option value="Sonora">Sonora</option>
                            <option value="Tabasco">Tabasco</option>
                            <option value="Tamaulipas">Tamaulipas</option>
                            <option value="Tlaxcala">Tlaxcala</option>
                            <option value="Veracruz de Ignacio de la Llave">Veracruz de Ignacio de la Llave</option>
                            <option value="Yucatán">Yucatán</option>
                            <option value="Zacatecas">Zacatecas</option>
                        </select>
                        <br>
                        <label for="promedio">Promedio (considerando decimal):</label>
                        <input type="number" class="form-control" id="promedio" name="promedio" step="0.01" min="6" max="10" value="<?=$datos->promedioProc?>">
                        <label>ESCOM fue tu:</label>  
                        <select id="opcion" name="opcion" class="form-select" aria-label="Default select example">
                            <option value="" selected>Elige una opción</option>
                            <option value="Aguascalientes">Primera opción</option>
                            <option value="Baja California">Segunda opción</option>
                            <option value="Baja California Sur">Tercera opción</option>
                        </select>

                    <?php }
                    ?>
                </fieldset>

                <div class="botones">
                    <button type="submit" class="btn btn-primary" onclick="validarFormulario()">Registrar</button>
                    <button type="submit" class="btn btn-primary" onclick="limpiarFormulario()">Limpiar</button>
                </div>
            </form>
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script src="../bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
            <script src="../js/scripts.js"></script>

</body>
</html>