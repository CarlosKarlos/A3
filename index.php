<!DOCTYPE html>
<html>
<head>
    <title>Página Inicial</title>
    <link rel="stylesheet" type="text/css" href="styles.css"> <!-- Importe o arquivo CSS externo -->
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            background-image: url("https://guiaderodas.com/wp-content/uploads/2018/05/cinema.jpg"); /* Caminho da imagem */
            background-size: cover;
            background-repeat: no-repeat;
        }

        .header {
            background-color: #333;
            color: #fff;
            text-align: right;
            padding: 10px;
        }

        .header a {
            color: #fff;
            text-decoration: none;
            margin-left: 10px;
        }

        .header a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        .filme {
            display: inline-block;
            margin: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 15px;
            text-align: center;
        }

        .filme img {
            max-width: 100px;
            display: block;
            margin: 0 auto;
        }

        .filme a {
            text-decoration: none;
            color: #333;
            display: block;
            margin-top: 10px;
        }

        /* Estilo para a palavra "Hora" */
        .destaque {
            color: yellow;
        }
    </style>
</head>
<body>
    <div class="header">
        <?php
        if(!isset($_SESSION)) {
            session_start(); // Inicie a sessão (se ainda não estiver iniciada)
        }
        
        // modifica os botoes dependendo do status de login
        if (isset($_SESSION['ID'])) {
            echo '<a href="sair.php">Sair</a>';
            echo '<a href="perfil.php">Perfil</a>';
        } else {
            echo '<a href="login.php">Login</a>';
            echo '<a href="cadastro.php">Cadastro</a>';
        }
        ?>
    </div>

    <div class="container">
     <h1><span class="destaque">Em destaque hoje</span></h1>

        <!-- Filme 1 -->
        <div class="filme">
            <img src="https://cdn-icons-png.flaticon.com/256/1/1216.png" alt="Filme 1">
            <h2>Dragon Ball Evolution</h2>
            <a href="pagina.html">Ver Detalhes</a>
        </div>

        <!-- Filme 2 -->
        <div class="filme">
            <img src="https://cdn-icons-png.flaticon.com/256/1/1216.png" alt="Filme 2">
            <h2>Filme 2</h2>
            <a href="pagina.html">Ver Detalhes</a>
        </div>

        <!-- Filme 3 -->
        <div class="filme">
            <img src="https://cdn-icons-png.flaticon.com/256/1/1216.png" alt="Filme 3">
            <h2>Filme 3</h2>
            <a href="pagina.html">Ver Detalhes</a>
        </div>

        <!-- Filme 4 -->
        <div class="filme">
            <img src="caminho_para_imagem_filme_4.jpg" alt="Filme 4">
            <h2>Filme 4</h2>
            <a href="pagina.html">Ver Detalhes</a>
        </div>

        <!-- Filme 5 -->
        <div class="filme">
            <img src="caminho_para_imagem_filme_5.jpg" alt="Filme 5">
            <h2>Filme 5</h2>
            <a href="pagina.html">Ver Detalhes</a>
        </div>

        <!-- Adicione mais blocos de código para outros filmes -->
        <!-- ...

    </div>
</body>
</html>
