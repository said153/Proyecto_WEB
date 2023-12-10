function validarFormulario() {
    // Aque para la ER exprexiones regulñares
    return true; // Devuelve true si la validación es exitosa, false si no lo es
}

function modificarFormulario() {
    // aqui para cargar datos supongo, la verdad no se que quieran póner aca jaja
    alert("hola como le diste modificar y no se que tenga que hacer aca, te saldra esta alerta AJJAJA");
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
