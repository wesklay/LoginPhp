<?php
session_start();

class Usuario {
    private $usuario;
    private $senha;

    public function __construct($usuario, $senha) {
        $this->usuario = $usuario;
        $this->senha = $senha;
    }

    public function autenticar() {
        // Lógica de autenticação aqui
        return ($this->usuario === 'admin' && $this->senha === 'senha123');
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? null;
    $senha = $_POST['senha'] ?? null;

    if (!$usuario ||  !$senha) {
        $erro = "Usuário ou Senha Inválido.";
    }

    if (!($erro ?? null)) {
        $user = new Usuario($usuario, $senha);

        if ($user->autenticar()) {
            $_SESSION['logado'] = true;
            header('Location: painel.php');
            exit();
        } else {
            $erro = "Usuário ou Senha Inválido.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($erro)) { echo "<p>$erro</p>"; } ?>
    <form method="post">
        <label for="usuario">Usuário:</label>
        <input type="text" id="usuario" name="usuario" required><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
