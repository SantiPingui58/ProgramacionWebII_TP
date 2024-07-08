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

<script src="./js/eliminar.js"></script>
<script>
$(document).ready(function() {
    var tabla = $('#miTabla').DataTable({
        "ajax": {
            "url": "./ajax/get_entidades.php",
            "data": function (d) {
                d.tabla = "sucursales"; // Aquí puedes cambiar el nombre de la tabla según necesites
            }
        },
        "columns": [
            {"data": "id_sucursal"},
            {"data": "nombre"},
            {"data": "telefono"},
            {"data": "direccion"},
            {
                "data": null,
                // Botón de eliminar
                "render": function (data, type, row) {
                    return '<button type="button" class="btn btn-danger btn-eliminar" data-id="' + row.id_sucursal + '" data-url="./ajax/eliminar.php" data-tipo="sucursal">' +
                           '<i class="fas fa-trash-alt"></i></button>';
                }
            }
        ]
    });
});
</script>

</body>
<?php
include("./php/footer.php");
?>
</html>
