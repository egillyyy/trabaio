<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Listar Usuário</title>
</head>
<body class="fundo-verde">

    <h1>Lista de Usuário</h1>

    <?php
    require_once "../codigo/conexao.php";
    require_once "../codigo/funcoes.php";

    $lista_usuario = listarUsuario($conexao);

    if (count($lista_usuario) == 0) {
        echo "Não existem usuários cadastrados.";
    } else {
    ?>
        <table class="table table-success table-striped">
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th colspan="2">Ações</th>
            </tr>
            <?php
            foreach ($lista_usuario as $usuario) {
                $id = $usuario['idusuario'];
                $email = $usuario['email'];
                $nome = $usuario['nome'];
                $telefone = $usuario['telefone'];

                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$email</td>";
                echo "<td>$nome</td>";
                echo "<td>$telefone</td>";
                echo "<td><a href='deletarusuario.php?id=$id'>Excluir</a></td>";
                echo "<td><a href='formUsuario.php?id=$id'>Editar</a></td>";
                echo "</tr>";
            }

            ?>
        </table>
    <?php
    }
    ?>
  
</body>
</html>

