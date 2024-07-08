<?php
include("../php/database.php");

if (isset($_GET['tabla'])) {
    $tabla = $_GET['tabla'];

    $sql = "SELECT * FROM $tabla";
    $result = mysqli_query($conn, $sql);

    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode(array('data' => $data));

    $conn->close();
} else {
    http_response_code(400);
    echo json_encode(array('error' => 'Bad request'));
}
?>
