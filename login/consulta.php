<?php
// marcar_consulta.php

// 1. Inclui o arquivo de conexão
require_once 'db_config.php';

// 2. Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 3. Coleta de dados
    $id_convenio = $_POST['id_convenio'];
    $id_medico = $_POST['id_medico'];
    $cpf_paciente = $_POST['cpf']; // CPF do paciente (pode vir de uma sessão de login)
    $data_hora = $_POST['data_hora']; // Formato: 'AAAA-MM-DD HH:MM:SS'

    // 4. Prepara a query SQL
    $sql = "INSERT INTO consulta (id_convenio, id_medico, cpf, data_hora) 
            VALUES (:convenio, :medico, :cpf, :data_hora)";

    try {
        $stmt = $pdo->prepare($sql);
        
        // 5. Vincula os parâmetros
        $stmt->bindParam(':convenio', $id_convenio);
        $stmt->bindParam(':medico', $id_medico);
        $stmt->bindParam(':cpf', $cpf_paciente);
        $stmt->bindParam(':data_hora', $data_hora);
        
        // 6. Executa a query
        $stmt->execute();
        
        echo "Consulta marcada com sucesso!";
        // Redireciona para a página "minhas consultas"
        // header("Location: minhas_consultas.php");

    } catch(PDOException $e) {
        // Trata erros (ex: médico, paciente ou convênio não existem - falha na FOREIGN KEY)
        echo "ERRO: Não foi possível marcar a consulta. Verifique os dados. " . $e->getMessage();
    }

    // Fecha a conexão
    unset($pdo);
}
?>