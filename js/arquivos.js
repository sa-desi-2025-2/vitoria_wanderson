export async function escolherArquivo() {
    const arquivo = document.getElementById('arquivo').files[0];
    if (!arquivo) {
        alert('Escolha um arquivo válido.');
        return;
    }

    const btn = document.getElementById('uploadBtn');
    btn.disabled = true;
    btn.textContent = 'Carregando...';

    const formData = new FormData();
    formData.append('acao', 'ler_planilha');
    formData.append('arquivo', arquivo);

    try {
        const resposta = await fetch('gateway.php', { method: 'POST', body: formData });
        const dados = await resposta.json();
        const { renderizarTabela } = await import('./tabela.js');
        renderizarTabela(dados);
        return dados;
    } catch (erro) {
        alert('Erro: ' + erro.message);
    } finally {
        btn.disabled = false;
        btn.textContent = 'Enviar e Ler';
    }
}