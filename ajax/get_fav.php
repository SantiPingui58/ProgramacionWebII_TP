<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["productId"])) {
    $productId = $_POST["productId"];
    $userId = $_SESSION["id"];
    include("database.php");

    $checkQuery = "SELECT * FROM favoritos WHERE id_usuario = $userId AND id_producto = $productId";

    $result = $conn->query($checkQuery);

    if ($result && $result->num_rows > 0) {
        $response = array("alreadyLiked" => true);
    } else {
        $response = array("alreadyLiked" => false);
    }

    $conn->close();

    header("Content-Type: application/json");
    echo json_encode($response);
    exit();
} else {
    header("HTTP/1.1 400 Bad Request");
    exit();
}
?>
