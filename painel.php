<?php
if (!isset($_SESSION)) {
    session_start();
}

class Painel {
    public function verificarLogin() {
        if (!isset($_SESSION['logado']) || !$_SESSION['logado']) {
            header('Location: login.php');
            exit();
        }
    }

    public function exibirMensagem() {
        return "Bem-vindo ao painel! Você está logado.";
    }
}

$painel = new Painel();
$painel->verificarLogin();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Painel</title>
</head>
<body>
    <h1>Painel</h1>
    <p><?= $painel->exibirMensagem() ?></p>
    <a href="logout.php">Sair</a>
</body>
</html>
