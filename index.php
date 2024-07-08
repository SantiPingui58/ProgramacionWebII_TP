<!DOCTYPE html>
<html lang="es">

<?php
include("./php/head.php");
showHead("Home");
echo '<body>';
include("header.php");
?>

<main>
  <div class="container">
    <h1>Bienvenido a Bidcom - Tienda de Pelucas</h1>
    <div class="jumbotron">
      <h2>Explora nuestra amplia selección de pelucas de alta calidad!</h2>
      <p>Ofrecemos una variedad de estilos y colores para que puedas encontrar la peluca ideal que se adapte a tu estilo y personalidad. 
        Nuestras pelucas son fabricadas con materiales de primera calidad y diseñadas para brindarte comodidad y confianza.</p>
      <a href="tienda.php" class="btn btn-primary">Ir a la tienda</a>
    </div>
  </div>
</main>

<div id="carrusel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carrusel" data-slide-to="0" class="active"></li>
    <li data-target="#carrusel" data-slide-to="1"></li>
    <li data-target="#carrusel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/carrusel1.jpg" class="d-block w-100" alt="Slider 1">
    </div>
    <div class="carousel-item">
      <img src="img/carrusel2.png" class="d-block w-100" alt="Slider 2">
    </div>
    <div class="carousel-item">
      <img src="img/carrusel3.jpg" class="d-block w-100" alt="Slider 3">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carrusel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="carousel-control-next" href="#carrusel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Siguiente</span>
  </a>
</div>

<a href="https://wa.me/1234567890" class="whatsapp-float fa-3x" target="_blank">
  <i class="fab fa-whatsapp"></i>
</a>



<?php
include("./php/footer.php");
?>

</body>
</html>
