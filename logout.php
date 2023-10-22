<?php
// Inicie a sessão (se ainda não estiver iniciada)
if(!isset($_SESSION)) {
    session_start();
}

// Destrua todas as variáveis de sessão
session_destroy();

// Redirecione o usuário de volta para a página de login
header("Location: login.html");
exit();
?>
