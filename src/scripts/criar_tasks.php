<?php

require_once("db_coneccao.php");
$conn = coneccao_db();

function criarTasks($conn){

    $new_task = $_POST['criar-task'];

    session_start();
    $task_id = $_SESSION['id_usuario'];

    $sql = "INSERT INTO tasks (task, id_task, feito) VALUES ('$new_task', '$task_id', 0)";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../content/tasks.php");
        exit();
    } else {
        echo "Erro ao adicionar nova tarefa: " . mysqli_error($conn);
    }

}

