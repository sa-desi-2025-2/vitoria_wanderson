<?php
    require_once __DIR__ . '/../app/config.php'; 
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro para o Dashcore</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #9900FF;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 350px;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; 
        }
        .button-group {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        button {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            flex-grow: 1; 
            margin: 0 5px; 
        }
        a {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            flex-grow: 1; 
            margin: 0 5px; 
            text-decoration: none;
            
        
        }
        button:first-child { margin-left: 0; }
        button:last-child { margin-right: 0; }

        .btn-cancelar {
            background-color: #f44336;
            color: white;
        }
        .btn-cadastrar {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Cadastre-se</h1>
    
     <form method="POST" action="<?= BASE_URL ?>/app/gateway.php?acao=criarUsuario">
        
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="login" required>
        </div>
        
         <div class= "from-group">
            <label for="re">Re</label>
            <input type="text" id="re" required>
            </div> 

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" required>
        </div>
        
        <div class="form-group">
            <label for="confirma_senha">Confirme sua Senha</label>
            <input type="password" id="confirma_senha" name="confirma_senha" required>
        </div>

        <div class="button-group">
            <a href="http://localhost:8080/vitoria_wanderson/public/pagina_login.php" class="btn-cancelar">Cancelar</a>
             <button type="submit" class="btn-cadastrar">Cadastrar</button>
            
            
        </div>
    </form>
</div>

</body>
</html>