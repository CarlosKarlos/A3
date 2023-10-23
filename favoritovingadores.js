function toggleFavorite(movieId) {
    var favorites = JSON.parse(localStorage.getItem('favorites')) || [];
    var index = favorites.indexOf(movieId);

    if (index !== -1) {
        favorites.splice(index, 1);
        document.getElementById('favoriteIcon' + movieId).src = 'imagens/estrela_vazia.png';
    } else {
        favorites.push(movieId);
        document.getElementById('favoriteIcon' + movieId).src = 'imagens/estrela_cheia.png';
    }

    localStorage.setItem('favorites', JSON.stringify(favorites));
    updateUI();
}

function initializeFavoriteIcons() {
    var favorites = JSON.parse(localStorage.getItem('favorites')) || [];

    var movieIcons = {
        VingadoresUltimato: 'favoriteIconVingadores',
        // Defina ícones para outros filmes aqui
    };

    for (var movieId in movieIcons) {
        var favoriteIcon = document.getElementById(movieIcons[movieId]);

        if (favorites.indexOf(movieId) !== -1) {
            favoriteIcon.src = 'imagens/estrela_cheia.png';
        } else {
            favoriteIcon.src = 'imagens/estrela_vazia.png';
        }
    }
}

function updateUI() {
    // Implemente a lógica para atualizar a interface do usuário conforme necessário
}

initializeFavoriteIcons();
