<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Verifique se o arquivo de usuários existe
    if (file_exists("usuarios.txt")) {
        // Leia o conteúdo do arquivo de usuários
        $usuarios = file("usuarios.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        // Percorra as linhas do arquivo para verificar as credenciais
        foreach ($usuarios as $linha) {
            list($name, $existingEmail, $existingname, $hashedPassword) = explode("|", $linha);

            if ($email === $existingEmail && password_verify($password, $hashedPassword)) {
                // Credenciais corretas, inicie a sessão
                $_SESSION['name'] = $existingUsername;
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;

                // Redirecione para a página inicial (índice) ou para onde desejar
                header("Location: index2.php");
                exit();
            }
        }
    }

    // Credenciais incorretas, exiba uma mensagem de erro
    echo "Credenciais inválidas. <a href='login.php'>Tente novamente</a>";
}
?>
