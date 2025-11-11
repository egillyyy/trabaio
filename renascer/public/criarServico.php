<?php
require_once "../codigo/verificarLogado.php";
$tipo = $_SESSION['tipo'];

require_once "../codigo/conexao.php";
require_once "../codigo/funcoes.php";

$servicos = listarServico($conexao);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $servico = pesquisarServicoId($conexao, $id);
    $preco_servico = $servico['preco_servico'];
    $tipo_servico = $servico['tipo_servico'];
    $descricao_servico = $servico['descricao_servico'];
    $botao = "Atualizar";
} else {
    $id = 0;
    $preco_servico = "";
    $tipo_servico = "";
    $descricao_servico = "";
    $botao = "Cadastrar";
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Serviço</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="fundo-verde" id="body-Cservico">
    <div class="container mt-4">
        <div class="card mx-auto shadow" style="max-width: 450px;">
            <div class="card-body">
                <h1 class="text-center mb-4 tituloConta">Cadastro de Serviços</h1>

                <form id="cadastroS" action="salvarServico.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data" novalidate>

                    <div class="mb-3">
                        <label for="preco_servico" class="form-label">Preço do Serviço</label>
                        <input type="text" class="form-control" id="preco_servico" name="preco_servico"
                            value="<?php echo $preco_servico; ?>" required placeholder="R$ 00,00">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tipo do Serviço</label><br>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tipo_servico" id="cabelo" value="Cabelo" required>
                            <label class="form-check-label" for="cabelo">Cabelo</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tipo_servico" id="penteado" value="Penteado">
                            <label class="form-check-label" for="penteado">Penteado</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tipo_servico" id="maquiagem" value="Maquiagem">
                            <label class="form-check-label" for="maquiagem">Maquiagem</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tipo_servico" id="unha" value="Unha">
                            <label class="form-check-label" for="unha">Unha</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tipo_servico" id="especial" value="Especial">
                            <label class="form-check-label" for="especial">Especial</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="descricao_servico" class="form-label">Descrição do Serviço</label>
                        <textarea class="form-control" id="descricao_servico" name="descricao_servico" rows="3"
                            placeholder="Escreva algo sobre o serviço..."><?php echo $descricao_servico; ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto (opcional)</label>
                        <input type="file" class="form-control" id="foto" name="foto">
                    </div>

                    <button type="submit" class="btn btn-dark w-100"><?php echo $botao; ?></button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="funcoes.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
