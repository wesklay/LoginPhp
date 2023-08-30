<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>CRUD Exemplo</title>
</head>

<body>
    <h1>Página Inicial</h1>
    <?php if ($_SESSION['logado'] ?? null) : ?>
        <a href="painel.php">Painel</a>
        <a href="logout.php">Logout</a>
    <?php else : ?>
        <a href="login.php">Login</a>
    <?php endif ?>
</body>

</html>
