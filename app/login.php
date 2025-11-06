<?php

require_once __DIR__ ."conexao.php";

class Usuario{

    private Usuario $usuario;
    public function __construct() {}
    private $login;
    private $senha;

    public function getSenha (){

        return $thiss->senha;
    }

    public function setSenha($senha){

        $this->senha = $senha;
    }

    public function getLogin(){

        return $this->login;

    }

    public function setLogin($login){

        $this->login;
    }

    public function logar(){

        $this->login = $_POST["login"];
        $this->senha = $_POST["senha"];
        $this->usuario = new Usuario();
        $resultado = $this->usuario->buscarPorEmail($this->email);

        if($resultado->rowCount() == 1){

            $resultado = $resultado->fetch();

            if($resultado['senha'] === hash('sha512', $this->senha;)){

                session_start();
                $_SESSION['id_usuario'] = $resultado['id_usuario'];
                $_SESSION['admin'] = $resultado['admin'];
                $_SESSION['loggedin'] = true;
                return 1;
            
            }else{

                return 0;
            
            }else{

                return 0;
            }
        }

        public function deslogar(){
            session_destroy();
            header("location:.../index.html");
        }

    }


}


?>
>>>>>>> 7ef3ba88121c778ba091d1f6b9f95f2bb79da453
