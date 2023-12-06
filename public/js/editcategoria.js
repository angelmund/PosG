document.addEventListener('DOMContentLoaded', function () {
    
    // Se crea un objeto con los id de los input para mapear los valores
    const medida = {
        nombre_medida: '',
        // nombre_corto: ''
    };

    let formularioValido = true;

    const nombrecategoria = document.querySelector('#nombre_categoria_edit');
    const formulario = document.querySelector('#formedit-categoria');
    const btnCancelar = document.querySelector('#cerrar');
    const btnupdate = document.querySelector('#btn_update');

    nombrecategoria.addEventListener('input', validarFormulario);
    // nombreCorto.addEventListener('input', validarFormulario);

    btnCancelar.addEventListener('click', (e) => {
        e.preventDefault();
        medida.nombre_medida = '';
        // medida.nombre_corto = '';
        formulario.reset();
        limpiarAlerta(nombrecategoria.parentElement);
        // limpiarAlerta(nombreCorto.parentElement);
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
        btn.addEventListener('click', consultarcategoria);
    });

    function consultarcategoria(event) {
        const idcategoria = event.currentTarget.getAttribute('data-idcategoria');
        const url = '/categorias/editcategoria/' + idcategoria;

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
        document.querySelector('#nombre_categoria_edit').value = data.nombre_categoria;
        // document.querySelector('#nombrecorto_edit').value = data.nombre_corto;
    
        // Obtener el ID del registro actual
        const idcategoria = data.idcategoria; // Cambiado de '[data-idcategoria]' a 'data.idcategoria'
    
        // Modificar la acción del formulario para que apunte al ID específico
        const formedit = document.querySelector('#formedit-categoria'); // Cambiado de '#formedit-medida' a '#formedit-categoria'
        formedit.action = '/categorias/updatecategoria/' + idcategoria;
    }
    
    


    btnupdate.addEventListener('click', function (event) {
        event.preventDefault();
        if (formularioValido) {
            confirmarupdatecategorias();
        }
    });

    function confirmarupdatecategorias() {
        Swal.fire({
            title: "¿Está seguro que quiere actualizar la categoria?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si,Actualizar!"
          }).then((result) => {
            if (result.isConfirmed) {
                updatecategoria();
            }
        });
    }

    async function updatecategoria() {
        // console.log("entro a updatecategoria");
    
        const idcategoria = document.querySelector('[data-idcategoria]').getAttribute('data-idcategoria');
        const url = document.querySelector('#url').value;
    
        // console.log('URL:', url + '/medidas/updatecategoria/' + idcategoria);
    
        try {
            // console.log("Antes del fetch");
            const formData = new FormData(document.querySelector('#formedit-categoria'));
            const response = await fetch(url + '/categorias/updatecategoria/' + idcategoria, {
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
