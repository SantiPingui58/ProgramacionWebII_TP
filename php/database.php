<?php
$servidorBD="localhost";
$usuarioBD="root";
$passBD="";
$nombreBD="bidcom";

$conn=mysqli_connect($servidorBD,$usuarioBD,$passBD,$nombreBD);

if (!$conn) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}
?>