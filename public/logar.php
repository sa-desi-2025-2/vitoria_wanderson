<?php

require_once __DIR__ . '/../app/config.php'; 




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>


<?php session_start()?>

<div>

<form action="<?= BASE_URL ?>/app/gateway.php?acao=entrar" method="post">
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
</form>

</div>
    
</body>

