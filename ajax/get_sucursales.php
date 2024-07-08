<?php


include("../php/database.php"); 
$sql = "SELECT * FROM sucursales";
$result = mysqli_query($conn, $sql);

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

header('Content-Type: application/json');
echo json_encode(array('data' => $data));

$conn->close();
?>
