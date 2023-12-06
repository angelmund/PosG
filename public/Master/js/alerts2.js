import Swal from 'sweetalert2';

// Ejemplo de uso
Swal.fire('¡Hola, mundo!', 'Este es un mensaje de ejemplo.', 'success');


function confirmar() {
    Swal.fire({
        title: "¿Está seguro que quiere guardar la categoria?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si,Guardar!"
      })
}