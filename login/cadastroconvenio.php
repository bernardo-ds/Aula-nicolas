<?php
require_once 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome_convenio'];

    $sql = "INSERT INTO convenio (nome_convenio) VALUES (:nome)";
    
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->execute();
        echo "Convênio cadastrado com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao cadastrar convênio: " . $e->getMessage();
    }
}
?>