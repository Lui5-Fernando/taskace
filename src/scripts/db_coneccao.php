<?php
function coneccao_db() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dbtaskace";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Falha ao conectar no banco de dados". $conn->connect_error);
    }

    return $conn;
}
