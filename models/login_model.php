<?php
include('../config.php');

if(isset($_POST['username']) || (isset($_POST['password']))) {
    if(strlen($_POST['username']) == 0) {
        echo "Preencha seu e-mail";
    }
    else if(strlen($_POST['password']) == 0){
        echo "Preencha sua senha";
    }
    else{

        $username = $conn->real_escape_string($_POST['username']);
        $password = $conn->real_escape_string($_POST['password']);

        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM register WHERE username = '$username' AND password = '$password'";
        $sql_query = $conn->query($sql) or die("Erro" . $conn->error);

        $numoffindings = $sql_query->num_rows;

        if($numoffindings == 1){
            $user = $sql_query->fetch_assoc();

            if(!isset($_SESSION)){
                session_start();
            }

            $_SESSION['id'] = $user['id'];

            header("Location: ../pages/main.php");

        } else{
            echo "Não foi possível logar.";
        }
    }
}
?>