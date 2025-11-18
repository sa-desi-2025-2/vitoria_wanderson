<?php
    require_once __DIR__ . '/../app/config.php'; 
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Dashcore</title>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            background-color: #9900FF;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        .input-group input {
            width: 93%; 
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .button-group button {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            flex-grow: 1; 
            margin: 0 5px; 
        }

        .button-group a {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            flex-grow: 1; 
            margin: 0 5px; 
            text-decoration: none;
        }

        
        .btn-login {
            background-color: #4CAF50; 
            color: white;
        }

        a {
            background-color: #f44336; 
            color: white;
        }

        .btn-cadastrar {
            background-color: #007bff; 
            color: white;
        }


    </style>
</head>
<body>

<?php session_start()?>

<div class="login-container">
    <h2>Acesso ao Dashcore</h2>
    <form action="<?= BASE_URL ?>/app/gateway.php?acao=entrar" method="post">
        <div class="input-group">
            <label for="username">Usuário:</label>
            <input type="text" id="username" name="login" required>
        </div>
        <div class="input-group">
            <label for="password">Senha:</label>
            <input type="password" id="password" name="senha" required>
        </div>
       
        <div class="button-group">
            <button type="submit" class="btn-login" onclick="alert('Usuário Logado com Sucesso!')">Login</button>
            <a href="http://localhost:8080/vitoria_wanderson/public/pagina_cadastro.php">Cadastrar</a>

        </div>
    </form>
</div>

</body>
</html>

<!-- <form action="<?= BASE_URL ?>/app/gateway.php?acao=entrar" method="post">
    <div>
        <h2>DashCore</h2>

        <label>Login do usuário:</label>
        <br>
        <input type="text" placeholder="login" name="login" id="">
        <br>
        <label>Senha:</label>
        <br>
        <input type="password" placeholder="12345678" name="senha" id="">
        <br>
        <input type="submit" value="Fazer login">
        <a href="http://localhost:8080/vitoria_wanderson/public/cadastro.php">Cadastrar</a>


    </div>
</form> -->