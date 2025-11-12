document.addEventListener('DOMContentLoaded', () => {
    document.addEventListener('click', async (event) => {
        const id = event.target.id;

        if (id === 'CriarGrafico') {
            const { escolherArquivo } = await import('./arquivos.js');
            const { carregarGraficos } = await import('./graficos.js');
            const dados = await escolherArquivo();
            if (dados) 
                carregarGraficos(dados);

        } else if (id === 'lerGoogle') {
            const { inicializarGoogleSheets } = await import('./googleSheets.js');
            const { renderizarGrafico } = await import('./grafico.js');
            const dados = await inicializarGoogleSheets();
            if (dados) renderizarGrafico(dados);
        }
    });
});
