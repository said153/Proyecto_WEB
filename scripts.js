function validarFormulario() {
    //Verifica el correcto formato de los datos ingresados
    const nombre = document.getElementById("nombre").value;
    const apellidoPaterno = document.getElementById("a_parterno").value;
    const apellidoMaterno = document.getElementById("a_materno").value;
    const curp = document.getElementById("curp").value;
    const boleta = document.getElementById("boleta").value;
    const cp = document.getElementById("cp").value;
    const tel = document.getElementById("telefono").value;
    const fechaNacimiento = new Date(document.getElementById("nacimiento").value);
    const fechaActual = new Date();

    const exp = /^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s]+$/;
    const exp1 = /^(PE|PP)\d{8}$|\d{10}$/;
    const exp2 = /^[A-Z]{4}[0-9]{6}[A-Z]{6}[A-Z0-9]{2}$/;
  
    if (!exp1.test(boleta)) {
      alert("El campo de boleta no es válido.");
      return false;
    }

    if (!exp.test(nombre)) {
      alert("El campo de nombre solo debe contener letras.");
      return false;
    }
  
    if (!exp.test(apellidoPaterno)) {
      alert("El campo de apellido paterno solo debe contener letras.");
      return false;
    }
  
    if (!exp.test(apellidoMaterno)) {
      alert("El campo de apellido materno solo debe contener letras.");
      return false;
    }

    if (!exp2.test(curp)) {
        alert("El campo de CURP no es válido.");
        return false;
      }

    if (exp.test(cp)) {
        alert("El campo de código postal solo debe contener números.");
        return false;
    }

    if (exp.test(tel)) {
        alert("El campo de teléfono solo debe contener números.");
        return false;
    }

    if (fechaActual.getFullYear() - fechaNacimiento.getFullYear() < 17) {
      alert("Asegurate que la fecha de nacimiento sea correcta.");
      return false;
    }
   else{
//Al dar clic en Registrar mostrar los datos ingresados (falta agregar datos y en dicha pantalla se le proporcionará al usuario dos opciones: Aceptar y
Modificar.)
    alert("Tu nombre es:" + " " + $('#nombre').val() + "\n");
    return true;
   }

  }

// este es para mostrar/ocultar el campo de "Otro" según lo que ponga usuario en nombre de escuela
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

//Borra todos los campos del formulario
function limpiarFormulario() {
    const Formulario = document.querySelectorAll("formulario");
    Formulario.forEach((element) => {
      element.value = null;
    });
}

//Mantiene todos los datos en el formulario luego del alert
function modificarFormulario() {
    // aqui para cargar datos supongo, la verdad no se que quieran póner aca jaja
    alert("Modifica tus datos, no olvides presionar registrar al terminar.");
    const Formulario = document.querySelectorAll("formulario");
    Formulario.forEach((element) => {
      element.value = element.value;
    });
}

// este es para mostrar/ocultar el campo de "Otra" según lo que ponga usuario
document.getElementById("otraDiscapacidad").addEventListener("change", function() {
    var otraDiscapacidadText = document.getElementById("otraDiscapacidadText");
    otraDiscapacidadText.style.display = this.checked ? "block" : "none";
});


 //  muestra/oculta las opciones de discapacidad motriz
 document.getElementById("discapacidadMotriz").addEventListener("change", function () {
    var opcionesMotriz = document.getElementById("opcionesMotriz");
    opcionesMotriz.style.display = this.checked ? "block" : "none";
});
