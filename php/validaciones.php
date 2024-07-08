<?php

include("database.php");


function validarUsuario($usuario) {
    //Eliminar espacios en blanco al inicio y al final
    $usuario = trim($usuario);

    //Validar longitud
    if (strlen($usuario) < 3 || strlen($usuario) > 16) {
        echo '<script>Swal.fire("Error", "El usuario debe tener entre 3 y 16 caracteres.", "error");</script>';
        return null;
    }

    //Validar caracteres permitidos
    if (!preg_match("/^[a-zA-Z0-9_]+$/", $usuario)) {
        echo '<script>Swal.fire("Error", "El usuario solo puede contener letras, números y el símbolo _.", "error");</script>';
        return null;
    }

    $usuario = stripslashes($usuario);
    $usuario = htmlspecialchars($usuario, ENT_QUOTES, 'UTF-8');

    if (!ctype_alnum($usuario)) {
        echo '<script>Swal.fire("Error", "El usuario contiene caracteres no permitidos.", "error");</script>';
        return null;
    }

    return $usuario;
}

function validarEmail($email) {
    $email = trim($email);

    //validar el formato del mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<script>Swal.fire("Error", "El correo electrónico no es válido.", "error");</script>';
        return null; // No es un formato de correo electrónico válido.
    }
    $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
    if (!preg_match("/^[a-zA-Z0-9.@_-]+$/", $email)) { echo '<script>Swal.fire("Error", "El correo electrónico contiene caracteres no permitidos.", "error");</script>';
        return null;
    }

    //Validación del dominio del mail
    $dominio = explode('@', $email)[1];
    if (!checkdnsrr($dominio, 'MX')) {
        echo '<script>Swal.fire("Error", "El dominio del correo electrónico no es válido o no existe.", "error");</script>';
        return null;
    }

    return $email;
}

function validarPassword($contrasena) {
    $contrasena = trim($contrasena);

    // Validar longitud
    if (strlen($contrasena) < 8 || strlen($contrasena) > 32) {
        echo '<script>Swal.fire("Error", "La contraseña debe tener entre 8 y 32 caracteres.", "error");</script>';
        return null;
    }
    // Verificar que tenga mayus, numero y caracter especial
    if (!preg_match('/[A-Z]/', $contrasena) || !preg_match('/[0-9]/', $contrasena) || !preg_match('/[^A-Za-z0-9]/', $contrasena)) {
        echo '<script>Swal.fire("Error", "La contraseña debe contener al menos una letra mayúscula, un número y un carácter especial.", "error");</script>';
    }

    //Verificar que no contenga numeros secuenciales o años
    if (preg_match('/(123|234|345|456|567|678|789|987|876|765|654|543|432|321)|20[0-9][0-9]/', $contrasena)) {
        echo '<script>Swal.fire("Error", "La contraseña no puede contener secuencias numéricas ni años.", "error");</script>';
        return null;
    }

    $contrasena = htmlspecialchars($contrasena, ENT_QUOTES, 'UTF-8');
    return $contrasena;
}


function validarTelefono($telefono) {
    // Comprueba si el nro de telefono tiene el formato 1234-1234
    if (!preg_match('/^\d{4}-\d{4}$/', $telefono)) {
        echo '<script>Swal.fire("Error", "El número de teléfono debe tener el formato 1234-1234.", "error");</script>';
        return false;
    }

    return $telefono;
}

function validarString($nombreCampo, $string, $longitud_maxima) {
    $string = trim($string);

    // Validar si el campo está vacío
    if (empty($string)) {
        echo '<script>Swal.fire("Error", "El campo '.$nombreCampo.' no puede estar vacío.", "error");</script>';
        return null;
    }

    // Validar longitud máxima
    if (strlen($string) > $longitud_maxima) {
        echo '<script>Swal.fire("Error", "El campo '.$nombreCampo.' no puede exceder los ' . $longitud_maxima . ' caracteres.", "error");</script>';
        return null;
    }

    // Validar caracteres permitidos (solo letras, números y espacios)
    if (!preg_match('/^[a-zA-Z0-9\s]+$/', $string)) {
        echo '<script>Swal.fire("Error", "El campo '.$nombreCampo.' contiene caracteres no permitidos.", "error");</script>';
        return null;
    }

    return $string;
}



function validarArchivo($archivo) {
    if ($archivo['error'] != UPLOAD_ERR_OK) {
        echo '<script>Swal.fire("Error", "Hubo un error al cargar el archivo.", "error");</script>';
        return false;
    }

    $tipo_permitido = ['image/jpeg'];
    if (!in_array($archivo['type'], $tipo_permitido)) {
        echo '<script>Swal.fire("Error", "Tipo de archivo no permitido f43fg453gt54. Solo se permiten JEPG/JPG.", "error");</script>';
        return false;
    }

    //Validar el tamaño del archivo
    $tamaño_maximo = 50000000; 
    if ($archivo['size'] > $tamaño_maximo) {
        echo '<script>Swal.fire("Error", "El archivo es demasiado grande. El tamaño máximo permitido es de 50MB.", "error");</script>';
        return false;
    }

    return true;
}



?>
