<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $bd = "testevaggon";

    if($conn = mysqli_connect($server, $user, $pass, $bd)) {
    } else 
        echo "erro";
?>