<?php
// Conexão com o banco de dados (ajuste as informações de conexão)
$servername = "seu_servidor";
$username = "seu_usuario";
$password = "sua_senha";
$database = "BancoFilmes"; // Nome do banco de dados

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Receba a nota enviada via POST
$nota = floatval($_POST['nota']);

// Suponha que você também tenha o ID do usuário (você pode obter isso de uma sessão, autenticação, etc.)
$usuarioID = 1; // Suponha que seja o ID do usuário (ajuste conforme sua lógica de autenticação)

// Insira a avaliação no banco de dados
$sql = "INSERT INTO Avaliacoes(Nota, UsuarioID) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("di", $nota, $usuarioID);

if ($stmt->execute()) {
    // Avaliação inserida com sucesso
} else {
    // Erro ao inserir a avaliação
}

// Calcule a média das avaliações do usuário
$sql = "SELECT AVG(Nota) as Media FROM Avaliacoes WHERE UsuarioID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuarioID);

if ($stmt->execute()) {
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $media = $row['Media'];
} else {
    // Erro ao calcular a média
}

// Retorne a média calculada como uma resposta JSON
$response = ['media' => $media];
echo json_encode($response);

// Feche a conexão com o banco de dados
$conn->close();
?>
