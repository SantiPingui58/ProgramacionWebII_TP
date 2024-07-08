<?php
include("../php/database.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_sucursal'])) {
    $id_sucursal = $_POST['id_sucursal'];

    $stmt = $conn->prepare("DELETE FROM sucursales WHERE id_sucursal = ?");
    $stmt->bind_param("i", $id_sucursal);

    if ($stmt->execute()) {

        $imagen ='../img/sucursales/sucursal'.$id_sucursal;
        if (file_exist($imagen)) {
            unlink($imagen);
        }

        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al eliminar la sucursal']);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Solicitud no valida']);
}
?>
