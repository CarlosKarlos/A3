<?php
session_start();

// Verifique se o usuário está logado
if (!isset($_SESSION["usuarios.txt"])) {
    header("location: login.php"); // Redirecione para a página de login se o usuário não estiver logado
    exit();
}

// Obtém informações do usuário a partir da sessão
$nomeUsuario = $_SESSION["usuario.txt"];

// Função para carregar os favoritos do arquivo "usuarios.txt" de um usuário
function carregarFavoritos($name, $filename) {
    $usuarios = file($filename, FILE_IGNORE_NEW_LINES);
    $userIndex = array_search($name, $usuarios);
    
    if ($userIndex !== false) {
        $favoritosIndex = $userIndex + 1;
        $favoritos = explode(',', $usuarios[$favoritosIndex]);
        return $favoritos;
    } else {
        return [];
    }
}

$usuariosFile = "usuarios.txt";

// Carregue a lista de favoritos
$listaFavoritos = carregarFavoritos($nomeUsuario, $usuariosFile);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Meus Filmes Favoritos</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="profile-container">
        <h2>Meus Filmes Favoritos</h2>
        <p><strong>Nome de Usuário:</strong> <?php echo $nomeUsuario; ?></p>
        
        <h3>Filmes Favoritos:</h3>
        <ul id="filmesFavoritosList">
            <?php foreach ($listaFavoritos as $filmeFavorito): ?>
                <li><?php echo $filmeFavorito; ?></li>
            <?php endforeach; ?>
        </ul>

        <a href="perfil.php">Voltar para o Perfil</a>
    </div>
</body>
</html>
