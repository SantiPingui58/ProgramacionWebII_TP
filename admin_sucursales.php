<!DOCTYPE html>
<html lang="es">
<?php
include("./php/head.php");
showHead("Admin");
echo '<body>';
include("header.php");

if (!isset($_SESSION['usuario']) || (isset($_SESSION['admin']) && $_SESSION['admin']==0)) {
  echo '<script>';
  echo "window.location.href = 'index.php';";
  echo '</script>';
}
?>

<div class="container">
<a href="agregar_sucursal.php" class="btn btn-success mb-3">Agregar Sucursal</a>
    <table id="miTabla" class="display" style="width:100%">
        <thead>
            <tr>
                <th style="width: 20px;">ID</th> 
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Direccion</th>
                <th>Acciones</th> 
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<script>
$(document).ready(function() {
    var tabla = $('#miTabla').DataTable({
        "ajax": "./ajax/get_sucursales.php",
        "columns": [
            {"data": "id_sucursal"},
            {"data": "nombre"},
            {"data": "telefono"},
            {"data": "direccion"},
            {
                "data": null,
                //Botonones de editar y eliminar
                "render": function (data, type, row) {
                    return '<button type="button" class="btn btn-primary btn-editar">' +
                           '<i class="fas fa-pencil-alt"></i></button> ' +
                           '<button type="button" class="btn btn-danger btn-eliminar" data-id="' + row.id_sucursal + '">' +
                           '<i class="fas fa-trash-alt"></i></button>';
                }
            }
        ]
    });

    //clik del botón eliminar
    $('#miTabla tbody').on('click', '.btn-eliminar', function () {
        var id_sucursal = $(this).data('id');

        Swal.fire({
            title: '¿Estás seguro que quieres eliminar el registro ID ' + id_sucursal +'?',
            text: 'No podrás revertir esto',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Llamar a eliminar_sucursal.php utilizando AJAX
                $.ajax({
                    type: 'POST',
                    url: './ajax/eliminar_sucursal.php',
                    data: {id_sucursal: id_sucursal},
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
    });
});
</script>


</body>
<?php
include("./php/footer.php");
?>
</html>
