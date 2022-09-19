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

            $name = $_POST["name"];
            $description = $_POST["description"];
            $start_date = $_POST["start_date"];
            $end_date = $_POST["end_date"];
            $status = $_POST["status"];

            if(!isset($_SESSION)) {
                session_start();
            }

            $userid = $_SESSION['id'];

            $sql = "INSERT INTO tasks(name, description, start_date, end_date, status, userid)
                    VALUES('$name', '$description', '$start_date', '$end_date', '$status', $userid)";

            if(mysqli_query($conn, $sql)) {
                header("Location: ../pages/seetasks.php");
                exit();
            } else {
                echo "Não foi possível cadastrar.";
            }
        ?>
    </div>
</body>
</html>