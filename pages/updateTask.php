<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/index.css"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5d464020e9.js" crossorigin="anonymous"></script>
    <title>Nova atividade</title> 
</head>
<body>
    <div class="header">
        <nav class="navbar">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Agenda eletrônica</span>
            </div>
        </nav>
    </div>

    <div class="signup">
        <div class="signup-title">
            <h3>Nova atividade</h3>
        </div>
        <div class="container"> 
            <?php 
                include('../config.php');

                $id = $_GET['update'] ?? '';
                $sql = "SELECT * FROM `tasks` WHERE `id` = $id";
            
                $data = mysqli_query($conn, $sql);
            
                $getdata = mysqli_fetch_assoc($data);
            ?>

            <form method='post' action='../models/update_model.php'>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Nome</label>
                    <input type="input" name="name" class="form-control" id="exampleInputPassword1" value="<?php echo $getdata['name']?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Descrição</label>
                    <input type="input" name="description" class="form-control" id="exampleInputPassword1" value="<?php echo $getdata['description']?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Data de início</label>
                    <input type="datetime-local" name="start_date" class="form-control" id="exampleInputPassword1"
                    value="<?php echo $getdata['start_date']?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Data de término</label>
                    <input type="datetime-local" name="end_date" class="form-control" id="exampleInputPassword1"
                    value="<?php echo $getdata['end_date']?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Status</label>
                    <select id="exampleInputPassword1" name="status" class="form-select">
                        <option selected value="Em progresso">Em progresso</option>
                        <option value="Concluída">Concluída</option>
                        <option value="Cancelada">Cancelada</option>
                    </select>
                </div>
                <div class="input">
                    <input type="hidden" name="id" value ="<?php echo $getdata['id']?>">
                </div>
                <div class="d-grid gap-2 d-md-block" style="display: flex!important;">
                    <button class="btn btn-primary" type="submit" value="Register">Salvar alterações</button>
                    <button class="btn btn-primary" type="button" onclick="location.href='seetasks.php'">
                        <a href="seetasks.php">Retornar</a>
                    </button>
                </div>
                
            </form>
        </div>
    </div>
</body>
</html>