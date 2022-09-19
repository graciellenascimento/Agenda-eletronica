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
        <?php
            include '../config.php';

            if(isset($_GET['delete'])){
                $id = $_GET['delete'];
            }

            $sql = "DELETE FROM tasks where id = $id";

            $dados = mysqli_query($conn, $sql);

            if($dados){
                echo "<h3>Deletado com sucesso!</h3>
                <div class='container'>
                    <div class='d-grid gap-2'>
                        <button class='btn btn-primary' type='button' onclick='location.href='../pages/seetasks.php''>
                            <a href='../pages/seetasks.php'>
                                <i class='fa-solid fa-right-from-bracket'></i>
                                Retornar
                            </a>
                        </button>
                    </div>
                </div>";    
            } else {
                echo "erro";
            }
        ?>
    </div>
</body>
</html>

