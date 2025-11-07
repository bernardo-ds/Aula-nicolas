<?php
require_once 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome_medico'];
    $especialidade = $_POST['especialidade_medico'];
    $telefone = $_POST['telefone_medico'];

    $sql = "INSERT INTO medico (nome_medico, especialidade_medico, telefone_medico) 
            VALUES (:nome, :espec, :tel)";
    
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':espec', $especialidade);
        $stmt->bindParam(':tel', $telefone);
        $stmt->execute();
        echo "Médico cadastrado com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao cadastrar médico: " . $e->getMessage();
    }
}
?>