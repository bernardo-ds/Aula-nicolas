<?php

include_once "connection.php";

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$cpf = $_POST['cpf'];
$data_nascimento = $_POST['data_nascimento'];

$senha_criptografada = md5($senha);

$sql = "INSERT INTO usuario(nome, email, senha, cpf, data_nascimento) VALUES ('$nome', '$email', '$senha_criptografada', '$cpf', '$data_nascimento')";

if(mysqli_query($conn, $sql)){
    return true;
}
else{
    return false;
}