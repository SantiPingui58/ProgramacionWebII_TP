<!DOCTYPE html>
<html lang="es">

<?php
include("./php/head.php");
showHead("Nosotros");
echo '<body>';
include("header.php");
?>

  <main>
    <div class="container">
      <h1>Nosotros</h1>
      <p>Somos una tienda especializada en la venta de pelucas de alta calidad.</p>
      <p>En Bidcom, nos apasiona ayudar a las personas a encontrar la peluca perfecta que se adapte a su estilo y necesidades. Nuestro equipo de expertos en pelucas está 
        comprometido en brindarte la mejor experiencia de compra, ofreciendo una amplia selección de estilos y colores para que encuentres la peluca ideal.</p>
      <p><strong>Historia de la Tienda</strong></p>
      <p>La Tienda de Pelucas fue fundada en 1986 en el barrio de La Paternal en Buenos Aires. Desde entonces, nos hemos dedicado a proporcionar pelucas de alta calidad y servicio 
        excepcional a nuestros clientes.</p>
      <p>Con el paso de los años, hemos ampliado nuestra gama de productos y hemos establecido una sólida reputación en la industria de las pelucas. Nuestro compromiso con la calidad
         y la satisfacción del cliente nos ha convertido en uno de los principales referentes en el mercado de las pelucas en Argentina.</p>
      <p>Estamos orgullosos de servir a nuestros clientes y de brindarles soluciones capilares que les permitan expresarse y sentirse seguros de sí mismos. Nos esforzamos por ofrecer
         una experiencia de compra única, tanto en nuestras tiendas físicas como en nuestra tienda en línea.</p>
    </div>

    <div class="container-fluid gallery">
      <div class="row">
        <div class="col-md-3">
          <img src="img/galeria1.jpg" alt="Galería 1" class="img-fluid float-left">
        </div>
        <div class="col-md-3">
          <img src="img/galeria2.jpg" alt="Galería 2" class="img-fluid float-left">
        </div>
        <div class="col-md-3">
          <img src="img/galeria3.jpg" alt="Galería 3" class="img-fluid float-left">
        </div>
        <div class="col-md-3">
          <img src="img/galeria4.png" alt="Galería 4" class="img-fluid float-left">
        </div>
      </div>
    </div>
  </main>


  <a href="https://wa.me/1234567890" class="whatsapp-float fa-3x" target="_blank">
  <i class="fab fa-whatsapp"></i>
</a>


  <?php
    include("./php/footer.php");
  ?>
</body>
</html>
