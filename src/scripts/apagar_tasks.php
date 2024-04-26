<?php
require_once("db_coneccao.php");
$conn = coneccao_db();

function apagarTasks($conn) {  
    $id = $_POST['task_apagar'];
    $sql = "DELETE FROM tasks WHERE id = $id";

    if ($conn->query($sql) === TRUE){
        header("Location: ../content/tasks.php");
        exit();
    }
}