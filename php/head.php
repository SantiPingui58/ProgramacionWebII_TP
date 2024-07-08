<?php
function showHead($nombrePagina) {
    echo "<head>";
    echo "<meta charset='UTF-8'>";
    echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    echo "<title>Bidcom - $nombrePagina</title>";
    echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>";
    echo "<link rel='stylesheet' href='css/styles.css'>";
    echo "<link rel='icon' type='image/x-icon' href='img/favicon.ico?v=2'>";
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
    echo "<script type='text/javascript' src='https://code.jquery.com/jquery-3.6.4.min.js'></script>";
    echo "<script type='text/javascript' src='https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js'></script>";
    echo "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css'>"; 
    echo "</head>";
}

?>
