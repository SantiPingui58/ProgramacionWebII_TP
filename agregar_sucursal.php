<!DOCTYPE html>
<html lang="es">
<?php
include("./php/head.php");
showHead("Agregar Sucursal");
echo '<body>';
include("header.php");
include("./php/validaciones.php");

if (!isset($_SESSION['usuario']) || (isset($_SESSION['admin']) && $_SESSION['admin'] == 0)) {
    echo '<script>';
    echo "window.location.href = 'index.php';";
    echo '</script>';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : "";
    $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : "";
    $imagen = isset($_FILES['ubicacion']) ? $_FILES['ubicacion'] : null;

    $nombre = validarString("Nombre",$nombre,45);
    $telefono = validarTelefono($telefono);
    $direccion = validarString("Direccion",$direccion,45,true);
    validarArchivo($imagen);
    
    if ($nombre != null && $telefono != null && $direccion != null && $imagen) {

    require "./php/database.php";

 // Verificar si el nombre de la sucursal ya existe
 $sql = "SELECT * FROM sucursales WHERE nombre=?";

 $stmt = $conn->prepare($sql);

 $stmt->bind_param("s", $nombre);
 $stmt->execute();
 $resultSet = $stmt->get_result();


 if ($resultSet->num_rows <= 0) {
    $stmt->close();

    $sql = "INSERT INTO sucursales (nombre, telefono, direccion) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nombre, $telefono, $direccion);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $sql = "SELECT id_sucursal FROM sucursales WHERE nombre=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $nombre);
         $stmt->execute();
         $resultSet = $stmt->get_result();
        if ($resultSet) {
            $row = mysqli_fetch_assoc($resultSet);
            $idSucursal = $row['id_sucursal'];

     // Mover el archivo a la carpeta de destino
      $nombreArchivo = "sucursal" . $idSucursal . ".jpg";  
      $rutaDestino = './img/sucursales/' . $nombreArchivo;
      if ($imagen && is_array($imagen) && isset($imagen['tmp_name'])) {
          if (move_uploaded_file($imagen['tmp_name'], $rutaDestino)) {
              echo "<script>Swal.fire('Éxito', 'Sucursal dada de alta satisfactoriamente!', 'success');</script>";
          } else {
              echo "<script>Swal.fire('Error', 'Error al mover el archivo a la carpeta de destino.', 'error');</script>";
          }
      } else {
          echo "<script>Swal.fire('Error', 'No se ha seleccionado un archivo válido.', 'error');</script>";
      }
        } else {
            echo "<script>Swal.fire('Error', 'Error al obtener el ID de la sucursal', 'error');</script>";
        }
        
    } else {
        echo "<script>Swal.fire('Error', 'Ha ocurrido un error inesperado al intentar agregar la sucursal. Detalles: " . $stmt->error . "', 'error');</script>";
    }
 } else {
    echo "<script>Swal.fire('Error', 'La sucursal $nombre ya existe.', 'error');</script>";
 }
    $stmt->close();
}
}
?>

<div class="container">
    <h1>Agregar Sucursal</h1>
    <form method="post" enctype="multipart/form-data" onsubmit="return validarFormulario();">

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="text" class="form-control" id="telefono" name="telefono" required>
        </div>

        <div class="form-group">
            <label for="direccion">Dirección:</label>
            <input type="text" class="form-control" id="direccion" name="direccion" required>
        </div>

        <div class="form-group">
            <label for="ubicacion">Ubicación de la Sucursal:</label>
            <input type="file" class="form-control" id="ubicacion" name="ubicacion" accept=".jpg" required>
        </div>

        
        <button type="submit" class="btn btn-primary">Agregar Sucursal</button>
    </form>
</div>

</body>
<?php
include("./php/footer.php");
?>
</html>


<script>
    function validarFormulario() {
        const nombre = document.getElementById("nombre").value;
        const telefono = document.getElementById("telefono").value;
        const direccion = document.getElementById("direccion").value;
        const ubicacion = document.getElementById("ubicacion");

        if (nombre.trim() === "") {
            Swal.fire('Error', 'Por favor, ingrese el nombre de la sucursal.', 'error');
            return false;
        }

        if (telefono.trim() === "") {
            Swal.fire('Error', 'Por favor, ingrese el teléfono de la sucursal.', 'error');
            return false;
        }

        if (direccion.trim() === "") {
            Swal.fire('Error', 'Por favor, ingrese la dirección de la sucursal.', 'error');
            return false;
        }
        return true;
    }


    document.getElementById('ubicacion').addEventListener('change', function() {
    var tamañoMaximo = 50000000;
    var archivo = this.files[0];
    const tiposPermitidos = ['image/jpeg']; 

    if (!tiposPermitidos.includes(archivo.type)) {
        Swal.fire('Error', 'Tipo de archivo no permitido. Solo se permite JPEG/JPG', 'error');
        this.value = '';
        return;
    }


    if (archivo.size > tamañoMaximo) {
        Swal.fire('Error', 'El archivo es demasiado grande. El tamaño máximo permitido es de 50MB.', 'error');
        this.value = '';
        return;
    }
 

}, false);

</script>
