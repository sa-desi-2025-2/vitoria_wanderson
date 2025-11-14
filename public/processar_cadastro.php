<?php
    require_once __DIR__ . '/../app/config.php'; 
?>
 
 <!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processamento Concluído</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #9900FF; /* Fundo verde claro */
            color: #BB9CDD; /* Texto verde escuro */
            text-align: center;
        }
        .message-box {
            background-color: #BB9CDD; /* Caixa verde mais clara */
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color:rgb(255, 255, 255); /* Título verde */
            margin-bottom: 20px;
        }
        .icon {
            font-size: 50px;
            margin-bottom: 15px;
            display: block;
        }
        .btn-home {
            background-color: #BB9CDD;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 20px;
            cursor: pointer;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="message-box">
    <h1>Cadastro feito com sucesso!</h1>
    <a href="http://localhost:8080/vitoria_wanderson/public/pagina_login.php" class="btn-home">Ir para a Página Inicial</a>
</div>

</body>
</html>