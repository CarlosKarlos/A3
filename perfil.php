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

<a href="visualizar_filmes_favoritos.php" class="no-underline">Meus Filmes Favoritos</a>

<!DOCTYPE html>
<html>
<head>
    <title>Seu Perfil</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
    <h1>Perfil de <?php echo $name; ?></h1>
    <p>Nome: <?php echo $name; ?></p>
    <p>Email: <?php echo $email; ?></p>
    <a href="editar_perfil.php">Editar Perfil</a>
    <a href="logout.php">Sair</a>

    
</body>
</html>
