<?php
require("connection.php");

if ($_POST) {

    // RECEBE OS CAMPOS
    $titulo = trim($_POST['titulo']);
    $autor = trim($_POST['autor']);
    $ano = trim($_POST['ano']);
    $categoria = trim($_POST['categoria']);
    $quantidade = trim($_POST['quantidade']);

    // ------- VALIDAÇÕES -------
    if (empty($titulo) || empty($autor) || empty($ano) || empty($categoria) || empty($quantidade)) {
        echo "<script>alert('Preencha todos os campos!'); history.back();</script>";
        exit;
    }

    if (!is_numeric($ano) || $ano < 0 || $ano > date("Y")) {
        echo "<script>alert('Ano inválido!'); history.back();</script>";
        exit;
    }

    if (!is_numeric($quantidade) || $quantidade < 1) {
        echo "<script>alert('Quantidade inválida!'); history.back();</script>";
        exit;
    }

    if ($categoria == "") {
        echo "<script>alert('Selecione uma categoria!'); history.back();</script>";
        exit;
    }

    // SQL PROTEGIDO
    $sql = "INSERT INTO livros (titulo, autor, ano, categoria, quantidade)
            VALUES ('$titulo', '$autor', '$ano', '$categoria', '$quantidade')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Livro cadastrado com sucesso!'); window.location='livros.php';</script>";
    } else {
        echo "Erro: " . $conn->error;
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livraria</title>
    <link rel="stylesheet" href="cadastrar.css">

</head>

<body>
    <div class="container flex center">
        <div class="quadrado_maior">
            <div class="quadrado_menor">

                <h1 class="flex center letra-p">Olá, Amigo!</h1>
                <p class="flex center font">Seja bem-vindo a livraria do SENAI!</p>
            </div>
            <br>
            <form method="POST">
                <div class="flex center col">
                    <h2 class="flex center letra-s">Cadastre seu livro</h2>

                    <input type="text" placeholder="Título" class="input borda font top" name="titulo">
                    <input type="text" placeholder="autor" class="input borda font top" name="autor">
                    <input type="number" placeholder="ano" class="input borda font top" name="ano">

                    <select name="categoria" class="input borda font top">
                        <option value="">-- Selecione uma opção --</option>
                        <option value="romance">Romance</option>
                        <option value="didatico">Didático</option>
                        <option value="fantasia">Fantasia</option>
                        <option value="outros">outros</option>
                    </select>

                    <input type="number" placeholder="quantidade" class="input borda font top" name="quantidade">

                    <button type="submit" class="input borda font top">Cadastrar</button>

                </div>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>
