<?php

$server = "localhost";
$user = "root";
$password = "root";
$database = "login";
$port = "3307";

$conn = new mysqli($server, $user, $password, $database, $port);

if($conn->connect_error){
    echo "erro";
}
else{
    echo "connectado com sucesso!";
}