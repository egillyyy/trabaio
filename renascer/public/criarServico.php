<?php
    require_once "../codigo/verificarLogado.php";
    $tipo = $_SESSION['tipo'];

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
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Serviço</title>
</head>
<body class="fundo-verde">
    <h1 class="card-title text-center mb-4" id="tituloagendamento">Cadastro de Serviços</h1>
    <form action="salvarServico.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data" class="card card-agendamento p-4 shadow">
        
        <div class="mb-3">
            <label for="preco_servico" class="form-label">Preço do Serviço:</label>
            <input type="text" class="form-control" id="preco_servico" name="preco_servico" value="<?php echo $preco_servico; ?>" required>
        </div>
        <br><br> 

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

        <div class="mb-3">
            <label for="descricao_servico" class="form-label">Descrição do Serviço:</label>
            <textarea type="text" class="form-control" id="descricao_servico" name="descricao_servico"  placeholder="Escreva algo sobre o serviço..." value="<?php echo $descricao_servico; ?>" required></textarea> <br><br>
        </div>

        Foto: <br>
        <input type="file" name="foto"> <br><br>

        <input type="submit" value="<?php echo $botao; ?>">
    </form>
</body>
</html>