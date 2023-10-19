// Função para adicionar ou remover um filme dos favoritos e alternar a imagem do ícone de favorito
function toggleFavorite(movieId) {
    // Fazer uma solicitação AJAX para adicionar ou remover o filme favorito no servidor
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'favoritar_filme.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
    // Parâmetros da solicitação (filmeID é o ID do filme que está sendo favoritado)
    var params = 'filmeID=' + encodeURIComponent(movieId);
    
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // A solicitação foi concluída com sucesso, você pode atualizar a interface do usuário aqui
            var response = JSON.parse(xhr.responseText);
            if (response.favoritado) {
                // O filme foi favoritado, atualize a interface de acordo
                document.getElementById('favoriteIcon').src = 'imagens/estrela_cheia.png';
            } else {
                // O filme foi desfavoritado, atualize a interface de acordo
                document.getElementById('favoriteIcon').src = 'imagens/estrela_vazia.png';
            }
        }
    };
    
    xhr.send(params);
}
