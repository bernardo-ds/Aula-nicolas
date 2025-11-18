<?php
require("connection.php");

if ($_POST){
    $email = $_POST['email'];

    $password = $_POST['password'];

    $confirm_password = $_POST['confirm_password'];

    $sql = "INSERT INTO usuario (email, password)
    VALUES ('$email', '$password')";


if (mysqli_query($conn, $sql)){
    header("Location: entrar.php");
    exit;
}
else{
    $erro = "Erro ao cadastrar!";
}
}
?>