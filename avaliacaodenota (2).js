// Função para calcular a média de um array de números
function calcularMedia(avaliacoes) {
    if (avaliacoes.length === 0) {
        return 0;
    }
    const soma = avaliacoes.reduce((total, avaliacao) => total + avaliacao, 0);
    return soma / avaliacoes.length;
}

// Função para atualizar a média exibida na página
function atualizarMedia() {
    const avaliacoes = JSON.parse(localStorage.getItem('avaliacoes')) || [];
    const media = calcularMedia(avaliacoes).toFixed(1);
    document.getElementById('media-avaliacoes').textContent = `Média de Avaliações: ${media}`;
}

// Função para lidar com o envio do formulário de avaliação
document.getElementById('avaliacao-form').addEventListener('submit', function (e) {
    e.preventDefault();

    const nota = parseFloat(document.getElementById('nota').value);

    // Validação da nota (entre 0 e 5)
    if (isNaN(nota) || nota < 0 || nota > 5) {
        alert('Insira uma nota válida entre 0 e 5.');
        return;
    }

    // Recupera as avaliações do armazenamento local
    const avaliacoes = JSON.parse(localStorage.getItem('avaliacoes')) || [];

    // Adiciona a nova avaliação
    avaliacoes.push(nota);

    // Salva as avaliações atualizadas no armazenamento local
    localStorage.setItem('avaliacoes', JSON.stringify(avaliacoes));

    // Atualiza a média exibida na página
    atualizarMedia();

    // Limpa o campo de entrada
    document.getElementById('nota').value = '';
});

// Chama a função de atualização da média ao carregar a página
atualizarMedia();

// Função para calcular a média de um array de números
function calcularMedia(avaliacoes) {
    if (avaliacoes.length === 0) {
        return 0;
    }
    const soma = avaliacoes.reduce((total, avaliacao) => total + avaliacao, 0);
    return soma / avaliacoes.length;
}

// Função para atualizar as barras de avaliação e a contagem de avaliações
function atualizarBarras() {
    const avaliacoes = JSON.parse(localStorage.getItem('avaliacoes')) || [];
    
    // Inicialize contadores para cada nota
    const contadores = [0, 0, 0, 0, 0];

    // Percorra as avaliações para contar cada nota
    avaliacoes.forEach(avaliacao => {
        const notaInteira = Math.round(avaliacao);
        if (notaInteira >= 1 && notaInteira <= 5) {
            contadores[notaInteira - 1]++;
        }
    });

    // Atualize as barras e contadores na página
    for (let nota = 1; nota <= 5; nota++) {
        const contador = contadores[nota - 1];
        const barra = document.getElementById(`barra-${nota}`);
        const contadorElement = document.getElementById(`contador-${nota}`);

        // Atualize a largura da barra proporcional ao número de avaliações
        barra.style.width = (contador * 20) + '%';

        // Atualize o contador de avaliações
        contadorElement.textContent = contador;
    }
}

// Chame a função de atualização das barras ao carregar a página
atualizarBarras();


document.getElementById('avaliacao-form').addEventListener('submit', function (e) {
    e.preventDefault();

    const nota = parseFloat(document.getElementById('nota').value);

  

    // Recupera as avaliações do armazenamento local
    const avaliacoes = JSON.parse(localStorage.getItem('avaliacoes')) || [];

    // Adiciona a nova avaliação
    avaliacoes.push(nota);

    // Salva as avaliações atualizadas no armazenamento local
    localStorage.setItem('avaliacoes', JSON.stringify(avaliacoes));

    // Chama a função para atualizar as barras imediatamente após a avaliação ser submetida
    atualizarBarras();

    // Limpa o campo de entrada
    document.getElementById('nota').value = '';
});
