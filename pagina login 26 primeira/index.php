<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="container flex">
        <div class="quadrado1 flex">
            <div class="metade">
                <img src="down.jpg" class="ft">
            </div>
            <div class="metade1 flex coluna cor">
                <h1>Faça seu cadastro a baixo</h1>
                <br>
                <form action="processa.php" method="POST">
                    <input type="text" placeholder="NOME" name="nome" class="botao flex input borda">
                    <br>
                    <input type="email" placeholder="EMAIL" name="email" class="botao flex input borda">
                    <br>
                    <input type="password" placeholder="SENHA" name="senha" class="botao flex input borda">
                    <br>
                    <input type="text" placeholder="CPF" name="cpf" class="botao flex input borda">
                    <br>
                    <input type="date" placeholder="Data de nascimento" name="data_nascimento" class="botao flex input borda">
                    <br>
                    <input type="submit" value="enviar" class="enviar flex">
                </form>
            </div>
        </div>
    </div>
</body>

</html>