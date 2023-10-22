<?php
// iniciar conexao
session_start();
include('conexao.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            background-color: #f0f0f0;
            text-align: center;
            padding-top: 100px;
        }
        form {
            background-color: #fff;
            display: inline-block;
            padding: 20px;
            border-radius: 10px;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Login</h1>
    <form method="post" action="login.php">
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br>

        <input type="submit" name="submit" value="Login">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        //$users = file_get_contents("users.txt");
        //$users = json_decode($users, true);

        if (isset($_POST['email']) && isset($_POST['senha'])) {
            $email = $conexao->real_escape_string($_POST['email']);
            $senha = $conexao->real_escape_string($_POST['senha']);
        
            if (!empty($email) && !empty($senha)) {
                //verifica se o login esta valido
                $sql_code = "SELECT * FROM usuarios WHERE Email = '$email' AND Senha = '$senha'";
                $sql_query = $conexao->query($sql_code) or die("Falha ao conectar ao banco de dados: " . $conexao->error);
        
                $quantidade = $sql_query->num_rows;
        
                if ($quantidade == 1) {
                    $usuario = $sql_query->fetch_assoc();
        
                    $_SESSION['ID'] = $usuario['ID'];
                    $_SESSION['nome'] = $usuario['nome'];
                    $_SESSION['email'] = $usuario['email'];
                    $_SESSION['senha'] = $usuario['senha'];
                    echo "<p>Login realizado com sucesso!</p>";

                    // Redirecionar para a página inicial após o login
                    header("Location: carregando.php");
                    exit();
                } else {
                    echo "<p>Email ou senha invalido.</p>";
                    exit();
                }
            }
        }

        echo "<p>Email ou senha incorretos.</p>";
    }
    ?>
</body>
</html>
