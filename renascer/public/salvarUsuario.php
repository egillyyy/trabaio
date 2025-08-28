<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salvar Usuário</title>
</head>
<body>
    <h1>Salvar Usuário</h1>
    <?php
    require_once "conexao.php";
    require_once "funcoes.php";

    $id = $_GET['id'];
    $email = $usuario['email'];
    $senha_hash = $usuario['senha'];
    $nome = $usuario['nome'];
    $telefone = $usuario['telefone'];
    // $nome = $_POST['nome'];
    // $cpf = $_POST['cpf'];
    // $endereco = $_POST['endereco'];

    if ($id == 0) {
    salvarUsuario($conexao, $email, $senha, $tipo, $nome, $telefone);
    } else {
        editarUsuario($conexao, $email, $senha, $tipo, $nome, $telefone, $idusuario);
    }

    header("Location: listarUsuarios.php");
    ?>
    
</body>
</html>