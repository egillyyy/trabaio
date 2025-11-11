<?php
    require_once "../codigo/verificarLogado.php";
    $tipo = $_SESSION['tipo'];
?>

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

    <h1 id="h1arrumado">Lista de Usuário</h1>

    <?php
    require_once "../codigo/conexao.php";
    require_once "../codigo/funcoes.php";

    $lista_usuario = listarUsuario($conexao);

    if (count($lista_usuario) == 0) {
        echo "Não existem usuários cadastrados.";
    } else {
    ?>
            <div class="table">
                <table class="table">
                    <thead class="table-success text-center">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Email</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Telefone</th>
                            <th scope="col" colspan="2">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
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
                    </tbody>
                </table>
            </div>
        <?php
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

