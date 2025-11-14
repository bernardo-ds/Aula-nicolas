<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta</title>
    <link rel="stylesheet" href="style.css">
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

                <div id="error-message" class="error-message"></div>
            <form action="process.php" method="post">
                <div class="form-group">
                    <label for="nome" class="form-label">email</label>
                    <input type="email" id="nome" class="form-input" placeholder="email" name="email">
                    <i class="fas fa-envelope form-input-icon"></i>
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