<?php

require_once("db_coneccao.php");
$conn = coneccao_db();

function criarConta($conn){
    
    $nome_usuario = $_POST['nome-login'];
    $senha_usuario = $_POST['senha-login'];

    $sql = "SELECT * FROM infos_login WHERE '$nome_usuario' = nome_usuario";
    $result = $conn->query($sql);
    if(mysqli_num_rows($result) > 0){
        header("Location: ../content/criar-conta.html?erro=nome-usuario-existe");
        exit();
    }

    $sql_insert = "INSERT INTO infos_login (nome_usuario, senha_hash) VALUES('$nome_usuario', '$senha_usuario')";
    $result_insert = $conn->query($sql_insert);
    if ($result_insert === TRUE) {
        header("Location: ../content/login.html");
        exit();
    }else{
        header("Location: ../content/criar-conta.html?erro");
        exit();
    }
}
