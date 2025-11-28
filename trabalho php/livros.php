<?php
session_start();
include("connection.php");

$pesquisa = isset($_GET['search']) ? trim($_GET['search']) : "";
$orderBy = 'titulo';
$sql = "SELECT * FROM livros ORDER BY $orderBy";
$result = $conn->query($sql);

if ($pesquisa !== "" && strlen($pesquisa) < 2) {
    echo "<p style='color:red;'>Digite pelo menos 2 caracteres para pesquisar.</p>";
}   
$mensagem = '';


if (isset($_SESSION['msg'])) {
    echo "<p style='color: green;'>" . $_SESSION['msg'] . "</p>";
    unset($_SESSION['msg']);
}
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros Cadastrados</title>
    <link rel="stylesheet" href="livros.css">
</head>

<body>

    <div class="con">
        <div class="box">

            <h1>Livros Cadastrados</h1>

            <?php echo $mensagem; ?>

            <div class="ordenacao">
                Ordenar por:
                <a href="?sort=titulo" class="<?php echo ($orderBy == 'titulo' ? 'ativo' : ''); ?>">Título</a>
                |
                <a href="?sort=ano" class="<?php echo ($orderBy == 'ano' ? 'ativo' : ''); ?>">Ano</a>
            </div>

            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>

                    <div class="livro">
                        <h3><?php echo $row['titulo']; ?></h3>
                        <p><strong>Autor:</strong> <?php echo $row['autor']; ?></p>
                        <p><strong>Ano:</strong> <?php echo $row['ano']; ?></p>
                        <p><strong>Categoria:</strong> <?php echo $row['categoria']; ?></p>
                        <p><strong>Quantidade:</strong> <?php echo $row['quantidade']; ?></p>
                    </div>

                <?php endwhile; ?>
            <?php else: ?>
                <p class="alerta">Nenhum livro cadastrado.</p>
            <?php endif; ?>

            <a href="cadastro.php">
                <button class="btn-sucesso">Cadastrar Novo Livro</button>
            </a>
        </div>
    </div>

</body>

</html>
<?php
$conn->close();
?>