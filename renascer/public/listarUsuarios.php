<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuário</title>
</head>
<body>

    <h1>Lista de Usuário</h1>

    <?php
    require_once "../codigo/conexao.php";
    require_once "../codigo/funcoes.php";

    $lista_usuario = listarUsuario($conexao);

    if (count($lista_usuario) == 0) {
        echo "Não existem usuários cadastrados.";
    } else {
    ?>
        <table border ="1">
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Nome</th>
                <th colspan="2">Ações</th>
            </tr>
            <?php
            foreach ($lista_usuario as $usuario) {
                $id = $usuario['idusuario'];
                $email = $usuario['email'];
                $nome = $usuario['nome'];

                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$email</td>";
                echo "<td>$nome</td>";
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

