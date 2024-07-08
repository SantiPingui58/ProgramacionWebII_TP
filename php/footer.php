

<footer class="bg-dark text-white text-center py-4">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul class="list-inline">
          <?php

          include("paginas.php");
            foreach ($paginas as $nombre => $enlace) {
              echo "<li class='list-inline-item'><a href='$enlace'>$nombre</a></li>";
            }
          ?>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h5>Seguinos en nuestras redes sociales</h5>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="https://facebook.com/Bidcom" class="fab fa-facebook fa-3x"></a></li>
          <li class="list-inline-item"><a href="https://twitter.com/Bidcom" target="_blank" class="fab fa-twitter fa-3x"></a></li>
          <li class="list-inline-item"><a href="https://youtube.com/Bidcom" target="_blank" class="fab fa-youtube fa-3x"></a></li>
          <li class="list-inline-item"><a href="https://instagram.com/@Bidcom" target="_blank" class="fab fa-instagram fa-3x"></a></li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <p>&copy; 2023 Bidcom. Todos los derechos reservados.</p>
      </div>
    </div>
  </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

