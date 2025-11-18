<?php
session_start();
require "connection.php";

if ($_POST) {
    $email = $_POST['email'];
    $senha = $_POST['password'];

    $sql = "SELECT * FROM usuario WHERE email = '$email' LIMIT 1";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) > 0) {
        $user = mysqli_fetch_assoc($res);

        if ($senha == $user['password']) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['nome'] = $user['nome'];
            header("Location: painel.php");
            exit;
        } else {
            $erro = "Senha incorreta!";
        }
    } else {
        $erro = "Usuário não encontrado!";
    }
}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="cadastro.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <main class="auth-container">
        
        <section class="panel-welcome">
            <h1>Olá, Amigo!</h1>
            <p>Ainda não tem uma conta? Cadastre-se e comece a jornada.</p>
            <a href="cadastro.php" class="btn btn-secondary">CADASTRAR</a>
        </section>

        <section class="panel-form">
            <h1>Entrar</h1>
            <?php if(isset($erro)) echo "<p style='color:red; text-align:center;'>$erro</p>"; ?>

                <div id="error-message" class="error-message"></div>
            <form method="POST">
                <div class="form-group">
                    <label for="nome" class="form-label">email</label>
                    <input type="text" id="email" class="form-input" placeholder="E-mail" name="email">
                    <i class="fas fa-user form-input-icon"></i>
                </div>

                <div class="form-group">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" id="senha" class="form-input" placeholder="Senha" name="password">
                    <i class="fas fa-lock form-input-icon"></i>
                </div>

                <button type="submit" class="btn btn-primary" onclick="entrar()">LOGIN</button>
            </form>

        </section>

    </main>
    
    <script src="script.js"></script>
</body>
</html>