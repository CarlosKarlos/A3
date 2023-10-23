<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            background-image: url('background.jpg'); /* Substitua 'background.jpg' pela sua imagem de fundo */
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        .form-container {
            max-width: 300px;
            margin: 0 auto;
        }

        .form-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <div class="form-container">
            <form method="post" action="processa_login.php">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Senha" required>
                <input type="submit" value="Entrar">
            </form>
        </div>
        <div style="margin-top: 10px;">
            <?php
            if (isset($_SESSION['email'])) {
                echo 'Você já está logado com o email ' . $_SESSION['email'] . '. <a href="index2.php">Ir para a página inicial</a>';
            }
            ?>
        </div>
    </div>
</body>
</html>
