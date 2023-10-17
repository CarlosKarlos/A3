// Função para adicionar ou remover um filme dos favoritos e alternar a imagem do ícone de favorito
function toggleFavorite(movieId) {
    // Verifique se o filme já está nos favoritos
    var favorites = JSON.parse(localStorage.getItem('favorites')) || [];
    var index = favorites.indexOf(movieId);

    // Se o filme já estiver nos favoritos, remova-o; caso contrário, adicione-o
    if (index !== -1) {
        favorites.splice(index, 1);
        document.getElementById('favoriteIcon').src = 'imagens/estrela_vazia.png'; // Imagem da estrela vazia
    } else {
        favorites.push(movieId);
        document.getElementById('favoriteIcon').src = 'imagens/estrela_cheia.png'; // Imagem da estrela cheia
    }

    // Atualize a lista de favoritos no localStorage
    localStorage.setItem('favorites', JSON.stringify(favorites));

    // Atualize a interface do usuário (por exemplo, mude a cor do ícone)
    updateUI();
}

// Função para atualizar a interface do usuário com base nos favoritos
function updateUI() {
    var favorites = JSON.parse(localStorage.getItem('favorites')) || [];
    // Use essas informações para atualizar a interface do usuário
    // Por exemplo, altere a cor do ícone de favorito com base nos filmes favoritos.
}

// Função para inicializar os ícones de favoritos ao carregar a página
function initializeFavoriteIcons() {
    var favorites = JSON.parse(localStorage.getItem('favorites')) || [];
    var movieId = 'DragonballEvolution'; // Substitua pelo ID do filme atual
    var favoriteIcon = document.getElementById('favoriteIcon');

    // Verifique se o filme está nos favoritos e defina o ícone de acordo
    if (favorites.indexOf(movieId) !== -1) {
        // O filme está nos favoritos, então defina o ícone como cheio
        favoriteIcon.src = 'imagens/estrela_cheia.png'; // Imagem de coração cheio
    } else {
        // O filme não está nos favoritos, então defina o ícone como vazio
        favoriteIcon.src = 'imagens/estrela_vazia.png'; // Imagem de coração vazio
    }
}

// Chame a função de inicialização imediatamente após definir o ícone de favorito no HTML
initializeFavoriteIcons();