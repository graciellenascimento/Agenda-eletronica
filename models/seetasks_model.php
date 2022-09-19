<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="cadastro">
        <table class="table">
            <tr>
                <th scope="col">NOME</th>
                <th scope="col">DESCRIÇÃO</th>
                <th scope="col">INÍCIO</th>
                <th scope="col">TÉRMINO</th>
                <th scope="col">STATUS</th>
                <th scope="col"></th>
            </tr>
            <div class="tabela">
                <?php
                include_once '../config.php';
                if(!isset($_SESSION)) {
                    session_start();
                }
                
                $userid = $_SESSION['id'];
                
                $sql = "SELECT * FROM `tasks` WHERE `userid` = $userid";
                $data = mysqli_query($conn, $sql);

                if($data){
                while($row = mysqli_fetch_assoc($data)){
                    $id = $row['id'];
                    $name = $row["name"];
                    $description = $row["description"];
                    $start_date = $row["start_date"];
                    $end_date = $row["end_date"];
                    $status = $row["status"];
                    echo '
                            <thead>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>'.$name.'</td>
                                    <td>'.$description.'</td>
                                    <td>'.$start_date.'</td>
                                    <td>'.$end_date.'</td>
                                    <td>'.$status.'</td>
                                    <td style="
                                    float: inline-end;
                                    display: flex;
                                    justify-content: space-around;
                                    flex-wrap: wrap;
                                    flex-direction: row;
                                    align-content: stretch;">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-primary">
                                                <a class="changebuttons" href="../pages/updatetask.php?update='.$id.'">Editar</a>
                                            </button>
                                            <button type="button" class="btn btn-danger" id="deletar">
                                                <a class="changebuttons" href="../models/delete_model.php?delete='.$id.'">Deletar</a>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                    </div>
                        ';
                    }
                }
            ?>
        </table>
    </div>
</body>
</html>