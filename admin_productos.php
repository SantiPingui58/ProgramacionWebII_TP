<!DOCTYPE html>
<html lang="es">
<?php
include("./php/head.php");
showHead("Admin Productos");
echo '<body>';
include("header.php");

if (!isset($_SESSION['usuario']) || (isset($_SESSION['admin']) && $_SESSION['admin']==0)) {
  echo '<script>';
  echo "window.location.href = 'index.php';";
  echo '</script>';
}
?>

<div class="container">
    <table id="miTabla" class="display" style="width:100%">
        <thead>
            <tr>
                <th style="width: 20px;">ID</th> 
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
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
                d.tabla = "productos";
            }
        },
        "columns": [
            {"data": "id_producto"},
            {"data": "nombre"},
            {"data": "precio"},
            {"data": "stock"},
            {
                "data": null,
                // Botón de eliminar
                "render": function (data, type, row) {
                    return '<button type="button" class="btn btn-danger btn-eliminar" data-id="' + row.id_producto + '" data-url="./ajax/eliminar.php" data-tipo="producto">' +
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
