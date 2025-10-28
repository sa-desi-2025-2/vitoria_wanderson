<?php

require_once __DIR__ ."conexao.php";

class Usuario{

    private $id;
    private $conexao;
    private $email;
    private $senha;
    private $eh_adm;

    public function getConexao() {
        return $this->conexao;
    }
    public function setConexao($conexao) {
        $this->conexao = $conexao;
    }


}


?>