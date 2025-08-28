<?php
    require_once "/../codigo/conexao.php";
    require_once "/../codigo/funcoes.php";

   salvarUsuario($conexao, $email, $senha, $tipo, $nome, $telefone);

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Usuário</title>
</head>
<body>
    <form action="" method="post">
        <h1>Criar conta</h1>

        Nome: <br>
        <input type="text" name="login"> <br><br>

        Telefone: <br>
        <input type="text" name="telefone"> <br><br>

        Email: <br>
        <input type="password" name="email"> <br><br>

        Senha: <br>
        <input type="password" name="senha"> <br><br>

        <input type="submit" value="logar">
    </form>
    <br>
    <!-- <a href="formUsuario.html">Cadastrar Usuário</a> -->
    <button type="submit"> <a href="index.php">Logar</a></button>

    
</body>
</html>