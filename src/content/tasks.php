<?php

    session_start();

    if(!isset($_SESSION['usuario_logado'])){
        header("Location: login.html");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/tasks.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>TaskAce</title>
    <style>
        #task_apagar:hover{
            background-color: red;
        }

        #task_feita:hover{
            background-color: green ;
        }
    </style>
</head>
<body>
    <main>

    <nav class="navbar bg-warning shadow-sm mb-1 ">
            <div class="container-fluid">
              <h1 class="navbar-brand">TaskAce</h1>
              <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                  <h5 class="offcanvas-title" id="offcanvasNavbarLabel">TaskAce</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                  <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                      <a class="nav-link" aria-current="page" href="login.html">Login</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="criar-conta.html">Cadastr-se</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </nav>

        <section class="d-flex h-20 justify-content-center ">

            <div>
                <h1>Tasks</h1>
            </div>

        </section>
        <section class="overflow-auto">
            
            <div class="d-flex justify-content-center flex-row">

                <form action="..\scripts\link.php" method="POST" class="d-flex border border-secondary mb-3 w-50 justify-content-between ">
                    <input type="text" id="criar-task" name="criar-task" class="border border-0 w-100 " maxlength="255" placeholder="Adicionar tarefa" required>
                    <button type="submit" class="border border-0 btn btn-warning rounded-0">Add</button>
                </form>

            </div>

            <div class="d-flex flex-column">

                <form action="..\scripts\link.php" method="POST" id="form-gerenciar-tasks">
                    <?php
                    require_once("../scripts/db_coneccao.php");
                    $conn = coneccao_db();
    
                    $usuario_id = $_SESSION['id_usuario'];
    
                    $sql = "SELECT * FROM tasks WHERE id_task = $usuario_id";
                    $result = $conn->query($sql);
    
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $task_id = $row['id'];
                            if($row['feito'] == 0){
                                echo '<div id="gerenciar-tasks" class="d-flex border">
                                        <button type="submit" id="task_feita" name="task_feita" value="'.$task_id .'" class="border border-0 rounded"><i class="fa-solid fa-check"></i></button>' . 
                                        "<div class='w-100 m-1'>" . 
                                            $row['task'] . 
                                        "</div>" . 
                                        '<button type="submit" id="task_apagar" name="task_apagar" value="'.$task_id .'" class="border border-0 rounded"><i class="fa-solid fa-trash-can"></i></button>
                                    </div>'; 
                            }else{
                                echo '<div id="gerenciar-tasks" class="d-flex border">
                                        <button type="submit" id="task_feita" name="task_feita" value="'.$task_id .'" class="border border-0 rounded"><i class="fa-solid fa-check"></i></button>' . 
                                        "<div class='w-100'> <s>" . 
                                            $row['task'] . 
                                        "</s> </div>" . 
                                        '<button type="submit" id="task_apagar" name="task_apagar" value="'.$task_id .'" class="border border-0 rounded"><i class="fa-solid fa-trash-can"></i></button>
                                    </div>'; 
                        }   }
                    } 
                    ?>
                </form>

            </div>


        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>