<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Dashcore</title>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
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

        
        .btn-login {
            background-color: #4CAF50; 
            color: white;
        }

        .btn-cancelar {
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

<div class="login-container">
    <h2>Acesso ao Sistema</h2>
    <form action="#" method="POST">
        <div class="input-group">
            <label for="username">Usuário:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="input-group">
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="button-group">
            <button type="submit" class="btn-login" onclick="alert('Usuário Logado com Sucesso!')">Login</button>
            <button type="button" class="btn-cadastrar" onclick="alert('Redirecionando para a página de Cadastro...')">Cadastrar</button>
    </form>
</div>

</body>
</html>