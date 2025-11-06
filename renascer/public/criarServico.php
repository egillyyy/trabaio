<?php
    require_once "../codigo/verificarLogado.php";
    $tipo = $_SESSION['tipo'];
?>

<?php
    require_once "../codigo/conexao.php";
    require_once "../codigo/funcoes.php";

    $servicos = listarServico($conexao);

    if (isset($_GET['id'])) {
        // echo "editar";

        $id = $_GET['id'];
        
        $servico = pesquisarServicoId($conexao, $idservico);
        
        $servico = pesquisarServicoId($conexao, $idservico);
        $preco_servico = $servico['preco_servico'];
        $tipo_servico = $servico['tipo_servico'];
        $descricao_servico = $servico['descricao_servico'];

        $botao = "Atualizar";
    }
    else {
        // echo "novo";
        $id = 0;
        $preco_servico = "";
        $tipo_servico = "";
        $descricao_servico = "";

        $botao = "Cadastrar";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Cadastro de Serviços</h1>
    <form action="salvarServico.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
        
        Preço do Serviço: <br>
        <input type="text" name="preco_servico" value="<?php echo $preco_servico; ?>"> <br><br>

        Tipo do Servico: <br>
            <select class="form-select" id="idservico" name="idservico" required>
                <option value="">Selecione</option>
                <?php
                foreach ($servicos as $selecione) {
                    echo "<option value='" . $selecione['idservico'] . "'>" . $selecione['tipo_servico'] . "</option>";
                }
                ?>
            </select>
        <br><br>

        Descrição do Serviço: <br>
        <textarea name="descricao_servico" rows="3" placeholder="Escreva algo sobre o serviço..." value="<?php echo $descricao_servico; ?>"></textarea> <br><br>

        Foto: <br>
        <input type="file" name="foto"> <br><br>

        <input type="submit" value="<?php echo $botao; ?>">
    </form>
</body>
</html>