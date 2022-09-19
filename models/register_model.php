<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="cadastro">
        <?php
            include_once '../config.php';

            $nome = $_POST["username"];
            $descricao = $_POST["password"];

            $sql = "INSERT INTO register (username, password) VALUES ('$nome','$descricao')";

            if(mysqli_query($conn, $sql)) {
                header("Location: ../index.php");
                exit();
            } else {
                echo "Não foi possível cadastrar.";
            }
        ?>
    </div>
</body>
</html>