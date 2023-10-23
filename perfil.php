<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $password = $_POST["password"];

    // Verifique se o arquivo de usuários existe
    if (file_exists("usuarios.txt")) {
        // Leia o conteúdo do arquivo de usuários
        $usuarios = file("usuarios.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        // Percorra as linhas do arquivo para verificar as credenciais
        foreach ($usuarios as $linha) {
            list($name, $email, $hashedPassword) = explode("|", $linha);

            if ($username  && password_verify($password, $hashedPassword)) {
                // Credenciais corretas, inicie a sessão e armazene as informações do usuário
                $_SESSION['name'] = $name;
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


<!DOCTYPE html>
<html>
<head>
    <title>Seu Perfil</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            background-image: url('background.jpg'); /* Substitua 'background.jpg' pela sua imagem de fundo */
            background-size: cover;
            background-position: center;
        }

        .profile-container {
            background-color: rgba(255, 255, 255, 0.8);
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .profile-container h2 {
            color: #800080; /* Cor roxa */
        }

        .profile-container img {
            max-width: 100px;
            height: auto;
            border-radius: 50%;
        }

        .profile-container div {
            margin-top: 20px;
        }

        .profile-container p {
            font-size: 18px;
        }

        .profile-container label {
            display: block;
            text-align: left;
            margin-top: 10px;
            font-weight: bold;
        }

        .profile-container input[type="text"],
        .profile-container input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .profile-container select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .profile-container button {
            background-color: #800080; /* Cor de fundo roxa */
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            margin-top: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <h2>Seu Perfil</h2>
        <img src="<?php echo $avatarUsuario; ?>" alt="Avatar do Usuário">
        
        <div>
            <p><strong>Nome de Usuário:</strong> <?php echo $name; ?></p>
            <p><strong>Email:</strong> <?php echo $emailUsuario; ?></p>
        </div>

        <button id="editarPerfil">Editar Perfil</button>
        <a href="sairPerfil.php" id="sairPerfil">Voltar à Página Inicial</a>

        <form method="post" id="formularioEdicao" style="display: none;">
            <label for="novoNomeUsuario">Novo Nome de Usuário:</label>
            <input type="text" name="novoNomeUsuario" id="novoNomeUsuario" value="<?php echo $name;  ?>"><br>

            <label for="novoEmailUsuario">Novo Email:</label>
            <input type="email" name="novoEmailUsuario" value="<?php echo $emailUsuario; ?>"><br>

            <label for="avatar">Escolha um novo avatar:</label>
            <select name="avatar" id="avatar">
                <?php foreach ($avatarOptions as $avatarName => $avatarPath) { ?>
                    <option value="<?php echo $avatarPath; ?>" <?php echo ($avatarUsuario === $avatarPath) ? "selected" : ""; ?>><?php echo $avatarName; ?></option>
                <?php } ?>
            </select><br>

            <input type="submit" name="editarPerfil" value="Salvar Alterações">
        </form>
    </div>

    <script>
        document.getElementById("editarPerfil").addEventListener("click", function() {
            // Ocultar o botão de editar perfil e o conteúdo
            document.getElementById("editarPerfil").style.display = "none";
            document.querySelector(".profile-container div").style.display = "none";

            // Mostrar o formulário de edição
            document.getElementById("formularioEdicao").style.display = "block";
        });
    </script>
</body>
</html>
