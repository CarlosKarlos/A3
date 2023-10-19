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

    // Recupera as avaliações do armazenamento local
    const avaliacoes = JSON.parse(localStorage.getItem('avaliacoes')) || [];

    // Adiciona a nova avaliação
    avaliacoes.push(nota);

    // Salva as avaliações atualizadas no armazenamento local
    localStorage.setItem('avaliacoes', JSON.stringify(avaliacoes));

    // Marque o usuário como tendo avaliado
    localStorage.setItem('avaliou', 'true');

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
    // Remova a marcação que indica que o usuário já avaliou
    localStorage.removeItem('avaliou');

    // Limpe o campo de entrada da nota
    document.getElementById('nota').value = '';

    // Exiba ou ative o formulário de avaliação (dependendo de como você o escondeu anteriormente)
    document.getElementById('avaliacao-form').style.display = 'block'; // ou 'inline', dependendo do estilo anterior

    // Oculte ou desative o botão de reavaliação
    this.style.display = 'none';

    // Redirecione para a mesma página para que o usuário possa reavaliar
    window.location.reload();
    atualizarBarras();
    atualizarMedia();
    excluirUltimaAvaliacao();
});
 // Verifique se o usuário já avaliou
if (usuarioJaAvaliou()) {
    // Se o usuário já avaliou, mostre o botão de reavaliar
    document.getElementById('reavaliar-btn').style.display = 'block'; // ou 'inline', dependendo do estilo anterior
} else {
    // Se o usuário não avaliou, oculte o botão de reavaliar
    document.getElementById('reavaliar-btn').style.display = 'none';
}
    atualizarBarras();
    atualizarMedia();
