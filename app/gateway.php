<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/planilha.php';
require_once __DIR__ . "/conexao.php";
require_once __DIR__ . "/cadastrar.php";

require_once __DIR__ . "usuario.php";

class Getaway {


   public function run(){


        session_start();

        $acao = $_REQUEST["acao"] ?? '';

        try{

        switch ($acao) {

      
      

         case 'entrar':
            if ($this->verificarLogin()){

               $login = new Login();

               if($login->login()){

                  header("Location: index.php?acao=mostrarUsuario");
                  exit;
               }else{

                  echo "Login ou senha inválidos";
               }
               break;

            }

         case 'sair':

            $login = new Login();
            $login->logout();
            header('location: index.php');
            exit;

         case 'lerPlanilha':

            if(!isset($_FILES['arquivo'])){

               echo json_encode(['erro' => 'Nenhum arquivo enviado']);
               exit;
            }

            $service = new PlanilhaService();
            $resultado = $service->processarArquivo($_FILES['arquivo']);
            echo json_encode($resultado, JSON_UNESCAPED_UNICODE);
            break;

         case 'salvarNoBanco':

            $dados = json_decode($_POST['dados'], true);

            if(!$dados){

               echo json_decode(['erro' => 'Nenhum dado recebido para salvar']);
               exit;
            }

            $service = new PlanilhaService();
            $resultado = $service->salvarNoBanco($dados);
            echo json_encode($resultado, JSON_UNESCAPED_UNICODE);
            break;

            default:
            echo json_encode(['erro' => 'Ação inválida.']);
            break;
      


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


}

