<?php

// require __DIR__ . '/vendor/autoload.php';
require __DIR__ . "/planilha.php";
require_once __DIR__ . "/conexao.php";
require_once __DIR__ . "/cadastrar.php";
require_once __DIR__ . "/login.php";
use App\Planilhas;



      session_start();

      $acao = $_REQUEST["acao"] ?? '';

      try {

         switch ($acao) {




            case 'entrar':

               
               $login = new Login();

               if ($login->logar()) {

                  header("Location: ../public/home.php");
                  
               } else {

                  echo "Login ou senha inválidos";
               }
               break;

            case 'sair':

               $login = new Login();
               $login->deslogar();
               header('location: index.php');
               exit;

            case 'lerPlanilha':

               if (!isset($_FILES['arquivo'])) {

                  echo json_encode(['erro' => 'Nenhum arquivo enviado']);
                  exit;
               }

               $service = new Planilhas();
               $resultado = $service->processarArquivo($_FILES['arquivo']);
               echo json_encode($resultado, JSON_UNESCAPED_UNICODE);
               break;

            case 'salvarNoBanco':

               $dados = json_decode($_POST['dados'], true);

               if (!$dados) {

                  echo json_encode(['erro' => 'Nenhum dado recebido para salvar']);
                  exit;
               }

               $service = new Planilhas();
               $resultado = $service->salvarNoBanco($dados);
               echo json_encode($resultado, JSON_UNESCAPED_UNICODE);
               break;

            default:
               echo json_encode(['erro' => 'Ação inválida.']);
               break;



            case 'criarUsuario':
               if (verificarPost()) {

                  $usuario = new Usuario();

                  $usuario->setLogin_usuario($_POST['login'] ?? '');
                  echo "login";
                  $usuario->setEmail($_POST['email'] ?? '');
                  echo "email";
                  $usuario->setRe($_POST['re'] ?? '');
                  echo "re";
                  $usuario->setSetor($_POST['setor'] ?? '');
                  echo "setor";
                  $usuario->setSenha($_POST['senha'] ?? '');
                  echo "senha";
                  $usuario->criarUsuario();
                  header('Location: ../public/pagina_cadastro.php');
                  exit;
               }
               break;



         }
      } catch (Throwable $e) {
         $mensagem = $e->getMessage();


         error_log("[GATEWAY ERRO] {$mensagem}");


         echo json_encode([
            'erro' => 'Ocorreu um erro no servidor.',
            'detalhes' => $mensagem
         ], JSON_UNESCAPED_UNICODE);
      }


   function verificarLogin()
   {
      if (!isset($_SESSION['id_usuario'])) {
         header('HTTP/1.1 403 Forbidden');
         exit('Acesso negado');
      }
      return true;
   }

   
   function verificarPost()
   {
      return $_SERVER['REQUEST_METHOD'] === 'POST';
   }

   function verificarGet()
   {
      return $_SERVER['REQUEST_METHOD'] === 'GET';

   }
