<?php
 namespace Classes;

 use PhpOffice/PhpSpreadsheet/IOFactory;
 use Classes/Conexao;

 class Planilhas{
    public function processarArquivo($Arquivo): array{
        $destino = __DIR__ . '/../uploads/' . basename($arquivo['name']);
        if (!is_dir(dirname($destino))) {
            mkdir(dirname($destino), 0777, true);
        }
        if (!move_uploaded_file($arquivo['tmp_name'], $destino)) {
            return ['erro' => 'Falha ao salvar o arquivo de upload.'];
        }


        $spreadsheet = IOFactory::load($destino);
        $dados = $spreadsheet->getActiveSheet()->toArray();


        return ['dados' => $dados];
    }


    public function salvarNoBanco(array $dados): array
    {
        try {
            $db = new Conexao();


            $cabecalhos = $dados[0] ?? [];
            if (!$cabecalhos) {
                return ['status' => 'erro', 'mensagem' => 'Nenhum cabeçalho encontrado.'];
            }


            $colunas = implode(',', array_map(fn($c) => "`$c`", $cabecalhos));
            $placeholders = implode(',', array_fill(0, count($cabecalhos), '?'));


            for ($i = 1; $i < count($dados); $i++) {
                $linha = $dados[$i];
                if (count(array_filter($linha)) === 0)
                    continue; 


                $stmt = $db->prepare("INSERT INTO pessoa ($colunas) VALUES ($placeholders)");
                $stmt->execute($linha);
            }


            return ['status' => 'ok', 'mensagem' => 'Dados salvos com sucesso no banco.'];
        } catch (\PDOException $e) {
            return ['status' => 'erro', 'mensagem' => 'Erro ao salvar: ' . $e->getMessage()];
        }
    }
}
  
    
 
 