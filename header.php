
<header>

<?php

include("paginas.php");
// Obtener la página actual
$claseActual = basename($_SERVER['PHP_SELF']);
$claseAdmin = in_array($claseActual, $paginas_admin) ? "headerAdmin" : "headerDefault";
echo "<nav class='navbar navbar-expand-lg navbar-light $claseAdmin'>";
?>
        <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt="Logo" height="40"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <?php
            $arrayPaginas = in_array($claseActual,$paginas_admin) ? $paginas_admin : $paginas;
            foreach ($arrayPaginas as $nombre => $enlace) {
                if ($nombre == "") continue;
                $claseActiva =  $claseActual == $enlace ? 'active' : '';
                echo "<li class='nav-item'>";
                echo "<a class='nav-link $claseActiva' href='$enlace'>$nombre</a>";
                echo "</li>";
            }
        
            
                ?>
            </ul>

            <ul class="navbar-nav ml-auto">
                <?php
                // Verificar si hay una sesión iniciada
                session_start();
                if (isset($_SESSION['usuario'])) {
                    // Si hay una sesión, mostrar el nombre del usuario y la opción para cerrar sesión
                    $usuario = $_SESSION['usuario'];
                    echo "<li class='nav-item dropdown'>";
                    echo "<a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
                    echo $usuario;
                    echo "</a>";
                    echo "<div class='dropdown-menu dropdown-menu-right' aria-labelledby='navbarDropdown'>";
                    if ($_SESSION['admin']==1) {
                      echo "<a class='dropdown-item' href='admin.php'>Panel de Administrador</a>";
                    } 
                    echo "<a class='dropdown-item' href='favoritos.php'>Mis Favoritos</a>";
                    echo "<a class='dropdown-item' href='logout.php'>Cerrar Sesión</a>";
                    echo "</div>";
                    echo "</li>";
                } else {
                    // Si no hay sesión, mostrar el botón de ingresar
                    echo "<li class='nav-item dropdown'>";
                    echo "<a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
                    echo "Ingresar";
                    echo "</a>";
                    echo "<div class='dropdown-menu dropdown-menu-right' aria-labelledby='navbarDropdown'>";
                    echo "<a class='dropdown-item' href='login.php'>Iniciar Sesión</a>";
                    echo "<a class='dropdown-item' href='register.php'>Registrarse</a>";
                    echo "</div>";
                    echo "</li>";
                }
                ?>
            </ul>
        </div>
    </nav>
</header>

