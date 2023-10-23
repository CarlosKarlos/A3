<?php
session_start();

// Verifique se o usuário está logado
if (!isset($_SESSION['name'])) {
    header("Location: login.php");
    exit();
}

// Obtenha as informações do usuário
$name = $_SESSION['name'];
$email = $_SESSION['email'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Editar Perfil</title>
</head>
<body>
    <h1>Editar Perfil de <?php echo $name; ?></h1>
    <form method="post" action="processar_edicao.php">
        <label for="novoNome">Novo Nome:</label>
        <input type="text" name="novoNome" value="<?php echo $name; ?>" required>
        <label for="novoEmail">Novo Email:</label>
        <input type="email" name="novoEmail" value="<?php echo $email; ?>" required>
        <input type="submit" value="Salvar Alterações">
    </form>
    <a href="perfil.php">Voltar ao Perfil</a>
</body>
</html>
