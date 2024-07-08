<!DOCTYPE html>
<html lang="es">

<?php 
  include_once("./php/head.php");
  include_once("header.php");
  include_once("./php/validaciones.php");
  showHead("Registro");
?>







<body class="login-body">


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  //Verificar si las variables estan
  $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
  $correo = isset($_POST['correo']) ? $_POST['correo'] : "";
  $pass = isset($_POST['pass']) ? $_POST['pass'] : "";
  $confirmPass = isset($_POST['confirmPass']) ? $_POST['confirmPass'] : "";


  //Metodos de validacion
  $nombre = validarUsuario($nombre);
  $correo = validarEmail($correo);
  $pass = validarPassword($pass);
  $confirmPass = validarPassword($confirmPass);
  
  //Si alguna variable es incorrecta, se recarga la página
  if ($nombre == null || $correo == null || $pass == null || $confirmPass == null) {
      echo '<script>';
      echo "window.location.href = 'register.php';";
      echo '</script>';
      exit();
      return;
  }

  //Verificar que las contraseñas sean iguales
  if ($pass != $confirmPass) {
      echo "<script>Swal.fire('Error', 'Las contraseñas ingresadas no coinciden', 'error');</script>";
      echo '<script>';
      echo "window.location.href = 'register.php';";
      echo '</script>';
      exit();
      return;
  }

  require "./php/database.php";

  // Verificar si el nombre de usuario ya existe
  $sql = "SELECT * FROM usuarios WHERE username=?";

  $stmt = $conn->prepare($sql);

  $stmt->bind_param("s", $nombre);
  $stmt->execute();
  $resultSet = $stmt->get_result();

  if ($resultSet->num_rows > 0) {
      echo "<script>Swal.fire('Error', 'El usuario $nombre ya existe.', 'error');</script>";
      $stmt->close();
      echo '<script>';
      echo "window.location.href = 'register.php';";
      echo '</script>';
      exit();
      return;
  }

  $stmt->close();

  // Verificar si el correo electrónico ya existe
  $sql = "SELECT * FROM usuarios WHERE mail=?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $correo);
  $stmt->execute();
  $resultSet = $stmt->get_result();

  if ($resultSet->num_rows > 0) {
      echo "<script>Swal.fire('Error', 'El correo $correo ya se encuentra en uso.', 'error');</script>";
      $stmt->close();
      exit();
      return;
  }

  $stmt->close();

  //Hashear la contraseña
  $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

  // Insertar el nuevo usuario
  $sql = "INSERT INTO usuarios (username, mail, password, admin) VALUES (?, ?, ?, 0)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sss", $nombre, $correo, $hashedPassword);
  $stmt->execute();

  if ($stmt->affected_rows > 0) {
    //Obtener el id del usuario que fue creado
      $sql = "SELECT id_usuario FROM usuarios WHERE username='$nombre';";
      $resultSet = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($resultSet);

      //Almacenar en la sesión los datos del usuario
      $_SESSION['id'] = $row['id_usuario'];
      $_SESSION['usuario'] = $nombre;
      $_SESSION['admin'] = 0;

      //Mostrar mensaje de registro completado y luego redireccionar a index.php
      echo "<script>
      Swal.fire({
          title: 'Éxito',
          text: 'Te has registrado satisfactoriamente!',
          icon: 'success',
          showConfirmButton: false,  
          timer: 2000  
      }).then(function() {
          window.location.href = 'index.php';
      });
  </script>";
  
      exit();
  } 

  $stmt->close();
}
?>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="login-form">
          <h2>Registro</h2>
          <form method="post" onsubmit="return validarFormulario();">
            <div class="form-group">
              <label for="nombre">Nombre de Usuario</label>
              <input type="text" name="nombre" id="nombre" class="form-control" maxlength="30" placeholder="Nombre de Usuario" required>
            </div>
            <div class="form-group">
              <label for="correo">Correo Electrónico</label>
              <input type="email" name="correo" id="correo" class="form-control" placeholder="Correo Electrónico" required>
            </div>
            <div class="form-group">
              <label for="pass">Contraseña</label>
              <input type="password" name="pass" id="pass" class="form-control" minlength="5" maxlength="16" placeholder="Contraseña" required>
            </div>
            <div class="form-group">
              <label for="confirmPass">Confirmar Contraseña</label>
              <input type="password" name="confirmPass" id="confirmPass" class="form-control" minlength="5" maxlength="16" placeholder="Confirmar Contraseña" required>
            </div>
            <div class="form-group form-check mb-3">
              <input type="checkbox" class="form-check-input" id="terminos" required>
              <label class="form-check-label" for="terminos">Acepto los TyC</label>
            </div>
            <button type="submit" class="btn btn-primary">Registrarse</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php include("./php/footer.php"); ?>

  <script>
    function validarFormulario() {
        const nombre = document.getElementById("nombre").value;
        const correo = document.getElementById("correo").value;
        const pass = document.getElementById("pass").value;
        const confirmPass = document.getElementById("confirmPass").value;
        const terminos = document.getElementById("terminos").checked;

        if (nombre.trim() === "") {
            Swal.fire('Error', 'Por favor, ingrese su nombre de usuario.', 'error');
            return false;
        }

        if (correo.trim() === "") {
            Swal.fire('Error', 'Por favor, ingrese su correo electrónico.', 'error');
            return false;
        }

        if (pass.trim() === "") {
            Swal.fire('Error', 'Por favor, ingrese una contraseña.', 'error');
            return false;
        }

        if (pass !== confirmPass) {
            Swal.fire('Error', 'Las contraseñas no coinciden.', 'error');
            return false;
        }

        if (!terminos) {
            Swal.fire('Error', 'Debe aceptar los términos y condiciones.', 'error');
            return false;
        }

        return true;
    }
  </script>

</body>

</html>
