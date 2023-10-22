<?php

//informacoes do banco de dados
$host = 'localhost';
$usuario = 'root';
$senha = '';
$database = 'BancoFilmes';

//criar nova conexao
$conexao = new mysqli($host, $usuario, $senha, $database);

if($conexao->error) {
    die("Falha ao conectar ao banco de dados: " . $conexao->error);
}

try {
    $conn = new PDO("mysql:host=$host;dbname=" . $database, $usuario, $senha);
} catch(PDOException $err) {
    echo "Falha ao conectar ao banco de dados: " . $err->getMessage();
}
