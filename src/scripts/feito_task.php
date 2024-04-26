<?php
require_once('db_coneccao.php');
$conn = coneccao_db();

function feitoTask($conn){
    $id = $_POST['task_feita'];
    $sql = "UPDATE tasks SET feito = 1 WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: ../content/tasks.php");
        exit();
    }

}