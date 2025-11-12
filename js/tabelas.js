export function renderizarTabela(dados) {
    const tabelaHead = document.getElementById('tabela-head');
    const tabelaBody = document.getElementById('tabela-body');
    const divBotao = document.getElementById('acoes');
  
    tabelaHead.innerHTML = '';
    tabelaBody.innerHTML = '';
    divBotao.innerHTML = '';
  
    if (dados.erro) {
      tabelaHead.innerHTML = `<tr><th class="text-danger">${dados.erro}</th></tr>`;
      return;
    }
  
    if (dados.dados?.length) {
      const cabecalho = dados.dados[0];
      tabelaHead.innerHTML = '<tr>' + cabecalho.map(c => `<th>${c}</th>`).join('') + '</tr>';
  
      for (let i = 1; i < dados.dados.length; i++) {
        const linha = dados.dados[i];
        const tr = document.createElement('tr');
        tr.innerHTML = linha.map(c => `<td>${c ?? ''}</td>`).join('');
        tabelaBody.appendChild(tr);
      }
  
      const btnSalvar = document.createElement('button');
      btnSalvar.textContent = 'Salvar no Banco';
      btnSalvar.className = 'btn btn-success mt-3';
      btnSalvar.onclick = async () => {
        try {
          const resposta = await fetch('gateway.php', {
            method: 'POST',
            body: new URLSearchParams({
              acao: 'salvar_banco',
              dados: JSON.stringify(dados.dados)
            })
          });
  
          const resultado = await resposta.json();
  
          // exibe o retorno real do gateway
          alert(`Resultado: ${resultado.mensagem ?? resultado.status ?? JSON.stringify(resultado)}`);
        } catch (erro) {
          alert(`Erro ao comunicar com o servidor: ${erro.message}`);
          console.error('Erro no fetch:', erro);
        }
      };
  
      divBotao.appendChild(btnSalvar);
    } else {
      tabelaHead.innerHTML = `<tr><th>Nenhum dado encontrado</th></tr>`;
    }
  }
  