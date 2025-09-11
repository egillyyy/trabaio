<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Usuário</title>
</head>
<body>
    <form action="salvarUsuario.php" method="post">
        <h1>Criar conta</h1>

        Nome: <br>
        <input type="text" name="nome"> <br><br>

        Telefone: <br>
        <input type="text" name="telefone"> <br><br>

        Email: <br>
        <input type="text" name="email"> <br><br>

        Senha: <br>
        <input type="password" name="senha"> <br><br>

        <!-- Tipo de usuário (cliente) -->
        <input type="hidden" name="c" value="usuario">

        <!-- <button type="submit"> <a href="index.php">Criar conta</a></button> -->
        <button type="submit">Criar conta</button>
    </form>
    <br>
    <!-- <a href="formUsuario.html">Cadastrar Usuário</a> -->
    <button type="submit"> <a href="index.php">Logar</a></button>

</body>
</html>