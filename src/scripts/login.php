<?php

require_once 'db_coneccao.php';
$conn = coneccao_db();

require_once 'link.php';
function coneccaoLogin($conn){

    $nome_usuario = $_POST['nome-login'];
    $senha_usuario = $_POST['senha-login'];
    
    
    $sql = "SELECT * FROM infos_login WHERE nome_usuario = '$nome_usuario' AND senha_hash = '$senha_usuario'";
    $result = $conn->query($sql);


    
    if($result->num_rows > 0){
        session_start();

        $_SESSION['usuario_logado'] = $nome_usuario;

        $row = $result->fetch_assoc();
        $_SESSION['id_usuario'] = $row['id_usuario'];

        header("Location: ../content/tasks.php");
        exit();
    }else{
        header("Location: ../content/login.html?erro=user-ou-senha-incorreta");
        exit();
    }        
}
