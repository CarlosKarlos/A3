<?php
session_start();

// Verifique se o usuário está logado
if (!isset($_SESSION['name'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenha os novos dados do usuário
    $novoNome = $_POST["novoNome"];
    $novoEmail = $_POST["novoEmail"];

    // Atualize as informações do usuário (pode variar dependendo de como você armazena os dados)
    $_SESSION['name'] = $novoNome;
    $_SESSION['email'] = $novoEmail;

    // Redirecione de volta para o perfil
    header("Location: perfil.php");
    exit();
}
