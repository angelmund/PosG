document.addEventListener('DOMContentLoaded', function () {
    //se crea un objeto con los id de los input para mapear los valores
    const medida = {
        nombre_medida: '',
        nombre_corto: ''
    }

    //se obtienen los id de cada input 
    const nombreMedida = document.querySelector('#nombre_medida');
    const nombreCorto = document.querySelector('#nombre_corto');
    const formulario = document.querySelector('#formcreate-medida');
    const btnSubmit = document.querySelector('#formcreate-medida button[type="submit"]');
    const btnCancelar = document.querySelector('#cerrar');
    //agrega validarformulario
    nombreMedida.addEventListener('input', validarFormulario);
    nombreCorto.addEventListener('input', validarFormulario);

    btnCancelar.addEventListener('click', function(e) {
        e.preventDefault();
        medida.nombre_medida = '';
        medida.nombre_corto = '';
        formulario.reset();
        limpiarAlerta(nombreMedida.parentElement);
        limpiarAlerta(nombreCorto.parentElement);
        comprobarFormulario();
    })
    //valida el formulario
    function validarFormulario(e) {
        const referencia = e.target.parentElement;

        if (e.target.value.trim() === '') {
            //${e.target.id} inyecta el nombre del id del campo
            mostrarAlerta(`El campo ${e.target.name} es obligatorio`, referencia);
            medida[e.target.id] = '';
            comprobarFormulario();
            return;
        }

        limpiarAlerta(referencia);

        //asignar valores  id es el valor del id del input a validar
        medida[e.target.id] = e.target.value.trim();
        //compobar el objeto de medida
        comprobarFormulario();
    }

    //muestra alerta 
    function mostrarAlerta(mensaje, referencia) {
        limpiarAlerta(referencia);

        //genera alerta con en html 
        const error = document.createElement('P');

        error.textContent = mensaje;
        error.classList.add('bg-danger', 'text-white', 'p-2', 'text-center');
        //agrega el elemento al formulario
        referencia.appendChild(error);
    }

    //limpia la alerta 
    function limpiarAlerta(referencia) {
        const alerta = referencia.querySelector('.bg-danger');
        if (alerta) {
            alerta.remove();
        }
    }

    function comprobarFormulario() {
        if (Object.values(medida).includes('')) {
            btnSubmit.disabled = true;
        } else {
            btnSubmit.disabled = false;
        }
    }
});