<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["productId"])) {
    $productId = $_POST["productId"];
    $userId = $_SESSION["id"];

    include("database.php");
    $sql = "INSERT INTO favoritos (id_usuario, id_producto) VALUES (?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $userId, $productId);

    if ($stmt->execute() === TRUE) {
        $response = array("success" => true);
    } else {
        $response = array("success" => false);
    }

    $stmt->close();
    $conn->close();

    header("Content-Type: application/json");
    echo json_encode($response);
    exit();
} else {
    header("HTTP/1.1 400 Bad Request");
    exit();
}
?>
