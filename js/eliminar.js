$(document).ready(function() {
    function eliminarRegistro(url, id, tipo, tabla) {
        Swal.fire({
            title: '¿Estás seguro que quieres eliminar el registro ID ' + id + '?',
            text: 'No podrás revertir esto',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Llamar a la URL de eliminación utilizando AJAX
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: {id: id, tipo: tipo},
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            // Recargar la tabla después de eliminar
                            tabla.ajax.reload();
                            Swal.fire('Eliminado!', 'El registro ha sido eliminado.', 'success');
                        } else {
                            Swal.fire('Error', 'Hubo un problema al eliminar el registro.', 'error');
                        }
                    },
                    error: function() {
                        Swal.fire('Error', 'Hubo un error de red o de servidor.', 'error');
                    }
                });
            }
        });
    }

    // Evento click del botón eliminar, genérico para cualquier tabla
    $('body').on('click', '.btn-eliminar', function () {
        var id = $(this).data('id');
        var url = $(this).data('url');
        var tipo = $(this).data('tipo');
        var tabla = $('#miTabla').DataTable(); // Aquí puedes modificar para que sea genérico

        eliminarRegistro(url, id, tipo, tabla);
    });
});
