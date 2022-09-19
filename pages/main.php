<?php
include('../protection.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5d464020e9.js" crossorigin="anonymous"></script>
    <title>Agenda Eletrônica</title> 
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
        <div class="container"> 
            <div class="form">
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="button" onclick="location.href='newTask.php'">
                        <a href="newTask.php">
                            <i class="fa-solid fa-plus"></i> 
                            Nova atividade
                        </a>
                    </button>
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="button" onclick="location.href='seetasks.php'">
                        <a href="seetasks.php">
                            <i class="fa-solid fa-eye"></i>
                            Visualizar atividades
                        </a>
                    </button>
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="button" onclick="location.href='../logout.php'">
                        <a href="../logout.php">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            Sair
                        </a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>