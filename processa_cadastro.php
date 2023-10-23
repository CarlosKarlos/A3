<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

    // Verifique se o arquivo de usuários já existe
    $usuarios = [];

    if (file_exists("usuarios.txt")) {
        // Leia o conteúdo do arquivo de usuários
        $usuarios = file("usuarios.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    }

    // Verifique se o nome de usuário já existe
    foreach ($usuarios as $linha) {
        list($existingName, $existingEmail, $hashedPassword) = explode("|", $linha);

        if ($username ) {
            echo "Nome de usuário já existe. <a href='cadastro.php'>Tente outro nome de usuário</a>.";
            exit();
        }
    }

    // Se o nome de usuário não existe, adicione o novo usuário ao arquivo
    $userData = "$name|$email||$password" . PHP_EOL;
    file_put_contents("usuarios.txt", $userData, FILE_APPEND);

    echo "Cadastro realizado com sucesso! Você pode fazer o <a href='login.php'>login</a> agora.";
}
?>
