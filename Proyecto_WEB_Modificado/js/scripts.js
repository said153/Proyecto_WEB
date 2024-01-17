function validarFormulario() {

  const boleta = document.getElementById("boleta").value;
  const nombre = document.getElementById("nombre").value;
  const apellidoPaterno = document.getElementById("a_parterno").value;
  const apellidoMaterno = document.getElementById("a_materno").value;
  const curp = document.getElementById("curp").value;
  const cp = document.getElementById("cp").value;
  const ca = document.getElementById("calle").value;
  const tel = document.getElementById("telefono").value;
  const fechaNacimiento = new Date(document.getElementById("nacimiento").value);
  const num = document.getElementById("numero").value;
  const col = document.getElementById("colonia").value;
  const cor = document.getElementById("email").value;
  const fechaActual = new Date();
  var contraseña = document.getElementById("pass").value;
  
  const regex = /^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s]+$/;
  const regex1 = /^(PE|PP)[0-9]{8}$|[0-9]{10}$/;
  const regex2 = /^([A-Z&]|[a-z&]{1})([AEIOU]|[aeiou]{1})([A-Z&]|[a-z&]{1})([A-Z&]|[a-z&]{1})([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])([HM]|[hm]{1})([AS|as|BC|bc|BS|bs|CC|cc|CS|cs|CH|ch|CL|cl|CM|cm|DF|df|DG|dg|GT|gt|GR|gr|HG|hg|JC|jc|MC|mc|MN|mn|MS|ms|NT|nt|NL|nl|OC|oc|PL|pl|QT|qt|QR|qr|SP|sp|SL|sl|SR|sr|TC|tc|TS|ts|TL|tl|VZ|vz|YN|yn|ZS|zs|NE|ne]{2})([^A|a|E|e|I|i|O|o|U|u]{1})([^A|a|E|e|I|i|O|o|U|u]{1})([^A|a|E|e|I|i|O|o|U|u]{1})([0-9]{2}|[A-Z0-9]{2}|[A-ZA-Z]{2}|[a-z0-9]{2}|[a-za-z]{2})$/;
  const regex3 = /^((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])){8,10}$/

  // if (!regex3.test(contraseña)) {
  //   alert("El campo de contraseña no es válido.");
  //  Event.preventDefault();
  // }
    
  if (!regex1.test(boleta)) {
    alert("El campo de boleta no es válido.");
    Event.preventDefault();
  }

  if (!regex.test(nombre)) {
    alert("El campo de nombre solo debe contener letras.");
   Event.preventDefault();
  }

  if (!regex.test(apellidoPaterno)) {
    alert("El campo de apellido paterno solo debe contener letras.");
    Event.preventDefault();
  }

  if (!regex.test(apellidoMaterno)) {
    alert("El campo de apellido materno solo debe contener letras.");
    Event.preventDefault();
  }

  if (!regex2.test(curp)) {
      alert("El campo de CURP no es válido.");
      Event.preventDefault();
    }

  if (regex.test(cp)) {
      alert("El campo de código postal solo debe contener números.");
      Event.preventDefault();
  }

  if (regex.test(tel)) {
      alert("El campo de teléfono solo debe contener números.");
     Event.preventDefault();
  }

  if (fechaActual.getFullYear() - fechaNacimiento.getFullYear() < 17) {
    alert("Asegurate que la fecha de nacimiento sea correcta.");
    Event.preventDefault();
  }

   const output = `Boleta: ${boleta}\nNombre: ${nombre}\nApellido Paterno: ${apellidoPaterno}\nApellido Materno: ${apellidoMaterno}\nFecha de Nacimiento: ${fechaNacimiento}\nCURP: ${curp}`;

    var formElements = document.getElementById('registroForm').elements;
    var promedioElement = document.getElementById('promedio');
    var promedioValue = promedioElement.value;
    var checkboxValue = '';
    var selectValue = '';
    var radioValue = '';
    var otraDiscapacidadTextValue = '';
    var alcaldiaValue = '';
    var escuelaProcedenciaValue = '';
    var entidadFederativaValue = '';
    var escomFueTuValue = '';

    for (var i = 0; i < formElements.length; i++) {
        var element = formElements[i];

        if (element.type === 'checkbox') {
            if (element.checked) {
                checkboxValue = element.value;
            }
        }

        if (element.tagName === 'SELECT') {
            selectValue = element.value;
            if (selectValue === 'Otro') {
                otraDiscapacidadTextValue = document.getElementById('otro').value.trim();
            } else if (element.id === 'alcaldia') {
                alcaldiaValue = element.options[element.selectedIndex].text;
            } else if (element.id === 'entidad') {
                entidadFederativaValue = element.value;
            } else if (element.id === 'opcion') {
                escomFueTuValue = element.value;
            }
        }

        if (element.type === 'radio' && element.checked) {
            radioValue = element.value;
        }

        if (element.id === 'otraDiscapacidadText') {
            otraDiscapacidadTextValue = element.value.trim();
        }

        if (element.id === 'alcaldia') {
            alcaldiaValue = element.options[element.selectedIndex].text;
        }
 
        if (element.id === 'escuela') {
            escuelaProcedenciaValue = element.value.trim();
        }
    }

    alert( 'Identidad\n' + output  + '\n' + 'Género: ' + radioValue + '\n' + 'Discapacidad: ' + checkboxValue + (otraDiscapacidadTextValue ? '\nDiscapacidad: ' + otraDiscapacidadTextValue : '') +   
    '\n\nContacto'+ `\nCalle: ${ca}` + `\nNúmero: ${num}` + `\nColonia: ${col}` +'Alcaldía: ' + alcaldiaValue + `\nCódigo Postal: ${cp}` + `\nTeléfono: ${tel} `+ `\nCorreo: ${cor}`
    + '\n\nProcedencia' + '\nEscuela de Procedencia: ' + (escuelaProcedenciaValue === 'Otro' ? document.getElementById('otro').value.trim() : escuelaProcedenciaValue) + '\n' + 'Entidad Federativa: ' + entidadFederativaValue + '\nPromedio: ' + promedioValue+ '\nEscom fue tu: ' + escomFueTuValue);
 
  if (window.confirm("¿Quieres modificar?")) {
    alert("Modifica tus datos, no olvides presionar registrar al terminar.");
    Event.preventDefault(); 
  } 
  else {
    alert("Se han registrado correctamente tus datos.\nVe hacia la parte superior de la página y clickea cualquier logo para volver al inicio");

  return true;
  }

  
}


function limpiarFormulario() {
  const form = document.getElementById("registroForm");
  const elements = form.elements;

  for (let i = 0; i < elements.length; i++) {
      const element = elements[i];

      if (element.type !== "submit") {
          if (element.type === "radio" || element.type === "checkbox") {
              element.checked = false;
          } 
          else {
              element.value = "";
          }
      }
  }
}

  var otro = document.getElementById('otro');
  $("#otro").hide();

function ocultarOtro() {
    var select = document.getElementById('escuela');
    var otro = document.getElementById('otro');
  
    if (select.value === 'Otro') {
      $("#otro").show();
    } else {
      $("#otro").hide();
    }
  }
  
document.getElementById('escuela').addEventListener('change', ocultarOtro);

document.getElementById("otraDiscapacidad").addEventListener("change", function() {
  var otraDiscapacidadText = document.getElementById("otraDiscapacidadText");
  otraDiscapacidadText.style.display = this.checked ? "block" : "none";
});


document.getElementById("discapacidadMotriz").addEventListener("change", function () {
  var opcionesMotriz = document.getElementById("opcionesMotriz");
  opcionesMotriz.style.display = this.checked ? "block" : "none";
});



//sombreado de imagenes en inicio de la sesion 
document.addEventListener('DOMContentLoaded', function () {
  const clickableElements = document.querySelectorAll('.clickable');

  clickableElements.forEach(function (clickableElement) {
    const h1Element = clickableElement.querySelector('h1');
    const overlayText = clickableElement.querySelector('.overlay-text');

    h1Element.addEventListener('click', function () {
      console.log('Clic en el texto');
      if (overlayText) {
        overlayText.style.display = 'block';
      }
    });

    clickableElement.addEventListener('click', function (event) {
      const linkElement = clickableElement.querySelector('a');
      if (linkElement) {
        linkElement.click(); // Simular clic en el enlace si existe
      }
    });
  });
});

//aqui agrego la seccion de informacion del estudiante en la nav var
function mostrarSeccion(idSeccion) {
  // Verifica si es la sección 4 y cierra el recuadro si es el caso
  if (idSeccion === 'seccion4') {
    var recuadro1 = document.getElementById('seccion1');
    recuadro1.style.display = 'none';

    var recuadro2 = document.getElementById('seccion2');
    recuadro2.style.display = 'none';

    var recuadro3 = document.getElementById('seccion3');
    recuadro3.style.display = 'none';
  } else {
    // Oculta todas las secciones excepto la seleccionada
    var secciones = document.querySelectorAll('.seccion');
    secciones.forEach(function (seccion) {
      seccion.style.display = 'none';
    });

    // Muestra solo la sección seleccionada
    var seccionSeleccionada = document.getElementById(idSeccion);
    seccionSeleccionada.style.display = 'block';
  }
}



//aca agregue el CRUD
function realizarAccion(accion) {
    $.ajax({
      type: 'POST',
      url: 'CRUD_admin.php',
      data: { accion: accion },
      success: function (response) {
          console.log(response);
          if (accion === 'READ') {
            console.log('Datos obtenidos:', JSON.parse(response));
          }
          if (accion === 'CREATE' || accion === 'UPDATE' || accion === 'DELETE') {
            console.log('Operación', accion, 'completada:', response);
          }
      },
      error: function (error) {
          console.error(error);
      }
  });
}

//delete

document.addEventListener('DOMContentLoaded', function() {
  const centerText = document.querySelector('.centerText'); // Cambiado a .querySelector('.centerText')

  // Cambia el tamaño del texto al cargar la página
  centerText.style.fontSize = '90px'; // Cambiado a '90px' en lugar de '90em'

  // Vuelve al tamaño original después de un tiempo
  setTimeout(function() {
    centerText.style.fontSize = '25px'; // Cambiado a '25px' en lugar de '1em'
  }, 2000); // Ajusta el tiempo de espera según sea necesario
});
