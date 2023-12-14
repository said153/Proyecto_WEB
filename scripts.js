function validarFormulario() {
    const nombre = document.getElementById("nombre").value;
    const apellidoPaterno = document.getElementById("a_parterno").value;
    const apellidoMaterno = document.getElementById("a_materno").value;
    const curp = document.getElementById("curp").value;
    const boleta = document.getElementById("boleta").value;
    const cp = document.getElementById("cp").value;
    const tel = document.getElementById("telefono").value;
    const fechaNacimiento = new Date(document.getElementById("nacimiento").value);
    const fechaActual = new Date();
    var respuesta = window.confirm("¿Quieres modificar?");
    const Formulario = document.querySelectorAll("formulario");

    const regex = /^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s]+$/;
    const regex1 = /^(PE|PP)\d{8}$|\d{10}$/;
    const regex2 = /^[A-Z]{4}[0-9]{6}[A-Z]{6}[A-Z0-9]{2}$/;
  
    if (!regex1.test(boleta)) {
      alert("El campo de boleta no es válido.");
      return false;
    }

    if (!regex.test(nombre)) {
      alert("El campo de nombre solo debe contener letras.");
      return false;
    }
  
    if (!regex.test(apellidoPaterno)) {
      alert("El campo de apellido paterno solo debe contener letras.");
      return false;
    }
  
    if (!regex.test(apellidoMaterno)) {
      alert("El campo de apellido materno solo debe contener letras.");
      return false;
    }

    if (!regex2.test(curp)) {
        alert("El campo de CURP no es válido.");
        return false;
      }

    if (regex.test(cp)) {
        alert("El campo de código postal solo debe contener números.");
        return false;
    }

    if (regex.test(tel)) {
        alert("El campo de teléfono solo debe contener números.");
        return false;
    }

    if (fechaActual.getFullYear() - fechaNacimiento.getFullYear() < 17) {
      alert("Asegurate que la fecha de nacimiento sea correcta.");
      return false;
    }

  else {
  alert("Tu No de Boleta es: " + $('#boleta').val() + "\n" + "Tu nombre es: " + $('#nombre').val() + "\n" +"Tu apellido paterno es: " + $('#a_parterno').val() + "\n" + "Tu apellido materno es: " + $('#a_materno').val() + "\n"+ "Tu fecha de nacimiento es: " + $('#nacimiento').val() + "\n");

  if (window.confirm("¿Quieres modificar?")) {
    alert("Modifica tus datos, no olvides presionar registrar al terminar."); 
  }
  else {
    alert("Tus datos fueron registrados correctamente.");
    return true;
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

function limpiarFormulario() {
    const Formulario = document.querySelectorAll("formulario");
    Formulario.forEach((element) => {
      element.value = null;
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
