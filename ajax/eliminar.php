<?php
include("../php/database.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['tipo'])) {
    $id = $_POST['id'];
    $tipo = $_POST['tipo'];
    
    switch ($tipo) {
        case 'sucursal':
            $tabla = 'sucursales';
            $columna = 'id_sucursal';
            break;
        case 'producto':
            $tabla = 'productos';
            $columna = 'id_producto';
            break;
        case 'usuario':
            $tabla = 'usuarios';
            $columna = 'id_usuario';
            break;
        default:
            echo json_encode(['success' => false, 'message' => 'Tipo de entidad no valido']);
            exit;
    }

    $stmt = $conn->prepare("DELETE FROM $tabla WHERE $columna = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al eliminar el registro']);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Solicitud no válida']);
}
?>
