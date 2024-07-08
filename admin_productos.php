<!DOCTYPE html>
<html lang="es">

<?php
include("./php/head.php");
showHead("Proximamente");
include("header.php");

if (!isset($_SESSION['usuario']) || (isset($_SESSION['admin']) && $_SESSION['admin']==0)) {
    echo '<script>';
    echo "window.location.href = 'index.php';";
    echo '</script>';
  }
?>


<body >

    <div class="text-center">
        <h1 class="display-4">Página en Desarrollo</h1>
        <p class="lead">Próximamente...</p>
        <button class="btn btn-primary" onclick="window.location.href = 'admin.php';">Volver al Inicio</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

<?php
include("./php/footer.php");
?>

</html>