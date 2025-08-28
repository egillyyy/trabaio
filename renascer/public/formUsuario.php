<?php
    require_once "../codigo/conexao.php";
    require_once "../codigo/funcoes.php";

//    salvarUsuario($conexao, $email, $senha, $tipo, $nome, $telefone);
    if (isset($_GET['id'])) {
        // echo "editar";

        require_once "conexao.php";
        require_once "funcoes.php";

        $id = $_GET['id'];
        
        $usuario = salvarUsuario($conexao, $email, $senha, $tipo, $nome, $telefone);
        $email = $usuario['email'];
        $senha_hash = $usuario['senha'];
        $nome = $usuario['nome'];
        $telefone = $usuario['telefone'];
        // $nome = $usuario['nome'];
        // $cpf = $usuario['cpf'];
        // $endereco = $usuario['endereco'];

        $botao = "Atualizar";
    }
    else {
        // echo "novo";
        $id = 0;
        $email = "";
        $senha_hash = "";
        $nome = "";
        $telefone = "";
        // $nome = "";
        // $cpf = "";
        // $endereco = "";

        $botao = "Cadastrar";
    }
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Usuário</title>
</head>
<body>
    <form action="salvarUsuario.php?id=<?php echo $id; ?>" method="post">
        <h1>Criar conta</h1>

        Nome: <br>
        <input type="text" name="login"> <br><br>

        Telefone: <br>
        <input type="text" name="telefone"> <br><br>

        Email: <br>
        <input type="text" name="email"> <br><br>

        Senha: <br>
        <input type="password" name="senha"> <br><br>

    <button type="submit"> <a href="index.php">Criar conta</a></button>
    </form>
    <br>
    <!-- <a href="formUsuario.html">Cadastrar Usuário</a> -->
    <button type="submit"> <a href="index.php">Logar</a></button>
<!-- <?php
    // salvarUsuario($conexao, $email, $senha, $tipo, $nome, $telefone);
?>  -->

    
</body>
</html>