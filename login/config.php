<?php
// db_config.php - Arquivo de Configuração do Banco de Dados

$host = '127.0.0.1';    // Ou o IP do seu servidor de banco
$db_name = 'agilizasaude'; // O nome do seu banco de dados
$username = 'root';       // Seu usuário do MySQL
$password = '';           // Sua senha do MySQL

try {
    // Cria a conexão usando PDO (PHP Data Objects)
    $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
    
    // Configura o PDO para lançar exceções em caso de erro
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch(PDOException $e) {
    // Em caso de falha na conexão, exibe o erro
    die("ERRO: Não foi possível conectar ao banco. " . $e->getMessage());
}
?>