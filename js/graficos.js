// Função principal exportada (chamada de fora)
export function carregarGraficos(dados) {
    const divGrafico = document.getElementById('grafico-container');
    limparGrafico(divGrafico);

    if (!validarDados(dados, divGrafico)) return;

    const { nomes, salarios } = extrairDados(dados);
    criarCanvas(divGrafico);
    desenharGrafico(nomes, salarios);
}

/* ------------------------------------------------------------------ */
/*                     FUNÇÕES DE APOIO SIMPLES                       */
/* ------------------------------------------------------------------ */

/**
 * Limpa o conteúdo anterior do contêiner do gráfico.
 */
function limparGrafico(container) {
    container.innerHTML = '<canvas id="graficoSalarios"></canvas>';
}

/**
 * Verifica se o objeto de dados é válido.
 * Caso contrário, mostra uma mensagem na tela.
 */
function validarDados(dados, container) {
    if (dados.erro) {
        container.innerHTML = `<p class="text-danger">${dados.erro}</p>`;
        return false;
    }

    if (!dados.dados || dados.dados.length < 2) {
        container.innerHTML = `<p class="text-warning">Nenhum dado disponível para o gráfico.</p>`;
        return false;
    }

    return true;
}

/**
 * Extrai os nomes e salários das colunas certas.
 * Espera dados no formato:
 * [
 *   ["Nome", "Salário"],
 *   ["Ana", 2000],
 *   ["Bruno", 3500]
 * ]
 */
function extrairDados(dados) {
    const cabecalho = dados.dados[0];
    const colNome = cabecalho.findIndex(c => c.toLowerCase().includes('nome'));
    const colSalario = cabecalho.findIndex(c => c.toLowerCase().includes('salário') || c.toLowerCase().includes('salario'));

    const nomes = [];
    const salarios = [];

    for (let i = 1; i < dados.dados.length; i++) {
        const linha = dados.dados[i];
        nomes.push(linha[colNome]);
        salarios.push(Number(linha[colSalario]) || 0);
    }

    return { nomes, salarios };
}

/**
 * Cria o elemento canvas para o gráfico dentro da div.
 */
function criarCanvas(container) {
    container.innerHTML = '<canvas id="graficoSalarios"></canvas>';
}

/**
 * Desenha o gráfico usando Chart.js
 */
function desenharGrafico(nomes, salarios) {
    const ctx = document.getElementById('graficoSalarios').getContext('2d');

    const cores = ["red", "green","blue"];

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: nomes,
            datasets: [{
                label: 'Salários (R$)',
                data: salarios,
                backgroundColor: cores,
                borderColor: cores,
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: valor => 'R$ ' + valor.toLocaleString('pt-BR')
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: 'Gráfico de Salários'
                }
            }
        }
    });
}
