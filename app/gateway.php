<?php

require_once __DIR__ . '/conexao.php';
require_once __DIR__ . '/cadastrar.php';
require_once __DIR__ . '/login.php';


class Gateway {


    public function run(){

        session_start();


        $acao = $_REQUEST['acao'] ?? '';

        switch($acao){

            case 'login':

               if($this->verificarLogin()){

                  $login = new Login();

                  if($login->login()){

                     header("Location: index.php?acao=listar");
                     exit;

                  }else{

                     echo("Dados inválidos!");

                  }        
                
        }

            break;

                case 'logout':

                     $login = new Login();
                     $login->logout();
                     header('Location: index.php');
                     exit;


                  case 'criarUsuario':
                        if ($this->verificarPost()) {
                            $usuario = new Usuario();
                            $usuario->setLogin($_POST['login'] ?? '');
                            $usuario->setEmail($_POST['email'] ?? '');
                            $usuario->setRe($_POST['re'] ?? '');
                            $usuario->setSenha($_POST['senha'] ?? '');
                            $usuario->criarUsuario();
                            header('Location: public/cadastrar.php');
                            exit;
                        }
                        break;
        
     
     
    }
}


}



