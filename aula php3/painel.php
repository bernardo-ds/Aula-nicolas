<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: entrar.php");
    exit;
}
?>

<h2>Bem-vindo, <?php echo $_SESSION['email']; ?>!</h2>
<a href="logout.php">Sair</a>
