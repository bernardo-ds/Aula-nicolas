<?php
session_start();
require("connection.php");

$erros = [];
$msg = null;

if ($_POST) {

    // PEGANDO EXATAMENTE OS NAMES DO SEU HTML
    $titulo     = isset($_POST['titulo'])     ? trim($_POST['titulo'])     : "";
    $autor      = isset($_POST['autor'])      ? trim($_POST['autor'])      : "";
    $ano        = isset($_POST['ano'])        ? trim($_POST['ano'])        : "";
    $categoria  = isset($_POST['categoria'])  ? trim($_POST['categoria'])  : "";
    $quantidade = isset($_POST['quantidade']) ? trim($_POST['quantidade']) : "";

    // ======== VALIDAÇÕES ========
    if ($titulo === "")     $erros[] = "O título é obrigatório.";
    if ($autor === "")      $erros[] = "O autor é obrigatório.";
    if ($ano === "" || !is_numeric($ano)) $erros[] = "Ano é obrigatório e deve ser numérico.";
    if ($categoria === "")  $erros[] = "A categoria é obrigatória.";
    if ($quantidade === "" || !is_numeric($quantidade))
        $erros[] = "A quantidade é obrigatória e deve ser numérica.";

    // SE TUDO OK
    if (empty($erros)) {

        $sql = "INSERT INTO livros (titulo, autor, ano, categoria, quantidade) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssisi", $titulo, $autor, $ano, $categoria, $quantidade);

        if ($stmt->execute()) {
            $_SESSION['msg'] = "Livro cadastrado com sucesso!";
            header('Location: livros.php');
            return;
        } else {
            $erros[] = "Erro ao salvar no banco.";
        }
    }
}
?>

<?php if (!empty($erros)): ?>
    <div style="color:red; margin: 10px 0;">
        <?php foreach ($erros as $msg) echo "<p>$msg</p>"; ?>
    </div>
<?php endif; ?>


<?php if (!empty($erros)): ?>
    <div style="color:red; margin: 10px 0;">
        <?php foreach ($erros as $msg) echo "<p>$msg</p>"; ?>
    </div>
<?php endif; ?>


<?php if (!empty($erros)): ?>
    <div style="color:red; margin: 10px 0;">
        <?php foreach ($erros as $msg) echo "<p>$msg</p>"; ?>
    </div>
<?php endif; ?>


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
                    <a href="livros.php">
                        <button class="input borda font top">Cadastrar</button>
                    </a>
                </div>
            </form>
        </div>


    </div>

    <script src="script.js"></script>
</body>

</html>