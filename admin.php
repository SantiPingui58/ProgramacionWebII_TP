<!DOCTYPE html>
<html lang="es">

<?php
include("./php/head.php");
showHead("Admin");
echo '<body>';
include("header.php");


//Verificar que haya una sesion iniciada y que la sesión sea en modo admin, sino redireccionarlo al index.php
if (!isset($_SESSION['usuario']) || (isset($_SESSION['admin']) && $_SESSION['admin']==0)) {
  echo '<script>';
  echo "window.location.href = 'index.php';";
  echo '</script>';
}
?>

  <main>
    <div class="container">
      <h1>Panel de Administrador</h1>
      <div class="jumbotron">
	        <h2>Bienvenido al panel de Administrador de Bidcom</h2>
        <p>Desde acá podes añadir, modificar y eliminar los distintos valores de la tienda de pelucas.</p>
      </div>
    </div>
  </main>
  
  <?php
include("./php/footer.php");
?>

 
</body>
</html>
