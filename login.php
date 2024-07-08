<!DOCTYPE html>
<html lang="es">

<?php 
  include("./php/head.php");
  include("header.php");
  include ("./php/validaciones.php");
  showHead("Login");

  if (isset($_SESSION['usuario'])) {
    echo '<script>';
    echo "window.location.href = 'index.php';";
    echo '</script>';
  }

?>

<body class="login-body">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="login-form">
                <h2>Iniciar Sesión</h2>
                <form action="login.php" method="post" onsubmit="return validarFormulario();">
                    <div class="form-group">
                        <label for="usuario">Usuario</label>
                        <input type="text" name="usuario" id="usuario" class="form-control" maxlength="30" placeholder="Usuario" required>
                    </div>
                    <div class="form-group">
                        <label for="pass">Contraseña</label>
                        <input type="password" name="pass" id="pass" class="form-control" minlength="5" maxlength="16" placeholder="Contraseña" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                </form>
                
            
                <p class="mt-3 notregistered">Aun no te has registrado? <a href="register.php">Registrate aqui</a>.</p>
            </div>
        </div>
    </div>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //Verificar que las variables esten seteadas
    $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";
    $pass = isset($_POST['pass']) ? $_POST['pass'] : "";
   
    //Validaciones
    $usuario = validarUsuario($usuario);

    if ($nombre == null || $pass == null) {
        return;
    }

    require "./php/database.php";


        //Verificar si existe ese usuario
    $sql = "SELECT * FROM usuarios WHERE username='$usuario';";
    $resultSet = mysqli_query($conn, $sql);
    if (mysqli_num_rows($resultSet) > 0) {
        $registro = mysqli_fetch_assoc($resultSet);

        //Se compara la contraseña ingresada con la contraseña hasheada en la base de datos
        if (password_verify($pass, $registro['password'])) {


            //Se guarda en la sesión la información del usuario
            $_SESSION['id'] = $registro['id_usuario'];
            $_SESSION['usuario'] = $registro['username'];
            $_SESSION['admin'] = $registro['admin'];


            //Si el usuario es admin, es enviado a la pagina de admins, sino al index
            switch ($registro['admin']) {
                case 1:
                    header("location: admin.php");
                    return;
                case 0:
                    header("location: index.php");
                    return;
            }
        } else {
            echo '<script>';
            echo "Swal.fire('Error', 'La Contraseña ingresada es incorrecta.', 'error');";
            echo '</script>';
        }
    } else {
        echo '<script>';
        echo "Swal.fire('Error', 'El usuario $usuario no existe', 'error');";
        echo '</script>';
    }

  
}

include("./php/footer.php");
?>

<script>
    function validarFormulario() {
        const nombre = document.getElementById("usuario").value;
        const pass = document.getElementById("pass").value;

        if (nombre.trim() === "") {
            Swal.fire('Error', 'Por favor, ingrese su nombre.', 'error');
            return false;
        }

        if (pass.trim() === "") {
            Swal.fire('Error', 'Por favor, ingrese la contraseña.', 'error');
            return false;
        }
        return true;
    }
</script>

</body>

</html>
