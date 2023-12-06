// import { validarFormulario } from './activarformulario';

document.addEventListener('DOMContentLoaded', function () {
    //se crea un objeto con los id de los input para mapear los valores
    const medida = {
        nombre_medida: '',
        nombre_corto: ''
    };
    let formularioValido = false;

    //se obtienen los id de cada input 
    const nombreMedida = document.querySelector('#nombre_medida');
    const nombreCorto = document.querySelector('#nombre_corto');
    const formulario = document.querySelector('#formcreate-medida');
    const btnSubmit = document.querySelector('#formcreate-medida button[type="submit"]');
    const btnCancelar = document.querySelector('#cerrar');

    // Deshabilitar el botón de submit al inicio
    btnSubmit.disabled = true;

    // agrega validarformulario
    nombreMedida.addEventListener('input', validarFormulario);
    nombreCorto.addEventListener('input', validarFormulario);

    btnCancelar.addEventListener('click', (e) => {
        e.preventDefault();
        medida.nombre_medida = '';
        medida.nombre_corto = '';
        formulario.reset();
        limpiarAlerta(nombreMedida.parentElement);
        limpiarAlerta(nombreCorto.parentElement);
        comprobarFormulario();
    });

    // valida el formulario
    function validarFormulario(e) {
        const referencia = e.target.parentElement;

        if (e.target.value.trim() === '') {
            mostrarAlerta(`El campo  es obligatorio`, referencia);
            medida[e.target.id] = '';
            comprobarFormulario();
            return;
        }

        limpiarAlerta(referencia);

        medida[e.target.id] = e.target.value.trim();
        comprobarFormulario();
    }

    // muestra alerta 
    function mostrarAlerta(mensaje, referencia) {
        limpiarAlerta(referencia);

        const error = document.createElement('P');

        error.textContent = mensaje;
        error.classList.add('bg-danger', 'text-white', 'p-2', 'text-center');
        referencia.appendChild(error);
    }

    // limpia la alerta 
    function limpiarAlerta(referencia) {
        const alerta = referencia.querySelector('.bg-danger');
        if (alerta) {
            alerta.remove();
        }
    }

    // ...
    
    function comprobarFormulario() {
        // ...

        if (Object.values(medida).includes('')) {
            btnSubmit.disabled = true;
            formularioValido = false; // El formulario no es válido
        } else {
            btnSubmit.disabled = false;
            formularioValido = true; // El formulario es válido
        }
    }
    
    $('#btn_save').click(function (event) {
        event.preventDefault();
        if (formularioValido) { // Verifica si el formulario es válido
            confirmarmedidas();
        }
    });

    function confirmarmedidas() {
        Swal.fire({
            title: "¿Está seguro que quiere guardar la medida?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si,Guardar!"
          }).then((result) => {
            if (result.isConfirmed) {
                savemedida();
            }
          });
    }

    async function savemedida() {
        const url = $('#url').val();
        try{
            const formData = new FormData($('#formcreate-medida')[0]);
            const response = await fetch(url + '/medidas/createmedida', {
                method: 'POST',
                mode:'cors', 
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                body: formData
            });
            const data = await response.json();
            // console.log(data); // Muestra los datos recibidos en la consola
            
            if (data.idnotificacion == 1) {
                Swal.fire({
                    title: "Guardado con éxito!",
                    icon: "success",
                    showConfirmButton: false,  // No mostrar el botón "Ok"
                    timer: 1500,  // Cerrar automáticamente después de 1500 milisegundos (1.5 segundos)
                    timerProgressBar: true  // Mostrar una barra de progreso durante el temporizador
                });
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Ocurrió un error al guardar!"
                  });
            }
            // console.log(response);
            // console.log($('#formcreate-medida').serialize());

        } catch (error) {
            // console.log(error);
        }
    }
});
