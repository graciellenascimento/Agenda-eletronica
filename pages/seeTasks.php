<?php
include('../protection.php');
include_once '../config.php';
if(!isset($_SESSION)) {
    session_start();
}

$userid = $_SESSION['id'];

$sql = "SELECT * FROM `tasks` WHERE `userid` = $userid";
$data = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="https://unpkg.com/jquery@3.4.1/dist/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.2/moment.min.js"></script>
    <link rel="stylesheet" href="../css/seetasks.css"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5d464020e9.js" crossorigin="anonymous"></script>
    <link href='../node_modules/fullcalendar/main.css' rel='stylesheet' />
    <script src='../node_modules/fullcalendar/main.js'></script>
    <script src='../node_modules/fullcalendar/locales/pt-br.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/moment@2.27.0/min/moment.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/moment@5.5.0/main.global.min.js'></script>

    <title>Agenda Eletrônica</title> 
</head>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'pr-br',
        height: 650,
        contentHeight: 'auto',
        
        events: [
            <?php
                while($row = mysqli_fetch_array($data)){
                    ?>
                    {
                    id: '<?php echo $row['id']?>',
                    title: '<?php echo $row['name']?>',
                    description: '<?php echo $row['description']?>',
                    status: '<?php echo $row['status']?>',
                    start: '<?php echo $row['start_date']?>',
                    end: '<?php echo $row['end_date']?>',
                    color: '<?php echo $row['status'] == 'Concluída' ? '#6CBF5A' : ($row['status'] == 'Cancelada' ? '#F78888' : '#70A4D5')  ?>',
                    },<?php

                }
            ?>
        ],

        eventClick: function(event) {
            var converted_start = moment(event.event.start).format('DD/MM/YYYY HH:mm');
            var converted_end = moment(event.event.end).format('DD/MM/YYYY HH:mm');
            console.log(converted_end);

            console.log('modal', event);
            $('#Modal').modal('show');
            $('#modalTitle').html(event.event.title);
            $('#description').html(event.event.extendedProps.description);
            $('#status').html(event.event.extendedProps.status);
            $('#startDate').html(converted_start);
            $('#endDate').html(converted_end);
            $("a.changebuttons").attr("href", "../pages/updatetask.php?update=" + event.event.id);
            $("a.deletebuttons").attr("href", "../models/delete_model.php?delete=" + event.event.id);
            console.log(event.event.start)
        }
    });
    calendar.render();
    });
    </script>
<body>
    <div class="header">
        <nav class="navbar">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Agenda eletrônica</span>
            </div>
        </nav>
    </div>
    
    <div class="signup">
        <div class="d-grid gap-2"  >
            <button class="btn btn-primary" type="button" onclick="location.href='main.php'">
                <a href="main.php">
                    <i class="fa-solid fa-house"></i>
                    Renornar à tela principal
                </a>
            </button>
        </div>
        <div class="container"> 
            <div id='calendar'></div>
            <div id="Modal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content" style="min-width: fit-content;">
                        <div class="modal-header">
                            <h4 id="modalTitle" class="modal-title"></h4>
                        </div>
                        <div id="modalBody" class="modal-body">
                            <div class="container text-center">
                                <div class="row row-cols-2">
                                    <div class="col">Descrição:</div>
                                    <div class="col">
                                        <div id="description"></div>
                                    </div>
                                    <div class="col">Status:</div>
                                    <div class="col">
                                        <div id="status"></div>
                                    </div>
                                    <div class="col">Início:</div>
                                    <div class="col">
                                        <div id="startDate"></div>
                                    </div>
                                    <div class="col">Fim:</div>
                                    <div class="col">
                                        <div id="endDate"></div>
                                    </div>

                                    <div class="d-grid gap-2 d-md-block" style="display: flex!important;">
                                        <button type="button" class="btn btn-primary">
                                            <a class="changebuttons" href="">Editar</a>
                                        </button>
                                        <button type="button" class="btn btn-danger" id="deletar">
                                            <a class="deletebuttons" href="">Deletar</a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>