<?php
// Conecte-se ao banco de dados (já implementado)
// Verifique a autenticação do usuário para obter o ID do usuário

$usuarioID = 1; // Suponha que o ID do usuário seja 1 (usuário João Silva)

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $filmeID = $_POST['filmeID'];

    // Verifique se o filme já está nos favoritos do usuário
    // Você pode fazer uma consulta ao banco de dados para verificar a tabela FilmesFavoritos

    $favoritado = false; // Suponha que o filme não está nos favoritos

    // Se o filme já estiver nos favoritos, remova-o; caso contrário, adicione-o
    if (!$favoritado) {
        // Insira o filme favorito no banco de dados na tabela FilmesFavoritos
        $sql = "INSERT INTO FilmesFavoritos (FilmeID, UsuarioID) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $filmeID, $usuarioID);

        if ($stmt->execute()) {
            $favoritado = true;
        }
    } else {
        // Remova o filme favorito do banco de dados na tabela FilmesFavoritos
        $sql = "DELETE FROM FilmesFavoritos WHERE FilmeID = ? AND UsuarioID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $filmeID, $usuarioID);

        if ($stmt->execute()) {
            $favoritado = false;
        }
    }

    // Retorne o status atual (favoritado ou não) como uma resposta JSON
    $response = ['favoritado' => $favoritado];
    echo json_encode($response);
}
?>
