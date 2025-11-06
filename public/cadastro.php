<?php
    require_once __DIR__ . '/../app/config.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

</body>
</html>

<?php session_start()?>

<div>
    <form method="POST" action="<?= BASE_URL ?>/index.php?acao=inserir">
        <div>

        <label>Login</label>
        <br>
        <input type="text" name="login">
        <br>
        <label>Email</label>
        <br>
        <input type="email" name="email">
        <br>
        <label>RE</label>
        <br>
        <input type="text" name="re">
        <br>
        <label>Setor</label>
        <br>
        <input type="text" name="setor">
        <br>
        <label>Senha</label>
        <br>
        <input type="password" name="senha">
        <br>
        <label>Admin?</label>
        <input type="checkbox" name="admin">
        <br>
        <br>
        <input type="submit" value="Cadastrar">

        </div>

</div>

