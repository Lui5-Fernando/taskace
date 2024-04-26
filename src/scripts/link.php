<?php
require_once 'db_coneccao.php';
$conn = coneccao_db();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['enviar-dados-login'])){
       
        require_once("login.php");
        coneccaoLogin($conn);

    }else if (isset($_POST['enviar-dados-criar-conta'])) {
        
        require_once("criar_conta.php");
        criarConta($conn);
        
    }else if (isset($_POST['criar-task'])) {
        
        require_once("criar_tasks.php");
        criarTasks($conn);

    }else if(isset($_POST['task_apagar'])) {

        require_once('apagar_tasks.php');
        apagarTasks($conn);
    
    }else if(isset($_POST['task_feita'])) {

        require_once('feito_task.php');
        feitoTask($conn);
        
    }else{
        
        echo'Falha ao eviar dados.';
        
    }
}
