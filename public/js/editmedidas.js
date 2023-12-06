document.addEventListener('DOMContentLoaded', function () {
    
    // Se crea un objeto con los id de los input para mapear los valores
    const medida = {
        nombre_medida: '',
        nombre_corto: ''
    };

    let formularioValido = true;

    const nombreMedida = document.querySelector('#nombre_medida_edit');
    const nombreCorto = document.querySelector('#nombrecorto_edit');
    const formulario = document.querySelector('#formedit-medida');
    const btnCancelar = document.querySelector('#cerrar');
    const btnupdate = document.querySelector('#btn_update');

    nombreMedida.addEventListener('input', validarFormulario);
    nombreCorto.addEventListener('input', validarFormulario);

    btnCancelar.addEventListener('click', (e) => {
        e.preventDefault();
        medida.nombre_medida = '';
        medida.nombre_corto = '';
        formulario.reset();
        limpiarAlerta(nombreMedida.parentElement);
        limpiarAlerta(nombreCorto.parentElement);
        formularioValido = true; // Restablecer el formulario como válido
    });

    function validarFormulario(e) {
        const referencia = e.target.parentElement;

        if (e.target.value.trim() === '') {
            mostrarAlerta('El campo es obligatorio', referencia);
            medida[e.target.id] = '';
            formularioValido = false;
        } else {
            limpiarAlerta(referencia);
            medida[e.target.id] = e.target.value.trim();
            formularioValido = true;
        }
    }

    function mostrarAlerta(mensaje, referencia) {
        limpiarAlerta(referencia);

        const error = document.createElement('P');

        error.textContent = mensaje;
        error.classList.add('bg-danger', 'text-white', 'p-2', 'text-center');
        referencia.appendChild(error);
    }

    function limpiarAlerta(referencia) {
        const alerta = referencia.querySelector('.bg-danger');
        if (alerta) {
            alerta.remove();
        }
    }

    
    // Hacer consulta a la URL de Laravel
    const btneditar = document.querySelectorAll('.abrir-modal');
    btneditar.forEach(btn => {
        btn.addEventListener('click', consultarmedida);
    });

    function consultarmedida(event) {
        const idmedida = event.currentTarget.getAttribute('data-idmedida');
        const url = '/medidas/editmedida/' + idmedida;

        fetch(url)
            .then(respuesta => respuesta.json())
            .then(resultado => {
                // Llenar el modal con los datos obtenidos
                llenarModal(resultado);
            })
            .catch(error => console.error('Error:', error));
    }


    function llenarModal(data) {
        // Lógica para llenar los campos del modal con los datos recibidos
        document.querySelector('#nombre_medida_edit').value = data.nombre_medida;
        document.querySelector('#nombrecorto_edit').value = data.nombre_corto;

        // Obtener el ID del registro actual
        const idmedida = data.idmedida; // Cambiado de '[data-idmedida]' a 'data.idmedida'

        // Modificar la acción del formulario para que apunte al ID específico
        const formedit = document.querySelector('#formedit-medida');
        formedit.action = '/medidas/updatemedida/' + idmedida;
    }


    btnupdate.addEventListener('click', function (event) {
        event.preventDefault();
        if (formularioValido) {
            confirmarupdatemedidas();
        }
    });

    function confirmarupdatemedidas() {
        Swal.fire({
            title: "¿Está seguro que quiere actualizar la medida?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si,Actualizar!"
          }).then((result) => {
            if (result.isConfirmed) {
                updatemedida();
            }
        });
    }

    async function updatemedida() {
        // console.log("entro a updatemedida");
    
        const idmedida = document.querySelector('[data-idmedida]').getAttribute('data-idmedida');
        const url = document.querySelector('#url').value;
    
        // console.log('URL:', url + '/medidas/updatemedida/' + idmedida);
    
        try {
            // console.log("Antes del fetch");
            const formData = new FormData(document.querySelector('#formedit-medida'));
            const response = await fetch(url + '/medidas/updatemedida/' + idmedida, {
                method: 'POST',
                mode: 'cors',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData
            }).catch(error => console.error('Error en fetch:', error));
    
            // console.log("Después del fetch");
    
            const data = await response.json();
            // console.log(data);
            if (data.idnotificacion == 1) {
                Swal.fire({
                    title: "Actualizado con éxito!",
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
    
            // Resto del código...
        } catch (error) {
            console.error('Error en try-catch:', error);
        }
    }   
});
