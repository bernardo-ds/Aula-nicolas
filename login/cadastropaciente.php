<?php
// cadastrar_paciente.php

// 1. Inclui o arquivo de conexão
require_once 'db_config.php';

// 2. Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 3. Validação e coleta de dados (simples - adicione mais validações se necessário)
    $cpf = $_POST['cpf'];
    $nome = $_POST['nome_paciente'];
    $data_nascimento = $_POST['data_nascimento'];
    $telefone = $_POST['telefone_paciente'];
    $senha = $_POST['senha'];

    // 4. *** IMPORTANTE: Criptografar a senha ***
    // Nunca armazene senhas em texto puro. Use password_hash().
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    // 5. Prepara a query SQL (usando prepared statements contra SQL Injection)
    $sql = "INSERT INTO paciente (cpf, nome_paciente, data_nascimento, telefone_paciente, senha) 
            VALUES (:cpf, :nome, :data_nasc, :tel, :senha_hash)";

    try {
        $stmt = $pdo->prepare($sql);
        
        // 6. Vincula os parâmetros da query aos valores recebidos
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':data_nasc', $data_nascimento);
        $stmt->bindParam(':tel', $telefone);
        $stmt->bindParam(':senha_hash', $senha_hash);
        
        // 7. Executa a query
        $stmt->execute();
        
        echo "Paciente cadastrado com sucesso!";
        // Você pode redirecionar o usuário para a página de login aqui
        // header("Location: login.php");

    } catch(PDOException $e) {
        // Trata erros, como CPF duplicado (PRIMARY KEY)
        if ($e->errorInfo[1] == 1062) {
            echo "ERRO: Este CPF já está cadastrado.";
        } else {
            echo "ERRO: Não foi possível cadastrar o paciente. " . $e->getMessage();
        }
    }

    // Fecha a conexão
    unset($pdo);
}
?>