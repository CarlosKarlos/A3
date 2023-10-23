<!DOCTYPE html>
<html>
<head>
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
            background-image: url("https://aventurasnahistoria.uol.com.br/media/stories/cinema-nacional-5-curiosidades-sobre-setima-arte-no-brasil/assets/5.gif"); /* Caminho da imagem */
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
        margin: 10px; /* Reduzi a margem para organização */
        background-color: rgba(255, 255, 255, 0.8);
        padding: 15px;
        text-align: center;
        width: 200px; /* Largura fixa para os filmes */
    }

    .filme img {
        max-width: 100%;
        display: block;
        margin: 0 auto;
    }

    .filme h2 {
        font-size: 16px; /* Tamanho da fonte para o título */
        margin: 10px 0; /* Espaçamento entre o título e a imagem */
    }

    .filme a {
        text-decoration: none;
        color: #333;
        display: block;
        margin-top: 10px;
        font-weight: bold; /* Texto em negrito para o link */
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
        
        // Modifica os botões dependendo do status de login
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
    <img src="https://upload.wikimedia.org/wikipedia/pt/6/6d/City_Angels_poster.jpg" alt="Filme 1">
    <h2>Cidade dos Anjos</h2>
    <a href="Cidade dos Anjos.html?filme=1">Ver Detalhes</a>
</div>

<!-- Filme 2 -->
<div class="filme">
    <img src="https://upload.wikimedia.org/wikipedia/pt/thumb/a/a6/DragonballEvolution.jpg/230px-DragonballEvolution.jpg" alt="Filme 2">
    <h2>DragonBallEvolution</h2>
    <a href="pagina_filme.php?filme=2">Ver Detalhes</a>
</div>

<!-- Adicione links semelhantes para os outros filmes -->



        <!-- Filme 3 -->
        <div class="filme">
            <img src="https://upload.wikimedia.org/wikipedia/pt/f/fc/Johnny_English_Strikes_Again_poster.jpg" alt="Filme 2">
            <h2>Johnny English 3.0</h2>
            <a href="Johnny_English.html">Ver Detalhes</a>
        </div>

        <!-- Filme 4 -->
        <div class="filme">
            <img src="https://upload.wikimedia.org/wikipedia/pt/e/ea/The_road_to_el_dorado_poster_promocional.jpg" alt="Filme 3">
            <h2>O Caminho para El Dorado</h2>
            <a href="O_Caminho_para_El_Dorado.html">Ver Detalhes</a>
        </div>

        <!-- Filme 5 -->
        <div class="filme">
            <img src="https://upload.wikimedia.org/wikipedia/pt/0/05/The_Curious_Case_of_Benjamin_Button.jpg" alt="Filme 4">
            <h2>O Curioso Caso de Benjamin Button</h2>
            <a href="O_Curioso_Caso_de_Benjamin_Button.html">Ver Detalhes</a>
        </div>

        <!-- Filme 5 -->
        <div class="filme">
            <img src="https://upload.wikimedia.org/wikipedia/pt/9/9b/Avengers_Endgame.jpg" alt="Filme 5">
            <h2>Vingadores: Ultimato</h2>
            <a href="Vingadores_Ultimato.html">Ver Detalhes</a>
        </div>

        <!-- Adicione mais blocos de código para outros filmes -->
        <!-- ...
    </div>
</body>
</html>

