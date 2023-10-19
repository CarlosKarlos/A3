function isNumber(value) {
    return typeof value === 'number' && !isNaN(value) && isFinite(value);
}


// Função para calcular a média de um array de números


function calcularMedia(avaliacoes) {
  
    const soma = isNumber(avaliacoes.reduce((total, avaliacao) => total + avaliacao, 0));
    return soma / avaliacoes.length;
}
// função para atualizar as barras quando avaliado
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


// Função para atualizar a média exibida na página
function atualizarMedia() {
    const avaliacoes = JSON.parse(localStorage.getItem('avaliacoes')) || [];
    const media = calcularMedia(avaliacoes).toFixed(1);
    document.getElementById('media-avaliacoes').textContent = `Média de Avaliações: ${media}`;
}

function usuarioJaAvaliou() {
    return localStorage.getItem('avaliou') === 'true';
}


// Função para calcular a média de um array de números
function calcularMedia(avaliacoes) {
    if (avaliacoes.length === 0) {
        return soma;
    }
    const soma = avaliacoes.reduce((total, avaliacao) => total + avaliacao, 0);
    return soma / avaliacoes.length;
}





// Chama a função de verificação ao carregar a página
if (usuarioJaAvaliou()) {
    // Se o usuário já avaliou, oculte ou desative o formulário de avaliação
    document.getElementById('avaliacao-form').style.display = 'none';
}







document.getElementById('avaliacao-form').addEventListener('submit', function (e) {
    e.preventDefault();

    if (usuarioJaAvaliou()) {
        // Se o usuário já avaliou, você pode mostrar uma mensagem informando que eles já avaliaram.
        alert('Você já avaliou. Não é permitido avaliar novamente.');
        return;
    }

    const nota = parseFloat(document.getElementById('nota').value);

    // Validação da nota (entre 0 e 5)
    if (isNaN(nota) || nota < 0 || nota > 5) {
        alert('Insira uma nota válida entre 0 e 5.');
        return;
    }

    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'atualizar_avaliacao.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);

            // Atualize a interface da página com os dados retornados pelo servidor
            atualizarMedia(response.media);

            // Outras atualizações da interface, se necessário

            // Marque o usuário como tendo avaliado
            localStorage.setItem('avaliou', 'true');

            // Recarregue a página, se necessário
            window.location.reload();
        }
    };

    xhr.send(`nota=${nota}`);

    // Recupera as avaliações do armazenamento local
    const avaliacoes = JSON.parse(localStorage.getItem('avaliacoes')) || [];

    // Adiciona a nova avaliação
    avaliacoes.push(nota);

    // Salva as avaliações atualizadas no armazenamento local
    localStorage.setItem('avaliacoes', JSON.stringify(avaliacoes));

    

    // Atualize a média e as barras como você já estava fazendo
    atualizarMedia();
    atualizarBarras();
    window.location.reload();
    // Limpa o campo de entrada
    document.getElementById('nota').value = '';
});



// Função para excluir a última nota da lista de avaliações
function excluirUltimaAvaliacao() {
    // Recupera as avaliações do armazenamento local
    let avaliacoes = JSON.parse(localStorage.getItem('avaliacoes')) || [];

    // Verifica se há avaliações para excluir
    if (avaliacoes.length > 0) {
        // Remove a última avaliação
        avaliacoes.pop();

        // Salva as avaliações atualizadas no armazenamento local
        localStorage.setItem('avaliacoes', JSON.stringify(avaliacoes));

        // Atualize a média e as barras, se necessário
        atualizarMedia();
        atualizarBarras();
        
    } else {
        // Se não houver avaliações para excluir, você pode mostrar uma mensagem ou lidar com isso de outra maneira
        console.log('Não há avaliações para excluir.');
    }
}

document.getElementById('reavaliar-btn').addEventListener('click', function () {
    var novaNota = parseFloat(document.getElementById('nova-nota').value);

    if (isNaN(novaNota) || novaNota < 0 || novaNota > 5) {
        alert('Insira uma nova nota válida entre 0 e 5.');
        return;
    }

    // Aqui você chama a função de AJAX para reavaliar o filme
    var movieId = 'DragonballEvolution'; // Substitua pelo ID do filme atual
    reavaliarFilme(movieId, novaNota);

    // Remova a marcação que indica que o usuário já avaliou
    localStorage.removeItem('avaliou');

    // Limpe o campo de entrada da nota
    document.getElementById('nota').value = '';

    // Exiba ou ative o formulário de avaliação (dependendo de como você o escondeu anteriormente)
    document.getElementById('avaliacao-form').style.display = 'block';

    // Oculte ou desative o botão de reavaliar
    this.style.display = 'none';

    // Redirecione para a mesma página para que o usuário possa reavaliar
    window.location.reload();
    atualizarBarras();
    atualizarMedia();
    excluirUltimaAvaliacao();
});


    function reavaliarFilme(movieId, novaNota) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'reavaliar_filme.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        
        // Parâmetros da solicitação (movieId é o ID do filme, novaNota é a nova nota)
        var params = 'filmeID=' + encodeURIComponent(movieId) + '&novaNota=' + encodeURIComponent(novaNota);
        
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // A solicitação foi concluída com sucesso, você pode atualizar a interface do usuário aqui
                var response = JSON.parse(xhr.responseText);
                if (response.reavaliado) {
                    // O filme foi reavaliado com sucesso, atualize a interface de acordo
                    // Por exemplo, atualize a média e a exibição da nota
                } else {
                    // Houve um erro ao reavaliar o filme, trate-o conforme necessário
                }
            }
        };
        
        xhr.send(params);
    }
