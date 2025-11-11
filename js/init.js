document.addEventListener('DOMContentLoaded', () => {
    document.addEventListener('click', async (event) => {
        const id = event.target.id;

        if (id === 'CriarGrafico') {
            const { inicializarUpload } = await import('./arquivos.js');
            const { renderizarGrafico } = await import('./graficos.js');
            const dados = await inicializarUpload();
            if (dados) 
                renderizarGrafico(dados);

        } else if (id === 'lerGoogle') {
            const { inicializarGoogleSheets } = await import('./googleSheets.js');
            const { renderizarGrafico } = await import('./grafico.js');
            const dados = await inicializarGoogleSheets();
            if (dados) renderizarGrafico(dados);
        }
    });
});
