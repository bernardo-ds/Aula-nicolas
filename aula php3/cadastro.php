<?php
require("connection.php");

if ($_POST) {
    $nome = $_POST['nome'];

    $email = $_POST['email'];

    $password = $_POST['password'];

    $confirm_password = $_POST['confirm_password'];

    $sql = "INSERT INTO usuario (email, nome, password)
    VALUES ('$email', '$nome', '$password')";


    if (mysqli_query($conn, $sql)) {
        header("Location: entrar.php");
        exit;
    } else {
        $erro = "Erro ao cadastrar!";
        header("Location: cadastro.php");
    }
}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta</title>
    <link rel="stylesheet" href="cadastro.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <main class="auth-container">
        
        <section class="panel-welcome">
            <h1>Bem-vindo de volta!</h1>
            <p>Já possui uma conta? Faça login para continuar.</p>
            <a href="entrar.php" class="btn btn-secondary">ENTRAR</a>
        </section>

        <section class="panel-form">
            <h1>Crie sua conta</h1>
            <?php if(isset($erro)) echo "<p style='color:red; text-align:center;'>$erro</p>"; ?>

                <div id="error-message" class="error-message"></div>
            <form method="post">
                <div class="form-group">
                    <label for="nome" class="form-label">email</label>
                    <input type="email" id="email" class="form-input" placeholder="E-mail" name="email">
                    <i class="fas fa-envelope form-input-icon"></i>
                </div>

                <div class="form-group">
                    <label for="nome" class="form-label">nome</label>
                    <input type="text" id="nome" class="form-input" placeholder="Nome" name="nome">
                    <i class="fas fa-user form-input-icon"></i>
                </div>

                <div class="form-group">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" id="senha" class="form-input" placeholder="Senha" name="password">
                    <i class="fas fa-lock form-input-icon"></i>
                </div>

                <div class="form-group">
                    <label for="senha" class="form-label">Confirmar senha</label>
                    <input type="password" id="confirmarSenha" class="form-input" placeholder="Confirmar senha" name="confirm_password">
                    <i class="fas fa-lock form-input-icon"></i>
                </div>
                <button type="submit" class="btn btn-primary" onclick="cadastrar()">CADASTRAR</button>
            </form>

        </section>

    </main>

    <script src="script.js"></script>
</body>
</html>