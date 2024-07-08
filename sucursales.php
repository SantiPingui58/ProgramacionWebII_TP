<!DOCTYPE html>
<html lang="es">

<?php
include("./php/head.php");
showHead("Sucursales");
echo '<body>';
include("header.php");
?>

<body>
<a href="https://wa.me/1234567890" class="whatsapp-float fa-3x" target="_blank">
  <i class="fab fa-whatsapp"></i>
</a>


  <main>
    <div class="container">
      <h1>Sucursales</h1>
      <p>Estas son nuestras sucursales ubicadas en diferentes lugares de Capital Federal.</p>

      <div class="row">

        <?php
        include("./php/database.php");


        //Cargar las sucursales desde la base de datos
        $consulta = "SELECT * FROM sucursales";
        $resultado = mysqli_query($conn, $consulta);

        if (mysqli_num_rows($resultado) > 0) {

          //Iterar por cada sucursal y crear un card de boostrap para ser mostrado con los datos de la sucursal
          while ($fila = mysqli_fetch_assoc($resultado)) {
            $idSucursal = $fila['id_sucursal'];
            $nombreSucursal = $fila['nombre'];
            $telefonoSucursal = $fila['telefono'];
            $direccionSucursal = $fila['direccion'];
        ?>

            <div class="col-md-6 col-lg-4 mb-4 sucursales-card">
              <div class="card">
                <!-- img/sucursales/sucursal1.jpg -->
                <img src="./img/sucursales/sucursal<?php echo $idSucursal; ?>.jpg" class="card-img-top" alt="<?php echo $nombreSucursal; ?>">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $nombreSucursal; ?></h5>
                  <p class="card-text">Dirección: <?php echo $direccionSucursal; ?></p>
                  <p class="card-text">Teléfono: <?php echo $telefonoSucursal; ?></p>
                  <a href="#" class="btn btn-primary">Ver Detalles</a>
                </div>
              </div>
            </div>

        <?php
          }
        } else {
          echo "<p>No hay sucursales disponibles.</p>";
        }
        
        mysqli_close($conn);
        ?>
      </div>
    </div>
  </main>

  <?php
  include("./php/footer.php");
  ?>
</body>

</html>
