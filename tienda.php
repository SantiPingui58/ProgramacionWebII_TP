<!DOCTYPE html>
<html lang="es">

<?php
include("./php/head.php");
showHead("Tienda");
echo '<body>';
include("header.php");
?>

<body>

<a href="https://wa.me/1234567890" class="whatsapp-float fa-3x" target="_blank">
  <i class="fab fa-whatsapp"></i>
</a>


  <main>

    <div class="container">
      <h1>Tienda</h1>
      <div class="row">

        <?php
        include("./php/database.php");

        //Seleccionar los productos desde la base de datos
        $result = $conn->query("SELECT * FROM productos");

        if ($result->num_rows > 0) {
            //Iterar los productos
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col-md-6 col-lg-4 tienda-card">';
                echo '<div class="card">';
                echo '<img src="img/productos/producto' . $row["id_producto"] . '.jpg" class="card-img-top" alt="Producto ' . $row["id_producto"] . '">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row["nombre"] . '</h5>';

                //Si el producto tiene un stock mayor a 0, muestra su precio y su descuento. Sino, no muestra nada
                if ($row["stock"]>0) {
                  $precioDescuento = ($row["precio"] - ($row["precio"] * $row["descuento"] / 100));
                  $precioDescuentoString = '$'.$precioDescuento;
                } else {
                  $precioDescuentoString = ' ';
                }

                  echo '<p class="card-text-price"><strong>'.$precioDescuentoString.'</strong></p>';
                  echo '<p class="card-text-disscount"><strong>($' . $row["precio"] . ')</strong> <strong>' . $row["descuento"] . '% OFF</strong></p>';
                 echo '<p class="card-text">' . $row["descripcion"] . '</p>';

                   //Si el producto tiene un stock mayor a 0,Coloca un botón para añadir al carrito. Caso contrario un botón que no se puede apretar que dice Sin Stock
                if ($row["stock"]>0) {
                  echo '<a href="#" class="btn btn-primary" onclick="addToCart()">Añadir al carrito <i class="fas fa-shopping-cart" aria-hidden="true"></i></a>';
                  echo '<a href="#" class="btn btn-primary float-right"><i class="fas fa-heart" aria-hidden="true"></i></a>';
                } else {
                  echo '<a href="#" class="btn btn-primary btn-sin-stock" style="pointer-events: none;">Sin Stock</a>';
                  echo '<a href="#" class="btn btn-primary float-right btn-fav-sin-stock"><i class="fas fa-heart" aria-hidden="true"></i></a>';
                }
              
           
                echo '</div></div></div>';
            }
        } else {
            echo "No hay productos aun!";
        }

        $conn->close();
        ?>
      </div>
    </div>
  </main>

        <?php
           include("./php/footer.php");
        ?>
</body>
</html>


<script>

    //Funcion para el boton de añadir al carrito
    function addToCart() {
        
        Swal.fire({
            icon: 'success',
            title: 'Has añadido el producto al carrito!',
            showConfirmButton: false,
            timer: 1500
        });
    }

    //Función para verificar fav a un producto
    function likeProduct(productId) {
    $.ajax({
        type: "POST",
        //Con Ajax primero verifica si el producto ya se le dio un corazón
        url: "./ajax/get_fav.php", 
        data: { productId: productId },
        success: function(response) {
            //Se valida la respuesta de get_fav.php, si no le dio fav. se añade a favoritos
            if (response.alreadyLiked) {
                Swal.fire({
                    icon: 'info',
                    title: 'Ya le diste like a este producto.',
                    showConfirmButton: false,
                    timer: 1500
                });
            } else {
                addToFavorites(productId);
            }
        },
        error: function() {
            Swal.fire({
                icon: 'error',
                title: 'Error de conexión!',
                showConfirmButton: false,
                timer: 1500
            });
        }
    });
}

//Funcion para dar fav
function addToFavorites(productId) {
    $.ajax({
        type: "POST",
        url: "./ajax/fav_producto.php",
        data: { productId: productId },
        success: function(response) {
            if (response.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Producto marcado como favorito!',
                    showConfirmButton: false,
                    timer: 1500
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error al marcar el producto como favorito!',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        },
        error: function() {
            Swal.fire({
                icon: 'error',
                title: 'Error de conexión!',
                showConfirmButton: false,
                timer: 1500
            });
        }
    });
}

</script>