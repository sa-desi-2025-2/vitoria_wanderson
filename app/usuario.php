<?php

require_once __DIR__ ."conexao.php";

class Usuario{

    private Usuario $usuario;
    private function __construct() {}
    private $senha;
    private $login;

    public function getSenha() {
        return $this->senha;
    }
    
        public function setSenha($senha) {
            $this->senha = $senha;
        }
    
        public function getLogin() {
            return $this->login;
        }
    
        public function setLogin($login) {
            $this->login = $login;
        }

        public function logar(){

            $this->login = $_POST["login"];
            $this->senha = $_POST["senha"];
            $this->usuario = new Usuario();
            $resultado = $this->usuario->buscarPorLogin($this->login);

            if($resultado->rowCount() == 1){

                $resultado = $resultado ->fetch();

                if($resultado["senha"] === hash('sha512', $this->senha)){
                    
                    session_start();
                    $_SESSION['id_usuario'] = $resultado['id_usuario'];
                    $_SESSION['admin'] = $resultado['admin'];
                    $_SESSION['loggedin'] = true;
                    return 1;

                }else{

                    return 0;
                }
            
            }else{

                return 0;
            }
    
    }

    public function sair(){

        session_destroy();
        header("location:.../index.html");
    }

}


